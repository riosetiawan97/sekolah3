<?php
class Alur_pendaftaran extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
			redirect(base_url('administrator'));
		}
		$this->load->model('m_alur_pendaftaran');
		$this->load->model('m_setup');
	}

	function index(){
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['data']=$this->m_alur_pendaftaran->get_alur_tampil();
		$x['title']='Admin '.$x['setup']->judul_website.' | Alur Pendaftaran';
		$this->template->load('template_admin', 'admin/v_alur_pendaftaran', $x);
	}

	private function input(){
		$warna = (string) $this->input->post('warna');
		return array(
			(int) $this->input->post('langkah'),
			trim((string) $this->input->post('judul')),
			trim((string) $this->input->post('deskripsi')),
			mb_substr(trim((string) $this->input->post('ikon')), 0, 20),
			preg_match('/^#[0-9a-fA-F]{6}$/', $warna) && ! $this->input->post('warna_otomatis') ? $warna : '',
		);
	}

	function simpan_alur_pendaftaran(){
		list($langkah, $judul, $deskripsi, $ikon, $warna) = $this->input();
		$this->m_alur_pendaftaran->simpan_alur_pendaftaran($langkah, $judul, $deskripsi, $ikon, $warna);
		$this->session->set_flashdata('pesan', array('ok', 'Langkah berhasil ditambahkan.'));
		redirect('admin/alur_pendaftaran');
	}

	function update_alur_pendaftaran(){
		list($langkah, $judul, $deskripsi, $ikon, $warna) = $this->input();
		$this->m_alur_pendaftaran->update_alur_pendaftaran($this->input->post('id'), $langkah, $judul, $deskripsi, $ikon, $warna);
		$this->session->set_flashdata('pesan', array('ok', 'Langkah berhasil diubah.'));
		redirect('admin/alur_pendaftaran');
	}

	function hapus_alur_pendaftaran(){
		$this->m_alur_pendaftaran->hapus_alur_pendaftaran($this->input->post('id'));
		$this->session->set_flashdata('pesan', array('ok', 'Langkah berhasil dihapus.'));
		redirect('admin/alur_pendaftaran');
	}
}
