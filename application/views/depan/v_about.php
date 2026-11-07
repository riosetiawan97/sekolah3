<?php
$foto = t('kepsek_foto') !== '' ? gambar_url(t('kepsek_foto')) : gambar_url($setup->gambarabout);
$fakta = items('fakta');
$this->load->view('depan/_banner', array('judul' => t('hal_about_judul'), 'sub' => t('hal_about_sub'), 'remah' => array('Tentang' => base_url('about'), t('hal_about_judul') => NULL)));
?>
<div class="halaman dua-kolom">
	<?php $this->load->view('depan/_sisi_tentang', array('aktif' => 'about')); ?>
	<article class="panel">
		<div class="about-grid">
			<div>
				<div class="about-foto"><?php if ($foto): ?><img src="<?php echo html_escape($foto); ?>" alt="<?php echo te('kepsek_nama'); ?>"><?php else: ?><div class="ph" style="height:100%"><small>Foto Kepala Sekolah</small></div><?php endif; ?></div>
				<div class="about-nama"><b><?php echo te('kepsek_nama'); ?></b><span><?php echo te('kepsek_jabatan'); ?></span></div>
			</div>
			<div>
				<div class="judul-panel"><h2>Kata Sambutan</h2></div>
				<div class="konten"><?php echo $setup->about; ?></div>
				<?php if ($fakta): ?>
				<div class="fakta">
					<?php foreach ($fakta as $f): ?>
					<div style="--c:<?php echo html_escape($f->warna ?: '#1a2e5a'); ?>"><span aria-hidden="true"><?php echo html_escape($f->ikon); ?></span><div><small><?php echo html_escape($f->judul); ?></small><b><?php echo html_escape($f->nilai); ?></b></div></div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</article>
</div>
