<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_galeri');
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->load->model('m_alur_pendaftaran');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['slider']=$this->_slider();
		$x['berita']=$this->m_tulisan->get_berita_home();
		$x['galeri']=$this->db->query("SELECT * FROM tbl_galeri ORDER BY galeri_id DESC LIMIT 6");
		$x['alur']=$this->m_alur_pendaftaran->get_alur_tampil();
		$x['title']=$x['setup']->judul_website;
		$x['beranda']=TRUE;
		$x['halaman']='beranda';
		$this->template->load('template_depan', 'depan/v_home', $x);
	}

	// Foto slider beranda: foto Galeri yang dicentang "Slider".
	// Kalau kurang dari 2, ditambah gambar cadangan dari config/tampilan.php agar carousel tetap jalan.
	private function _slider(){
		$slider = $this->m_galeri->get_galeri_slider()->result();
		if (count($slider) >= 2) {
			return $slider;
		}
		$this->config->load('tampilan', TRUE);
		$cadangan = $this->config->item('tampilan_slider_cadangan', 'tampilan');
		$sudah = array();
		foreach ($slider as $s) {
			$sudah[$s->galeri_gambar] = TRUE;
		}
		foreach ((array) $cadangan as $c) {
			if (isset($sudah[$c['gambar']])) continue;
			$slider[] = (object) array('galeri_gambar' => $c['gambar'], 'galeri_judul' => $c['judul']);
		}
		return $slider;
	}
}
