<?php
class M_alur_pendaftaran extends CI_Model{

	function get_all_alur_pendaftaran(){
		return $this->db->order_by('langkah', 'ASC')->order_by('id', 'ASC')->get('tbl_alur_pendaftaran');
	}

	// Untuk halaman publik: ikon & warna diisi bawaan jika kosong.
	function get_alur_tampil(){
		$this->config->load('tampilan', TRUE);
		$ikon = $this->config->item('tampilan_langkah_ikon', 'tampilan');
		$palet = $this->config->item('tampilan_palet', 'tampilan');
		$hasil = array();
		foreach ($this->get_all_alur_pendaftaran()->result() as $i => $row) {
			$row->ikon_tampil = ! empty($row->ikon) ? $row->ikon : $ikon[$i % count($ikon)];
			$row->warna_tampil = ! empty($row->warna) ? $row->warna : $palet[$i % count($palet)];
			$hasil[] = $row;
		}
		return $hasil;
	}

	function simpan_alur_pendaftaran($langkah,$judul,$deskripsi,$ikon='',$warna=''){
		return $this->db->insert('tbl_alur_pendaftaran', array(
			'langkah' => (int) $langkah, 'judul' => $judul, 'deskripsi' => $deskripsi, 'ikon' => $ikon, 'warna' => $warna,
		));
	}
	function update_alur_pendaftaran($id,$langkah,$judul,$deskripsi,$ikon='',$warna=''){
		return $this->db->where('id', (int) $id)->update('tbl_alur_pendaftaran', array(
			'langkah' => (int) $langkah, 'judul' => $judul, 'deskripsi' => $deskripsi, 'ikon' => $ikon, 'warna' => $warna,
		));
	}
	function hapus_alur_pendaftaran($id){
		return $this->db->where('id', (int) $id)->delete('tbl_alur_pendaftaran');
	}
}
