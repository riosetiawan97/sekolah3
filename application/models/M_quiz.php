<?php
class M_quiz extends CI_Model{

	function get_all_quiz(){
		$this->db->select('a.*, b.kelas_nama');
		$this->db->from('tbl_quiz a');
		$this->db->join('tbl_kelas b', 'a.id_kelas = b.kelas_id');
		$hsl = $this->db->get();
		return $hsl;
	}

	function get_quiz_by_id($id){
		$hsl=$this->db->get_where('tbl_quiz', array('id' => $id));
		return $hsl->row_array();
	}

	function get_soal_by_quiz($id_quiz){
		$this->db->where('id_quiz', $id_quiz);
		$soal = $this->db->get('tbl_soal')->result_array();
		foreach($soal as $key=>$value){
			if($value['tipe_soal'] == 'pilihan_ganda'){
				$jawaban = $this->db->get_where('tbl_jawaban', array('id_soal' => $value['id']))->result_array();
				$soal[$key]['jawaban'] = $jawaban;
			}
		}
		return $soal;
	}

	function simpan_quiz($judul, $deskripsi, $kelas, $waktu_mulai, $waktu_selesai, $waktu_pengerjaan){
		$data = array(
			'judul' => $judul,
			'deskripsi' => $deskripsi,
			'id_kelas' => $kelas,
			'waktu_mulai' => $waktu_mulai,
			'waktu_selesai' => $waktu_selesai,
			'waktu_pengerjaan' => $waktu_pengerjaan,
		);
		$this->db->insert('tbl_quiz', $data);
		return $this->db->insert_id();
	}

	function simpan_soal($id_quiz, $soal, $tipe_soal){
		$data = array(
			'id_quiz' => $id_quiz,
			'soal' => $soal,
			'tipe_soal' => $tipe_soal,
		);
		$this->db->insert('tbl_soal', $data);
		return $this->db->insert_id();
	}

	function simpan_jawaban($id_soal, $jawaban, $is_correct){
		$data = array(
			'id_soal' => $id_soal,
			'jawaban' => $jawaban,
			'is_correct' => $is_correct,
		);
		$hsl=$this->db->insert('tbl_jawaban', $data);
		return $hsl;
	}

	function update_quiz($id, $judul, $deskripsi, $kelas, $waktu_mulai, $waktu_selesai, $waktu_pengerjaan){
		$data = array(
			'judul' => $judul,
			'deskripsi' => $deskripsi,
			'id_kelas' => $kelas,
			'waktu_mulai' => $waktu_mulai,
			'waktu_selesai' => $waktu_selesai,
			'waktu_pengerjaan' => $waktu_pengerjaan,
		);
		$this->db->where('id', $id);
		$hsl=$this->db->update('tbl_quiz', $data);
		return $hsl;
	}

	function hapus_quiz($kode){
		$this->db->where('id', $kode);
		$hsl=$this->db->delete('tbl_quiz');
		return $hsl;
	}

	function hapus_soal_by_quiz($id_quiz){
		$this->db->where('id_quiz', $id_quiz);
		$hsl=$this->db->delete('tbl_soal');
		return $hsl;
	}

}