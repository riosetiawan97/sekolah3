<?php 
class M_guru extends CI_Model{

	function get_all_guru(){
		$hsl=$this->db->query("SELECT * FROM tbl_guru");
		return $hsl;
	}

	function simpan_guru($nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$mapel,$photo){
		$hsl=$this->db->query("INSERT INTO tbl_guru (guru_nip,guru_nama,guru_jenkel,guru_tmp_lahir,guru_tgl_lahir,guru_mapel,guru_photo) VALUES (?,?,?,?,?,?,?)", array($nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel, $photo));
		return $hsl;
	}
	function simpan_guru_tanpa_img($nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$mapel){
		$hsl=$this->db->query("INSERT INTO tbl_guru (guru_nip,guru_nama,guru_jenkel,guru_tmp_lahir,guru_tgl_lahir,guru_mapel) VALUES (?,?,?,?,?,?)", array($nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel));
		return $hsl;
	}

	function update_guru($kode,$nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$mapel,$photo){
		$hsl=$this->db->query("UPDATE tbl_guru SET guru_nip=?,guru_nama=?,guru_jenkel=?,guru_tmp_lahir=?,guru_tgl_lahir=?,guru_mapel=?,guru_photo=? WHERE guru_id=?", array($nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel, $photo, $kode));
		return $hsl;
	}
	function update_guru_tanpa_img($kode,$nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$mapel){
		$hsl=$this->db->query("UPDATE tbl_guru SET guru_nip=?,guru_nama=?,guru_jenkel=?,guru_tmp_lahir=?,guru_tgl_lahir=?,guru_mapel=? WHERE guru_id=?", array($nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel, $kode));
		return $hsl;
	}
	function hapus_guru($kode){
		$hsl=$this->db->query("DELETE FROM tbl_guru WHERE guru_id=?", array($kode));
		return $hsl;
	}

	function get_absen_guru(){
		$hsl=$this->db->query("SELECT * FROM tbl_absen WHERE tipe='guru'");
		return $hsl;
	}
	function hapus_absen_guru($id){
		$hsl=$this->db->query("DELETE FROM tbl_absen WHERE tipe='guru' AND id=?", array($id));
		return $hsl;
	}
	function simpan_absen_guru($tipe,$nama,$tanggal,$waktu){
		$hsl=$this->db->query("INSERT INTO tbl_absen (tipe,nama,tanggal,waktu) VALUES (?,?,?,?)", array($tipe, $nama, $tanggal, $waktu));
		return $hsl;
	}

	//front-end
	function guru(){
		$hsl=$this->db->query("SELECT * FROM tbl_guru");
		return $hsl;
	}
	function guru_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT * FROM tbl_guru limit ?,?", array((int) $offset, (int) $limit));
		return $hsl;
	}

}