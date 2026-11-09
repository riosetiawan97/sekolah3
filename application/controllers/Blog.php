<?php
class Blog extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_pengunjung');
		$this->load->model('m_setup');
		$this->m_pengunjung->count_visitor();
	}

	// Daftar artikel. Dipakai juga oleh kategori() dan search().
	private function daftar($filter = array(), $base_url = 'blog/index', $judul_tambahan = '', $segmen = 3){
		$x['setup']=$this->m_setup->get_setup()->row();
		$terapkan = function () use ($filter) {
			if ( ! empty($filter['kategori'])) $this->db->where('tulisan_kategori_id', (int) $filter['kategori']);
			if ( ! empty($filter['cari'])) $this->db->like('tulisan_judul', $filter['cari']);
		};
		$terapkan();
		$total = $this->db->count_all_results('tbl_tulisan');
		$limit = 5;
		$offset = max(0, (int) $this->uri->segment($segmen));

		$this->load->library('pagination');
		$this->pagination->initialize(array(
			'base_url' => base_url($base_url),
			'total_rows' => $total,
			'per_page' => $limit,
			'uri_segment' => $segmen,
			'reuse_query_string' => TRUE,
			'full_tag_open' => '<nav class="paginasi" aria-label="Halaman"><ul>',
			'full_tag_close' => '</ul></nav>',
			'num_tag_open' => '<li>', 'num_tag_close' => '</li>',
			'cur_tag_open' => '<li><span class="kini" aria-current="page">', 'cur_tag_close' => '</span></li>',
			'next_tag_open' => '<li>', 'next_tag_close' => '</li>',
			'prev_tag_open' => '<li>', 'prev_tag_close' => '</li>',
			'first_tag_open' => '<li>', 'first_tag_close' => '</li>',
			'last_tag_open' => '<li>', 'last_tag_close' => '</li>',
			'first_link' => '«', 'last_link' => '»', 'next_link' => '›', 'prev_link' => '‹',
		));
		$x['page'] = $this->pagination->create_links();

		$terapkan();
		$x['data'] = $this->db->order_by('tulisan_id', 'DESC')->limit($limit, $offset)->get('tbl_tulisan');
		$x['filter'] = $filter;
		$x['total'] = $total;
		$x['category'] = $this->db->query("SELECT k.kategori_id, k.kategori_nama, COUNT(t.tulisan_id) AS jumlah FROM tbl_kategori k LEFT JOIN tbl_tulisan t ON t.tulisan_kategori_id = k.kategori_id GROUP BY k.kategori_id, k.kategori_nama ORDER BY k.kategori_nama");
		$x['populer'] = $this->db->order_by('tulisan_views', 'DESC')->limit(4)->get('tbl_tulisan');
		$x['title'] = t('hal_blog_judul').$judul_tambahan.' | '.$x['setup']->judul_website;
		$x['halaman'] = 'blog';
		$this->template->load('template_depan', 'depan/v_blog', $x);
	}

	function index(){
		$this->daftar();
	}

	function kategori(){
		$seg = urldecode((string) $this->uri->segment(3));
		if (ctype_digit($seg)) {
			$kat = $this->db->get_where('tbl_kategori', array('kategori_id' => (int) $seg))->row();
		} else {
			$kat = $this->db->get_where('tbl_kategori', array('kategori_nama' => str_replace('-', ' ', $seg)))->row();
		}
		if ( ! $kat) redirect('artikel');
		$this->daftar(array('kategori' => $kat->kategori_id, 'kategori_nama' => $kat->kategori_nama), 'blog/kategori/'.$kat->kategori_id, ' ('.$kat->kategori_nama.')', 4);
	}

	function search(){
		$keyword = trim((string) $this->input->get('keyword', TRUE));
		if ($keyword === '') redirect('artikel');
		$this->daftar(array('cari' => $keyword), 'blog/search', ' (Pencarian)', 3);
	}

	function detail($slugs){
		$query = $this->db->get_where('tbl_tulisan', array('tulisan_slug' => $slugs));
		if ($query->num_rows() == 0) {
			redirect('artikel');
		}
		$row = $query->row_array();
		$kode = (int) $row['tulisan_id'];
		$this->db->set('tulisan_views', 'tulisan_views+1', FALSE)->where('tulisan_id', $kode)->update('tbl_tulisan');
		$x['setup'] = $this->m_setup->get_setup()->row();
		$x['post'] = (object) $row;
		$x['komentar'] = $this->db->order_by('komentar_id', 'ASC')->get_where('tbl_komentar', array('komentar_tulisan_id' => $kode, 'komentar_status' => '1'))->result();
		$x['terkait'] = $this->db->where('tulisan_id !=', $kode)->order_by('tulisan_id', 'DESC')->limit(4)->get('tbl_tulisan');
		$x['title'] = $row['tulisan_judul'].' | '.$x['setup']->judul_website;
		$x['gambar'] = $row['tulisan_gambar'];
		$x['deskripsi'] = html_entity_decode(strip_tags(ringkas($row['tulisan_isi'], 160)), ENT_QUOTES, 'UTF-8');
		$x['halaman'] = 'blog';
		$this->template->load('template_depan', 'depan/v_blog_detail', $x);
	}

	function komentar(){
		$kode = (int) $this->input->post('id', TRUE);
		$row = $this->db->get_where('tbl_tulisan', array('tulisan_id' => $kode))->row();
		if ( ! $row) redirect('artikel');
		$nama = trim((string) $this->input->post('nama', TRUE));
		$email = trim((string) $this->input->post('email', TRUE));
		$isi = trim((string) $this->input->post('komentar', TRUE));
		if ($nama === '' || $isi === '' || ! filter_var($email, FILTER_VALIDATE_EMAIL) || $this->input->post('website') != '') {
			$this->session->set_flashdata('komentar', 'error');
		} else {
			$this->db->insert('tbl_komentar', array(
				'komentar_nama' => mb_substr(htmlspecialchars($nama, ENT_QUOTES), 0, 30),
				'komentar_email' => mb_substr($email, 0, 50),
				'komentar_isi' => mb_substr(htmlspecialchars($isi, ENT_QUOTES), 0, 120),
				'komentar_status' => '0',
				'komentar_tulisan_id' => $kode,
			));
			$this->session->set_flashdata('komentar', 'ok');
		}
		redirect('artikel/'.$row->tulisan_slug.'#komentar');
	}
}
