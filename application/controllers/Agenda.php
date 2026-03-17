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
		$jum=$this->m_agenda->agenda();
        $page=$this->uri->segment(3);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=7;
        $config['base_url'] = base_url() . 'agenda/index/';
		$config['total_rows'] = $jum->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
				//Tambahan untuk styling
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Next >>';
		$config['prev_link'] = '<< Prev';
		$this->pagination->initialize($config);
		$x['page'] =$this->pagination->create_links();
		$x['data']=$this->m_agenda->agenda_perpage($offset,$limit);		
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['latest']=$this->db->query("SELECT * FROM tbl_agenda ORDER BY agenda_id DESC LIMIT 5");
		$judul_website=$x['setup']->judul_website;
		//$this->load->view('depan/v_agenda',$x);
		$x['title']="$judul_website | Event";
		$this->template->load('template_depan', 'depan/v_agenda', $x);
	}

	function detail($idagenda){
		$query = $this->db->get_where('tbl_agenda', array('agenda_id' => $idagenda));
		if($query->num_rows() > 0){
			$b=$query->row_array();
			$kode=$b['agenda_id'];
			$data=$this->m_agenda->get_agenda_byid($kode);
			$row=$data->row_array();
			$x['agenda_id']=$row['agenda_id'];
			$x['agenda_nama']=$row['agenda_nama'];
			$x['agenda_gambar']=$row['agenda_gambar'];
			$x['agenda_deskripsi'] =$row['agenda_deskripsi'];
			$x['agenda_tanggal']=$row['tanggal'];
			$x['agenda_author']=$row['agenda_author'];
			$x['setup']=$this->m_setup->get_setup()->row();
			$x['latest']=$this->db->query("SELECT * FROM tbl_agenda ORDER BY agenda_id DESC LIMIT 5");
			$judul_website=$x['setup']->judul_website;
			//$this->load->view('depan/v_blog_detail',$x);
			$x['title']="$judul_website | Detail Event";
			//$x['title']=$row['tulisan_judul'];
			$this->template->load('template_depan', 'depan/v_agenda_detail', $x);
		}else{
			redirect('agenda');
		}
	}

}
