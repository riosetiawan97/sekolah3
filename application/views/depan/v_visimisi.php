<?php
$foto = $setup->gambarvisimisi ? gambar_url($setup->gambarvisimisi) : (t('kepsek_foto') !== '' ? gambar_url(t('kepsek_foto')) : '');
$misi = daftar_dari_html($setup->misi);
$this->load->view('depan/_banner', array('judul' => t('hal_visimisi_judul'), 'sub' => t('hal_visimisi_sub'), 'remah' => array('Tentang' => base_url('about'), t('hal_visimisi_judul') => NULL)));
?>
<div class="halaman dua-kolom">
	<?php $this->load->view('depan/_sisi_tentang', array('aktif' => 'visimisi')); ?>
	<div class="tumpuk" style="gap:24px">
		<section class="panel">
			<div class="visi-grid">
				<div class="about-foto"><?php if ($foto): ?><img src="<?php echo html_escape($foto); ?>" alt=""><?php else: ?><div class="ph" style="height:100%"><small>Foto Sekolah</small></div><?php endif; ?></div>
				<div>
					<div class="pil pil-emas"><span aria-hidden="true">🎯</span> VISI SEKOLAH</div>
					<blockquote class="kutipan">“<?php echo html_escape(teks_polos($setup->visi)); ?>”</blockquote>
				</div>
			</div>
		</section>
		<section class="panel">
			<div class="pil pil-navy" style="margin-bottom:24px"><span aria-hidden="true">📋</span> MISI SEKOLAH</div>
			<ol class="misi">
				<?php foreach ($misi as $m): ?><li><?php echo html_escape($m); ?></li><?php endforeach; ?>
			</ol>
		</section>
	</div>
</div>
