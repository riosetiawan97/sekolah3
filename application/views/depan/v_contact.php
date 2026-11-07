<?php
$this->load->view('depan/_banner', array('judul' => t('hal_kontak_judul'), 'sub' => t('hal_kontak_sub'), 'remah' => array('Kontak' => NULL)));
$status = $this->session->flashdata('kontak');
$alamat = trim($setup->alamat);
$peta_link = $setup->gmaps ? $setup->gmaps : 'https://www.google.com/maps/search/?api=1&query='.rawurlencode($alamat);
?>
<div class="halaman" style="max-width:1100px">
	<div class="kontak-grid">
		<section class="panel">
			<div class="judul-panel"><h2>Kirim Pesan</h2></div>
			<?php if ($status === 'ok'): ?>
				<div class="sukses">
					<div class="sukses-ikon" aria-hidden="true">📬</div>
					<h3>Pesan Terkirim!</h3>
					<p>Terima kasih! Kami akan segera menghubungi Anda.</p>
					<a class="btn btn-navy btn-kecil" href="<?php echo base_url('contact'); ?>">Kirim Pesan Lagi</a>
				</div>
			<?php else: ?>
			<form class="tumpuk-form" action="<?php echo base_url('contact/kirim_pesan'); ?>" method="post" data-kirim>
				<?php if ($status === 'error'): ?><div class="pesan pesan-error" role="alert">Nama dan pesan wajib diisi.</div><?php endif; ?>
				<div style="position:absolute;left:-9999px" aria-hidden="true"><input type="text" name="website" tabindex="-1" autocomplete="off"></div>
				<div class="form-grid">
					<div class="field"><label for="c-nama">Nama <span class="wajib">*</span></label><input class="input" id="c-nama" name="xnama" maxlength="40" placeholder="Nama lengkap" required></div>
					<div class="field"><label for="c-email">Email</label><input class="input" id="c-email" type="email" name="xemail" maxlength="60" placeholder="email@contoh.com"></div>
				</div>
				<div class="field"><label for="c-hp">Nomor Telepon</label><input class="input" id="c-hp" type="tel" name="xphone" maxlength="20" placeholder="08xx-xxxx-xxxx"></div>
				<div class="field"><label for="c-pesan">Pesan <span class="wajib">*</span></label><textarea class="input" id="c-pesan" name="xmessage" rows="5" placeholder="Tulis pesan Anda di sini..." required></textarea></div>
				<button type="submit" class="btn btn-navy btn-blok">Kirim Pesan →</button>
			</form>
			<?php endif; ?>
		</section>
		<aside class="tumpuk" style="gap:16px">
			<?php if ($alamat): ?><div class="info-kartu"><div class="info-ikon" aria-hidden="true">📍</div><div><small>Alamat</small><div><?php echo html_escape($alamat); ?></div></div></div><?php endif; ?>
			<?php if ($setup->email): ?><div class="info-kartu"><div class="info-ikon" aria-hidden="true">✉️</div><div><small>Email</small><a href="mailto:<?php echo html_escape($setup->email); ?>"><?php echo html_escape($setup->email); ?></a></div></div><?php endif; ?>
			<?php if ($setup->telepon): ?><div class="info-kartu"><div class="info-ikon" aria-hidden="true">📞</div><div><small>Telepon</small><a href="tel:<?php echo html_escape(preg_replace('/[^\d+]/', '', $setup->telepon)); ?>"><?php echo html_escape($setup->telepon); ?></a></div></div><?php endif; ?>
			<?php if ($setup->whatsapp): ?><div class="info-kartu"><div class="info-ikon" aria-hidden="true">💬</div><div><small>WhatsApp</small><a href="<?php echo html_escape(wa_url($setup->whatsapp)); ?>" target="_blank" rel="noopener"><?php echo html_escape($setup->whatsapp); ?></a></div></div><?php endif; ?>
			<?php if (t('jam_operasional') !== ''): ?><div class="info-kartu"><div class="info-ikon" aria-hidden="true">🕐</div><div><small>Jam Operasional</small><div><?php echo te('jam_operasional'); ?></div></div></div><?php endif; ?>
			<div class="peta">
				<?php if (preg_match('#^https://(www\.)?google\.[a-z.]+/maps/embed#', t('peta_embed'))): ?>
					<iframe src="<?php echo te('peta_embed'); ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Peta lokasi sekolah"></iframe>
				<?php else: ?>
					<div class="ph" style="height:160px;flex-direction:column;gap:6px"><span aria-hidden="true" style="font-size:36px">🗺️</span><small>Peta Lokasi</small></div>
				<?php endif; ?>
				<a href="<?php echo html_escape($peta_link); ?>" target="_blank" rel="noopener">📍 Lihat di Google Maps</a>
			</div>
		</aside>
	</div>
</div>
