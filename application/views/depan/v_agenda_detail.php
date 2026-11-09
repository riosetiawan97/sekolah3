<?php
$kat = $agenda->agenda_kategori ? $agenda->agenda_kategori : 'Agenda';
$this->load->view('depan/_banner', array('judul' => $agenda->agenda_nama, 'remah' => array('Event' => base_url('agenda'), 'Detail' => NULL)));
?>
<div class="halaman dua-kolom-kanan">
	<article class="panel">
		<div class="meta" style="margin-bottom:20px"><span class="chip-lembut" style="--c:<?php echo warna_teks($kat); ?>"><?php echo html_escape($kat); ?></span></div>
		<table class="tabel-info">
			<?php $tgl = rentang_tgl($agenda->agenda_mulai, $agenda->agenda_selesai); if ($tgl): ?><tr><th scope="row">Tanggal</th><td><?php echo $tgl; ?></td></tr><?php endif; ?>
			<?php if ($agenda->agenda_waktu): ?><tr><th scope="row">Waktu</th><td><?php echo html_escape($agenda->agenda_waktu); ?></td></tr><?php endif; ?>
			<?php if ($agenda->agenda_tempat): ?><tr><th scope="row">Tempat</th><td><?php echo html_escape($agenda->agenda_tempat); ?></td></tr><?php endif; ?>
			<?php if ($agenda->agenda_keterangan): ?><tr><th scope="row">Keterangan</th><td><?php echo html_escape($agenda->agenda_keterangan); ?></td></tr><?php endif; ?>
		</table>
		<?php if ($agenda->agenda_gambar): ?><div class="detail-gambar"><img src="<?php echo html_escape(gambar_url($agenda->agenda_gambar)); ?>" alt=""></div><?php endif; ?>
		<div class="konten"><?php echo $agenda->agenda_deskripsi; ?></div>
		<div style="margin-top:28px"><a class="kembali" href="<?php echo base_url('agenda'); ?>">← Semua Event</a></div>
	</article>
	<aside>
		<?php if ($lainnya->num_rows()): ?>
		<div class="sisi">
			<div class="sisi-kepala">Event Lainnya</div>
			<ul class="sisi-menu">
				<?php foreach ($lainnya->result() as $l): ?>
				<li><a href="<?php echo base_url('agenda/'.$l->agenda_id); ?>"><span><?php echo html_escape($l->agenda_nama); ?><br><small style="color:var(--gray)"><?php echo rentang_tgl($l->agenda_mulai, $l->agenda_selesai); ?></small></span></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php endif; ?>
	</aside>
</div>
