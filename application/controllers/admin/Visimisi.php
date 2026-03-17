<?php
class Visimisi extends CI_Controller{
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
		$x['title']="Admin $judul_website | Vision and Mission";
		$this->template->load('template_admin', 'admin/v_visimisi', $x);
	}

	function update_visimisi(){
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if(!empty($_FILES['gambarvisimisi']['name']))
		{
			if ($this->upload->do_upload('gambarvisimisi'))
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
				$visi=$this->input->post('visi');
				$misi=$this->input->post('misi');
				$this->m_setup->update_visimisi($id,$gambar,$visi,$misi);
				echo $this->session->set_flashdata('msg','info');
				redirect('admin/visimisi');
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('admin/visimisi');
			}
		}else{
			$id=$this->input->post('id');
			$visi=$this->input->post('visi');
			$misi=$this->input->post('misi');
			$this->m_setup->update_visimisi_tanpa_img($id,$visi,$misi);
			echo $this->session->set_flashdata('msg','info');
			redirect('admin/visimisi');
		}
	}
}
