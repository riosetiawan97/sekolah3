<?php
class Contact extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_kontak');
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['title']=t('hal_kontak_judul').' | '.$x['setup']->judul_website;
		$x['halaman']='kontak';
		$this->template->load('template_depan', 'depan/v_contact', $x);
	}

	function kirim_pesan(){
		$nama=trim((string) $this->input->post('xnama',TRUE));
		$pesan=trim((string) $this->input->post('xmessage',TRUE));
		if ($nama === '' || $pesan === '' || $this->input->post('website') != '') {
			$this->session->set_flashdata('kontak', 'error');
			redirect('contact');
		}
		$this->db->insert('tbl_inbox', array(
			'inbox_nama' => mb_substr(htmlspecialchars($nama, ENT_QUOTES), 0, 40),
			'inbox_email' => mb_substr(htmlspecialchars(trim((string) $this->input->post('xemail',TRUE)), ENT_QUOTES), 0, 60),
			'inbox_kontak' => mb_substr(htmlspecialchars(trim((string) $this->input->post('xphone',TRUE)), ENT_QUOTES), 0, 20),
			'inbox_pesan' => htmlspecialchars($pesan, ENT_QUOTES),
		));
		$this->session->set_flashdata('kontak', 'ok');
		redirect('contact');
	}
}
