<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| Pengaturan tampilan website + daftar isi (statistik, program, dll.).
| Definisi field ada di application/config/tampilan.php.
|
| pastikan_skema() membuat tabel/kolom baru yang dibutuhkan desain baru jika belum ada,
| jadi database lama (mis. di Aiven) tidak perlu diimport ulang.
*/
class M_tampilan extends CI_Model{

	const SKEMA_VERSI = '2';

	private $cache_pengaturan = NULL;
	private $cache_item = array();

	function __construct(){
		parent::__construct();
		$this->config->load('tampilan', TRUE);
	}

	function grup(){
		return $this->config->item('tampilan_grup', 'tampilan');
	}

	function grup_item(){
		return $this->config->item('tampilan_item', 'tampilan');
	}

	// ── Pengaturan ────────────────────────────────────────────────────────

	function defaults(){
		$hasil = array();
		foreach ($this->grup() as $grup) {
			foreach ($grup['fields'] as $kunci => $f) {
				if ($f['tipe'] !== 'judul') {
					$hasil[$kunci] = isset($f['default']) ? $f['default'] : '';
				}
			}
		}
		return $hasil;
	}

	function pengaturan(){
		if ($this->cache_pengaturan === NULL) {
			$nilai = $this->defaults();
			foreach ($this->db->get('tbl_pengaturan')->result() as $row) {
				$nilai[$row->kunci] = $row->nilai;
			}
			$this->cache_pengaturan = $nilai;
		}
		return $this->cache_pengaturan;
	}

	function simpan_pengaturan(array $data){
		foreach ($data as $kunci => $nilai) {
			$sql = 'INSERT INTO tbl_pengaturan (kunci, nilai) VALUES (?, ?) ON DUPLICATE KEY UPDATE nilai = VALUES(nilai)';
			$this->db->query($sql, array($kunci, (string) $nilai));
		}
		$this->cache_pengaturan = NULL;
	}

	// ── Daftar isi ────────────────────────────────────────────────────────

	function items($grup, $hanya_aktif = TRUE){
		$k = $grup.($hanya_aktif ? '1' : '0');
		if ( ! isset($this->cache_item[$k])) {
			$this->db->where('grup', $grup);
			if ($hanya_aktif) {
				$this->db->where('aktif', 1);
			}
			$this->db->order_by('urutan', 'ASC')->order_by('id', 'ASC');
			$this->cache_item[$k] = $this->db->get('tbl_konten_item')->result();
		}
		return $this->cache_item[$k];
	}

	function get_item($id){
		return $this->db->get_where('tbl_konten_item', array('id' => (int) $id))->row();
	}

	function simpan_item(array $data){
		if ( ! isset($data['urutan']) || $data['urutan'] === '') {
			$max = $this->db->select_max('urutan')->where('grup', $data['grup'])->get('tbl_konten_item')->row();
			$data['urutan'] = ($max && $max->urutan !== NULL) ? $max->urutan + 1 : 1;
		}
		$this->db->insert('tbl_konten_item', $data);
		$this->cache_item = array();
	}

	function update_item($id, array $data){
		$this->db->where('id', (int) $id)->update('tbl_konten_item', $data);
		$this->cache_item = array();
	}

	function hapus_item($id){
		$this->db->where('id', (int) $id)->delete('tbl_konten_item');
		$this->cache_item = array();
	}

	// ── Skema ─────────────────────────────────────────────────────────────

	function pastikan_skema(){
		if ($this->db->table_exists('tbl_pengaturan')) {
			$v = $this->db->get_where('tbl_pengaturan', array('kunci' => '_skema_versi'))->row();
			if ($v && $v->nilai === self::SKEMA_VERSI) {
				return;
			}
		}
		$this->buat_skema();
	}

	private function buat_skema(){
		$opsi = 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci';

		$this->db->query("CREATE TABLE IF NOT EXISTS tbl_pengaturan (
			kunci varchar(60) NOT NULL,
			nilai text,
			PRIMARY KEY (kunci)
		) $opsi");

		$baru_item = ! $this->db->table_exists('tbl_konten_item');
		$this->db->query("CREATE TABLE IF NOT EXISTS tbl_konten_item (
			id int NOT NULL AUTO_INCREMENT,
			grup varchar(30) NOT NULL,
			judul varchar(255) DEFAULT NULL,
			deskripsi text,
			nilai varchar(150) DEFAULT NULL,
			ikon varchar(20) DEFAULT NULL,
			warna varchar(10) DEFAULT NULL,
			urutan int NOT NULL DEFAULT 0,
			aktif tinyint NOT NULL DEFAULT 1,
			PRIMARY KEY (id),
			KEY grup (grup)
		) $opsi");

		$this->db->query("CREATE TABLE IF NOT EXISTS tbl_faq_item (
			id int NOT NULL AUTO_INCREMENT,
			faq_id int NOT NULL,
			pertanyaan varchar(255) NOT NULL,
			jawaban text,
			urutan int NOT NULL DEFAULT 0,
			PRIMARY KEY (id),
			KEY faq_id (faq_id)
		) $opsi");

		$this->db->query("CREATE TABLE IF NOT EXISTS tbl_pendaftar (
			id int NOT NULL AUTO_INCREMENT,
			nama varchar(100) NOT NULL,
			asal_sekolah varchar(150) NOT NULL,
			nama_ortu varchar(100) DEFAULT NULL,
			no_hp varchar(30) NOT NULL,
			email varchar(100) DEFAULT NULL,
			status varchar(20) NOT NULL DEFAULT 'Baru',
			catatan text,
			tanggal timestamp NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (id)
		) $opsi");

		$utf = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci';
		$this->tambah_kolom('tbl_alur_pendaftaran', 'ikon', "varchar(20) $utf DEFAULT NULL");
		$this->tambah_kolom('tbl_alur_pendaftaran', 'warna', "varchar(10) DEFAULT NULL");
		$this->tambah_kolom('tbl_agenda', 'agenda_kategori', "varchar(50) $utf DEFAULT NULL");

		// Isi awal dari desain, sekali untuk setiap grup (grup baru di versi berikutnya ikut terisi).
		$sudah = $this->db->get_where('tbl_pengaturan', array('kunci' => '_grup_terisi'))->row();
		$sudah = $sudah ? explode(',', $sudah->nilai) : array();
		if ( ! $baru_item && ! $sudah) {
			// Database versi 1: grup lama sudah terisi saat tabel dibuat.
			$sudah = array('statistik', 'program', 'fakta', 'syarat', 'jadwal_ppdb', 'info_ppdb');
		}
		foreach ($this->grup_item() as $grup => $def) {
			if (in_array($grup, $sudah, TRUE)) continue;
			$urut = 1;
			foreach ($def['awal'] as $row) {
				$row['grup'] = $grup;
				$row['urutan'] = $urut++;
				$this->db->insert('tbl_konten_item', $row);
			}
			$sudah[] = $grup;
		}
		$this->db->query('INSERT INTO tbl_pengaturan (kunci, nilai) VALUES (?, ?) ON DUPLICATE KEY UPDATE nilai = VALUES(nilai)', array('_grup_terisi', implode(',', $sudah)));

		$this->db->query('INSERT INTO tbl_pengaturan (kunci, nilai) VALUES (?, ?) ON DUPLICATE KEY UPDATE nilai = VALUES(nilai)', array('_skema_versi', self::SKEMA_VERSI));
	}

	private function tambah_kolom($tabel, $kolom, $definisi){
		if ($this->db->table_exists($tabel) && ! $this->db->field_exists($kolom, $tabel)) {
			$this->db->query("ALTER TABLE `$tabel` ADD COLUMN `$kolom` $definisi");
		}
	}
}
