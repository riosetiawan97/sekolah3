<?php
class About extends CI_Controller{
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
		$x['title']="Admin $judul_website | About Us";
		$this->template->load('template_admin', 'admin/v_about', $x);
	}

	function update_about(){
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if(!empty($_FILES['gambarabout']['name']))
		{
			if ($this->upload->do_upload('gambarabout'))
			{
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library']='gd2';
				$config['source_image']='./assets/images/'.$gbr['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= FALSE;
				$config['new_image']='./assets/images/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$id=$this->input->post('id');
				$gambar=$gbr['file_name'];
				$about=$this->input->post('about');
				$this->m_setup->update_about($id,$gambar,$about);
				echo $this->session->set_flashdata('msg','info');
				redirect('admin/about');
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('admin/about');
			}
		}else{
			$id=$this->input->post('id');
			$about=$this->input->post('about');
			$this->m_setup->update_about_tanpa_img($id,$about);
			echo $this->session->set_flashdata('msg','info');
			redirect('admin/about');
		}
	}
}
