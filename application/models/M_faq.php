<?php
class M_faq extends CI_Model{

	function get_all_faq(){
		$hsl=$this->db->query("select * from tbl_faq");
		return $hsl;
	}
	function simpan_faq_tanpa_img($faq_judul, $faq_isi, $faq_aktif){
		$hsl=$this->db->query("insert into tbl_faq(faq_judul, faq_isi, faq_aktif) values('$faq_judul', '$faq_isi', '$faq_aktif')");
		return $hsl;
	}
	function simpan_faq($faq_judul, $faq_isi, $faq_aktif,$faq_gambar){
		$hsl=$this->db->query("insert into tbl_faq(faq_judul, faq_isi, faq_aktif, faq_gambar) values('$faq_judul', '$faq_isi', '$faq_aktif', '$faq_gambar')");
		return $hsl;
	}
	function update_faq_tanpa_img($kode,$faq_judul, $faq_isi, $faq_aktif){
		$hsl=$this->db->query("update tbl_faq set faq_judul='$faq_judul', faq_isi='$faq_isi', faq_aktif='$faq_aktif' where faq_id='$kode'");
		return $hsl;
	}
	function update_faq($kode,$faq_judul, $faq_isi, $faq_aktif, $faq_gambar){
		$hsl=$this->db->query("update tbl_faq set faq_judul='$faq_judul', faq_isi='$faq_isi', faq_aktif='$faq_aktif', faq_gambar='$faq_gambar' where faq_id='$kode'");
		return $hsl;
	}
	function hapus_faq($kode){
		$hsl=$this->db->query("delete from tbl_faq where faq_id='$kode'");
		return $hsl;
	}
	
	function get_faq_byid($faq_id){
		$hsl=$this->db->query("select * from tbl_faq where faq_id='$faq_id'");
		return $hsl;
	}

	//front-end
	function get_faq_home(){
		$hsl=$this->db->query("SELECT tbl_faq.* FROM tbl_faq where faq_aktif = 1 ORDER BY faq_id DESC limit 3");
		return $hsl;
	}

}