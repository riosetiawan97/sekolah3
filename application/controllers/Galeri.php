<?php
class Galeri extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_galeri');
		$this->load->model('m_album');
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['setup']=$this->m_setup->get_setup()->row();
		$judul_website=$x['setup']->judul_website;
		$x['alb']=$this->m_album->get_all_album();
		$x['all_galeri']=$this->m_galeri->get_all_galeri();
		//$this->load->view('depan/v_galeri',$x);
		$x['title']="$judul_website | Gallery";
		$this->template->load('template_depan', 'depan/v_galeri', $x);
	}
	function album(){
		$x['setup']=$this->m_setup->get_setup()->row();
		$judul_website=$x['setup']->judul_website;
		$idalbum=$this->uri->segment(3);
		$x['data']=$this->m_galeri->get_galeri_by_album_id($idalbum);
		$dataalbum=$this->m_album->get_album_by_kode($idalbum);
		$rowalbum=$dataalbum->row_array();
		$x['album_id']=$rowalbum['album_id'];
		$x['album_nama']=$rowalbum['album_nama'];
		$x['tanggal']=$rowalbum['tanggal'];
		$x['album_author']=$rowalbum['album_author'];
		$x['album_cover']=$rowalbum['album_cover'];
		$x['album_deskripsi']=$rowalbum['album_deskripsi'];
		//$this->load->view('depan/v_galeri_per_album',$x);
		//$x['title']="$judul_website | Album";
		$x['title']=$rowalbum['album_nama'].' | '.$judul_website;
		$x['gambar']=$rowalbum['album_cover'];
		$x['blog']=$rowalbum['album_nama'];
		$this->template->load('template_depan', 'depan/v_galeri_per_album', $x);
	}
}