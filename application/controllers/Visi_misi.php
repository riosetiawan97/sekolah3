<?php
class Visi_misi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['title']=t('hal_visimisi_judul').' | '.$x['setup']->judul_website;
		$x['halaman']='visimisi';
		$this->template->load('template_depan', 'depan/v_visimisi', $x);
	}
}
