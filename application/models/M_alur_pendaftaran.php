<?php
class M_alur_pendaftaran extends CI_Model{

	function get_all_alur_pendaftaran(){
		$hsl=$this->db->query("SELECT * FROM tbl_alur_pendaftaran ORDER BY langkah");
		return $hsl;
	}
	function simpan_alur_pendaftaran($langkah,$judul,$deskripsi){
		$hsl=$this->db->query("INSERT INTO tbl_alur_pendaftaran(langkah,judul,deskripsi) VALUES ('$langkah','$judul','$deskripsi')");
		return $hsl;
	}
	function update_alur_pendaftaran($id,$langkah,$judul,$deskripsi){
		$hsl=$this->db->query("UPDATE tbl_alur_pendaftaran SET langkah='$langkah',judul='$judul',deskripsi='$deskripsi' where id='$id'");
		return $hsl;
	}
	function hapus_alur_pendaftaran($id){
		$hsl=$this->db->query("DELETE FROM tbl_alur_pendaftaran WHERE id='$id'");
		return $hsl;
	}
} 