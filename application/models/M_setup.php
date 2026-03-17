<?php
class M_setup extends CI_Model{
	function get_setup(){
		$hsl=$this->db->query("SELECT * FROM tbl_setup WHERE id=1");
		return $hsl;
	}
	function update_setup($id,$logo,$nama_sekolah,$kecamatan,$kota,$alamat,$telepon,$email,$facebook,$gmaps,$whatsapp,$instagram,$judul_website){
		$hsl=$this->db->query("update tbl_setup set logo='$logo',nama_sekolah='$nama_sekolah',kecamatan='$kecamatan',kota='$kota',alamat='$alamat',telepon='$telepon',email='$email',facebook='$facebook',gmaps='$gmaps',whatsapp='$whatsapp',instagram='$instagram',judul_website='$judul_website' where id=$id");
		return $hsl;
	}
	function update_setup_tanpa_img($id,$nama_sekolah,$kecamatan,$kota,$alamat,$telepon,$email,$facebook,$gmaps,$whatsapp,$instagram,$judul_website){
		$hsl=$this->db->query("update tbl_setup set nama_sekolah='$nama_sekolah',kecamatan='$kecamatan',kota='$kota',alamat='$alamat',telepon='$telepon',email='$email',facebook='$facebook',gmaps='$gmaps',whatsapp='$whatsapp',instagram='$instagram',judul_website='$judul_website' where id=$id");
		return $hsl;
	}
	function update_visimisi($id,$gambar,$visi,$misi){
		$hsl=$this->db->query("update tbl_setup set gambarvisimisi='$gambar',visi='$visi',misi='$misi' where id=$id");
		return $hsl;
	}
	function update_visimisi_tanpa_img($id,$visi,$misi){
		$hsl=$this->db->query("update tbl_setup set visi='$visi',misi='$misi' where id=$id");
		return $hsl;
	}
	function update_about($id,$gambar,$about){
		$hsl=$this->db->query("update tbl_setup set gambarabout='$gambar',about='$about' where id=$id");
		return $hsl;
	}
	function update_about_tanpa_img($id,$about){
		$hsl=$this->db->query("update tbl_setup set about='$about' where id=$id");
		return $hsl;
	}
	function update_pendaftaran($id,$gambar,$formpendaftaran){
		$hsl=$this->db->query("update tbl_setup set alurpendaftaran='$gambar',formpendaftaran='$formpendaftaran' where id=$id");
		return $hsl;
	}
	function update_pendaftaran_tanpa_img($id,$formpendaftaran){
		$hsl=$this->db->query("update tbl_setup set formpendaftaran='$formpendaftaran' where id=$id");
		return $hsl;
	}
}