[1mdiff --git a/application/config/config.php b/application/config/config.php[m
[1mindex 611bff1..5d0bfa0 100644[m
[1m--- a/application/config/config.php[m
[1m+++ b/application/config/config.php[m
[36m@@ -1,6 +1,6 @@[m
 <?php[m
 defined('BASEPATH') OR exit('No direct script access allowed');[m
[31m-[m
[32m+[m[32mdate_default_timezone_set('Asia/Jakarta');[m
 /*[m
 |--------------------------------------------------------------------------[m
 | Base Site URL[m
[36m@@ -23,7 +23,7 @@[m [mdefined('BASEPATH') OR exit('No direct script access allowed');[m
 | a PHP script and you can easily do that on your own.[m
 |[m
 */[m
[31m-$config['base_url'] = 'http://localhost:8080/sekolah/';[m
[32m+[m[32m$config['base_url'] = 'http://localhost/sekolah/';[m
 [m
 /*[m
 |--------------------------------------------------------------------------[m
[1mdiff --git a/application/controllers/About.php b/application/controllers/About.php[m
[1mindex 56c6290..d4b15de 100644[m
[1m--- a/application/controllers/About.php[m
[1m+++ b/application/controllers/About.php[m
[36m@@ -3,15 +3,19 @@[m [mclass About extends CI_Controller{[m
 	function __construct(){[m
 		parent::__construct();[m
 		$this->load->model('m_pengunjung');[m
[32m+[m		[32m$this->load->model('m_setup');[m
 		$this->m_pengunjung->count_visitor();[m
[32m+[m		[32m$this->load->model('m_setup');[m
 	}[m
 	function index(){[m
 		$x['tot_guru']=$this->db->get('tbl_guru')->num_rows();[m
 		$x['tot_siswa']=$this->db->get('tbl_siswa')->num_rows();[m
 		$x['tot_files']=$this->db->get('tbl_files')->num_rows();[m
 		$x['tot_agenda']=$this->db->get('tbl_agenda')->num_rows();[m
[32m+[m		[32m$x['setup']=$this->m_setup->get_setup()->row();[m
[32m+[m		[32m$nama_sekolah=$x['setup']->nama_sekolah;[m
 		//$this->load->view('depan/v_about',$x);[m
[31m-		$x['title']="Sekolah | About";[m
[32m+[m		[32m$x['title']="$nama_sekolah | About";[m
 		$this->template->load('template_depan', 'depan/v_about', $x);[m
 	}[m
 }[m
[1mdiff --git a/application/controllers/Agenda.php b/application/controllers/Agenda.php[m
[1mindex 89000dd..db83441 100644[m
[1m--- a/application/controllers/Agenda.php[m
[1m+++ b/application/controllers/Agenda.php[m
[36m@@ -4,6 +4,7 @@[m [mclass Agenda extends CI_Controller{[m
 		parent::__construct();[m
 		$this->load->model('m_agenda');[m
 		$this->load->model('m_pengunjung');[m
[32m+[m		[32m$this->load->model('m_setup');[m
 		$this->m_pengunjung->count_visitor();[m
 	}[m
 	function index(){[m
[36m@@ -16,33 +17,35 @@[m [mclass Agenda extends CI_Controller{[m
         endif;[m
         $limit=7;[m
         $config['base_url'] = base_url() . 'agenda/index/';[m
[31m-            $config['total_rows'] = $jum->num_rows();[m
[31m-            $config['per_page'] = $limit;[m
[31m-            $config['uri_segment'] = 3;[m
[31m-						//Tambahan untuk styling[m
[31m-	          $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';[m
[31m-	          $config['full_tag_close']   = '</ul></nav></div>';[m
[31m-	          $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';[m
[31m-	          $config['num_tag_close']    = '</span></li>';[m
[31m-	          $config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';[m
[31m-	          $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';[m
[31m-	          $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';[m
[31m-	          $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';[m
[31m-	          $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';[m
[31m-	          $config['prev_tagl_close']  = '</span>Next</li>';[m
[31m-	          $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';[m
[31m-	          $config['first_tagl_close'] = '</span></li>';[m
[31m-	          $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';[m
[31m-	          $config['last_tagl_close']  = '</span></li>';[m
[31m-            $config['first_link'] = 'Awal';[m
[31m-            $config['last_link'] = 'Akhir';[m
[31m-            $config['next_link'] = 'Next >>';[m
[31m-            $config['prev_link'] = '<< Prev';[m
[31m-            $this->pagination->initialize($config);[m
[31m-            $x['page'] =$this->pagination->create_links();[m
[31m-		$x['data']=$this->m_agenda->agenda_perpage($offset,$limit);[m
[32m+[m		[32m$config['total_rows'] = $jum->num_rows();[m
[32m+[m		[32m$config['per_page'] = $limit;[m
[32m+[m		[32m$config['uri_segment'] = 3;[m
[32m+[m				[32m//Tambahan untuk styling[m
[32m+[m		[32m$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';[m
[32m+[m		[32m$config['full_tag_close']   = '</ul></nav></div>';[m
[32m+[m		[32m$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';[m
[32m+[m		[32m$config['num_tag_close']    = '</span></li>';[m
[32m+[m		[32m$config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';[m
[32m+[m		[32m$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';[m
[32m+[m		[32m$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';[m
[32m+[m		[32m$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';[m
[32m+[m		[32m$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';[m
[32m+[m		[32m$config['prev_tagl_close']  = '</span>Next</li>';[m
[32m+[m		[32m$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';[m
[32m+[m		[32m$config['first_tagl_close'] = '</span></li>';[m
[32m+[m		[32m$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';[m
[32m+[m		[32m$config['last_tagl_close']  = '</span></li>';[m
[32m+[m		[32m$config['first_link'] = 'Awal';[m
[32m+[m		[32m$config['last_link'] = 'Akhir';[m
[32m+[m		[32m$config['next_link'] = 'Next >>';[m
[32m+[m		[32m$config['prev_link'] = '<< Prev';[m
[32m+[m		[32m$this->pagination->initialize($config);[m
[32m+[m		[32m$x['page'] =$this->pagination->create_links();[m
[32m+[m		[32m$x['data']=$this->m_agenda->agenda_perpage($offset,$limit);[m[41m		[m
[32m+[m		[32m$x['setup']=$this->m_setup->get_setup()->row();[m
[32m+[m		[32m$nama_sekolah=$x['setup']->nama_sekolah;[m
 		//$this->load->view('depan/v_agenda',$x);[m
[31m-		$x['title']="Sekolah | Agenda";[m
[32m+[m		[32m$x['title']="$nama_sekolah | Agenda";[m
 		$this->template->load('template_depan', 'depan/v_agenda', $x);[m
 	}[m
 [m
[1mdiff --git a/application/controllers/Alur_pendaftaran.php b/application/controllers/Alur_pendaftaran.php[m
[1mnew file mode 100644[m
[1mindex 0000000..f3ae7cb[m
[1m--- /dev/null[m
[1m+++ b/application/controllers/Alur_pendaftaran.php[m
[36m@@ -0,0 +1,17 @@[m
[32m+[m[32m<?php[m
[32m+[m[32mclass Alur_Pendaftaran extends CI_Controller{[m
[32m+[m	[32mfunction __construct(){[m
[32m+[m		[32mparent::__construct();[m
[32m+[m		[32m$this->load->model('m_alur_pendaftaran');[m
[32m+[m		[32m$this->load->model('m_pengunjung');[m
[32m+[m		[32m$this->load->model('m_setup');[m
[32m+[m		[32m$this->m_pengunjung->count_visitor();[m
[32m+[m	[32m}[m
[32m+[m	[32mfunction index(){[m
[32m+[m		[32m$x['data']=$this->m_alur_pendaftaran->get_all_alur_pendaftaran();[m
[32m+[m		[32m$x['setup']=$this->m_setup->get_setup()->row();[m
[32m+[m		[32m$nama_sekolah=$x['setup']->nama_sekolah;[m
[32m+[m		[32m$x['title']="$nama_sekolah | Alur Pendaftaran";[m
[32m+[m		[32m$this->template->load('template_depan', 'depan/v_alur_pendaftaran', $x);[m
[32m+[m	[32m}[m
[32m+[m[32m}[m
[1mdiff --git a/application/controllers/Blog.php b/application/controllers/Blog.php[m
[1mindex 0c5613d..fea3bb8 100644[m
[1m--- a/application/controllers/Blog.php[m
[1m+++ b/application/controllers/Blog.php[m
[36m@@ -4,6 +4,7 @@[m [mclass Blog extends CI_Controller{[m
 		parent::__construct();[m
 		$this->load->model('m_tulisan');[m
 		$this->load->model('m_pengunjung');[m
[32m+[m		[32m$this->load->model('m_setup');[m
 		$this->m_pengunjung->count_visitor();[m
 	}[m
 	function index(){[m
[36m@@ -19,33 +20,35 @@[m [mclass Blog extends CI_Controller{[m
             $config['total_rows'] = $jum->num_rows();[m
             $config['per_page'] = $limit;[m
             $config['uri_segment'] = 3;[m
[31m-						//Tambahan untuk styling[m
[31m-	          $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';[m
[31m-	          $config['full_tag_close']   = '</ul></nav></div>';[m
[31m-	          $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';[m
[31m-	          $config['num_tag_close']    = '</span></li>';[m
[31m-	          $config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';[m
[31m-	          $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';[m
[31m-	          $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';[m
[31m-	          $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';[m
[31m-	          $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';[m
[31m-	          $config['prev_tagl_close']  = '</span>Next</li>';[m
[31m-	          $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';[m
[31m-	          $config['first_tagl_close'] = '</span></li>';[m
[31m-	          $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';[m
[31m-	          $config['last_tagl_close']  = '</span></li>';[m
[32m+[m					[32m//Tambahan untuk styling[m
[32m+[m			[32m$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';[m
[32m+[m			[32m$config['full_tag_close']   = '</ul></nav></div>';[m
[32m+[m			[32m$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';[m
[32m+[m			[32m$config['num_tag_close']    = '</span></li>';[m
[32m+[m			[32m$config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';[m
[32m+[m			[32m$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';[m
[32m+[m			[32m$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';[m
[32m+[m			[32m$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';[m
[32m+[m			[32m$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';[m
[32m+[m			[32m$config['prev_tagl_close']  = '</span>Next</li>';[m
[32m+[m			[32m$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';[m
[32m+[m			[32m$config['first_tagl_close'] = '</span></li>';[m
[32m+[m			[32m$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';[m
[32m+[m			[32m$config['last_tagl_close']  = '</span></li>';[m
             $config['first_link'] = 'Awal';[m
             $config['last_link'] = 'Akhir';[m
             $config['next_link'] = 'Next >>';[m
             $config['prev_link'] = '<< Prev';[m
             $this->pagination->initialize($config);[m
             $x['page'] =$this->pagination->create_links();[m
[31m-						$x['data']=$this->m_tulisan->berita_perpage($offset,$limit);[m
[31m-						$x['category']=$this->db->get('tbl_kategori');[m
[31m-						$x['populer']=$this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");[m
[31m-						//$this->load->view('depan/v_blog',$x);[m
[31m-						$x['title']="Sekolah | Blog";[m
[31m-						$this->template->load('template_depan', 'depan/v_blog', $x);[m
[32m+[m			[32m$x['data']=$this->m_tulisan->berita_perpage($offset,$limit);[m
[32m+[m			[32m$x['category']=$this->db->get('tbl_kategori');[m
[32m+[m			[32m$x['populer']=$this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");[m
[32m+[m			[32m$x['setup']=$this->m_setup->get_setup()->row();[m
[32m+[m			[32m$nama_sekolah=$x['setup']->nama_sekolah;[m
[32m+[m			[32m//$this->load->view('depan/v_blog',$x);[m
[32m+[m			[32m$x['title']="$nama_sekolah | Blog";[m
[32m+[m			[32m$this->template->load('template_depan', 'depan/v_blog', $x);[m
 	}[m
 	function detail($slugs){[m
 		$slug=htmlspecialchars($slugs,ENT_QUOTES);[m
[36m@@ -57,7 +60,7 @@[m [mclass Blog extends CI_Controller{[m
 			$data=$this->m_tulisan->get_berita_by_kode($kode);[m
 			$row=$data->row_array();[m
 			$x['id']=$row['tulisan_id'];[m
[31m-			$x['title']=$row['tulisan_judul'];[m
[32m+[m			[32m$x['title_blog']=$row['tulisan_judul'];[m
 			$x['image']=$row['tulisan_gambar'];[m
 			$x['blog'] =$row['tulisan_isi'];[m
 			$x['tanggal']=$row['tanggal'];[m
[36m@@ -67,8 +70,12 @@[m [mclass Blog extends CI_Controller{[m
 			$x['show_komentar']=$this->m_tulisan->show_komentar_by_tulisan_id($kode);[m
 			$x['category']=$this->db->get('tbl_kategori');[m
 			$x['populer']=$this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");[m
[32m+[m			[32m$x['setup']=$this->m_setup->get_setup()->row();[m
[32m+[m			[32m$nama_sekolah=$x['setup']->nama_sekolah;[m
 			//$this->load->view('depan/v_blog_detail',$x);[m
[31m-			$x['title']="Sekolah | Detail Blog";[m
[32m+[m			[32m//$x['title']="$nama_sekolah | Detail Blog";[m
[32m+[m			[32m$x['title']=$row['tulisan_judul'];[m
[32m+[m			[32m$x['gambar']=$row['tulisan_gambar'];[m
 			$this->template->load('template_depan', 'depan/v_blog_detail', $x);[m
 		}else{[m
 			redirect('artikel');[m
[36m@@ -82,12 +89,15 @@[m [mclass Blog extends CI_Controller{[m
 			 $x['data']=$query;[m
 			 $x['category']=$this->db->get('tbl_kategori');[m
  			 $x['populer']=$this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");[m
[32m+[m			[32m  $x['setup']=$this->m_setup->get_setup()->row();[m
[32m+[m			[32m  $nama_sekolah=$x['setup']->nama_sekolah;[m
 			 //$this->load->view('depan/v_blog',$x);[m
[31m-			 $x['title']="Sekolah | Blog (".$x['category']->kategori_nama .")";[m
[32m+[m			[32m $x['title']="$nama_sekolah | Blog (".$x['category']->row()->kategori_nama .")";[m
 			 $this->template->load('template_depan', 'depan/v_blog', $x);[m
 		 }else{[m
[31m-			 echo $this->session->set_flashdata('msg','<div class="alert alert-danger">Tidak Ada artikel untuk kategori <b>'.$kategori.'</b></div>');[m
[32m+[m			[32m echo $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible" ><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Tidak Ada artikel untuk kategori <b>'.$kategori.'</b></div>');[m
 			 redirect('artikel');[m
[32m+[m			[32m echo $this->session->set_flashdata();[m
 		 }[m
 	}[m
 [m
[36m@@ -98,39 +108,41 @@[m [mclass Blog extends CI_Controller{[m
 					$x['data']=$query;[m
 					$x['category']=$this->db->get('tbl_kategori');[m
   				$x['populer']=$this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");[m
[32m+[m				[32m  $x['setup']=$this->m_setup->get_setup()->row();[m
[32m+[m				[32m  $nama_sekolah=$x['setup']->nama_sekolah;[m
          // $this->load->view('depan/v_blog',$x);[m
[31m-		  $x['title']="Sekolah | Blog";[m
[32m+[m		[32m  $x['title']="$nama_sekolah | Blog";[m
 		  $this->template->load('template_depan', 'depan/v_blog', $x);[m
 	 		 }else{[m
[31m-				 echo $this->session->set_flashdata('msg','<div class="alert alert-danger">Tidak dapat menemukan artikel dengan kata kunci <b>'.$keyword.'</b></div>');[m
[32m+[m				[32m echo $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible">Tidak dapat menemukan artikel dengan kata kunci <b>'.$keyword.'</b></div>');[m
 				 redirect('artikel');[m
 			 }[m
