<?php
$this->load->view('depan/_banner', array('judul' => t('hal_faq_judul'), 'sub' => t('hal_faq_sub'), 'remah' => array('FAQ' => NULL)));
?>
<div class="halaman dua-kolom">
	<?php if ( ! $kategori): ?>
		<div></div><div class="panel kosong"><div aria-hidden="true">❓</div><h3>Belum ada FAQ</h3></div>
	<?php else: ?>
	<aside class="tumpuk" style="gap:16px">
		<div class="sisi">
			<div class="sisi-kepala">FAQ</div>
			<ul class="sisi-menu">
				<?php foreach ($kategori as $k): ?>
				<li><a href="<?php echo base_url('faq/'.$k->faq_id); ?>" data-tab="faq-<?php echo $k->faq_id; ?>" class="<?php echo $k->faq_id == $aktif ? 'aktif' : ''; ?>"><span><?php echo html_escape($k->faq_judul); ?></span><?php if ($k->items): ?><span class="hitung"><?php echo count($k->items); ?></span><?php endif; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</aside>
	<div>
		<?php foreach ($kategori as $k): ?>
		<section class="panel tab-isi" id="faq-<?php echo $k->faq_id; ?>"<?php echo $k->faq_id == $aktif ? '' : ' hidden'; ?>>
			<div class="judul-panel"><h2><?php echo html_escape($k->faq_judul); ?></h2></div>
			<?php if ($k->faq_gambar): ?><div class="faq-gambar" style="margin-bottom:24px"><img src="<?php echo html_escape(gambar_url($k->faq_gambar)); ?>" alt="" loading="lazy"></div><?php endif; ?>
			<?php if ($k->items): ?>
			<div class="akordeon">
				<?php foreach ($k->items as $i => $q): ?>
				<div class="akor<?php echo $i === 0 ? ' buka' : ''; ?>">
					<button type="button" aria-expanded="<?php echo $i === 0 ? 'true' : 'false'; ?>"><span><?php echo html_escape($q->pertanyaan); ?></span><i aria-hidden="true">+</i></button>
					<div class="akor-isi konten"><?php echo $q->jawaban; ?></div>
				</div>
				<?php endforeach; ?>
			</div>
			<?php else: ?>
			<div class="konten"><?php echo $k->faq_isi; ?></div>
			<?php endif; ?>
		</section>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
</div>
