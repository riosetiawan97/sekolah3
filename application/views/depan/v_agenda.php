<?php
$this->load->view('depan/_banner', array('judul' => t('hal_agenda_judul'), 'sub' => t('hal_agenda_sub'), 'remah' => array('Event' => NULL)));
?>
<div class="halaman" style="max-width:900px">
	<?php if ($data->num_rows() == 0): ?>
		<div class="panel kosong"><div aria-hidden="true">📅</div><h3>Belum ada event terbaru</h3><p>Pantau terus halaman ini untuk informasi kegiatan terbaru.</p></div>
	<?php endif; ?>
	<?php foreach ($data->result() as $ev): $kat = $ev->agenda_kategori ? $ev->agenda_kategori : 'Agenda'; $c = warna_teks($kat); ?>
	<a class="kartu event" href="<?php echo base_url('agenda/'.$ev->agenda_id); ?>">
		<div class="event-ikon" style="--c:<?php echo $c; ?>"><?php if ($ev->agenda_gambar): ?><img src="<?php echo html_escape(gambar_url($ev->agenda_gambar)); ?>" alt="" loading="lazy"><?php else: ?><span aria-hidden="true">📅</span><?php endif; ?></div>
		<div style="flex:1;min-width:0">
			<div class="meta">
				<span class="chip-lembut" style="--c:<?php echo $c; ?>"><?php echo html_escape($kat); ?></span>
				<?php $tgl = rentang_tgl($ev->agenda_mulai, $ev->agenda_selesai); if ($tgl): ?><span>🗓️ <?php echo $tgl; ?></span><?php endif; ?>
				<?php if ($ev->agenda_tempat): ?><span>📍 <?php echo html_escape($ev->agenda_tempat); ?></span><?php endif; ?>
			</div>
			<h3><?php echo html_escape($ev->agenda_nama); ?></h3>
			<p><?php echo ringkas($ev->agenda_deskripsi, 180); ?></p>
		</div>
	</a>
	<?php endforeach; ?>
	<?php echo $page; ?>
</div>
