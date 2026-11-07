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
		$x['album']=$this->db->query("SELECT a.*, COUNT(g.galeri_id) AS jumlah, MAX(g.galeri_gambar) AS foto_lain FROM tbl_album a LEFT JOIN tbl_galeri g ON g.galeri_album_id = a.album_id GROUP BY a.album_id ORDER BY a.album_id DESC");
		$x['title']=t('hal_galeri_judul').' | '.$x['setup']->judul_website;
		$x['halaman']='galeri';
		$this->template->load('template_depan', 'depan/v_galeri', $x);
	}
	function album($idalbum = NULL){
		$album = $this->db->get_where('tbl_album', array('album_id' => (int) $idalbum))->row();
		if ( ! $album) redirect('galeri');
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['album']=$album;
		$x['data']=$this->m_galeri->get_galeri_by_album_id((int) $idalbum);
		$x['title']=$album->album_nama.' | '.$x['setup']->judul_website;
		$x['gambar']=$album->album_cover;
		$x['halaman']='galeri';
		$this->template->load('template_depan', 'depan/v_galeri_per_album', $x);
	}
}
