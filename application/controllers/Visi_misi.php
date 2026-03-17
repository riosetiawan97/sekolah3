<?php
class visi_misi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_setup');

	}
	function index(){
		$x['setup']=$this->m_setup->get_setup()->row();
		$judul_website=$x['setup']->judul_website;
		//$this->load->view('depan/v_visi_misi');
		$x['title']="$judul_website | Vision & Mision";
		$this->template->load('template_depan', 'depan/v_visimisi', $x);
	}
}