<?php
/*
| Formulir pendaftaran PPDB (dipakai di beranda dan halaman Admission).
| Variabel: $gelap (TRUE = gaya di latar navy), $kembali ('beranda' / 'pendaftaran').
*/
$CI =& get_instance();
$sukses = $CI->session->flashdata('daftar_sukses');
$error = $CI->session->flashdata('daftar_error');
$lama = (array) $CI->session->flashdata('daftar_lama');
$v = function ($k) use ($lama) { return isset($lama[$k]) ? html_escape($lama[$k]) : ''; };
?>
<?php if ($sukses): ?>
	<div class="sukses">
		<div class="sukses-ikon" aria-hidden="true">🎉</div>
		<h3>Pendaftaran Diterima!</h3>
		<p>Terima kasih, <strong><?php echo html_escape($sukses); ?></strong>. <?php echo te('ppdb_pesan_sukses'); ?></p>
		<a class="btn <?php echo $gelap ? 'btn-emas' : 'btn-navy'; ?> btn-kecil" href="<?php echo $kembali === 'beranda' ? base_url('?form=1#formulir') : base_url('pendaftaran'); ?>">Daftar Lagi</a>
	</div>
<?php elseif ( ! t_on('ppdb_form_aktif')): ?>
	<div class="sukses">
		<div class="sukses-ikon" aria-hidden="true">📌</div>
		<p><?php echo nl2br(te('ppdb_pesan_tutup')); ?></p>
		<?php if ( ! empty($CI->m_setup)): $s = $CI->m_setup->get_setup()->row(); if ($s && preg_match('#^https?://#', (string) $s->formpendaftaran)): ?>
		<a class="btn <?php echo $gelap ? 'btn-emas' : 'btn-navy'; ?> btn-kecil" href="<?php echo html_escape($s->formpendaftaran); ?>" target="_blank" rel="noopener">Buka formulir online</a>
		<?php endif; endif; ?>
	</div>
<?php else: ?>
	<form action="<?php echo base_url('pendaftaran/simpan'); ?>" method="post" data-kirim>
		<?php if ($error): ?><div class="pesan pesan-error" role="alert"><?php echo html_escape($error); ?></div><?php endif; ?>
		<input type="hidden" name="kembali" value="<?php echo $kembali; ?>">
		<div style="position:absolute;left:-9999px" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
		<div class="form-grid">
			<div class="field">
				<label for="f-nama-<?php echo $kembali; ?>">Nama Lengkap Siswa <span class="wajib">*</span></label>
				<input class="input" id="f-nama-<?php echo $kembali; ?>" name="nama" type="text" maxlength="100" placeholder="Masukkan nama lengkap" value="<?php echo $v('nama'); ?>" required>
			</div>
			<div class="field">
				<label for="f-asal-<?php echo $kembali; ?>">Asal Sekolah (SD/MI) <span class="wajib">*</span></label>
				<input class="input" id="f-asal-<?php echo $kembali; ?>" name="asal_sekolah" type="text" maxlength="150" placeholder="Nama SD/MI asal" value="<?php echo $v('asal_sekolah'); ?>" required>
			</div>
			<div class="field">
				<label for="f-ortu-<?php echo $kembali; ?>">Nama Orang Tua/Wali</label>
				<input class="input" id="f-ortu-<?php echo $kembali; ?>" name="nama_ortu" type="text" maxlength="100" placeholder="Nama ayah/ibu/wali" value="<?php echo $v('nama_ortu'); ?>">
			</div>
			<div class="field">
				<label for="f-hp-<?php echo $kembali; ?>">Nomor HP <span class="wajib">*</span></label>
				<input class="input" id="f-hp-<?php echo $kembali; ?>" name="no_hp" type="tel" maxlength="30" placeholder="08xx-xxxx-xxxx" value="<?php echo $v('no_hp'); ?>" required>
			</div>
			<div class="field penuh">
				<label for="f-email-<?php echo $kembali; ?>">Email</label>
				<input class="input" id="f-email-<?php echo $kembali; ?>" name="email" type="email" maxlength="100" placeholder="email@contoh.com" value="<?php echo $v('email'); ?>">
			</div>
		</div>
		<div class="form-aksi">
			<button type="submit" class="btn <?php echo $gelap ? 'btn-emas' : 'btn-navy btn-blok'; ?>">Kirim Pendaftaran →</button>
		</div>
	</form>
<?php endif; ?>
