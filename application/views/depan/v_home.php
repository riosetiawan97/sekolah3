<?php
/* Beranda. Data: $setup, $slider (array), $berita, $galeri, $agenda, $faq (array), $youtube (array). */
$foto_kepsek = t('kepsek_foto') !== '' ? gambar_url(t('kepsek_foto')) : gambar_url($setup->gambarabout);
$statistik = items('statistik');
$program = items('program');
?>

<!-- Hero -->
<section class="hero" id="beranda" aria-label="Sambutan">
	<div class="hero-trek">
	<?php if (count($slider) > 0): ?>
		<?php foreach ($slider as $i => $s): ?>
		<div class="hero-slide<?php echo $i === 0 ? ' aktif' : ''; ?>" style="background-image:url('<?php echo html_escape(gambar_url($s->galeri_gambar)); ?>')" role="img" aria-label="<?php echo html_escape($s->galeri_judul); ?>"></div>
		<?php endforeach; ?>
	<?php else: ?>
		<div class="hero-slide polos aktif"></div>
	<?php endif; ?>
	</div>
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
	<?php if (count($slider) > 1): ?>
	<button type="button" class="hero-panah kiri" aria-label="Gambar sebelumnya">&#8249;</button>
	<button type="button" class="hero-panah kanan" aria-label="Gambar berikutnya">&#8250;</button>
	<div class="hero-titik">
		<?php foreach ($slider as $i => $s): ?>
		<button type="button" class="<?php echo $i === 0 ? 'aktif' : ''; ?>" aria-label="Slide <?php echo $i + 1; ?>"></button>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
</section>

<?php /* Bar statistik (Siswa Aktif, Tenaga Pendidik, dst.) disembunyikan sementara. Hapus 'FALSE &&' untuk menampilkannya lagi. */ ?>
<?php if (FALSE && t_on('sec_statistik') && $statistik): ?>
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

<?php if (t_on('sec_event')): ?>
<!-- Event -->
<section class="bagian" id="event">
	<div class="bagian-isi" style="max-width:900px">
		<div class="kepala">
			<div class="label"><?php echo te('event_label'); ?></div>
			<h2 class="judul"><?php echo te('event_judul'); ?></h2>
			<?php if (t('event_deskripsi') !== ''): ?><p class="sub"><?php echo te('event_deskripsi'); ?></p><?php endif; ?>
		</div>
		<?php if ($agenda->num_rows() == 0): ?>
			<div class="panel kosong"><div aria-hidden="true">📅</div><h3>Belum ada event terbaru</h3></div>
		<?php endif; ?>
		<?php foreach ($agenda->result() as $ev): $kat = ! empty($ev->agenda_kategori) ? $ev->agenda_kategori : 'Agenda'; $c = warna_teks($kat); ?>
		<a class="kartu event" href="<?php echo base_url('agenda/'.$ev->agenda_id); ?>">
			<div class="event-ikon" style="--c:<?php echo $c; ?>"><?php if ($ev->agenda_gambar): ?><img src="<?php echo html_escape(gambar_url($ev->agenda_gambar)); ?>" alt="" loading="lazy"><?php else: ?><span aria-hidden="true">📅</span><?php endif; ?></div>
			<div style="flex:1;min-width:0">
				<div class="meta">
					<span class="chip-lembut" style="--c:<?php echo $c; ?>"><?php echo html_escape($kat); ?></span>
					<?php $tgl = rentang_tgl($ev->agenda_mulai, $ev->agenda_selesai); if ($tgl): ?><span>🗓️ <?php echo $tgl; ?></span><?php endif; ?>
					<?php if ($ev->agenda_tempat): ?><span>📍 <?php echo html_escape($ev->agenda_tempat); ?></span><?php endif; ?>
				</div>
				<h3><?php echo html_escape($ev->agenda_nama); ?></h3>
				<p><?php echo ringkas($ev->agenda_deskripsi, 140); ?></p>
			</div>
		</a>
		<?php endforeach; ?>
		<div style="text-align:center;margin-top:36px"><a class="btn btn-garis btn-kecil" href="<?php echo base_url('agenda'); ?>">Lihat Semua Event →</a></div>
	</div>
</section>
<?php endif; ?>

<?php if (t_on('sec_faq') && count($faq) > 0): ?>
<!-- FAQ -->
<section class="bagian bagian-navy" id="faq">
	<div class="bagian-isi">
		<div class="kepala">
			<div class="label"><?php echo te('faq_label'); ?></div>
			<h2 class="judul"><?php echo te('faq_judul'); ?></h2>
			<?php if (t('faq_deskripsi') !== ''): ?><p class="sub"><?php echo te('faq_deskripsi'); ?></p><?php endif; ?>
		</div>
		<div class="grid-3">
			<?php foreach ($faq as $f): ?>
			<a class="kartu faq-kartu" href="<?php echo base_url('faq/'.$f->faq_id); ?>">
				<div class="berita-foto">
					<?php if ($f->faq_gambar): ?><img src="<?php echo html_escape(gambar_url($f->faq_gambar)); ?>" alt="" loading="lazy"><?php else: ?><div class="ph" style="height:100%"><span aria-hidden="true">❓</span></div><?php endif; ?>
					<?php if ($f->items): ?><span class="chip" style="background:var(--gold)"><?php echo count($f->items); ?> pertanyaan</span><?php endif; ?>
				</div>
				<div class="berita-isi">
					<h3><?php echo html_escape($f->faq_judul); ?></h3>
					<?php if ($f->items): ?>
					<ul class="faq-daftar">
						<?php foreach (array_slice($f->items, 0, 3) as $q): ?><li><?php echo html_escape($q->pertanyaan); ?></li><?php endforeach; ?>
					</ul>
					<?php else: ?>
					<p><?php echo ringkas($f->faq_isi, 120); ?></p>
					<?php endif; ?>
					<span class="baca">Baca Selengkapnya →</span>
				</div>
			</a>
			<?php endforeach; ?>
		</div>
		<div style="text-align:center;margin-top:36px"><a class="btn btn-kaca btn-kecil" href="<?php echo base_url('faq'); ?>">Lihat Semua FAQ →</a></div>
	</div>
</section>
<?php endif; ?>

<?php
$video = array();
foreach ($youtube as $v) { $id = youtube_id($v->youtube_link); if ($id) { $v->vid = $id; $video[] = $v; } }
if (t_on('sec_youtube') && $video):
	$judul_yt = t('youtube_judul') !== '' ? t('youtube_judul') : 'Youtube '.$setup->nama_sekolah;
?>
<!-- YouTube -->
<section class="bagian" id="youtube">
	<div class="bagian-isi">
		<div class="kepala-baris">
			<div>
				<div class="label"><?php echo te('youtube_label'); ?></div>
				<h2 class="judul"><?php echo html_escape($judul_yt); ?></h2>
			</div>
			<?php if (t('youtube_url') !== ''): ?><a class="btn btn-garis btn-kecil" href="<?php echo html_escape(t('youtube_url')); ?>" target="_blank" rel="noopener">Kunjungi Channel →</a><?php endif; ?>
		</div>
		<div class="yt-carousel">
			<div class="yt-jendela">
				<div class="yt-trek">
					<?php foreach ($video as $v): ?>
					<div class="yt-item">
						<button type="button" class="yt-video" data-yt="<?php echo html_escape($v->vid); ?>" aria-label="Putar video: <?php echo html_escape($v->youtube_description); ?>">
							<img src="https://i.ytimg.com/vi/<?php echo html_escape($v->vid); ?>/hqdefault.jpg" alt="" loading="lazy">
							<span class="yt-play" aria-hidden="true"></span>
						</button>
						<a class="yt-judul" href="<?php echo html_escape($v->youtube_link); ?>" target="_blank" rel="noopener"><?php echo html_escape($v->youtube_description); ?></a>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<button type="button" class="yt-panah kiri" aria-label="Video sebelumnya">&#8249;</button>
			<button type="button" class="yt-panah kanan" aria-label="Video berikutnya">&#8250;</button>
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
