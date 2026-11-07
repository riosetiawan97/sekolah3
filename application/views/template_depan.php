<?php
/*
| Template halaman publik (desain SMP Islam Al-Hadiriyah).
| Variabel dari controller: $title, $setup, $contents, $halaman (menu aktif), $beranda (TRUE di beranda),
| $gambar (opsional, untuk og:image), $deskripsi (opsional).
*/
$halaman = isset($halaman) ? $halaman : '';
$beranda = ! empty($beranda);
$nama_sekolah = ! empty($setup->nama_sekolah) ? $setup->nama_sekolah : 'SMP Islam Al-Hadiriyah';
$deskripsi = ! empty($deskripsi) ? $deskripsi : t('meta_deskripsi');
$og_gambar = ! empty($gambar) ? gambar_url($gambar) : gambar_url($setup->logo);
$wa = wa_url($setup->whatsapp);
$ig = ig_url($setup->instagram);
$fb = fb_url($setup->facebook);
$yt = t('youtube_url');
$tt = t('tiktok_url');

// Tombol brosur: file dari pengaturan, kalau kosong gambar brosur pertama.
$brosur = t('brosur_file') !== '' ? file_url(t('brosur_file')) : '';
if ($brosur === '') {
	$CI =& get_instance();
	$b = $CI->db->query("SELECT brosur_gambar FROM tbl_brosur WHERE type='brosur' ORDER BY brosur_id LIMIT 1")->row();
	if ($b) $brosur = gambar_url($b->brosur_gambar);
}

$menu = array(
	array('label' => 'Beranda', 'url' => base_url(), 'kunci' => 'beranda'),
	array('label' => 'Tentang', 'kunci' => array('about', 'visimisi'), 'sub' => array(
		array('label' => 'About Us', 'url' => base_url('about'), 'ikon' => '🏫', 'kunci' => 'about'),
		array('label' => 'Visi & Misi', 'url' => base_url('visi_misi'), 'ikon' => '🎯', 'kunci' => 'visimisi'),
	)),
	array('label' => 'Blog', 'url' => base_url('artikel'), 'kunci' => 'blog'),
	array('label' => 'FAQ', 'url' => base_url('faq'), 'kunci' => 'faq'),
	array('label' => 'Event', 'url' => base_url('agenda'), 'kunci' => 'agenda'),
	array('label' => 'Galeri', 'url' => base_url('galeri'), 'kunci' => 'galeri'),
	array('label' => 'Kontak', 'url' => base_url('contact'), 'kunci' => 'kontak'),
	array('label' => 'Absensi Siswa', 'url' => base_url('siswa'), 'kunci' => 'absen'),
	array('label' => 'PPDB', 'kunci' => array('alur', 'daftar'), 'sub' => array(
		array('label' => 'How To Apply', 'url' => base_url('alur_pendaftaran'), 'ikon' => '📋', 'kunci' => 'alur'),
		array('label' => 'Admission', 'url' => base_url('pendaftaran'), 'ikon' => '🎓', 'kunci' => 'daftar'),
	)),
);
?><!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo html_escape($title); ?></title>
	<meta name="description" content="<?php echo html_escape($deskripsi); ?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo html_escape($title); ?>">
	<meta property="og:description" content="<?php echo html_escape($deskripsi); ?>">
	<meta property="og:url" content="<?php echo html_escape(current_url()); ?>">
	<meta property="og:site_name" content="<?php echo html_escape($nama_sekolah); ?>">
	<?php if ($og_gambar): ?><meta property="og:image" content="<?php echo html_escape($og_gambar); ?>"><?php endif; ?>
	<meta name="theme-color" content="<?php echo te('warna_utama'); ?>">
	<?php if ( ! empty($setup->logo)): ?><link rel="icon" href="<?php echo gambar_url($setup->logo); ?>"><?php endif; ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/depan/depan.css?v=1'); ?>">
	<style>:root{--navy:<?php echo te('warna_utama'); ?>;--gold:<?php echo te('warna_aksen'); ?>}</style>
</head>
<body>
<a class="sr-only" href="#isi">Langsung ke isi</a>

<?php if (t_on('pengumuman_aktif') && t('pengumuman_teks') !== ''): ?>
<div class="pita" role="region" aria-label="Pengumuman">
	<?php echo te('pengumuman_teks'); ?>&nbsp;
	<?php if (t('pengumuman_link_teks') !== ''): ?><a href="<?php echo html_escape(tautan(t('pengumuman_link'))); ?>"><?php echo te('pengumuman_link_teks'); ?></a><?php endif; ?>
	<button type="button" aria-label="Tutup pengumuman">×</button>
</div>
<?php endif; ?>

<header class="nav<?php echo $beranda ? ' nav-beranda' : ''; ?>">
	<?php if (t_on('topbar_aktif')): ?>
	<div class="topbar">
		<span>
			<?php if ($setup->telepon): ?><a href="tel:<?php echo html_escape(preg_replace('/[^\d+]/', '', $setup->telepon)); ?>">📞 <?php echo html_escape($setup->telepon); ?></a><?php endif; ?>
			<?php if ($setup->telepon && $setup->email): ?>&nbsp;|&nbsp;<?php endif; ?>
			<?php if ($setup->email): ?><a href="mailto:<?php echo html_escape($setup->email); ?>">✉️ <?php echo html_escape($setup->email); ?></a><?php endif; ?>
		</span>
		<span><?php echo te('jam_operasional'); ?></span>
	</div>
	<?php endif; ?>
	<div class="nav-baris">
		<a class="logo" href="<?php echo base_url(); ?>" aria-label="<?php echo html_escape($nama_sekolah); ?> - Beranda">
			<span class="logo-bulat"><?php if ( ! empty($setup->logo)): ?><img src="<?php echo gambar_url($setup->logo); ?>" alt=""><?php else: ?>🏫<?php endif; ?></span>
			<span class="logo-teks"><b><?php echo te('nama_baris1'); ?></b><span><?php echo te('nama_baris2'); ?></span></span>
		</a>
		<button class="hamburger" type="button" aria-label="Buka menu" aria-expanded="false" aria-controls="menu-utama"><span></span><span></span><span></span></button>
		<nav class="menu-wrap" id="menu-utama" aria-label="Menu utama">
			<ul class="menu">
				<?php foreach ($menu as $m): ?>
					<?php if (isset($m['sub'])): ?>
					<li class="punya-sub">
						<button type="button" class="menu-link<?php echo cek_aktif($m['kunci'], $halaman); ?>" aria-expanded="false" aria-haspopup="true"><?php echo $m['label']; ?> <?php echo ikon('panah'); ?></button>
						<ul class="dropdown">
							<?php foreach ($m['sub'] as $s): ?>
							<li><a href="<?php echo $s['url']; ?>" class="<?php echo trim(cek_aktif($s['kunci'], $halaman)); ?>"<?php echo $s['kunci'] === $halaman ? ' aria-current="page"' : ''; ?>><span aria-hidden="true"><?php echo $s['ikon']; ?></span><?php echo $s['label']; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</li>
					<?php else: ?>
					<li><a class="menu-link<?php echo cek_aktif($m['kunci'], $halaman); ?>" href="<?php echo $m['url']; ?>"<?php echo $m['kunci'] === $halaman ? ' aria-current="page"' : ''; ?>><?php echo $m['label']; ?></a></li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
			<?php if (t('tombol_daftar_teks') !== ''): ?>
			<a class="tombol-daftar" href="<?php echo html_escape(tautan(t('tombol_daftar_link'))); ?>"><?php echo te('tombol_daftar_teks'); ?></a>
			<?php endif; ?>
		</nav>
	</div>
</header>

<main id="isi"<?php echo $beranda ? '' : ' class="utama"'; ?>>
<?php echo $contents; ?>
</main>

<footer class="footer">
	<div class="footer-isi">
		<div class="footer-grid">
			<div>
				<a class="logo" href="<?php echo base_url(); ?>" style="margin-bottom:18px">
					<span class="logo-bulat" style="width:46px;height:46px"><?php if ( ! empty($setup->logo)): ?><img src="<?php echo gambar_url($setup->logo); ?>" alt=""><?php else: ?>🏫<?php endif; ?></span>
					<span class="logo-teks"><b style="font-size:14px"><?php echo te('nama_baris1'); ?></b><span style="font-size:12px"><?php echo te('nama_baris2'); ?></span></span>
				</a>
				<p><?php echo te('footer_deskripsi'); ?></p>
				<div class="sosial">
					<?php if ($fb): ?><a href="<?php echo html_escape($fb); ?>" target="_blank" rel="noopener" aria-label="Facebook"><?php echo ikon('facebook'); ?></a><?php endif; ?>
					<?php if ($ig): ?><a href="<?php echo html_escape($ig); ?>" target="_blank" rel="noopener" aria-label="Instagram"><?php echo ikon('instagram'); ?></a><?php endif; ?>
					<?php if ($yt): ?><a href="<?php echo html_escape($yt); ?>" target="_blank" rel="noopener" aria-label="YouTube"><?php echo ikon('youtube'); ?></a><?php endif; ?>
					<?php if ($tt): ?><a href="<?php echo html_escape($tt); ?>" target="_blank" rel="noopener" aria-label="TikTok"><?php echo ikon('tiktok'); ?></a><?php endif; ?>
					<?php if ($wa): ?><a href="<?php echo html_escape($wa); ?>" target="_blank" rel="noopener" aria-label="WhatsApp"><?php echo ikon('whatsapp'); ?></a><?php endif; ?>
				</div>
			</div>
			<div>
				<h4>Main Menu</h4>
				<ul>
					<li><a href="<?php echo base_url(); ?>">Beranda</a></li>
					<li><a href="<?php echo base_url('about'); ?>">About Us</a></li>
					<li><a href="<?php echo base_url('visi_misi'); ?>">Visi & Misi</a></li>
					<li><a href="<?php echo base_url('artikel'); ?>">Blog</a></li>
					<li><a href="<?php echo base_url('faq'); ?>">FAQ</a></li>
					<li><a href="<?php echo base_url('agenda'); ?>">Event</a></li>
				</ul>
			</div>
			<div>
				<h4>PPDB & Info</h4>
				<ul>
					<li><a href="<?php echo base_url('galeri'); ?>">Galeri</a></li>
					<li><a href="<?php echo base_url('contact'); ?>">Kontak</a></li>
					<li><a href="<?php echo base_url('alur_pendaftaran'); ?>">How To Apply</a></li>
					<li><a href="<?php echo base_url('pendaftaran'); ?>">Admission</a></li>
					<li><a href="<?php echo base_url('pengumuman'); ?>">Pengumuman</a></li>
					<li><a href="<?php echo base_url('download'); ?>">Download</a></li>
				</ul>
			</div>
			<div>
				<h4>Stay Connected</h4>
				<ul class="terhubung">
					<li><a href="<?php echo base_url('pendaftaran'); ?>"><i style="background:#e53e3e"><?php echo ikon('dokumen'); ?></i>Admission</a></li>
					<?php if ($wa): ?><li><a href="<?php echo html_escape($wa); ?>" target="_blank" rel="noopener"><i style="background:#25d366"><?php echo ikon('whatsapp'); ?></i>WhatsApp</a></li><?php endif; ?>
					<?php if ($ig): ?><li><a href="<?php echo html_escape($ig); ?>" target="_blank" rel="noopener"><i style="background:#e1306c"><?php echo ikon('instagram'); ?></i>Instagram</a></li><?php endif; ?>
					<?php if ($setup->telepon): ?><li>📞 <?php echo html_escape($setup->telepon); ?></li><?php endif; ?>
					<?php if ($setup->email): ?><li>✉️ <?php echo html_escape($setup->email); ?></li><?php endif; ?>
				</ul>
			</div>
		</div>
		<div class="footer-bawah">
			<div><?php echo html_escape(str_replace('{tahun}', date('Y'), t('footer_copyright'))); ?></div>
			<div><?php echo te('footer_tagline'); ?></div>
		</div>
	</div>
</footer>

<?php if (t_on('tombol_mengambang')): ?>
<div class="mengambang">
	<?php if ($brosur): ?><a href="<?php echo html_escape($brosur); ?>" target="_blank" rel="noopener" style="--c:#e53e3e" aria-label="Brosur"><span class="lbl">Brosur PDF</span><span class="ik"><?php echo ikon('dokumen'); ?></span></a><?php endif; ?>
	<?php if ($wa): ?><a href="<?php echo html_escape($wa); ?>" target="_blank" rel="noopener" style="--c:#25d366" aria-label="WhatsApp"><span class="lbl">WhatsApp</span><span class="ik"><?php echo ikon('whatsapp'); ?></span></a><?php endif; ?>
	<?php if ($ig): ?><a href="<?php echo html_escape($ig); ?>" target="_blank" rel="noopener" style="--c:#e1306c" aria-label="Instagram"><span class="lbl">Instagram</span><span class="ik"><?php echo ikon('instagram'); ?></span></a><?php endif; ?>
</div>
<?php endif; ?>

<div class="lightbox" role="dialog" aria-modal="true" aria-label="Foto">
	<button type="button" class="lb-tutup" aria-label="Tutup">×</button>
	<button type="button" class="lb-kiri" aria-label="Foto sebelumnya">‹</button>
	<img src="" alt="">
	<div class="cap"></div>
	<button type="button" class="lb-kanan" aria-label="Foto berikutnya">›</button>
</div>

<script src="<?php echo base_url('assets/depan/depan.js?v=1'); ?>"></script>
</body>
</html>
