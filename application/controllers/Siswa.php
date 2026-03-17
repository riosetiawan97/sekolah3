<?php
class Siswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_siswa');
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->m_pengunjung->count_visitor();
	}

	function index(){
		$x['setup']=$this->m_setup->get_setup()->row();
		$judul_website=$x['setup']->judul_website;
			  //$this->load->view('depan/v_contact');      
		  $x['title']="$judul_website | Absen Siswa";
		  $this->template->load('template_depan', 'depan/v_absen_siswa', $x);
		}
	
	  function simpan_absen_siswa(){
		$tipe='siswa';
		$nama=$this->input->post('nama',TRUE);
		$kelas=$this->input->post('kelas',TRUE);
		$jurusan=$this->input->post('jurusan',TRUE);
		$this->m_siswa->simpan_absen_siswa($tipe,$nama,$kelas,$jurusan,date('Ymd'),date('His'));
		echo $this->session->set_flashdata('msg','<br><p><strong> NB: </strong> Thank You for Your Attendance.</p>');
		redirect('siswa');
	  }

	/* function index(){
		$jum=$this->m_siswa->siswa();
        $page=$this->uri->segment(3);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=8;
        $config['base_url'] = base_url() . 'siswa/index/';
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
			$x['data']=$this->m_siswa->siswa_perpage($offset,$limit);
			$x['setup']=$this->m_setup->get_setup()->row();
			$judul_website=$x['setup']->judul_website;
			//$this->load->view('depan/v_siswa',$x);
			$x['title']="$judul_website | Siswa";
			$this->template->load('template_depan', 'depan/v_siswa', $x);
	} */



}
