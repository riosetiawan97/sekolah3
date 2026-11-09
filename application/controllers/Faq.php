<?php
class Faq extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_faq');
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->m_pengunjung->count_visitor();
	}
	function index($idfaq = NULL){
		$x['setup']=$this->m_setup->get_setup()->row();
		$kategori = $this->db->order_by('faq_id')->get_where('tbl_faq', array('faq_aktif' => 1))->result();
		if ( ! $kategori) $kategori = $this->db->order_by('faq_id')->get('tbl_faq')->result();
		foreach ($kategori as $k) $k->items = $this->m_faq->get_items($k->faq_id);
		$x['kategori']=$kategori;
		$x['aktif']=$idfaq ? (int) $idfaq : ($kategori ? (int) $kategori[0]->faq_id : 0);
		$x['title']=t('hal_faq_judul').' | '.$x['setup']->judul_website;
		$x['halaman']='faq';
		$this->template->load('template_depan', 'depan/v_faq', $x);
	}
	function detail($idfaq){
		$this->index($idfaq);
	}
}
