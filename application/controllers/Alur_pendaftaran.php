<?php
class Alur_Pendaftaran extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_alur_pendaftaran');
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->load->model('m_brosur');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['data']=$this->m_alur_pendaftaran->get_all_alur_pendaftaran();
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['brosur']=$this->m_brosur->get_brosur()->row();
		$judul_website=$x['setup']->judul_website;
		$x['title']="$judul_website | How To Apply";
		$this->template->load('template_depan', 'depan/v_alur_pendaftaran', $x);
	}
}
