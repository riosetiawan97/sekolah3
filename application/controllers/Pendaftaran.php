<?php
class Pendaftaran extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->load->model('m_pendaftar');
	}
	function index(){
		$this->m_pengunjung->count_visitor();
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['title']=t('hal_daftar_judul').' | '.$x['setup']->judul_website;
		$x['halaman']='daftar';
		$this->template->load('template_depan', 'depan/v_pendaftaran', $x);
	}

	// Simpan formulir PPDB (dari beranda atau halaman Admission).
	function simpan(){
		$kembali = $this->input->post('kembali') === 'beranda' ? base_url('#formulir') : base_url('pendaftaran');
		if ($this->input->method() !== 'post' || ! t_on('ppdb_form_aktif')) redirect($kembali);
		if ($this->input->post('website') != '') redirect($kembali); // bot

		$data = array(
			'nama' => trim((string) $this->input->post('nama', TRUE)),
			'asal_sekolah' => trim((string) $this->input->post('asal_sekolah', TRUE)),
			'nama_ortu' => trim((string) $this->input->post('nama_ortu', TRUE)),
			'no_hp' => trim((string) $this->input->post('no_hp', TRUE)),
			'email' => trim((string) $this->input->post('email', TRUE)),
		);
		$error = '';
		if ($data['nama'] === '' || $data['asal_sekolah'] === '' || $data['no_hp'] === '') {
			$error = 'Nama, asal sekolah, dan nomor HP wajib diisi.';
		} elseif ( ! preg_match('/^[0-9+\-\s()]{8,30}$/', $data['no_hp'])) {
			$error = 'Nomor HP tidak valid.';
		} elseif ($data['email'] !== '' && ! filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$error = 'Alamat email tidak valid.';
		}
		if ($error) {
			$this->session->set_flashdata('daftar_error', $error);
			$this->session->set_flashdata('daftar_lama', $data);
			redirect($kembali);
		}
		$data['nama'] = mb_substr($data['nama'], 0, 100);
		$data['asal_sekolah'] = mb_substr($data['asal_sekolah'], 0, 150);
		$data['nama_ortu'] = mb_substr($data['nama_ortu'], 0, 100);
		$data['email'] = mb_substr($data['email'], 0, 100);
		$this->m_pendaftar->simpan($data);
		$this->session->set_flashdata('daftar_sukses', $data['nama']);
		redirect($kembali);
	}
}
