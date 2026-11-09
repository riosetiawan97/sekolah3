<?php
class Alur_pendaftaran extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_alur_pendaftaran');
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['alur']=$this->m_alur_pendaftaran->get_alur_tampil();
		$x['title']=t('hal_alur_judul').' | '.$x['setup']->judul_website;
		$x['halaman']='alur';
		$this->template->load('template_depan', 'depan/v_alur_pendaftaran', $x);
	}
}
