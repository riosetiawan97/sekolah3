<?php
class M_brosur extends CI_Model{

	function get_all_brosur(){
		$hsl=$this->db->query("SELECT tbl_brosur.*,DATE_FORMAT(	brosur_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_brosur ORDER BY brosur_id");
		return $hsl;
	}
	function get_pamflet(){
		$hsl=$this->db->query("SELECT tbl_brosur.*,DATE_FORMAT(	brosur_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_brosur WHERE type='pamflet' ORDER BY brosur_id");
		return $hsl;
	}
	function get_brosur(){
		$hsl=$this->db->query("SELECT tbl_brosur.*,DATE_FORMAT(	brosur_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_brosur WHERE type='brosur' ORDER BY brosur_id");
		return $hsl;
	}
	function simpan_brosur($brosur_gambar,$type,$brosur_author){
		$hsl=$this->db->query("insert into tbl_brosur(brosur_gambar,type,brosur_author) values ('$brosur_gambar','$type','$brosur_author')");
		return $hsl;
	}
	function update_brosur($brosur_id,$brosur_gambar,$type,$brosur_author){
		$hsl=$this->db->query("update tbl_brosur set brosur_gambar='$brosur_gambar',type='$type',brosur_author='$brosur_author' where brosur_id='$brosur_id'");
		return $hsl;
	}
}