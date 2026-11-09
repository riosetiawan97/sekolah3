<?php
/* Admin > PPDB > Data Pendaftar (dari formulir pendaftaran di website). */
class Pendaftar extends CI_Controller{
	private $status = array('Baru', 'Dihubungi', 'Diterima', 'Ditolak');

	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
			redirect(base_url('administrator'));
		}
		$this->load->model('m_setup');
		$this->load->model('m_pendaftar');
	}

	function index(){
		$filter = (string) $this->input->get('status');
		if ( ! in_array($filter, $this->status, TRUE)) $filter = '';
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['data']=$this->m_pendaftar->semua($filter);
		$x['filter']=$filter;
		$x['daftar_status']=$this->status;
		$x['hitung']=array();
		foreach ($this->db->select('status, COUNT(*) AS n')->group_by('status')->get('tbl_pendaftar')->result() as $r) $x['hitung'][$r->status] = $r->n;
		$x['title']='Admin '.$x['setup']->judul_website.' | Data Pendaftar';
		$this->template->load('template_admin', 'admin/v_pendaftar', $x);
	}

	function update(){
		$status = (string) $this->input->post('status');
		if ($this->input->method() === 'post' && in_array($status, $this->status, TRUE)) {
			$this->m_pendaftar->update($this->input->post('id'), array('status' => $status, 'catatan' => trim((string) $this->input->post('catatan'))));
			$this->session->set_flashdata('pesan', array('ok', 'Data pendaftar diperbarui.'));
		}
		redirect('admin/pendaftar'.($this->input->post('filter') ? '?status='.rawurlencode($this->input->post('filter')) : ''));
	}

	function hapus(){
		if ($this->input->method() === 'post') {
			$this->m_pendaftar->hapus($this->input->post('id'));
			$this->session->set_flashdata('pesan', array('ok', 'Data pendaftar dihapus.'));
		}
		redirect('admin/pendaftar');
	}
}
