<?php
/* Admin > Siswa (data siswa) dan absensi siswa. */
class Siswa extends Admin_crud{
	function __construct(){
		parent::__construct();
		$this->load->model('m_siswa');
	}
	protected function definisi(){
		$kelas = array('' => '- Pilih kelas -');
		foreach ($this->db->order_by('kelas_nama')->get('tbl_kelas')->result() as $k) $kelas[$k->kelas_id] = $k->kelas_nama;
		return array(
			'judul' => 'Data Siswa', 'satuan' => 'Siswa', 'remah' => array('Data Sekolah', 'Siswa'),
			'tabel' => 'tbl_siswa', 'pk' => 'siswa_id', 'url' => 'admin/siswa', 'urut' => 'siswa_nama ASC',
			'keterangan' => 'Jumlah siswa bisa ditampilkan otomatis di Statistik Beranda dengan angka {jumlah_siswa}.',
			'aksi' => '<a href="'.base_url('admin/siswa/absen').'" class="btn btn-sm btn-light">Absensi Siswa</a>',
			'kolom' => array(
				'siswa_photo' => array('label' => 'Foto', 'tipe' => 'image'),
				'siswa_nis' => array('label' => 'NIS', 'tipe' => 'text', 'maks' => 20),
				'siswa_nama' => array('label' => 'Nama', 'tipe' => 'text', 'wajib' => TRUE, 'maks' => 70),
				'siswa_jenkel' => array('label' => 'Jenis Kelamin', 'tipe' => 'select', 'opsi' => array('L' => 'Laki-laki', 'P' => 'Perempuan'), 'bawaan' => 'L'),
				'siswa_kelas_id' => array('label' => 'Kelas', 'tipe' => 'select', 'opsi' => $kelas, 'wajib' => TRUE),
			),
		);
	}

	function absen(){
		$post=$this->input->post('date_range');
		if($post==''){
			$x['tanggal_awal_absen']=$this->m_siswa->tanggal_awal_absen()->row();
			$default_start_date=date_format(date_create($x['tanggal_awal_absen']->tanggal),"m/d/Y");
			$default_end_date=date("m/d/Y");
			$start_date=date_format(date_create($x['tanggal_awal_absen']->tanggal),"Ymd");
			$end_date=date("Ymd");
		}else{				
			$default_start_date=date_format(date_create(substr($this->input->post('date_range'),0,strpos($this->input->post('date_range'),"- "))),"m/d/Y");
			$default_end_date=date_format(date_create(substr($this->input->post('date_range'),strpos($this->input->post('date_range'),"- ")+2,10)),"m/d/Y");
			$start_date=date_format(date_create(substr($this->input->post('date_range'),0,strpos($this->input->post('date_range'),"- "))),"Ymd");
			$end_date=date_format(date_create(substr($this->input->post('date_range'),strpos($this->input->post('date_range'),"- ")+2,10)),"Ymd");
		}
		$x['data']=$this->m_siswa->absen_siswa_range($start_date,$end_date);
		/*
		if(!empty($start_date) or !empty($end_date)){
			$x['data']=$this->m_siswa->absen_siswa_range($start_date,$end_date);
		}else{
			$x['data']=$this->m_siswa->get_absen_siswa();
		}*/
		$x['default_start_date']=$default_start_date;
		$x['default_end_date']=$default_end_date;
		$x['start_date']=$start_date;
		$x['end_date']=$end_date;
		$x['post']=$post;
		
		$x['setup']=$this->m_setup->get_setup()->row();
		$nama_sekolah=$x['setup']->nama_sekolah;
		//$this->load->view('admin/v_guru',$x);
		$x['title']="Admin $nama_sekolah | Student Attendance";
		$this->template->load('template_admin', 'admin/v_absen_siswa', $x);
	}

	function hapus_absen_siswa(){
		$id=$this->input->post('id');
		$this->m_siswa->hapus_absen_siswa($id);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/siswa/absen');
	}
}