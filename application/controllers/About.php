<?php
class About extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['title']=t('hal_about_judul').' | '.$x['setup']->judul_website;
		$x['halaman']='about';
		$this->template->load('template_depan', 'depan/v_about', $x);
	}
}
