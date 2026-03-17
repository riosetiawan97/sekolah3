<?php
class M_kelas extends CI_Model{

	function get_all_kelas(){
		$this->db->select('a.*, b.guru_nama');
		$this->db->from('tbl_kelas a');
		$this->db->join('tbl_guru b', 'a.id_guru = b.guru_id');
		$hsl = $this->db->get();
		return $hsl;
	}

	function simpan_kelas($kelas, $guru){
		$data = array(
			'kelas_nama' => $kelas,
			'id_guru' => $guru,
		);
		$hsl = $this->db->insert('tbl_kelas', $data);
		return $hsl;
	}

	function update_kelas($kode,$kelas,$guru){
		$data = array(
			'kelas_nama' => $kelas,
			'id_guru' => $guru,
		);
		$this->db->where('kelas_id', $kode);
		$hsl = $this->db->update('tbl_kelas', $data);
		return $hsl;
	}

	function hapus_kelas($kode){
		$this->db->where('kelas_id', $kode);
		$hsl = $this->db->delete('tbl_kelas');
		return $hsl;
	}
}