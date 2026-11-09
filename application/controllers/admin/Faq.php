<?php
class Faq extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_faq');
		$this->load->library('upload');
		$this->load->model('m_setup');
	}

	function index(){
		$x['data']=$this->m_faq->get_all_faq();
		$x['setup']=$this->m_setup->get_setup()->row();
		$judul_website=$x['setup']->judul_website;
		//$this->load->view('admin/v_faq',$x);
		$x['title']="Admin $judul_website | FAQ";
		$this->template->load('template_admin', 'admin/v_faq', $x);
	}

	function simpan_faq(){
		$config['upload_path'] = UPLOAD_IMAGES_PATH; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if(!empty($_FILES['filefoto']['name'])){
			if ($this->upload->do_upload('filefoto')){
						
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library']='gd2';
				$config['source_image']=UPLOAD_IMAGES_PATH.$gbr['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= FALSE;
				$config['new_image']= UPLOAD_IMAGES_PATH.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar=$gbr['file_name'];	
				$faq_judul=strip_tags($this->input->post('xfaq_judul'));
				$faq_isi=strip_tags($this->input->post('xfaq_isi'));
				$faq_aktif=strip_tags($this->input->post('xfaq_aktif'));
				$this->m_faq->simpan_faq($faq_judul, $faq_isi, $faq_aktif, $gambar);
				echo $this->session->set_flashdata('msg','success');
				redirect('admin/faq');
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('admin/faq');
			}
		}else{	
			$faq_judul=strip_tags($this->input->post('xfaq_judul'));
			$faq_isi=strip_tags($this->input->post('xfaq_isi'));
			$faq_aktif=strip_tags($this->input->post('xfaq_aktif'));
			$this->m_faq->simpan_faq_tanpa_img($faq_judul, $faq_isi, $faq_aktif);
			echo $this->session->set_flashdata('msg','success');
			redirect('admin/faq');
		}
	}

	function update_faq(){
		$config['upload_path'] = UPLOAD_IMAGES_PATH; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if(!empty($_FILES['filefoto']['name'])){
			if ($this->upload->do_upload('filefoto')){
						
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library']='gd2';
				$config['source_image']=UPLOAD_IMAGES_PATH.$gbr['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= FALSE;
				$config['new_image']= UPLOAD_IMAGES_PATH.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar=$gbr['file_name'];		
				$images=$this->input->post('gambar');
				$path=UPLOAD_IMAGES_PATH.$images;
				upload_delete($path);
				
				$kode=strip_tags($this->input->post('kode'));
				$faq_judul=strip_tags($this->input->post('xfaq_judul'));
				$faq_isi=strip_tags($this->input->post('xfaq_isi'));
				$faq_aktif=strip_tags($this->input->post('xfaq_aktif'));
				$this->m_faq->update_faq($kode,$faq_judul, $faq_isi, $faq_aktif, $gambar);
				echo $this->session->set_flashdata('msg','info');
				redirect('admin/faq');
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('admin/faq');
			}
		}else{
			$kode=strip_tags($this->input->post('kode'));
			$faq_judul=strip_tags($this->input->post('xfaq_judul'));
			$faq_isi=strip_tags($this->input->post('xfaq_isi'));
			$faq_aktif=strip_tags($this->input->post('xfaq_aktif'));
			$this->m_faq->update_faq_tanpa_img($kode,$faq_judul, $faq_isi, $faq_aktif);
			echo $this->session->set_flashdata('msg','info');
			redirect('admin/faq');
		}
	}
	function hapus_faq(){
		$kode=strip_tags($this->input->post('kode'));
		$gambar=$this->input->post('gambar');
		$path=UPLOAD_IMAGES_PATH.$gambar;
		upload_delete($path);
		$this->m_faq->hapus_faq($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/faq');
	}


	// ── Pertanyaan & jawaban per kategori ─────────────────────────────
	function item($faq_id = 0){
		$faq = $this->m_faq->get_faq_byid($faq_id)->row();
		if ( ! $faq) redirect('admin/faq');
		$x['setup']=$this->m_setup->get_setup()->row();
		$x['faq']=$faq;
		$x['data']=$this->m_faq->get_items($faq->faq_id);
		$x['title']='Admin '.$x['setup']->judul_website.' | Pertanyaan FAQ';
		$this->template->load('template_admin', 'admin/v_faq_item', $x);
	}

	function simpan_item(){
		$faq_id = (int) $this->input->post('faq_id');
		$pertanyaan = trim((string) $this->input->post('pertanyaan'));
		if ($pertanyaan !== '' && $this->m_faq->get_faq_byid($faq_id)->row()) {
			$urutan = $this->input->post('urutan');
			if ($urutan === '' || $urutan === NULL) $urutan = count($this->m_faq->get_items($faq_id)) + 1;
			$this->m_faq->simpan_item($faq_id, $pertanyaan, $this->input->post('jawaban'), $urutan);
			$this->session->set_flashdata('pesan', array('ok', 'Pertanyaan ditambahkan.'));
		}
		redirect('admin/faq/item/'.$faq_id);
	}

	function update_item(){
		$item = $this->m_faq->get_item($this->input->post('id'));
		if ( ! $item) redirect('admin/faq');
		$pertanyaan = trim((string) $this->input->post('pertanyaan'));
		if ($pertanyaan !== '') {
			$this->m_faq->update_item($item->id, $pertanyaan, $this->input->post('jawaban'), $this->input->post('urutan'));
			$this->session->set_flashdata('pesan', array('ok', 'Pertanyaan diubah.'));
		}
		redirect('admin/faq/item/'.$item->faq_id);
	}

	function hapus_item(){
		$item = $this->m_faq->get_item($this->input->post('id'));
		if ( ! $item) redirect('admin/faq');
		$this->m_faq->hapus_item($item->id);
		$this->session->set_flashdata('pesan', array('ok', 'Pertanyaan dihapus.'));
		redirect('admin/faq/item/'.$item->faq_id);
	}
}
