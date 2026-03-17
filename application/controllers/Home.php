<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_galeri');
		$this->load->model('m_pengumuman');
		$this->load->model('m_agenda');
		$this->load->model('m_files');
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->load->model('m_brosur');
		$this->load->model('m_youtube');
		$this->load->model('m_faq');
		$this->load->model('m_album');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['berita']=$this->m_tulisan->get_berita_home();
		$x['galeri_slider']=$this->m_galeri->get_galeri_slider();
		$x['pengumuman']=$this->m_pengumuman->get_pengumuman_home();
		$x['agenda']=$this->m_agenda->get_agenda_home();
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['tot_guru']=$this->db->get('tbl_guru')->num_rows();
		$x['tot_siswa']=$this->db->get('tbl_siswa')->num_rows();
		$x['tot_files']=$this->db->get('tbl_files')->num_rows();
		$x['tot_agenda']=$this->db->get('tbl_agenda')->num_rows();
		$x['brosur']=$this->m_brosur->get_brosur();
		$x['pamflet']=$this->m_brosur->get_pamflet();
		$x['youtube1']=$this->m_youtube->get_youtube1()->row();
		$x['youtube2']=$this->m_youtube->get_youtube2();
		$x['faq']=$this->m_faq->get_faq_home();
		$x['album']=$this->m_album->get_album_home();
		$x['album2']=$this->m_album->get_galeri_show_home();
		$i=1; 
		foreach ($this->m_album->get_galeri_show_home()->result() as $row) :
			$x["galeri$i"]=$this->m_galeri->get_galeri_by_album_id($row->album_id);
		$i++; 
		endforeach;
		$judul_website=$x['setup']->judul_website;
		//$this->load->view('depan/v_home',$x);
		$x['title']="$judul_website | Home";
		$this->template->load('template_depan', 'depan/v_home', $x);
	}

}
