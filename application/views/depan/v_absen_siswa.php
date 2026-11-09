<?php
$this->load->view('depan/_banner', array('judul' => t('hal_absen_judul'), 'sub' => t('hal_absen_sub'), 'remah' => array(t('hal_absen_judul') => NULL)));
$hasil = $this->session->flashdata('absen');
$hari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
$hari_ini = $hari[(int) date('w')].', '.tgl_indo(date('Y-m-d'));
?>
<div class="halaman" style="max-width:700px">
	<div class="panel" style="padding:48px">
		<?php if ($hasil && empty($hasil['error'])): ?>
			<div class="sukses" style="padding:16px">
				<div class="sukses-ikon" aria-hidden="true">✅</div>
				<h3>Absensi Tercatat!</h3>
				<p style="margin-bottom:6px">Nama: <strong style="color:var(--navy)"><?php echo html_escape($hasil['nama']); ?></strong></p>
				<p style="margin-bottom:6px">Kelas: <strong style="color:var(--navy)"><?php echo html_escape($hasil['kelas']); ?></strong></p>
				<p style="font-size:13px">Kehadiran Anda pada <?php echo $hari_ini; ?> pukul <?php echo date('H:i'); ?> telah berhasil dicatat.</p>
				<a class="btn btn-navy btn-kecil" href="<?php echo base_url('siswa'); ?>">Absen Lagi</a>
			</div>
		<?php else: ?>
			<div class="absen-kepala">
				<div class="absen-ikon" aria-hidden="true">📋</div>
				<h2>Student Attendance</h2>
				<p><?php echo $hari_ini; ?></p>
			</div>
			<form class="tumpuk-form" action="<?php echo base_url('siswa/simpan_absen_siswa'); ?>" method="post" data-kirim>
				<?php if ($hasil): ?><div class="pesan pesan-error" role="alert">Nama dan kelas wajib diisi.</div><?php endif; ?>
				<div class="field"><label for="a-nama" style="font-size:14px;font-weight:700">Nama Lengkap <span class="wajib">*</span></label><input class="input" id="a-nama" name="nama" maxlength="100" placeholder="Masukkan nama lengkap" required style="padding:13px 16px;font-size:15px"></div>
				<div class="field">
					<label for="a-kelas" style="font-size:14px;font-weight:700">Kelas <span class="wajib">*</span></label>
					<?php if ($kelas->num_rows()): ?>
					<select class="input" id="a-kelas" name="kelas" required style="padding:13px 16px;font-size:15px">
						<option value="">-- Pilih Kelas --</option>
						<?php foreach ($kelas->result() as $k): ?><option value="<?php echo html_escape($k->kelas_nama); ?>"><?php echo html_escape($k->kelas_nama); ?></option><?php endforeach; ?>
					</select>
					<?php else: ?>
					<input class="input" id="a-kelas" name="kelas" maxlength="10" placeholder="Contoh: VII-A" required style="padding:13px 16px;font-size:15px">
					<?php endif; ?>
				</div>
				<button type="submit" class="btn btn-navy btn-blok" style="font-size:16px;box-shadow:0 4px 14px rgba(26,46,90,.3)">Kirim Absensi ✓</button>
			</form>
		<?php endif; ?>
	</div>
</div>
