<?php
class M_youtube extends CI_Model{

	function get_all_youtube(){
		$hsl=$this->db->query("SELECT tbl_youtube.*,DATE_FORMAT(youtube_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_youtube ORDER BY youtube_id");
		return $hsl;
	}
	function simpan_youtube($youtube_link,$youtube_description,$youtube_author){
		$hsl=$this->db->query("insert into tbl_youtube(youtube_link,youtube_description,youtube_author) values ('$youtube_link','$youtube_description','$youtube_author')");
		return $hsl;
	}
	function get_youtube_by_kode($youtube_id){
		$hsl=$this->db->query("SELECT tbl_youtube.*,DATE_FORMAT(youtube_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_youtube where youtube_id='$youtube_id'");
		return $hsl;
	}
	function update_youtube($youtube_id,$youtube_link,$youtube_description,$youtube_author){
		$hsl=$this->db->query("update tbl_youtube set youtube_link='$youtube_link',youtube_description='$youtube_description',youtube_author='$youtube_author' where youtube_id='$youtube_id'");
		return $hsl;
	}
	function hapus_youtube($youtube_id){
		$hsl=$this->db->query("delete from tbl_youtube where youtube_id='$youtube_id'");
		return $hsl;
	}
	function get_youtube1(){
		$hsl=$this->db->query("SELECT tbl_youtube.*,DATE_FORMAT(youtube_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_youtube where youtube_id = 1 ORDER BY youtube_id");
		return $hsl;
	}
	function get_youtube2(){
		$hsl=$this->db->query("SELECT tbl_youtube.*,DATE_FORMAT(youtube_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_youtube where youtube_id != 1 ORDER BY youtube_id");
		return $hsl;
	}
}