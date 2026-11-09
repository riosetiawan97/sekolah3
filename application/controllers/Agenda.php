<?php
class Agenda extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_agenda');
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['setup']=$this->m_setup->get_setup()->row();
		$total=$this->db->count_all('tbl_agenda');
		$limit=8;
		$offset=max(0, (int) $this->uri->segment(3));
		$this->load->library('pagination');
		$this->pagination->initialize(array(
			'base_url' => base_url('agenda/index'), 'total_rows' => $total, 'per_page' => $limit, 'uri_segment' => 3,
			'full_tag_open' => '<nav class="paginasi" aria-label="Halaman"><ul>', 'full_tag_close' => '</ul></nav>',
			'num_tag_open' => '<li>', 'num_tag_close' => '</li>',
			'cur_tag_open' => '<li><span class="kini" aria-current="page">', 'cur_tag_close' => '</span></li>',
			'next_tag_open' => '<li>', 'next_tag_close' => '</li>', 'prev_tag_open' => '<li>', 'prev_tag_close' => '</li>',
			'first_tag_open' => '<li>', 'first_tag_close' => '</li>', 'last_tag_open' => '<li>', 'last_tag_close' => '</li>',
			'first_link' => '«', 'last_link' => '»', 'next_link' => '›', 'prev_link' => '‹',
		));
		$x['page']=$this->pagination->create_links();
		$x['data']=$this->db->order_by('agenda_mulai', 'DESC')->order_by('agenda_id', 'DESC')->limit($limit, $offset)->get('tbl_agenda');
		$x['title']=t('hal_agenda_judul').' | '.$x['setup']->judul_website;
		$x['halaman']='agenda';
		$this->template->load('template_depan', 'depan/v_agenda', $x);
	}

	function detail($idagenda){
		if ($idagenda === 'index') { $this->index(); return; }
		$row = $this->db->get_where('tbl_agenda', array('agenda_id' => (int) $idagenda))->row();
		if ( ! $row) redirect('agenda');
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['agenda']=$row;
		$x['lainnya']=$this->db->where('agenda_id !=', $row->agenda_id)->order_by('agenda_id', 'DESC')->limit(5)->get('tbl_agenda');
		$x['title']=$row->agenda_nama.' | '.$x['setup']->judul_website;
		$x['gambar']=$row->agenda_gambar;
		$x['halaman']='agenda';
		$this->template->load('template_depan', 'depan/v_agenda_detail', $x);
	}
}
