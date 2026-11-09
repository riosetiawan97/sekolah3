<?php
class Pendaftaran extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->load->model('m_pendaftar');
	}
	function index(){
		$this->m_pengunjung->count_visitor();
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['title']=t('hal_daftar_judul').' | '.$x['setup']->judul_website;
		$x['halaman']='daftar';
		$this->template->load('template_depan', 'depan/v_pendaftaran', $x);
	}

	// Simpan formulir PPDB (dari beranda atau halaman Admission).
	function simpan(){
		$kembali = $this->input->post('kembali') === 'beranda' ? base_url('#formulir') : base_url('pendaftaran');
		if ($this->input->method() !== 'post' || ! t_on('ppdb_form_aktif')) redirect($kembali);
		if ($this->input->post('website') != '') redirect($kembali); // bot

		$data = array(
			'nama' => trim((string) $this->input->post('nama', TRUE)),
			'asal_sekolah' => trim((string) $this->input->post('asal_sekolah', TRUE)),
			'nama_ortu' => trim((string) $this->input->post('nama_ortu', TRUE)),
			'no_hp' => trim((string) $this->input->post('no_hp', TRUE)),
			'email' => trim((string) $this->input->post('email', TRUE)),
		);
		$error = '';
		if ($data['nama'] === '' || $data['asal_sekolah'] === '' || $data['no_hp'] === '') {
			$error = 'Nama, asal sekolah, dan nomor HP wajib diisi.';
		} elseif ( ! preg_match('/^[0-9+\-\s()]{8,30}$/', $data['no_hp'])) {
			$error = 'Nomor HP tidak valid.';
		} elseif ($data['email'] !== '' && ! filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$error = 'Alamat email tidak valid.';
		}
		if ($error) {
			$this->session->set_flashdata('daftar_error', $error);
			$this->session->set_flashdata('daftar_lama', $data);
			redirect($kembali);
		}
		$data['nama'] = mb_substr($data['nama'], 0, 100);
		$data['asal_sekolah'] = mb_substr($data['asal_sekolah'], 0, 150);
		$data['nama_ortu'] = mb_substr($data['nama_ortu'], 0, 100);
		$data['email'] = mb_substr($data['email'], 0, 100);
		$this->m_pendaftar->simpan($data);
		$this->kirim_notifikasi($data);
		$this->session->set_flashdata('daftar_sukses', $data['nama']);
		redirect($kembali);
	}

	// Email ke sekolah setiap ada pendaftar baru. Aktif jika alamat tujuan diisi di
	// Pengaturan Tampilan > PPDB dan env SMTP_HOST, SMTP_USER, SMTP_PASS di-set. Gagal kirim tidak menggagalkan pendaftaran.
	private function kirim_notifikasi($data){
		$tujuan = array_filter(array_map('trim', explode(',', t('ppdb_email_notif'))), function ($e) { return filter_var($e, FILTER_VALIDATE_EMAIL); });
		if ( ! $tujuan || ! getenv('SMTP_HOST') || ! getenv('SMTP_USER')) return;
		$this->load->library('email');
		$this->email->initialize(array(
			'protocol' => 'smtp',
			'smtp_host' => getenv('SMTP_HOST'),
			'smtp_port' => (int) (getenv('SMTP_PORT') ?: 587),
			'smtp_user' => getenv('SMTP_USER'),
			'smtp_pass' => getenv('SMTP_PASS'),
			'smtp_crypto' => getenv('SMTP_CRYPTO') !== FALSE ? getenv('SMTP_CRYPTO') : 'tls',
			'smtp_timeout' => 10,
			'mailtype' => 'text',
			'charset' => 'utf-8',
			'newline' => "\r\n",
			'crlf' => "\r\n",
		));
		$setup = $this->m_setup->get_setup()->row();
		$this->email->from(getenv('SMTP_FROM') ?: getenv('SMTP_USER'), $setup ? $setup->nama_sekolah : 'Website Sekolah');
		$this->email->to($tujuan);
		if ($data['email'] !== '') $this->email->reply_to($data['email'], $data['nama']);
		$this->email->subject('Pendaftar PPDB baru: '.$data['nama']);
		$this->email->message("Ada pendaftar baru dari formulir website.\n\n"
			."Nama siswa   : {$data['nama']}\n"
			."Asal sekolah : {$data['asal_sekolah']}\n"
			."Orang tua    : {$data['nama_ortu']}\n"
			."No. HP       : {$data['no_hp']}\n"
			."Email        : {$data['email']}\n\n"
			."Lihat semua pendaftar: ".base_url('admin/pendaftar')."\n");
		if ( ! @$this->email->send(FALSE)) {
			log_message('error', 'Email notifikasi PPDB gagal: '.$this->email->print_debugger(array('headers')));
		}
	}
}
