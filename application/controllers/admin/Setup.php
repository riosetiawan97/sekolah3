<?php
class Setup extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_setup');
		$this->load->library('upload');
	}


	function index(){
		$x['data']=$this->m_setup->get_setup();
		$x['setup']=$this->m_setup->get_setup()->row();
		$judul_website=$x['setup']->judul_website;
		//$this->load->view('admin/v_tulisan',$x);
		$x['title']="Admin $judul_website | Setup";
		$this->template->load('template_admin', 'admin/v_setup', $x);
	}

	function update_setup(){
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if(!empty($_FILES['logo']['name']))
		{
			if ($this->upload->do_upload('logo'))
			{
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library']='gd2';
				$config['source_image']='./assets/images/'.$gbr['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= FALSE;
				$config['new_image']= './assets/images/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$id=$this->input->post('id');
				$gambar=$gbr['file_name'];
				$nama_sekolah=strip_tags($this->input->post('nama_sekolah'));
				$kecamatan=$this->input->post('kecamatan');
				$kota=$this->input->post('kota');
				$alamat=$this->input->post('alamat');
				$telepon=$this->input->post('telepon');
				$email=$this->input->post('email');
				$facebook=$this->input->post('facebook');
				$gmaps=$this->input->post('gmaps');
				$whatsapp=$this->input->post('whatsapp');
				$instagram=$this->input->post('instagram');
				$judul_website=$this->input->post('judul_website');
				$this->m_setup->update_setup($id,$gambar,$nama_sekolah,$kecamatan,$kota,$alamat,$telepon,$email,$facebook,$gmaps,$whatsapp,$instagram,$judul_website);
				echo $this->session->set_flashdata('msg','info');
				redirect('admin/setup');
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('admin/setup');
			}
		}else{
			$id=$this->input->post('id');
			$nama_sekolah=$this->input->post('nama_sekolah');
			$kecamatan=$this->input->post('kecamatan');
			$kota=$this->input->post('kota');
			$alamat=$this->input->post('alamat');
			$telepon=$this->input->post('telepon');
			$email=$this->input->post('email');
			$facebook=$this->input->post('facebook');
			$gmaps=$this->input->post('gmaps');
			$whatsapp=$this->input->post('whatsapp');
			$instagram=$this->input->post('instagram');
			$judul_website=$this->input->post('judul_website');
			$this->m_setup->update_setup_tanpa_img($id,$nama_sekolah,$kecamatan,$kota,$alamat,$telepon,$email,$facebook,$gmaps,$whatsapp,$instagram,$judul_website);
			echo $this->session->set_flashdata('msg','info');
			redirect('admin/setup');
		}
	}
}
