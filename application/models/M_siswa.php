<?php 
class M_siswa extends CI_Model{

	function get_all_siswa(){
		$hsl=$this->db->query("SELECT tbl_siswa.*,kelas_nama FROM tbl_siswa JOIN tbl_kelas ON siswa_kelas_id=kelas_id");
		return $hsl;
	}

	function simpan_siswa($nis,$nama,$jenkel,$kelas,$photo){
		$hsl=$this->db->query("INSERT INTO tbl_siswa (siswa_nis,siswa_nama,siswa_jenkel,siswa_kelas_id,siswa_photo) VALUES ('$nis','$nama','$jenkel','$kelas','$photo')");
		return $hsl;
	}
	function simpan_siswa_tanpa_img($nis,$nama,$jenkel,$kelas){
		$hsl=$this->db->query("INSERT INTO tbl_siswa (siswa_nis,siswa_nama,siswa_jenkel,siswa_kelas_id) VALUES ('$nis','$nama','$jenkel','$kelas')");
		return $hsl;
	}

	function update_siswa($kode,$nis,$nama,$jenkel,$kelas,$photo){
		$hsl=$this->db->query("UPDATE tbl_siswa SET siswa_nis='$nis',siswa_nama='$nama',siswa_jenkel='$jenkel',siswa_kelas_id='$kelas',siswa_photo='$photo' WHERE siswa_id='$kode'");
		return $hsl;
	}
	function update_siswa_tanpa_img($kode,$nis,$nama,$jenkel,$kelas){
		$hsl=$this->db->query("UPDATE tbl_siswa SET siswa_nis='$nis',siswa_nama='$nama',siswa_jenkel='$jenkel',siswa_kelas_id='$kelas' WHERE siswa_id='$kode'");
		return $hsl;
	}
	function hapus_siswa($kode){
		$hsl=$this->db->query("DELETE FROM tbl_siswa WHERE siswa_id='$kode'");
		return $hsl;
	}

	function get_absen_siswa(){
		$hsl=$this->db->query("SELECT * FROM tbl_absen WHERE tipe='siswa'");
		return $hsl;
	}
	function hapus_absen_siswa($id){
		$hsl=$this->db->query("DELETE FROM tbl_absen WHERE tipe='siswa' AND id='$id'");
		return $hsl;
	}
	function simpan_absen_siswa($tipe,$nama,$kelas,$jurusan,$tanggal,$waktu){
		$hsl=$this->db->query("INSERT INTO tbl_absen (tipe,nama,kelas,jurusan,tanggal,waktu) VALUES ('$tipe','$nama','$kelas','$jurusan','$tanggal','$waktu')");
		return $hsl;
	}

	function absen_siswa_range($tanggal1,$tanggal2){
		$hsl=$this->db->query("SELECT * FROM `tbl_absen` WHERE tipe='siswa' AND tanggal BETWEEN '$tanggal1' AND '$tanggal2' ORDER BY tanggal");
		return $hsl;
	}
	
	function tanggal_awal_absen(){
		$hsl=$this->db->query("SELECT tanggal FROM `tbl_absen` ORDER BY `tbl_absen`.`tanggal` LIMIT 0, 1");
		return $hsl;
	}

	function siswa(){
		$hsl=$this->db->query("SELECT tbl_siswa.*,kelas_nama FROM tbl_siswa JOIN tbl_kelas ON siswa_kelas_id=kelas_id");
		return $hsl;
	}
	function siswa_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT tbl_siswa.*,kelas_nama FROM tbl_siswa JOIN tbl_kelas ON siswa_kelas_id=kelas_id limit $offset,$limit");
		return $hsl;
	}
}