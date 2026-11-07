<?php
/* Beranda. Data: $setup, $slider, $berita, $galeri, $alur. */
$foto_kepsek = t('kepsek_foto') !== '' ? gambar_url(t('kepsek_foto')) : gambar_url($setup->gambarabout);
$statistik = items('statistik');
$program = items('program');
?>

<!-- Hero -->
<section class="hero" id="beranda" aria-label="Sambutan">
	<?php if ($slider->num_rows() > 0): ?>
		<?php foreach ($slider->result() as $i => $s): ?>
		<div class="hero-slide<?php echo $i === 0 ? ' aktif' : ''; ?>" style="background-image:url('<?php echo html_escape(gambar_url($s->galeri_gambar)); ?>')" role="img" aria-label="<?php echo html_escape($s->galeri_judul); ?>"></div>
		<?php endforeach; ?>
	<?php else: ?>
		<div class="hero-slide polos aktif"></div>
	<?php endif; ?>
	<div class="hero-isi">
		<div class="hero-teks">
			<?php if (t('hero_badge') !== ''): ?><div class="hero-badge"><?php echo te('hero_badge'); ?></div><?php endif; ?>
			<h1><?php echo nl2br(te('hero_judul')); ?></h1>
			<?php if (t('hero_deskripsi') !== ''): ?><p><?php echo te('hero_deskripsi'); ?></p><?php endif; ?>
			<div class="hero-tombol">
				<?php if (t('hero_tombol1_teks') !== ''): ?><a class="btn btn-emas" href="<?php echo html_escape(tautan(t('hero_tombol1_link'))); ?>"><?php echo te('hero_tombol1_teks'); ?></a><?php endif; ?>
				<?php if (t('hero_tombol2_teks') !== ''): ?><a class="btn btn-kaca" href="<?php echo html_escape(tautan(t('hero_tombol2_link'))); ?>"><?php echo te('hero_tombol2_teks'); ?></a><?php endif; ?>
			</div>
		</div>
	</div>
	<?php if ($slider->num_rows() > 1): ?>
	<div class="hero-titik">
		<?php foreach ($slider->result() as $i => $s): ?>
		<button type="button" class="<?php echo $i === 0 ? 'aktif' : ''; ?>" aria-label="Slide <?php echo $i + 1; ?>"></button>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
</section>

<?php if (t_on('sec_statistik') && $statistik): ?>
<!-- Statistik -->
<section class="statistik" aria-label="Statistik sekolah">
	<div class="statistik-grid" style="--kolom:<?php echo min(count($statistik), 6); ?>">
		<?php foreach ($statistik as $s): ?>
		<div class="stat">
			<?php if ($s->ikon): ?><div class="stat-ikon" aria-hidden="true"><?php echo html_escape($s->ikon); ?></div><?php endif; ?>
			<div class="stat-nilai"><?php echo html_escape(nilai_statistik($s->nilai)); ?></div>
			<div class="stat-label"><?php echo html_escape($s->judul); ?></div>
		</div>
		<?php endforeach; ?>
	</div>
</section>
<?php endif; ?>

<?php if (t_on('sec_tentang')): ?>
<!-- Tentang / Kepala sekolah -->
<section class="bagian" id="tentang">
	<div class="bagian-isi tentang-grid">
		<div class="foto-kepsek">
			<div class="foto-kepsek-bingkai">
				<?php if ($foto_kepsek): ?>
					<img src="<?php echo html_escape($foto_kepsek); ?>" alt="<?php echo te('kepsek_nama'); ?>" loading="lazy">
				<?php else: ?>
					<div class="ph" style="height:100%;flex-direction:column;gap:8px"><span aria-hidden="true">👨‍💼</span><small>Foto Kepala Sekolah</small></div>
				<?php endif; ?>
			</div>
			<?php if (t('kepsek_badge_angka') !== ''): ?>
			<div class="badge-foto"><b><?php echo te('kepsek_badge_angka'); ?></b><span><?php echo te('kepsek_badge_teks'); ?></span></div>
			<?php endif; ?>
		</div>
		<div class="isi-teks">
			<div class="kepsek-mini">
				<div class="foto"><?php if ($foto_kepsek): ?><img src="<?php echo html_escape($foto_kepsek); ?>" alt="" loading="lazy"><?php else: ?>👨‍💼<?php endif; ?></div>
				<div>
					<div class="label" style="margin-bottom:2px"><?php echo te('kepsek_nama'); ?></div>
					<div style="color:var(--navy);font-weight:800;font-size:15px"><?php echo te('kepsek_jabatan'); ?></div>
					<div style="color:var(--gold);font-size:13px;font-weight:600"><?php echo te('kepsek_badge_angka'); ?> <?php echo te('kepsek_badge_teks'); ?></div>
				</div>
			</div>
			<div class="label"><?php echo te('tentang_label'); ?></div>
			<h2 class="judul" style="font-size:38px;margin-bottom:16px"><?php echo nl2br(te('tentang_judul')); ?></h2>
			<div class="garis"></div>
			<?php echo paragraf(t('tentang_sambutan')); ?>
			<div class="tombol-baris">
				<a class="btn btn-navy btn-kecil" href="<?php echo base_url('about'); ?>">Selengkapnya →</a>
				<a class="btn btn-garis btn-kecil" href="<?php echo base_url('visi_misi'); ?>">Visi &amp; Misi</a>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if (t_on('sec_visimisi')): $misi = daftar_dari_html($setup->misi); ?>
<!-- Visi & Misi -->
<section class="bagian bagian-navy" id="visi-misi">
	<div class="bagian-isi">
		<div class="kepala">
			<div class="label"><?php echo te('visimisi_label'); ?></div>
			<h2 class="judul"><?php echo te('visimisi_judul'); ?></h2>
		</div>
		<div class="vm-grid">
			<div class="vm-kartu">
				<div class="vm-ikon" aria-hidden="true">🎯</div>
				<h3>Visi</h3>
				<p>“<?php echo html_escape(teks_polos($setup->visi)); ?>”</p>
			</div>
			<div class="vm-kartu">
				<div class="vm-ikon" aria-hidden="true">📋</div>
				<h3>Misi</h3>
				<ul>
					<?php foreach (array_slice($misi, 0, 6) as $m): ?><li><?php echo html_escape($m); ?></li><?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if (t_on('sec_program') && $program): ?>
<!-- Program unggulan -->
<section class="bagian bagian-abu" id="program">
	<div class="bagian-isi">
		<div class="kepala">
			<div class="label"><?php echo te('program_label'); ?></div>
			<h2 class="judul"><?php echo te('program_judul'); ?></h2>
			<?php if (t('program_deskripsi') !== ''): ?><p class="sub"><?php echo te('program_deskripsi'); ?></p><?php endif; ?>
		</div>
		<div class="grid-4">
			<?php foreach ($program as $p): ?>
			<div class="kartu angkat program">
				<div class="program-ikon" aria-hidden="true"><?php echo html_escape($p->ikon); ?></div>
				<h3><?php echo html_escape($p->judul); ?></h3>
				<p><?php echo html_escape($p->deskripsi); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if (t_on('sec_langkah') && count($alur) > 0): $langkah = array_slice($alur, 0, 4); ?>
<!-- Cara mendaftar -->
<section class="bagian" id="cara-daftar">
	<div class="bagian-isi">
		<div class="kepala">
			<div class="label"><?php echo te('langkah_label'); ?></div>
			<h2 class="judul"><?php echo te('langkah_judul'); ?></h2>
			<?php if (t('langkah_deskripsi') !== ''): ?><p class="sub"><?php echo te('langkah_deskripsi'); ?></p><?php endif; ?>
		</div>
		<div class="langkah-grid" style="--kolom:<?php echo count($langkah); ?>">
			<?php foreach ($langkah as $l): ?>
			<div class="langkah">
				<div class="langkah-bulat" aria-hidden="true"><?php echo html_escape($l->ikon_tampil); ?></div>
				<div class="langkah-no">LANGKAH <?php echo sprintf('%02d', $l->langkah); ?></div>
				<h3><?php echo html_escape($l->judul); ?></h3>
				<p><?php echo html_escape(teks_polos($l->deskripsi)); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
		<?php if (count($alur) > 4): ?>
		<div style="text-align:center;margin-top:40px"><a class="btn btn-garis btn-kecil" href="<?php echo base_url('alur_pendaftaran'); ?>">Lihat alur lengkap →</a></div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>

<?php if (t_on('sec_formulir')): ?>
<!-- Formulir pendaftaran -->
<section class="bagian bagian-navy" id="formulir">
	<div class="bagian-isi" style="max-width:900px">
		<div class="kepala" style="margin-bottom:44px">
			<div class="label"><?php echo te('formulir_label'); ?></div>
			<h2 class="judul"><?php echo te('formulir_judul'); ?></h2>
			<?php if (t('formulir_deskripsi') !== ''): ?><p class="sub"><?php echo te('formulir_deskripsi'); ?></p><?php endif; ?>
		</div>
		<div class="form-gelap">
			<?php $this->load->view('depan/_form_daftar', array('gelap' => TRUE, 'kembali' => 'beranda')); ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if (t_on('sec_berita') && $berita->num_rows() > 0): ?>
<!-- Berita -->
<section class="bagian bagian-abu" id="berita">
	<div class="bagian-isi">
		<div class="kepala-baris">
			<div>
				<div class="label"><?php echo te('berita_label'); ?></div>
				<h2 class="judul"><?php echo te('berita_judul'); ?></h2>
			</div>
			<a class="btn btn-garis btn-kecil" href="<?php echo base_url('artikel'); ?>">Lihat Semua →</a>
		</div>
		<div class="grid-3">
			<?php foreach ($berita->result() as $b): ?>
			<a class="kartu" href="<?php echo base_url('artikel/'.$b->tulisan_slug); ?>">
				<div class="berita-foto">
					<?php if ($b->tulisan_gambar): ?><img src="<?php echo html_escape(gambar_url($b->tulisan_gambar)); ?>" alt="" loading="lazy"><?php else: ?><div class="ph" style="height:100%"><small>Foto Kegiatan</small></div><?php endif; ?>
					<?php if ($b->tulisan_kategori_nama): ?><span class="chip" style="background:<?php echo warna_teks($b->tulisan_kategori_nama); ?>"><?php echo html_escape($b->tulisan_kategori_nama); ?></span><?php endif; ?>
				</div>
				<div class="berita-isi">
					<div class="meta"><?php echo tgl_indo($b->tulisan_tanggal); ?></div>
					<h3><?php echo html_escape($b->tulisan_judul); ?></h3>
					<p><?php echo ringkas($b->tulisan_isi, 120); ?></p>
					<span class="baca">Baca Selengkapnya →</span>
				</div>
			</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if (t_on('sec_galeri') && $galeri->num_rows() > 0): ?>
<!-- Galeri -->
<section class="bagian" id="galeri">
	<div class="bagian-isi">
		<div class="kepala">
			<div class="label"><?php echo te('galeri_label'); ?></div>
			<h2 class="judul"><?php echo te('galeri_judul'); ?></h2>
		</div>
		<div class="galeri-grid">
			<?php foreach ($galeri->result() as $g): ?>
			<button type="button" class="galeri-item" data-lightbox="<?php echo html_escape(gambar_url($g->galeri_gambar)); ?>" data-cap="<?php echo html_escape($g->galeri_judul); ?>">
				<img src="<?php echo html_escape(gambar_url($g->galeri_gambar)); ?>" alt="<?php echo html_escape($g->galeri_judul); ?>" loading="lazy">
				<span class="cap"><?php echo html_escape($g->galeri_judul); ?></span>
			</button>
			<?php endforeach; ?>
		</div>
		<div style="text-align:center;margin-top:36px"><a class="btn btn-garis btn-kecil" href="<?php echo base_url('galeri'); ?>">Lihat Semua Album →</a></div>
	</div>
</section>
<?php endif; ?>
