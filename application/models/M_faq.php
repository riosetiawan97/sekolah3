<?php
class M_faq extends CI_Model{

	function get_all_faq(){
		return $this->db->query("select * from tbl_faq ORDER BY faq_id");
	}
	function simpan_faq_tanpa_img($faq_judul, $faq_isi, $faq_aktif){
		return $this->db->insert('tbl_faq', array('faq_judul' => $faq_judul, 'faq_isi' => $faq_isi, 'faq_aktif' => (int) $faq_aktif));
	}
	function simpan_faq($faq_judul, $faq_isi, $faq_aktif,$faq_gambar){
		return $this->db->insert('tbl_faq', array('faq_judul' => $faq_judul, 'faq_isi' => $faq_isi, 'faq_aktif' => (int) $faq_aktif, 'faq_gambar' => $faq_gambar));
	}
	function update_faq_tanpa_img($kode,$faq_judul, $faq_isi, $faq_aktif){
		return $this->db->where('faq_id', (int) $kode)->update('tbl_faq', array('faq_judul' => $faq_judul, 'faq_isi' => $faq_isi, 'faq_aktif' => (int) $faq_aktif));
	}
	function update_faq($kode,$faq_judul, $faq_isi, $faq_aktif, $faq_gambar){
		return $this->db->where('faq_id', (int) $kode)->update('tbl_faq', array('faq_judul' => $faq_judul, 'faq_isi' => $faq_isi, 'faq_aktif' => (int) $faq_aktif, 'faq_gambar' => $faq_gambar));
	}
	function hapus_faq($kode){
		$this->db->where('faq_id', (int) $kode)->delete('tbl_faq_item');
		return $this->db->where('faq_id', (int) $kode)->delete('tbl_faq');
	}
	function get_faq_byid($faq_id){
		return $this->db->get_where('tbl_faq', array('faq_id' => (int) $faq_id));
	}

	// Pertanyaan & jawaban per kategori FAQ
	function get_items($faq_id){
		return $this->db->order_by('urutan', 'ASC')->order_by('id', 'ASC')->get_where('tbl_faq_item', array('faq_id' => (int) $faq_id))->result();
	}
	function simpan_item($faq_id, $pertanyaan, $jawaban, $urutan){
		return $this->db->insert('tbl_faq_item', array('faq_id' => (int) $faq_id, 'pertanyaan' => $pertanyaan, 'jawaban' => $jawaban, 'urutan' => (int) $urutan));
	}
	function update_item($id, $pertanyaan, $jawaban, $urutan){
		return $this->db->where('id', (int) $id)->update('tbl_faq_item', array('pertanyaan' => $pertanyaan, 'jawaban' => $jawaban, 'urutan' => (int) $urutan));
	}
	function hapus_item($id){
		return $this->db->where('id', (int) $id)->delete('tbl_faq_item');
	}
	function get_item($id){
		return $this->db->get_where('tbl_faq_item', array('id' => (int) $id))->row();
	}

	//front-end
	function get_faq_home(){
		return $this->db->query("SELECT tbl_faq.* FROM tbl_faq where faq_aktif = 1 ORDER BY faq_id DESC limit 3");
	}
}
