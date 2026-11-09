<?php
class M_setup extends CI_Model{
	function get_setup(){
		$hsl=$this->db->query("SELECT * FROM tbl_setup WHERE id=1");
		return $hsl;
	}
	function update_setup($id,$logo,$nama_sekolah,$kecamatan,$kota,$alamat,$telepon,$email,$facebook,$gmaps,$whatsapp,$instagram,$judul_website){
		$hsl=$this->db->query("update tbl_setup set logo=?,nama_sekolah=?,kecamatan=?,kota=?,alamat=?,telepon=?,email=?,facebook=?,gmaps=?,whatsapp=?,instagram=?,judul_website=? where id=?", array($logo, $nama_sekolah, $kecamatan, $kota, $alamat, $telepon, $email, $facebook, $gmaps, $whatsapp, $instagram, $judul_website, (int) $id));
		return $hsl;
	}
	function update_setup_tanpa_img($id,$nama_sekolah,$kecamatan,$kota,$alamat,$telepon,$email,$facebook,$gmaps,$whatsapp,$instagram,$judul_website){
		$hsl=$this->db->query("update tbl_setup set nama_sekolah=?,kecamatan=?,kota=?,alamat=?,telepon=?,email=?,facebook=?,gmaps=?,whatsapp=?,instagram=?,judul_website=? where id=?", array($nama_sekolah, $kecamatan, $kota, $alamat, $telepon, $email, $facebook, $gmaps, $whatsapp, $instagram, $judul_website, (int) $id));
		return $hsl;
	}
	function update_visimisi($id,$gambar,$visi,$misi){
		$hsl=$this->db->query("update tbl_setup set gambarvisimisi=?,visi=?,misi=? where id=?", array($gambar, $visi, $misi, (int) $id));
		return $hsl;
	}
	function update_visimisi_tanpa_img($id,$visi,$misi){
		$hsl=$this->db->query("update tbl_setup set visi=?,misi=? where id=?", array($visi, $misi, (int) $id));
		return $hsl;
	}
	function update_about($id,$gambar,$about){
		$hsl=$this->db->query("update tbl_setup set gambarabout=?,about=? where id=?", array($gambar, $about, (int) $id));
		return $hsl;
	}
	function update_about_tanpa_img($id,$about){
		$hsl=$this->db->query("update tbl_setup set about=? where id=?", array($about, (int) $id));
		return $hsl;
	}
	function update_pendaftaran($id,$gambar,$formpendaftaran){
		$hsl=$this->db->query("update tbl_setup set alurpendaftaran=?,formpendaftaran=? where id=?", array($gambar, $formpendaftaran, (int) $id));
		return $hsl;
	}
	function update_pendaftaran_tanpa_img($id,$formpendaftaran){
		$hsl=$this->db->query("update tbl_setup set formpendaftaran=? where id=?", array($formpendaftaran, (int) $id));
		return $hsl;
	}
}