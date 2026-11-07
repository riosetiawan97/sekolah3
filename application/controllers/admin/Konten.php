<?php
/*
| Admin > daftar isi tampilan (statistik, program unggulan, fakta sekolah, syarat, jadwal & info PPDB).
| Grup dan kolomnya didefinisikan di application/config/tampilan.php ('tampilan_item').
*/
class Konten extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
			redirect(base_url('administrator'));
		}
		$this->load->model('m_setup');
		$this->load->model('m_tampilan');
	}

	private function grup_atau_404($grup){
		$semua = $this->m_tampilan->grup_item();
		if ( ! isset($semua[$grup])) show_404();
		return $semua[$grup];
	}

	function index($grup = 'statistik'){
		$def = $this->grup_atau_404($grup);
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['grup']=$grup;
		$x['def']=$def;
		$x['data']=$this->m_tampilan->items($grup, FALSE);
		$x['title']='Admin '.$x['setup']->judul_website.' | '.$def['label'];
		$this->template->load('template_admin', 'admin/v_konten', $x);
	}

	private function ambil_input($def){
		$data = array();
		foreach (array_keys($def['kolom']) as $k) {
			$v = trim((string) $this->input->post($k));
			if ($k === 'warna' && ! preg_match('/^#[0-9a-fA-F]{6}$/', $v)) $v = '';
			$data[$k] = $v;
		}
		$data['urutan'] = (int) $this->input->post('urutan');
		$data['aktif'] = $this->input->post('aktif') ? 1 : 0;
		return $data;
	}

	function simpan($grup = ''){
		$def = $this->grup_atau_404($grup);
		if ($this->input->method() === 'post') {
			$data = $this->ambil_input($def);
			if ($this->input->post('urutan') === '') unset($data['urutan']);
			$data['grup'] = $grup;
			$this->m_tampilan->simpan_item($data);
			$this->session->set_flashdata('pesan', array('ok', 'Data berhasil ditambahkan.'));
		}
		redirect('admin/konten/index/'.$grup);
	}

	function update($grup = ''){
		$def = $this->grup_atau_404($grup);
		$item = $this->m_tampilan->get_item($this->input->post('id'));
		if ($item && $item->grup === $grup && $this->input->method() === 'post') {
			$this->m_tampilan->update_item($item->id, $this->ambil_input($def));
			$this->session->set_flashdata('pesan', array('ok', 'Data berhasil diubah.'));
		}
		redirect('admin/konten/index/'.$grup);
	}

	function hapus($grup = ''){
		$this->grup_atau_404($grup);
		$item = $this->m_tampilan->get_item($this->input->post('id'));
		if ($item && $item->grup === $grup && $this->input->method() === 'post') {
			$this->m_tampilan->hapus_item($item->id);
			$this->session->set_flashdata('pesan', array('ok', 'Data berhasil dihapus.'));
		}
		redirect('admin/konten/index/'.$grup);
	}
}
