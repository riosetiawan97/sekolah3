<?php
class Download extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_files');
		$this->load->helper('download');
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['data']=$this->m_files->get_all_files();
		$x['title']='Download | '.$x['setup']->judul_website;
		$x['halaman']='download';
		$this->template->load('template_depan', 'depan/v_download', $x);
	}

	function get_file(){
		$id=$this->uri->segment(3);
		$get_db=$this->m_files->get_file_byid($id);
		$q=$get_db->row_array();
		$file=$q['file_data'];
		$data = upload_read('files', $file);
		$name = $file;
		force_download($name, $data);
	}

}
