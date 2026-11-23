<?php
// Halaman login admin, gaya disamakan dengan halaman publik.
$nama_sekolah = ! empty($setup->nama_sekolah) ? $setup->nama_sekolah : 'Sekolah';
?><!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex">
	<title><?php echo html_escape($title); ?></title>
	<?php if ( ! empty($setup->logo)): ?><link rel="icon" href="<?php echo gambar_url($setup->logo); ?>"><?php endif; ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/tema-admin.css?v=1'); ?>">
	<style>:root{--navy:<?php echo te('warna_utama'); ?>;--gold:<?php echo te('warna_aksen'); ?>}*{box-sizing:border-box}body{margin:0}</style>
</head>
<body>
<main class="masuk">
	<section class="masuk-kiri">
		<div class="masuk-merek">
			<?php if ( ! empty($setup->logo)): ?><img src="<?php echo gambar_url($setup->logo); ?>" alt=""><?php endif; ?>
			<div><b><?php echo html_escape($nama_sekolah); ?></b><small>Panel Admin</small></div>
		</div>
		<div class="masuk-teks">
			<h1>Kelola website <span>sekolah</span> dengan mudah</h1>
			<p>Atur berita, agenda, galeri, PPDB, dan tampilan website dari satu tempat.</p>
		</div>
		<div></div>
	</section>
	<section class="masuk-kanan">
		<form class="masuk-kotak" action="<?php echo site_url('admin/login/auth'); ?>" method="post">
			<h2>Masuk</h2>
			<p class="sub">Silakan masuk dengan akun admin Anda.</p>
			<div class="masuk-pesan" role="alert"><?php echo html_escape(strip_tags((string) $this->session->flashdata('msg'))); ?></div>
			<label for="username">Username</label>
			<input id="username" type="text" name="username" autocomplete="username" required autofocus>
			<label for="password">Password</label>
			<input id="password" type="password" name="password" autocomplete="current-password" required>
			<button type="submit">Masuk →</button>
			<a class="masuk-kembali" href="<?php echo base_url(); ?>">← Kembali ke website</a>
		</form>
	</section>
</main>
</body>
</html>
