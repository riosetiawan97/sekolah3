<?php
class Siswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_siswa');
		$this->load->model('m_pengguna');
		$this->load->model('m_kelas');
		$this->load->library('upload');
		$this->load->model('m_setup');
	}

	function index(){
		$x['kelas']=$this->m_kelas->get_all_kelas();
		$x['data']=$this->m_siswa->get_all_siswa();
		$x['setup']=$this->m_setup->get_setup()->row();
		$judul_website=$x['setup']->judul_website;
		//$this->load->view('admin/v_siswa',$x);
		$x['title']="Admin $judul_website | Siswa";
		$this->template->load('template_admin', 'admin/v_siswa', $x);
	}
	
	function simpan_siswa(){
				$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $photo=$gbr['file_name'];
							$nis=strip_tags($this->input->post('xnis'));
							$nama=strip_tags($this->input->post('xnama'));
							$jenkel=strip_tags($this->input->post('xjenkel'));
							$kelas=strip_tags($this->input->post('xkelas'));

							$this->m_siswa->simpan_siswa($nis,$nama,$jenkel,$kelas,$photo);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/siswa');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/siswa');
	                }
	                 
	            }else{
	            	$nis=strip_tags($this->input->post('xnis'));
					$nama=strip_tags($this->input->post('xnama'));
					$jenkel=strip_tags($this->input->post('xjenkel'));
					$kelas=strip_tags($this->input->post('xkelas'));

					$this->m_siswa->simpan_siswa_tanpa_img($nis,$nama,$jenkel,$kelas);
					echo $this->session->set_flashdata('msg','success');
					redirect('admin/siswa');
				}
				
	}
	
	function update_siswa(){
				
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if(!empty($_FILES['filefoto']['name']))
		{
			if ($this->upload->do_upload('filefoto'))
			{
					$gbr = $this->upload->data();
					//Compress Image
					$config['image_library']='gd2';
					$config['source_image']='./assets/images/'.$gbr['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '60%';
					$config['width']= 300;
					$config['height']= 300;
					$config['new_image']= './assets/images/'.$gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$gambar=$this->input->post('gambar');
					$path='./assets/images/'.$gambar;
					unlink($path);

					$photo=$gbr['file_name'];
					$kode=$this->input->post('kode');
					$nis=strip_tags($this->input->post('xnis'));
					$nama=strip_tags($this->input->post('xnama'));
					$jenkel=strip_tags($this->input->post('xjenkel'));
					$kelas=strip_tags($this->input->post('xkelas'));

					$this->m_siswa->update_siswa($kode,$nis,$nama,$jenkel,$kelas,$photo);
					echo $this->session->set_flashdata('msg','info');
					redirect('admin/siswa');
				
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('admin/siswa');
			}			
		}else{
					$kode=$this->input->post('kode');
					$nis=strip_tags($this->input->post('xnis'));
					$nama=strip_tags($this->input->post('xnama'));
					$jenkel=strip_tags($this->input->post('xjenkel'));
					$kelas=strip_tags($this->input->post('xkelas'));

					$this->m_siswa->update_siswa_tanpa_img($kode,$nis,$nama,$jenkel,$kelas);
					echo $this->session->set_flashdata('msg','info');
					redirect('admin/siswa');
		} 
	}

	function hapus_siswa(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->m_siswa->hapus_siswa($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/siswa');
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