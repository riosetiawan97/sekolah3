<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
	}
	function index(){
		if($this->session->userdata('akses')=='1'){
			$x['visitor'] = $this->m_pengunjung->visitor_this_year();
			$x['setup']=$this->m_setup->get_setup()->row();
			$judul_website=$x['setup']->judul_website;
			//$this->load->view('admin/v_dashboard',$x);
			$x['title']="Admin $judul_website | Dashboard";
			$x['pendaftar']=$this->db->order_by('id', 'DESC')->limit(5)->get('tbl_pendaftar')->result();
			$x['pendaftar_baru']=$this->db->where('status', 'Baru')->count_all_results('tbl_pendaftar');
			$x['pendaftar_total']=$this->db->count_all('tbl_pendaftar');
			$this->template->load('template_admin', 'admin/v_dashboard', $x);
		}else{
			redirect('administrator');
		}
	
	}
	
}