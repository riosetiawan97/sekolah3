<?php
/* Admin > Files: dokumen yang tampil di halaman Download. */
class Files extends Admin_crud{
	function __construct(){
		parent::__construct();
		$this->load->model('m_files');
		$this->load->helper('download');
	}
	protected function definisi(){
		return array(
			'judul' => 'File Download', 'satuan' => 'File', 'remah' => array('Data Sekolah', 'Files'),
			'tabel' => 'tbl_files', 'pk' => 'file_id', 'url' => 'admin/files', 'urut' => 'file_id DESC',
			'keterangan' => 'File di sini tampil di halaman Download website. Jenis file: PDF, Word, Excel, PowerPoint, ZIP (maks. 20 MB).',
			'aksi' => '<a href="'.base_url('download').'" target="_blank" rel="noopener" class="btn btn-sm btn-light">Lihat halaman ↗</a>',
			'kolom' => array(
				'file_judul' => array('label' => 'Judul', 'tipe' => 'text', 'wajib' => TRUE, 'maks' => 120),
				'file_deskripsi' => array('label' => 'Deskripsi', 'tipe' => 'textarea'),
				'file_oleh' => array('label' => 'Oleh', 'tipe' => 'text', 'maks' => 60),
				'file_data' => array('label' => 'File', 'tipe' => 'file', 'wajib' => TRUE),
				'file_download' => array('label' => 'Diunduh', 'tipe' => 'text', 'hanya_tampil' => TRUE),
			),
		);
	}

	function download(){
		$id=$this->uri->segment(4);
		$get_db=$this->m_files->get_file_byid($id);
		$q=$get_db->row_array();
		$file=$q['file_data'];
		$data = upload_read('files', $file);
		$name = $file;

		force_download($name, $data); 
		redirect('admin/files');
	}
	
}
