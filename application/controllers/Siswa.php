<?php
class Siswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_siswa');
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->m_pengunjung->count_visitor();
	}

	function index(){
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['kelas']=$this->db->order_by('kelas_nama', 'ASC')->get('tbl_kelas');
		$x['title']=t('hal_absen_judul').' | '.$x['setup']->judul_website;
		$x['halaman']='absen';
		$this->template->load('template_depan', 'depan/v_absen_siswa', $x);
	}

	function simpan_absen_siswa(){
		$nama=trim((string) $this->input->post('nama',TRUE));
		$kelas=trim((string) $this->input->post('kelas',TRUE));
		if ($nama === '' || $kelas === '') {
			$this->session->set_flashdata('absen', array('error' => TRUE));
			redirect('siswa');
		}
		$this->db->insert('tbl_absen', array(
			'tipe' => 'siswa', 'nama' => mb_substr($nama, 0, 100), 'kelas' => mb_substr($kelas, 0, 10),
			'jurusan' => mb_substr((string) $this->input->post('jurusan',TRUE), 0, 15), 'tanggal' => date('Ymd'), 'waktu' => date('His'),
		));
		$this->session->set_flashdata('absen', array('nama' => $nama, 'kelas' => $kelas));
		redirect('siswa');
	}
}
