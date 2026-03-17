<?php
class Alur_Pendaftaran extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_alur_pendaftaran');
		$this->load->model('m_setup');
		$this->load->library('upload');
	}


	function index(){
		$x['setup']=$this->m_setup->get_setup()->row();
		$judul_website=$x['setup']->judul_website;
		$x['data']=$this->m_alur_pendaftaran->get_all_alur_pendaftaran();
		$x['title']="Admin $judul_website | Alur Pendaftaran";
		$this->template->load('template_admin', 'admin/v_alur_pendaftaran', $x);
	}

	function simpan_alur_pendaftaran(){
		$langkah=strip_tags($this->input->post('langkah'));
		$judul=$this->input->post('judul');
		$deskripsi=$this->input->post('deskripsi');
		$this->m_alur_pendaftaran->simpan_alur_pendaftaran($langkah,$judul,$deskripsi);
		echo $this->session->set_flashdata('msg','success');
		redirect('admin/alur_pendaftaran');
	}

	function update_alur_pendaftaran(){
		$id=strip_tags($this->input->post('id'));
		$langkah=strip_tags($this->input->post('langkah'));
		$judul=$this->input->post('judul');
		$deskripsi=$this->input->post('deskripsi');
		$this->m_alur_pendaftaran->update_alur_pendaftaran($id,$langkah,$judul,$deskripsi);
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/alur_pendaftaran');
	}
	function hapus_alur_pendaftaran(){
		$id=strip_tags($this->input->post('id'));
		$this->m_alur_pendaftaran->hapus_alur_pendaftaran($id);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/alur_pendaftaran');
	}

}