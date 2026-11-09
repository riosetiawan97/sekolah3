<?php
/* Admin > Kelas. Daftar kelas juga dipakai sebagai pilihan di halaman Absensi Siswa. */
class Kelas extends Admin_crud{
	protected function definisi(){
		$guru = array('0' => '- Belum ada -');
		foreach ($this->db->order_by('guru_nama')->get('tbl_guru')->result() as $g) $guru[$g->guru_id] = $g->guru_nama;
		return array(
			'judul' => 'Data Kelas', 'satuan' => 'Kelas', 'remah' => array('Data Sekolah', 'Kelas'),
			'tabel' => 'tbl_kelas', 'pk' => 'kelas_id', 'url' => 'admin/kelas', 'urut' => 'kelas_nama ASC',
			'keterangan' => 'Nama kelas tampil sebagai pilihan di halaman Absensi Siswa. Contoh: VII-A, VIII-B.',
			'kolom' => array(
				'kelas_nama' => array('label' => 'Nama Kelas', 'tipe' => 'text', 'wajib' => TRUE, 'maks' => 10, 'contoh' => 'VII-A', 'bantuan' => 'Maksimal 10 karakter.'),
				'id_guru' => array('label' => 'Wali Kelas', 'tipe' => 'select', 'opsi' => $guru, 'bawaan' => '0'),
			),
		);
	}
}
