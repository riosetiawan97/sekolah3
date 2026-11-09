<?php
$this->load->view('depan/_banner', array('judul' => $album->album_nama, 'sub' => ringkas($album->album_deskripsi, 160) ? html_entity_decode(ringkas($album->album_deskripsi, 160), ENT_QUOTES, 'UTF-8') : '', 'remah' => array('Galeri' => base_url('galeri'), $album->album_nama => NULL)));
?>
<div class="halaman">
	<div class="baris-alat">
		<a class="kembali" href="<?php echo base_url('galeri'); ?>">← Kembali ke Galeri</a>
		<span>📷 <?php echo $data->num_rows(); ?> foto</span>
	</div>
	<?php if (teks_polos($album->album_deskripsi) !== '' && mb_strlen(teks_polos($album->album_deskripsi)) > 160): ?>
		<div class="panel konten" style="margin-bottom:24px;padding:28px"><?php echo $album->album_deskripsi; ?></div>
	<?php endif; ?>
	<?php if ($data->num_rows() == 0): ?>
		<div class="panel kosong"><div aria-hidden="true">📷</div><h3>Belum ada foto di album ini</h3></div>
	<?php endif; ?>
	<div class="foto-grid">
		<?php foreach ($data->result() as $g): ?>
		<button type="button" class="galeri-item" data-lightbox="<?php echo html_escape(gambar_url($g->galeri_gambar)); ?>" data-cap="<?php echo html_escape($g->galeri_judul); ?>">
			<img src="<?php echo html_escape(gambar_url($g->galeri_gambar)); ?>" alt="<?php echo html_escape($g->galeri_judul); ?>" loading="lazy">
		</button>
		<?php endforeach; ?>
	</div>
</div>
