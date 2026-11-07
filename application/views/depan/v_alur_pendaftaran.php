<?php
$this->load->view('depan/_banner', array('judul' => t('hal_alur_judul'), 'sub' => t('hal_alur_sub'), 'remah' => array('PPDB' => base_url('alur_pendaftaran'), t('hal_alur_judul') => NULL)));
$jadwal = items('jadwal_ppdb');
$syarat = items('syarat');
?>
<div class="halaman dua-kolom">
	<div class="tumpuk" style="gap:16px">
		<?php $this->load->view('depan/_sisi_ppdb', array('aktif' => 'alur')); ?>
		<?php if ($jadwal): ?>
		<div class="kotak-navy">
			<h4>📅 Jadwal PPDB</h4>
			<div class="jadwal"><?php foreach ($jadwal as $j): ?><div><small><?php echo html_escape($j->judul); ?></small><b><?php echo html_escape($j->nilai); ?></b></div><?php endforeach; ?></div>
		</div>
		<?php endif; ?>
	</div>
	<div class="tumpuk" style="gap:24px">
		<?php if ($alur): ?>
		<section class="panel" style="padding:36px">
			<div class="judul-panel" style="margin-bottom:28px"><h2>Alur Pendaftaran</h2></div>
			<div class="alur-grid">
				<?php foreach ($alur as $s): ?>
				<div class="alur" style="--c:<?php echo html_escape($s->warna_tampil); ?>">
					<div class="alur-bulat" aria-hidden="true"><?php echo html_escape($s->ikon_tampil); ?></div>
					<small>LANGKAH <?php echo sprintf('%02d', $s->langkah); ?></small>
					<b><?php echo html_escape($s->judul); ?></b>
					<p><?php echo html_escape(teks_polos($s->deskripsi)); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
			<?php if ($setup->alurpendaftaran): ?>
			<div class="gambar-alur"><img src="<?php echo html_escape(gambar_url($setup->alurpendaftaran)); ?>" alt="Bagan alur pendaftaran" loading="lazy"></div>
			<?php endif; ?>
		</section>
		<?php endif; ?>
		<?php if ($syarat): ?>
		<section class="panel" style="padding:36px">
			<div class="judul-panel" style="margin-bottom:20px"><h2>Syarat Pendaftaran</h2></div>
			<ul class="syarat"><?php foreach ($syarat as $r): ?><li><?php echo html_escape($r->judul); ?></li><?php endforeach; ?></ul>
		</section>
		<?php endif; ?>
		<div class="ajakan">
			<div><small><?php echo te('ppdb_cta_label'); ?></small><b><?php echo te('ppdb_cta_judul'); ?></b><span><?php echo te('ppdb_cta_teks'); ?></span></div>
			<a class="btn btn-emas" href="<?php echo base_url('pendaftaran'); ?>" style="flex-shrink:0;font-size:15px;padding:13px 28px">Daftar Sekarang →</a>
		</div>
	</div>
</div>
