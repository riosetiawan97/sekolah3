<?php
class Youtube extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_youtube');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
		$this->load->model('m_setup');
	}
	function index(){
		$x['data']=$this->m_youtube->get_all_youtube();
		$x['setup']=$this->m_setup->get_setup()->row();
		$judul_website=$x['setup']->judul_website;
		//$this->load->view('admin/v_youtube',$x);
		$x['title']="Admin $judul_website | Youtube";
		$this->template->load('template_admin', 'admin/v_youtube', $x);
	}
	function simpan_youtube(){
		$youtube_link=$this->input->post('youtube_link');
		$youtube_description=$this->input->post('youtube_description');
		$kode=$this->session->userdata('idadmin');
		$user=$this->m_pengguna->get_pengguna_login($kode);
		$p=$user->row_array();
		$user_nama=$p['pengguna_nama'];
		$this->m_youtube->simpan_youtube($youtube_link,$youtube_description,$user_nama);
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/youtube');
	}
	function update_youtube(){
		$youtube_id=$this->input->post('kode');
		$youtube_link=$this->input->post('youtube_link');
		$youtube_description=$this->input->post('youtube_description');
		$kode=$this->session->userdata('idadmin');
		$user=$this->m_pengguna->get_pengguna_login($kode);
		$p=$user->row_array();
		$user_nama=$p['pengguna_nama'];
		$this->m_youtube->update_youtube($youtube_id,$youtube_link,$youtube_description,$user_nama);
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/youtube');
	}

	function hapus_youtube(){
		$youtube_id=$this->input->post('kode');
		$this->m_youtube->hapus_youtube($youtube_id);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/youtube');
	}
}