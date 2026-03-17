<?php
class Quiz extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_quiz');
		$this->load->model('m_guru');
		$this->load->model('m_kelas');
		$this->load->library('upload');
	}

	function index(){
		$x['data']=$this->m_quiz->get_all_quiz();
		$this->load->view('admin/v_quiz',$x);
	}

	function add_quiz(){
		$x['guru'] = $this->m_guru->get_all_guru();
		$x['kelas'] = $this->m_kelas->get_all_kelas();
		$this->load->view('admin/v_add_quiz', $x);
	}

	function edit_quiz($id){
		$x['quiz'] = $this->m_quiz->get_quiz_by_id($id);
		$x['kelas'] = $this->m_kelas->get_all_kelas();
		$this->load->view('admin/v_edit_quiz', $x);
	}

	function get_soal(){
		$id_quiz=$this->input->get('id_quiz');
		$data=$this->m_quiz->get_soal_by_quiz($id_quiz);
		echo json_encode($data);
	}

	function simpan_quiz(){
		$judul=strip_tags($this->input->post('xjudul'));
		$deskripsi=$this->input->post('xdeskripsi');
		$kelas=$this->input->post('xkelas');
		$waktu_mulai=$this->input->post('xwaktu_mulai');
		$waktu_selesai=$this->input->post('xwaktu_selesai');
		$waktu_pengerjaan=$this->input->post('xwaktu_pengerjaan');

		$id_quiz = $this->m_quiz->simpan_quiz($judul, $deskripsi, $kelas, $waktu_mulai, $waktu_selesai, $waktu_pengerjaan);

		$soal = $this->input->post('xsoal');
		$tipe_soal = $this->input->post('xtipe_soal');
		$jawaban = $this->input->post('xjawaban');

		foreach($soal as $key=>$value){
			$id_soal = $this->m_quiz->simpan_soal($id_quiz, $soal[$key], $tipe_soal[$key]);

			if($tipe_soal[$key] == 'pilihan_ganda'){
				$pilihan_jawaban = $jawaban[$key];
				$is_correct = $this->input->post('xis_correct['.$key.']');

				foreach($pilihan_jawaban as $idx=>$pilihan){
					$this->m_quiz->simpan_jawaban($id_soal, $pilihan, $is_correct == $idx ? 1 : 0);
				}
			}
		}

		echo $this->session->set_flashdata('msg','success');
		redirect('admin/quiz');
	}

	function update_quiz(){
		$id_quiz=$this->input->post('kode');
		$judul=strip_tags($this->input->post('xjudul'));
		$deskripsi=$this->input->post('xdeskripsi');
		$kelas=$this->input->post('xkelas');
		$waktu_mulai=$this->input->post('xwaktu_mulai');
		$waktu_selesai=$this->input->post('xwaktu_selesai');
		$waktu_pengerjaan=$this->input->post('xwaktu_pengerjaan');

		$this->m_quiz->update_quiz($id_quiz, $judul, $deskripsi, $kelas, $waktu_mulai, $waktu_selesai, $waktu_pengerjaan);

		$this->m_quiz->hapus_soal_by_quiz($id_quiz);

		$soal = $this->input->post('xsoal');
		$tipe_soal = $this->input->post('xtipe_soal');
		$jawaban = $this->input->post('xjawaban');

		if(!empty($soal)){
			foreach($soal as $key=>$value){
				$id_soal = $this->m_quiz->simpan_soal($id_quiz, $soal[$key], $tipe_soal[$key]);

				if($tipe_soal[$key] == 'pilihan_ganda'){
					$pilihan_jawaban = $jawaban[$key];
					$is_correct = $this->input->post('xis_correct['.$key.']');

					foreach($pilihan_jawaban as $idx=>$pilihan){
						$this->m_quiz->simpan_jawaban($id_soal, $pilihan, $is_correct == $idx ? 1 : 0);
					}
				}
			}
		}


		echo $this->session->set_flashdata('msg','info');
		redirect('admin/quiz');
	}

	function hapus_quiz(){
		$kode=$this->input->post('kode');
		$this->m_quiz->hapus_quiz($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/quiz');
	}

}