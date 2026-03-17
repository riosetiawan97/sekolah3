<?php
class Pendaftaran extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['setup']=$this->m_setup->get_setup()->row();
		$judul_website=$x['setup']->judul_website;
		$x['title']="$judul_website | Pendaftaran";
		$this->template->load('template_depan', 'depan/v_pendaftaran', $x);
	}
}
