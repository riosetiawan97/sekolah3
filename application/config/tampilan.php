<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| Definisi semua pengaturan tampilan website (halaman publik).
|
| - 'tampilan_grup'  : pengaturan satu nilai (teks, warna, gambar, dll.), dikelola di
|                      Admin > Tampilan Website > Pengaturan. Disimpan di tabel tbl_pengaturan.
| - 'tampilan_item'  : daftar isi yang bisa ditambah/diubah/dihapus (statistik, program, dll.),
|                      dikelola di Admin > Tampilan Website. Disimpan di tabel tbl_konten_item.
|
| Nilai 'default' dipakai sampai admin mengubahnya.
| Tipe field: text, textarea, color, checkbox, image, file, judul (pemisah, bukan field).
| Data sekolah (nama, alamat, telepon, email, WhatsApp, Instagram, logo, visi, misi, about)
| tetap dikelola di menu Setup yang sudah ada.
*/

$config['tampilan_grup'] = array(

	'umum' => array(
		'label' => 'Umum & Warna',
		'fields' => array(
			'warna_utama' => array('label' => 'Warna utama (navy)', 'tipe' => 'color', 'default' => '#1a2e5a'),
			'warna_aksen' => array('label' => 'Warna aksen (emas)', 'tipe' => 'color', 'default' => '#e8a020'),
			'nama_baris1' => array('label' => 'Nama di logo, baris 1', 'tipe' => 'text', 'default' => 'SMP Islam'),
			'nama_baris2' => array('label' => 'Nama di logo, baris 2', 'tipe' => 'text', 'default' => 'AL-HADIRIYAH'),
			'meta_deskripsi' => array('label' => 'Deskripsi website (untuk Google)', 'tipe' => 'textarea', 'default' => 'SMP Islam Al-Hadiriyah adalah SMP Islam di Duren Sawit, Jakarta Timur.'),
		),
	),

	'header' => array(
		'label' => 'Header & Pengumuman',
		'fields' => array(
			'_h1' => array('label' => 'Bar informasi di atas menu', 'tipe' => 'judul'),
			'topbar_aktif' => array('label' => 'Tampilkan bar informasi (telepon, email, jam)', 'tipe' => 'checkbox', 'default' => '1'),
			'jam_operasional' => array('label' => 'Jam operasional', 'tipe' => 'text', 'default' => 'Senin - Sabtu: 07.00 - 15.00 WIB'),
			'tombol_daftar_teks' => array('label' => 'Teks tombol di menu', 'tipe' => 'text', 'default' => 'Daftar Sekarang'),
			'tombol_daftar_link' => array('label' => 'Link tombol di menu', 'tipe' => 'text', 'default' => 'pendaftaran', 'bantuan' => 'Alamat halaman (mis. pendaftaran) atau URL lengkap.'),
			'_h2' => array('label' => 'Pita pengumuman (paling atas)', 'tipe' => 'judul'),
			'pengumuman_aktif' => array('label' => 'Tampilkan pita pengumuman', 'tipe' => 'checkbox', 'default' => '0'),
			'pengumuman_teks' => array('label' => 'Teks pengumuman', 'tipe' => 'text', 'default' => '🎓 PPDB 2026/2027 telah dibuka!'),
			'pengumuman_link_teks' => array('label' => 'Teks link', 'tipe' => 'text', 'default' => 'Daftar sekarang →'),
			'pengumuman_link' => array('label' => 'Link', 'tipe' => 'text', 'default' => 'pendaftaran'),
		),
	),

	'hero' => array(
		'label' => 'Hero Beranda',
		'keterangan' => 'Foto latar hero diambil dari foto galeri yang dicentang "Slider" (menu Gallery > Photos). Tanpa foto, latar memakai warna utama.',
		'fields' => array(
			'hero_badge' => array('label' => 'Label kecil di atas judul', 'tipe' => 'text', 'default' => 'TAHUN AJARAN 2026/2027'),
			'hero_judul' => array('label' => 'Judul besar', 'tipe' => 'textarea', 'default' => 'Membentuk Generasi Berilmu, Beriman, dan Berakhlak Mulia'),
			'hero_deskripsi' => array('label' => 'Deskripsi', 'tipe' => 'textarea', 'default' => 'SMP Islam Al-Hadiriyah hadir sebagai lembaga pendidikan terpadu yang mengintegrasikan ilmu pengetahuan dengan nilai-nilai Islam untuk mencetak generasi unggul.'),
			'hero_tombol1_teks' => array('label' => 'Tombol 1: teks', 'tipe' => 'text', 'default' => 'Daftar PPDB 2026 →'),
			'hero_tombol1_link' => array('label' => 'Tombol 1: link', 'tipe' => 'text', 'default' => 'pendaftaran'),
			'hero_tombol2_teks' => array('label' => 'Tombol 2: teks', 'tipe' => 'text', 'default' => 'Pelajari Lebih Lanjut'),
			'hero_tombol2_link' => array('label' => 'Tombol 2: link', 'tipe' => 'text', 'default' => '#tentang', 'bantuan' => 'Awali dengan # untuk menggulir ke bagian di beranda (mis. #tentang, #program).'),
		),
	),

	'kepsek' => array(
		'label' => 'Kepala Sekolah',
		'keterangan' => 'Dipakai di bagian "Tentang Kami" beranda, halaman About Us, dan Visi & Misi. Teks sambutan lengkap di halaman About Us diatur di menu Setup > About.',
		'fields' => array(
			'kepsek_foto' => array('label' => 'Foto kepala sekolah', 'tipe' => 'image', 'default' => ''),
			'kepsek_nama' => array('label' => 'Nama / sebutan', 'tipe' => 'text', 'default' => 'Kepala Sekolah'),
			'kepsek_jabatan' => array('label' => 'Keterangan di bawah nama', 'tipe' => 'text', 'default' => 'SMP Islam Al-Hadiriyah'),
			'kepsek_badge_angka' => array('label' => 'Angka di kotak foto', 'tipe' => 'text', 'default' => '24+'),
			'kepsek_badge_teks' => array('label' => 'Teks di kotak foto', 'tipe' => 'text', 'default' => 'Tahun Pengalaman'),
			'_h1' => array('label' => 'Bagian "Tentang Kami" di beranda', 'tipe' => 'judul'),
			'tentang_label' => array('label' => 'Label kecil', 'tipe' => 'text', 'default' => 'Tentang Kami'),
			'tentang_judul' => array('label' => 'Judul', 'tipe' => 'textarea', 'default' => "Kepala Sekolah\nSMP Islam Al-Hadiriyah", 'bantuan' => 'Enter = pindah baris.'),
			'tentang_sambutan' => array('label' => 'Sambutan singkat', 'tipe' => 'textarea', 'default' => "Assalamu'alaikum Warahmatullahi Wabarakatuh. Puji syukur kehadirat Allah SWT atas segala limpahan rahmat dan karunia-Nya sehingga SMP Islam Al-Hadiriyah dapat terus berkembang dan memberikan pelayanan pendidikan terbaik.\n\nKami berkomitmen untuk mencetak generasi muda yang tidak hanya cerdas secara akademik, tetapi juga memiliki akhlak mulia dan kecintaan terhadap nilai-nilai Islam.", 'bantuan' => 'Pisahkan paragraf dengan baris kosong.'),
		),
	),

	'beranda' => array(
		'label' => 'Bagian Beranda',
		'keterangan' => 'Atur bagian mana yang tampil di beranda, beserta judulnya.',
		'fields' => array(
			'_h0' => array('label' => 'Statistik & Tentang', 'tipe' => 'judul'),
			'sec_statistik' => array('label' => 'Tampilkan bar statistik', 'tipe' => 'checkbox', 'default' => '1'),
			'sec_tentang' => array('label' => 'Tampilkan bagian Tentang Kami', 'tipe' => 'checkbox', 'default' => '1'),
			'_h1' => array('label' => 'Visi & Misi', 'tipe' => 'judul'),
			'sec_visimisi' => array('label' => 'Tampilkan', 'tipe' => 'checkbox', 'default' => '1'),
			'visimisi_label' => array('label' => 'Label kecil', 'tipe' => 'text', 'default' => 'Visi & Misi'),
			'visimisi_judul' => array('label' => 'Judul', 'tipe' => 'text', 'default' => 'Landasan Kami Bergerak'),
			'_h2' => array('label' => 'Program unggulan', 'tipe' => 'judul'),
			'sec_program' => array('label' => 'Tampilkan', 'tipe' => 'checkbox', 'default' => '1'),
			'program_label' => array('label' => 'Label kecil', 'tipe' => 'text', 'default' => 'Program Unggulan'),
			'program_judul' => array('label' => 'Judul', 'tipe' => 'text', 'default' => 'Keunggulan Kami'),
			'program_deskripsi' => array('label' => 'Deskripsi', 'tipe' => 'text', 'default' => 'Program-program dirancang untuk mengembangkan potensi terbaik setiap siswa.'),
			'_h3' => array('label' => 'Event', 'tipe' => 'judul'),
			'sec_event' => array('label' => 'Tampilkan', 'tipe' => 'checkbox', 'default' => '1'),
			'event_label' => array('label' => 'Label kecil', 'tipe' => 'text', 'default' => 'Event'),
			'event_judul' => array('label' => 'Judul', 'tipe' => 'text', 'default' => 'Agenda & Kegiatan Sekolah'),
			'event_deskripsi' => array('label' => 'Deskripsi', 'tipe' => 'text', 'default' => 'Kegiatan terbaru dan yang akan datang di sekolah kami.'),
			'_h4' => array('label' => 'FAQ', 'tipe' => 'judul'),
			'sec_faq' => array('label' => 'Tampilkan', 'tipe' => 'checkbox', 'default' => '1'),
			'faq_label' => array('label' => 'Label kecil', 'tipe' => 'text', 'default' => 'FAQ'),
			'faq_judul' => array('label' => 'Judul', 'tipe' => 'text', 'default' => 'Pertanyaan yang Sering Diajukan'),
			'faq_deskripsi' => array('label' => 'Deskripsi', 'tipe' => 'text', 'default' => 'Temukan jawaban seputar fasilitas, kurikulum, dan pendaftaran.'),
			'_h7' => array('label' => 'YouTube', 'tipe' => 'judul'),
			'sec_youtube' => array('label' => 'Tampilkan', 'tipe' => 'checkbox', 'default' => '1'),
			'youtube_label' => array('label' => 'Label kecil', 'tipe' => 'text', 'default' => 'Video'),
			'youtube_judul' => array('label' => 'Judul (kosongkan = "Youtube" + nama sekolah)', 'tipe' => 'text', 'default' => ''),
			'_h5' => array('label' => 'Berita', 'tipe' => 'judul'),
			'sec_berita' => array('label' => 'Tampilkan', 'tipe' => 'checkbox', 'default' => '1'),
			'berita_label' => array('label' => 'Label kecil', 'tipe' => 'text', 'default' => 'Berita & Kegiatan'),
			'berita_judul' => array('label' => 'Judul', 'tipe' => 'text', 'default' => 'Terkini dari Sekolah'),
			'_h6' => array('label' => 'Galeri', 'tipe' => 'judul'),
			'sec_galeri' => array('label' => 'Tampilkan', 'tipe' => 'checkbox', 'default' => '1'),
			'galeri_label' => array('label' => 'Label kecil', 'tipe' => 'text', 'default' => 'Galeri'),
			'galeri_judul' => array('label' => 'Judul', 'tipe' => 'text', 'default' => 'Momen Berkesan'),
		),
	),

	'halaman' => array(
		'label' => 'Judul Halaman',
		'keterangan' => 'Judul dan subjudul pada banner di atas setiap halaman.',
		'fields' => array(
			'hal_about_judul' => array('label' => 'About Us: judul', 'tipe' => 'text', 'default' => 'About Us'),
			'hal_about_sub' => array('label' => 'About Us: subjudul', 'tipe' => 'text', 'default' => 'Tentang SMP Islam Al-Hadiriyah'),
			'hal_visimisi_judul' => array('label' => 'Visi & Misi: judul', 'tipe' => 'text', 'default' => 'Visi & Misi'),
			'hal_visimisi_sub' => array('label' => 'Visi & Misi: subjudul', 'tipe' => 'text', 'default' => 'Landasan gerak SMP Islam Al-Hadiriyah'),
			'hal_blog_judul' => array('label' => 'Blog: judul', 'tipe' => 'text', 'default' => 'Blog & Berita'),
			'hal_blog_sub' => array('label' => 'Blog: subjudul', 'tipe' => 'text', 'default' => 'Informasi terkini dari SMP Islam Al-Hadiriyah'),
			'hal_faq_judul' => array('label' => 'FAQ: judul', 'tipe' => 'text', 'default' => 'FAQ'),
			'hal_faq_sub' => array('label' => 'FAQ: subjudul', 'tipe' => 'text', 'default' => 'Pertanyaan yang Sering Diajukan'),
			'hal_agenda_judul' => array('label' => 'Event: judul', 'tipe' => 'text', 'default' => 'Agenda & Event'),
			'hal_agenda_sub' => array('label' => 'Event: subjudul', 'tipe' => 'text', 'default' => 'Jadwal kegiatan terbaru sekolah'),
			'hal_galeri_judul' => array('label' => 'Galeri: judul', 'tipe' => 'text', 'default' => 'Galeri'),
			'hal_galeri_sub' => array('label' => 'Galeri: subjudul', 'tipe' => 'text', 'default' => 'Dokumentasi kegiatan SMP Islam Al-Hadiriyah'),
			'hal_kontak_judul' => array('label' => 'Kontak: judul', 'tipe' => 'text', 'default' => 'Hubungi Kami'),
			'hal_kontak_sub' => array('label' => 'Kontak: subjudul', 'tipe' => 'text', 'default' => 'Kami siap membantu Anda'),
			'hal_absen_judul' => array('label' => 'Absensi siswa: judul', 'tipe' => 'text', 'default' => 'Absensi Siswa'),
			'hal_absen_sub' => array('label' => 'Absensi siswa: subjudul', 'tipe' => 'text', 'default' => 'Sistem pencatatan kehadiran siswa online'),
			'hal_alur_judul' => array('label' => 'How To Apply: judul', 'tipe' => 'text', 'default' => 'How To Apply'),
			'hal_alur_sub' => array('label' => 'How To Apply: subjudul', 'tipe' => 'text', 'default' => 'Panduan lengkap mendaftar di SMP Islam Al-Hadiriyah'),
			'hal_daftar_judul' => array('label' => 'Admission: judul', 'tipe' => 'text', 'default' => 'Admission'),
			'hal_daftar_sub' => array('label' => 'Admission: subjudul', 'tipe' => 'text', 'default' => 'Formulir penerimaan siswa baru'),
		),
	),

	'ppdb' => array(
		'label' => 'PPDB',
		'keterangan' => 'Langkah pendaftaran diatur di menu PPDB > Alur Pendaftaran. Syarat, jadwal, dan info penting diatur di menu Tampilan Website.',
		'fields' => array(
			'ppdb_form_aktif' => array('label' => 'Formulir pendaftaran dibuka', 'tipe' => 'checkbox', 'default' => '1'),
			'ppdb_pesan_tutup' => array('label' => 'Pesan saat formulir ditutup', 'tipe' => 'textarea', 'default' => 'Pendaftaran saat ini belum dibuka. Silakan hubungi kami untuk informasi lebih lanjut.'),
			'ppdb_pesan_sukses' => array('label' => 'Pesan setelah berhasil mendaftar', 'tipe' => 'textarea', 'default' => 'Tim kami akan menghubungi Anda dalam 1-2 hari kerja.'),
			'ppdb_email_notif' => array('label' => 'Kirim email pemberitahuan ke', 'tipe' => 'text', 'default' => '', 'bantuan' => 'Email yang menerima pemberitahuan setiap ada pendaftar baru. Pisahkan dengan koma untuk lebih dari satu. Butuh pengaturan SMTP di server (lihat README).'),
			'_h1' => array('label' => 'Kotak ajakan di halaman How To Apply', 'tipe' => 'judul'),
			'ppdb_cta_label' => array('label' => 'Label kecil', 'tipe' => 'text', 'default' => 'Siap mendaftar?'),
			'ppdb_cta_judul' => array('label' => 'Judul', 'tipe' => 'text', 'default' => 'Daftarkan Putra-Putri Anda Sekarang'),
			'ppdb_cta_teks' => array('label' => 'Teks', 'tipe' => 'text', 'default' => 'Kuota terbatas — hubungi kami untuk info lebih lanjut'),
		),
	),

	'kontak' => array(
		'label' => 'Kontak & Footer',
		'keterangan' => 'Alamat, telepon, email, WhatsApp, Instagram, dan Facebook diatur di menu Setup > Data Setup.',
		'fields' => array(
			'peta_embed' => array('label' => 'Link embed Google Maps', 'tipe' => 'text', 'default' => '', 'bantuan' => 'Di Google Maps: Bagikan > Sematkan peta > salin URL di dalam src="...". Kosongkan jika tidak dipakai.'),
			'youtube_url' => array('label' => 'URL YouTube', 'tipe' => 'text', 'default' => ''),
			'tiktok_url' => array('label' => 'URL TikTok', 'tipe' => 'text', 'default' => ''),
			'_h1' => array('label' => 'Tombol mengambang (kanan layar)', 'tipe' => 'judul'),
			'tombol_mengambang' => array('label' => 'Tampilkan tombol Brosur, WhatsApp, Instagram', 'tipe' => 'checkbox', 'default' => '1'),
			'brosur_file' => array('label' => 'File brosur (PDF/gambar)', 'tipe' => 'file', 'default' => '', 'bantuan' => 'Jika kosong, tombol brosur membuka gambar brosur pertama dari menu Brochure.'),
			'_h2' => array('label' => 'Footer', 'tipe' => 'judul'),
			'footer_judul1' => array('label' => 'Judul kolom link 1', 'tipe' => 'text', 'default' => 'Main Menu', 'bantuan' => 'Isi link-nya di menu Tampilan Website > Link Footer.'),
			'footer_judul2' => array('label' => 'Judul kolom link 2', 'tipe' => 'text', 'default' => 'PPDB & Info'),
			'footer_judul3' => array('label' => 'Judul kolom kontak', 'tipe' => 'text', 'default' => 'Stay Connected'),
			'footer_deskripsi' => array('label' => 'Deskripsi singkat', 'tipe' => 'textarea', 'default' => 'Lembaga pendidikan Islam terpadu yang berkomitmen mencetak generasi unggul, berakhlak, dan berprestasi.'),
			'footer_copyright' => array('label' => 'Teks hak cipta', 'tipe' => 'text', 'default' => '© {tahun} SMP Islam Al-Hadiriyah. Hak cipta dilindungi.', 'bantuan' => '{tahun} diganti tahun berjalan.'),
			'footer_tagline' => array('label' => 'Teks kanan bawah', 'tipe' => 'text', 'default' => 'Dibuat dengan ❤️ untuk pendidikan Indonesia'),
		),
	),
);

/*
| Daftar isi (bisa ditambah/diubah/dihapus).
| 'kolom' = kolom tbl_konten_item yang dipakai dan labelnya di form admin.
*/
$config['tampilan_item'] = array(

	'statistik' => array(
		'label' => 'Statistik Beranda',
		'keterangan' => 'Angka di bar biru bawah hero. Isi angka dengan {jumlah_siswa} atau {jumlah_guru} agar terisi otomatis dari data Siswa / Guru di admin.',
		'kolom' => array('ikon' => 'Ikon (emoji)', 'nilai' => 'Angka', 'judul' => 'Keterangan'),
		'awal' => array(
			array('ikon' => '👨‍🎓', 'nilai' => '850+', 'judul' => 'Siswa Aktif'),
			array('ikon' => '👩‍🏫', 'nilai' => '45+', 'judul' => 'Tenaga Pendidik'),
			array('ikon' => '🏫', 'nilai' => '24', 'judul' => 'Tahun Berdiri'),
			array('ikon' => '🏆', 'nilai' => '98%', 'judul' => 'Tingkat Kelulusan'),
		),
	),

	'program' => array(
		'label' => 'Program Unggulan',
		'keterangan' => 'Kartu di bagian "Keunggulan Kami" beranda.',
		'kolom' => array('ikon' => 'Ikon (emoji)', 'judul' => 'Nama program', 'deskripsi' => 'Deskripsi'),
		'awal' => array(
			array('ikon' => '📖', 'judul' => "Tahfidz Al-Qur'an", 'deskripsi' => "Program hafalan Al-Qur'an terstruktur dengan bimbingan hafidz berpengalaman."),
			array('ikon' => '🔬', 'judul' => 'Sains & Teknologi', 'deskripsi' => 'Laboratorium modern untuk mendukung pembelajaran sains dan komputer.'),
			array('ikon' => '🎨', 'judul' => 'Seni & Budaya', 'deskripsi' => 'Pengembangan bakat seni, musik, dan kebudayaan nasional.'),
			array('ikon' => '⚽', 'judul' => 'Olahraga Prestasi', 'deskripsi' => 'Pembinaan atlet muda di berbagai cabang olahraga.'),
		),
	),

	'fakta' => array(
		'label' => 'Fakta Sekolah',
		'keterangan' => 'Kotak kecil di bawah kata sambutan halaman About Us.',
		'kolom' => array('ikon' => 'Ikon (emoji)', 'judul' => 'Label', 'nilai' => 'Isi', 'warna' => 'Warna'),
		'awal' => array(
			array('ikon' => '🏫', 'judul' => 'Berdiri Sejak', 'nilai' => 'Tahun 2000', 'warna' => '#1a2e5a'),
			array('ikon' => '🎓', 'judul' => 'Akreditasi', 'nilai' => 'A (Unggul)', 'warna' => '#e8a020'),
			array('ikon' => '👨‍🎓', 'judul' => 'Total Alumni', 'nilai' => '2.500+', 'warna' => '#22c55e'),
		),
	),

	'syarat' => array(
		'label' => 'Syarat Pendaftaran',
		'keterangan' => 'Daftar syarat di halaman How To Apply.',
		'kolom' => array('judul' => 'Syarat'),
		'awal' => array(
			array('judul' => 'Fotocopy Akta Kelahiran (2 lembar)'),
			array('judul' => 'Fotocopy Kartu Keluarga (2 lembar)'),
			array('judul' => 'Fotocopy Ijazah/SKL SD/MI (2 lembar)'),
			array('judul' => 'Pas Foto 3x4 (4 lembar, background merah)'),
			array('judul' => 'Surat Keterangan Sehat dari Dokter'),
			array('judul' => 'Fotocopy Rapor SD/MI (semester 1-5)'),
		),
	),

	'jadwal_ppdb' => array(
		'label' => 'Jadwal PPDB',
		'keterangan' => 'Kotak jadwal di samping halaman How To Apply.',
		'kolom' => array('judul' => 'Kegiatan', 'nilai' => 'Tanggal'),
		'awal' => array(
			array('judul' => 'Pendaftaran', 'nilai' => '1 Apr – 30 Jun 2026'),
			array('judul' => 'Seleksi Berkas', 'nilai' => '1-7 Jul 2026'),
			array('judul' => 'Tes Seleksi', 'nilai' => '10-12 Jul 2026'),
			array('judul' => 'Pengumuman', 'nilai' => '14 Jul 2026'),
		),
	),

	'info_ppdb' => array(
		'label' => 'Info Penting PPDB',
		'keterangan' => 'Kotak info di samping formulir halaman Admission.',
		'kolom' => array('judul' => 'Info'),
		'awal' => array(
			array('judul' => 'Kuota tersisa: 30 siswa'),
			array('judul' => 'Pendaftaran ditutup: 30 Jun 2026'),
			array('judul' => 'Pengumuman: 14 Jul 2026'),
			array('judul' => 'Biaya pendaftaran: Gratis'),
		),
	),
);

$config['tampilan_item']['menu'] = array(
	'label' => 'Menu Navigasi',
	'keterangan' => 'Menu di bagian atas website. Isi "Dropdown" dengan nama yang sama (mis. Tentang) untuk mengelompokkan beberapa menu menjadi satu dropdown. Link: alamat halaman (mis. artikel, contact) atau URL lengkap.',
	'kolom' => array('judul' => 'Label', 'nilai' => 'Link', 'deskripsi' => 'Dropdown (opsional)', 'ikon' => 'Ikon di dropdown (emoji)'),
	'tipe' => array('deskripsi' => 'text'),
	'awal' => array(
		array('judul' => 'Beranda', 'nilai' => '/'),
		array('judul' => 'About Us', 'nilai' => 'about', 'deskripsi' => 'Tentang', 'ikon' => '🏫'),
		array('judul' => 'Visi & Misi', 'nilai' => 'visi_misi', 'deskripsi' => 'Tentang', 'ikon' => '🎯'),
		array('judul' => 'Blog', 'nilai' => 'artikel'),
		array('judul' => 'FAQ', 'nilai' => 'faq'),
		array('judul' => 'Event', 'nilai' => 'agenda'),
		array('judul' => 'Galeri', 'nilai' => 'galeri'),
		array('judul' => 'Kontak', 'nilai' => 'contact'),
		array('judul' => 'Absensi Siswa', 'nilai' => 'siswa'),
		array('judul' => 'How To Apply', 'nilai' => 'alur_pendaftaran', 'deskripsi' => 'PPDB', 'ikon' => '📋'),
		array('judul' => 'Admission', 'nilai' => 'pendaftaran', 'deskripsi' => 'PPDB', 'ikon' => '🎓'),
	),
);

$config['tampilan_item']['footer_1'] = array(
	'label' => 'Link Footer Kolom 1',
	'keterangan' => 'Daftar link di kolom kedua footer. Judul kolom diatur di Pengaturan Tampilan > Kontak & Footer.',
	'kolom' => array('judul' => 'Label', 'nilai' => 'Link'),
	'awal' => array(
		array('judul' => 'Beranda', 'nilai' => '/'),
		array('judul' => 'About Us', 'nilai' => 'about'),
		array('judul' => 'Visi & Misi', 'nilai' => 'visi_misi'),
		array('judul' => 'Blog', 'nilai' => 'artikel'),
		array('judul' => 'FAQ', 'nilai' => 'faq'),
		array('judul' => 'Event', 'nilai' => 'agenda'),
	),
);

$config['tampilan_item']['footer_2'] = array(
	'label' => 'Link Footer Kolom 2',
	'keterangan' => 'Daftar link di kolom ketiga footer. Judul kolom diatur di Pengaturan Tampilan > Kontak & Footer.',
	'kolom' => array('judul' => 'Label', 'nilai' => 'Link'),
	'awal' => array(
		array('judul' => 'Galeri', 'nilai' => 'galeri'),
		array('judul' => 'Kontak', 'nilai' => 'contact'),
		array('judul' => 'How To Apply', 'nilai' => 'alur_pendaftaran'),
		array('judul' => 'Admission', 'nilai' => 'pendaftaran'),
		array('judul' => 'Pengumuman', 'nilai' => 'pengumuman'),
		array('judul' => 'Download', 'nilai' => 'download'),
	),
);

// Ikon & warna bawaan langkah pendaftaran (jika belum diisi di admin).
$config['tampilan_langkah_ikon'] = array('💻', '📄', '✅', '✏️', '🤝', '📢', '🎓', '📋');
$config['tampilan_palet'] = array('#e8a020', '#3b82f6', '#22c55e', '#8b5cf6', '#1a2e5a', '#e53e3e', '#0ea5e9', '#f97316');

// Gambar slider cadangan untuk beranda. Dipakai kalau foto Galeri yang dicentang "Slider"
// kurang dari 2, supaya gambar di halaman awal tetap bisa bergeser (carousel).
// Isinya disamakan dengan slider di website sekolah2. Begitu ada minimal 2 foto yang
// dicentang "Slider" di Admin > Galeri, daftar ini tidak dipakai lagi.
$config['tampilan_slider_cadangan'] = array(
	array('gambar' => '76a05d95e8275c7df4c052c9fd416d2f.jpg', 'judul' => '1'),
	array('gambar' => '0d2cb3542ae2bfe93620e6d69738e946.jpeg', 'judul' => 'Ramadhan'),
	array('gambar' => '9966095519889a101e34160d5e596af0.jpeg', 'judul' => 'UJIAN PRAKTEK KEWIRAUSAHAAN'),
	array('gambar' => '70a227e3d787b8a95bc624caef03c9df.jpeg', 'judul' => 'Seni Tari'),
	array('gambar' => '83fa2bd46adba608f5b0078085024099.jpeg', 'judul' => 'Hari Guru Nasional'),
	array('gambar' => '7e056c3c1879546bded732074322d704.JPG', 'judul' => 'Kelas XII Asisten Keperawatan'),
	array('gambar' => '30579323bb839d97012aa74febcc9716.jpg', 'judul' => 'UJI KOMPETENSI'),
	array('gambar' => '898d46975500d2d2d21b3205ac9758fc.jpeg', 'judul' => 'PRAKERIN'),
);

// Event contoh untuk beranda (khusus testing). Dipakai hanya kalau tabel agenda masih kosong,
// supaya bagian Event bisa dibandingkan dengan beranda sekolah2. Isinya disamakan dengan
// 3 event terbaru di sekolah2. Begitu ada agenda di Admin > Agenda, daftar ini tidak dipakai.
// Untuk mematikannya, kosongkan array ini.
$config['tampilan_event_cadangan'] = array(
	array('nama' => 'UJIAN SEKOLAH', 'mulai' => '2022-03-16', 'gambar' => 'e3bf0bfd856fa17b2a6bab70ce8aae1e.jpeg',
		'deskripsi' => 'Ujian Sekolah Kelas XII SMK Kesehatan Al-Hadiriyah dilaksanakan untuk mengukur pengetahuan yang didapatkan oleh siswa selama belajar di SMK Kesehatan Al-Hadiriyah'),
	array('nama' => 'UJI KOMPETENSI', 'mulai' => '2022-02-02', 'gambar' => 'f4080ce3fbaaafae75de5ffdd20f9c31.jpg',
		'deskripsi' => 'Uji kompetensi merupakan proses penilaian secara teknis dan non teknis melalui sistem penilaian otentik yang relevan untuk menentukan kompetensi perserta didik pada skema setifikasi tertentu.'),
	array('nama' => 'Penerimaan Raport Semester Ganjil Tahun Ajaran 2021-2022', 'mulai' => '2022-01-17', 'gambar' => '83250e1aae86db7a6731e63474dc27f2.jpg',
		'deskripsi' => 'Berakhirnya semester ganjil tahun pelajaran 2021-20227, ditandai dengan pembagian laporan hasil belajar.'),
);
