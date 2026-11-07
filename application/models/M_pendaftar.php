<?php
class M_pendaftar extends CI_Model{

	function semua($status = ''){
		if ($status !== '') $this->db->where('status', $status);
		return $this->db->order_by('id', 'DESC')->get('tbl_pendaftar');
	}
	function simpan(array $data){
		return $this->db->insert('tbl_pendaftar', $data);
	}
	function update($id, array $data){
		return $this->db->where('id', (int) $id)->update('tbl_pendaftar', $data);
	}
	function hapus($id){
		return $this->db->where('id', (int) $id)->delete('tbl_pendaftar');
	}
	function jumlah_baru(){
		return $this->db->where('status', 'Baru')->count_all_results('tbl_pendaftar');
	}
}
