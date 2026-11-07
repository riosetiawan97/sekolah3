<?php
class Pengumuman extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['data']=$this->db->order_by('pengumuman_id', 'DESC')->get('tbl_pengumuman');
		$x['title']='Pengumuman | '.$x['setup']->judul_website;
		$x['halaman']='pengumuman';
		$this->template->load('template_depan', 'depan/v_pengumuman', $x);
	}
}
