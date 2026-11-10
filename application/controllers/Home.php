<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_galeri');
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->load->model('m_agenda');
		$this->load->model('m_faq');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['slider']=$this->_slider();
		$x['berita']=$this->m_tulisan->get_berita_home();
		$x['galeri']=$this->db->query("SELECT * FROM tbl_galeri ORDER BY galeri_id DESC LIMIT 6");
		$x['agenda']=$this->_agenda();
		$x['faq']=$this->_faq();
		$x['youtube']=$this->db->order_by('youtube_id', 'ASC')->get('tbl_youtube')->result();
		$x['title']=$x['setup']->judul_website;
		$x['beranda']=TRUE;
		$x['halaman']='beranda';
		$this->template->load('template_depan', 'depan/v_home', $x);
	}

	// 3 agenda terbaru. Kalau tabel agenda masih kosong, pakai event contoh dari config/tampilan.php (untuk testing).
	private function _agenda(){
		$agenda = $this->m_agenda->get_agenda_home()->result();
		foreach ($agenda as $a) {
			$a->link = base_url('agenda/'.$a->agenda_id);
		}
		if ($agenda) {
			return $agenda;
		}
		$this->config->load('tampilan', TRUE);
		foreach ((array) $this->config->item('tampilan_event_cadangan', 'tampilan') as $c) {
			$agenda[] = (object) array(
				'link' => base_url('agenda'),
				'agenda_nama' => $c['nama'],
				'agenda_deskripsi' => $c['deskripsi'],
				'agenda_gambar' => $c['gambar'],
				'agenda_mulai' => $c['mulai'],
				'agenda_selesai' => '',
				'agenda_tempat' => '',
				'agenda_kategori' => '',
			);
		}
		return $agenda;
	}

	// 3 FAQ aktif terbaru, beserta daftar pertanyaannya (untuk ringkasan di kartu).
	private function _faq(){
		$faq = $this->m_faq->get_faq_home()->result();
		foreach ($faq as $f) {
			$f->items = $this->m_faq->get_items($f->faq_id);
		}
		return $faq;
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
