<?php
class Brosur extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_brosur');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
		$this->load->model('m_setup');
	}

	function index(){
		$x['data']=$this->m_brosur->get_all_brosur();
		$x['setup']=$this->m_setup->get_setup()->row();
		$judul_website=$x['setup']->judul_website;
		//$this->load->view('admin/v_brosur',$x);
		$x['title']="Admin $judul_website | Brochure";
		$this->template->load('template_admin', 'admin/v_brosur', $x);
	}
		
	function update_brosur(){				
		$config['upload_path'] = UPLOAD_IMAGES_PATH; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if ($this->upload->do_upload('filefoto'))
		{
			$gbr = $this->upload->data();
			//Compress Image
			$config['image_library']='gd2';
			$config['source_image']=UPLOAD_IMAGES_PATH.$gbr['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['new_image']= UPLOAD_IMAGES_PATH.$gbr['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$brosur_gambar=$gbr['file_name'];
			$brosur_id=$this->input->post('kode');
			$type=$this->input->post('type');
			$images=$this->input->post('gambar');
			$path=UPLOAD_IMAGES_PATH.$images;
			upload_delete($path);
			$kode=$this->session->userdata('idadmin');
			$user=$this->m_pengguna->get_pengguna_login($kode);
			$p=$user->row_array();
			$brosur_author=$p['pengguna_nama'];
			$this->m_brosur->update_brosur($brosur_id,$brosur_gambar,$type,$brosur_author);
			echo $this->session->set_flashdata('msg','info');
			redirect('admin/brosur');			
		}else{
			echo $this->session->set_flashdata('msg','warning');
			redirect('admin/brosur');
		}
	}

	function hapus_brosur(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path=UPLOAD_IMAGES_PATH.$gambar;
		upload_delete($path);
		$this->m_brosur->hapus_brosur($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/brosur');
	}
}