<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| Kerangka halaman admin sederhana: daftar data + tambah/ubah/hapus lewat modal.
| Controller turunan cukup mengisi definisi() (tabel, kolom, label, tipe input).
| Tampilan ada di views/admin/v_crud.php. Semua query memakai Query Builder (aman dari SQL injection).
|
| Tipe kolom: text, textarea, date, select (opsi => array nilai => label), image, file.
*/
class Admin_crud extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			redirect(base_url('administrator'));
		}
		$this->load->model('m_setup');
		$this->load->library('upload');
	}

	// Diisi controller turunan.
	protected function definisi()
	{
		return array();
	}

	protected function data()
	{
		$d = $this->definisi();
		if ( ! empty($d['urut'])) $this->db->order_by($d['urut']);
		return $this->db->get($d['tabel'])->result();
	}

	function index()
	{
		$d = $this->definisi();
		$x['setup'] = $this->m_setup->get_setup()->row();
		$x['def'] = $d;
		$x['data'] = $this->data();
		$x['title'] = 'Admin '.$x['setup']->judul_website.' | '.$d['judul'];
		$this->template->load('template_admin', 'admin/v_crud', $x);
	}

	// Ambil isian form. $lama = baris lama (untuk ubah), dipakai saat file baru diunggah.
	private function input($lama = NULL)
	{
		$d = $this->definisi();
		$data = array();
		$gagal = array();
		foreach ($d['kolom'] as $k => $f) {
			if ( ! empty($f['hanya_tampil'])) continue;
			if ($f['tipe'] === 'image' || $f['tipe'] === 'file') {
				if (empty($_FILES[$k]['name'])) continue;
				$nama = $this->unggah($k, $f);
				if ($nama === FALSE) { $gagal[] = $f['label']; continue; }
				$data[$k] = $nama;
				if ($lama && ! empty($lama->$k)) {
					upload_delete(($f['tipe'] === 'image' ? UPLOAD_IMAGES_PATH : UPLOAD_FILES_PATH).basename($lama->$k));
				}
				continue;
			}
			$v = trim((string) $this->input->post($k));
			if ($f['tipe'] === 'select' && ! array_key_exists($v, $f['opsi'])) {
				$v = isset($f['bawaan']) ? $f['bawaan'] : '';
			}
			$data[$k] = isset($f['maks']) ? mb_substr($v, 0, $f['maks']) : $v;
		}
		return array($data, $gagal);
	}

	private function unggah($field, $f)
	{
		$gambar = $f['tipe'] === 'image';
		$this->upload->initialize(array(
			'upload_path' => $gambar ? UPLOAD_IMAGES_PATH : UPLOAD_FILES_PATH,
			'allowed_types' => isset($f['jenis']) ? $f['jenis'] : ($gambar ? 'gif|jpg|png|jpeg|webp' : 'pdf|doc|docx|xls|xlsx|ppt|pptx|zip'),
			'max_size' => 20480,
			'encrypt_name' => TRUE,
		));
		if ( ! $this->upload->do_upload($field)) return FALSE;
		$u = $this->upload->data();
		return $u['file_name'];
	}

	private function cari($id)
	{
		$d = $this->definisi();
		return $this->db->get_where($d['tabel'], array($d['pk'] => (int) $id))->row();
	}

	private function pesan($gagal, $teks)
	{
		if ($gagal) {
			$this->session->set_flashdata('pesan', array('error', $teks.' Tapi file gagal diunggah ('.implode(', ', $gagal).'): periksa jenis dan ukuran file.'));
		} else {
			$this->session->set_flashdata('pesan', array('ok', $teks));
		}
	}

	function simpan()
	{
		$d = $this->definisi();
		if ($this->input->method() === 'post') {
			list($data, $gagal) = $this->input();
			$this->db->insert($d['tabel'], $data);
			$this->pesan($gagal, 'Data berhasil ditambahkan.');
		}
		redirect($d['url']);
	}

	function update()
	{
		$d = $this->definisi();
		$lama = $this->cari($this->input->post('id'));
		if ($lama && $this->input->method() === 'post') {
			list($data, $gagal) = $this->input($lama);
			if ($data) $this->db->where($d['pk'], $lama->{$d['pk']})->update($d['tabel'], $data);
			$this->pesan($gagal, 'Data berhasil diubah.');
		}
		redirect($d['url']);
	}

	function hapus()
	{
		$d = $this->definisi();
		$lama = $this->cari($this->input->post('id'));
		if ($lama && $this->input->method() === 'post') {
			foreach ($d['kolom'] as $k => $f) {
				if (($f['tipe'] === 'image' || $f['tipe'] === 'file') && ! empty($lama->$k)) {
					upload_delete(($f['tipe'] === 'image' ? UPLOAD_IMAGES_PATH : UPLOAD_FILES_PATH).basename($lama->$k));
				}
			}
			$this->db->where($d['pk'], $lama->{$d['pk']})->delete($d['tabel']);
			$this->session->set_flashdata('pesan', array('ok', 'Data berhasil dihapus.'));
		}
		redirect($d['url']);
	}
}
