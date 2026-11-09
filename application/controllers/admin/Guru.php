<?php
/* Admin > Guru (data guru) dan absensi guru. */
class Guru extends Admin_crud{
	function __construct(){
		parent::__construct();
		$this->load->model('m_guru');
	}
	protected function definisi(){
		return array(
			'judul' => 'Data Guru', 'satuan' => 'Guru', 'remah' => array('Data Sekolah', 'Guru'),
			'tabel' => 'tbl_guru', 'pk' => 'guru_id', 'url' => 'admin/guru', 'urut' => 'guru_nama ASC',
			'keterangan' => 'Nama guru tampil sebagai pilihan di halaman Absensi Guru dan Wali Kelas.',
			'aksi' => '<a href="'.base_url('admin/guru/absen').'" class="btn btn-sm btn-light">Absensi Guru</a>',
			'kolom' => array(
				'guru_photo' => array('label' => 'Foto', 'tipe' => 'image'),
				'guru_nip' => array('label' => 'NIP', 'tipe' => 'text', 'maks' => 30),
				'guru_nama' => array('label' => 'Nama', 'tipe' => 'text', 'wajib' => TRUE, 'maks' => 70),
				'guru_jenkel' => array('label' => 'Jenis Kelamin', 'tipe' => 'select', 'opsi' => array('L' => 'Laki-laki', 'P' => 'Perempuan'), 'bawaan' => 'L'),
				'guru_tmp_lahir' => array('label' => 'Tempat Lahir', 'tipe' => 'text', 'maks' => 80),
				'guru_tgl_lahir' => array('label' => 'Tanggal Lahir', 'tipe' => 'text', 'maks' => 80, 'contoh' => '25 September 1993'),
				'guru_mapel' => array('label' => 'Mata Pelajaran', 'tipe' => 'text', 'maks' => 120),
			),
		);
	}

	function absen(){
		$x['data']=$this->m_guru->get_absen_guru();
		$x['setup']=$this->m_setup->get_setup()->row();
		$nama_sekolah=$x['setup']->nama_sekolah;
		//$this->load->view('admin/v_guru',$x);
		$x['title']="Admin $nama_sekolah | Absen Guru";
		$this->template->load('template_admin', 'admin/_bungkus', array('setup' => $x['setup'], 'title' => $x['title'], 'isi' => 'admin/v_absen_guru', 'data_isi' => $x));
	}

	function hapus_absen_guru(){
		$id=$this->input->post('id');
		$this->m_guru->hapus_absen_guru($id);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/guru/absen');
	}

}