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
    $judul_website=$x['setup']->judul_website;
		  //$this->load->view('depan/v_contact');      
      $x['title']="$judul_website | Contact Us";
      $this->template->load('template_depan', 'depan/v_contact', $x);
	}

  function kirim_pesan(){
      $nama=htmlspecialchars($this->input->post('xnama',TRUE),ENT_QUOTES);
      $email=htmlspecialchars($this->input->post('xemail',TRUE),ENT_QUOTES);
      $kontak=htmlspecialchars($this->input->post('xphone',TRUE),ENT_QUOTES);
      $pesan=htmlspecialchars($this->input->post('xmessage',TRUE),ENT_QUOTES);
      $this->m_kontak->kirim_pesan($nama,$email,$kontak,$pesan);
      echo $this->session->set_flashdata('msg','<p><strong> NB: </strong> Terima Kasih Telah Menghubungi Kami.</p>');
      redirect('contact');
  }
}
