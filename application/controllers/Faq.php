<?php
class Faq extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_faq');
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
        $config['base_url'] = base_url() . 'faq/index/';
			$x['menufaq']=$this->m_faq->get_all_faq();
			$data=$this->db->query("select * from tbl_faq ORDER BY faq_id");
			$row=$data->row_array();
			$x['id']=$row['faq_id'];
			$x['idfaqurl']=$row['faq_id'];
			$x['faq_gambar']=$row['faq_gambar'];
			$x['title_faq']=$row['faq_judul'];
			$x['content_faq']=$row['faq_isi'];
			$x['setup']=$this->m_setup->get_setup()->row();
			$judul_website=$x['setup']->judul_website;
			$x['title']="$judul_website | FAQ";
			$this->template->load('template_depan', 'depan/v_faq', $x);
	}
	function detail($idfaq){
			$x['menufaq']=$this->m_faq->get_all_faq();
			$data=$this->m_faq->get_faq_byid($idfaq);
			$row=$data->row_array();
			$x['id']=$row['faq_id'];
			$x['idfaqurl']=$idfaq;
			$x['faq_gambar']=$row['faq_gambar'];
			$x['title_faq']=$row['faq_judul'];
			$x['content_faq']=$row['faq_isi'];
			$x['setup']=$this->m_setup->get_setup()->row();
			$judul_website=$x['setup']->judul_website;
			$x['title']="$judul_website | FAQ";
			$this->template->load('template_depan', 'depan/v_faq', $x);
	}
}
