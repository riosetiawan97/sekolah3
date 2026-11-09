<?php
$this->load->view('depan/_banner', array('judul' => t('hal_galeri_judul'), 'sub' => t('hal_galeri_sub'), 'remah' => array('Galeri' => NULL)));
?>
<div class="halaman">
	<?php if ($album->num_rows() == 0): ?>
		<div class="panel kosong"><div aria-hidden="true">🖼️</div><h3>Belum ada album</h3></div>
	<?php endif; ?>
	<div class="grid-3">
		<?php foreach ($album->result() as $a): $cover = $a->album_cover ? $a->album_cover : $a->foto_lain; ?>
		<a class="kartu" href="<?php echo base_url('galeri/album/'.$a->album_id); ?>">
			<div class="album-foto">
				<?php if ($cover): ?><img src="<?php echo html_escape(gambar_url($cover)); ?>" alt="" loading="lazy"><?php else: ?><div class="ph" style="height:100%"><small><?php echo html_escape($a->album_nama); ?></small></div><?php endif; ?>
				<span class="album-jumlah">📷 <?php echo (int) $a->jumlah; ?></span>
			</div>
			<div class="album-isi">
				<h3><?php echo html_escape($a->album_nama); ?></h3>
				<small><?php echo tgl_indo($a->album_tanggal); ?></small>
				<?php if (teks_polos($a->album_deskripsi) !== ''): ?><p><?php echo ringkas($a->album_deskripsi, 110); ?></p><?php endif; ?>
			</div>
		</a>
		<?php endforeach; ?>
	</div>
</div>
