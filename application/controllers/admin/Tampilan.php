<?php
/*
| Admin > Tampilan Website > Pengaturan Tampilan.
| Semua field berasal dari application/config/tampilan.php ('tampilan_grup').
*/
class Tampilan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
			redirect(base_url('administrator'));
		}
		$this->load->model('m_setup');
		$this->load->model('m_tampilan');
		$this->load->library('upload');
	}

	function index($grup = 'umum'){
		$semua = $this->m_tampilan->grup();
		if ( ! isset($semua[$grup])) $grup = 'umum';
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['semua_grup']=$semua;
		$x['grup']=$grup;
		$x['nilai']=$this->m_tampilan->pengaturan();
		$x['title']='Admin '.$x['setup']->judul_website.' | Pengaturan Tampilan';
		$this->template->load('template_admin', 'admin/v_tampilan', $x);
	}

	function simpan($grup = ''){
		$semua = $this->m_tampilan->grup();
		if ( ! isset($semua[$grup]) || $this->input->method() !== 'post') redirect('admin/tampilan');
		$data = array();
		$gagal = array();
		foreach ($semua[$grup]['fields'] as $kunci => $f) {
			switch ($f['tipe']) {
				case 'judul':
					break;
				case 'checkbox':
					$data[$kunci] = $this->input->post($kunci) ? '1' : '0';
					break;
				case 'color':
					$v = (string) $this->input->post($kunci);
					if (preg_match('/^#[0-9a-fA-F]{6}$/', $v)) $data[$kunci] = strtolower($v);
					break;
				case 'image':
				case 'file':
					if ($this->input->post($kunci.'_hapus')) $data[$kunci] = '';
					if ( ! empty($_FILES[$kunci]['name'])) {
						$nama = $this->unggah($kunci, $f['tipe']);
						if ($nama) $data[$kunci] = $nama; else $gagal[] = $f['label'];
					}
					break;
				default:
					$data[$kunci] = trim((string) $this->input->post($kunci));
			}
		}
		$this->m_tampilan->simpan_pengaturan($data);
		if ($gagal) {
			$this->session->set_flashdata('pesan', array('error', 'Pengaturan disimpan, tapi file gagal diunggah: '.implode(', ', $gagal).'. Periksa jenis dan ukuran file.'));
		} else {
			$this->session->set_flashdata('pesan', array('ok', 'Pengaturan "'.$semua[$grup]['label'].'" berhasil disimpan.'));
		}
		redirect('admin/tampilan/index/'.$grup);
	}

	function reset($grup = ''){
		$semua = $this->m_tampilan->grup();
		if (isset($semua[$grup]) && $this->input->method() === 'post') {
			$kunci = array();
			foreach ($semua[$grup]['fields'] as $k => $f) if ($f['tipe'] !== 'judul') $kunci[] = $k;
			if ($kunci) $this->db->where_in('kunci', $kunci)->delete('tbl_pengaturan');
			$this->session->set_flashdata('pesan', array('ok', 'Pengaturan "'.$semua[$grup]['label'].'" dikembalikan ke bawaan.'));
		}
		redirect('admin/tampilan/index/'.$grup);
	}

	private function unggah($field, $tipe){
		$gambar = $tipe === 'image';
		$this->upload->initialize(array(
			'upload_path' => $gambar ? UPLOAD_IMAGES_PATH : UPLOAD_FILES_PATH,
			'allowed_types' => $gambar ? 'gif|jpg|png|jpeg|webp' : 'pdf|jpg|jpeg|png',
			'max_size' => 10240,
			'encrypt_name' => TRUE,
		));
		if ( ! $this->upload->do_upload($field)) return FALSE;
		$d = $this->upload->data();
		return $d['file_name'];
	}
}
