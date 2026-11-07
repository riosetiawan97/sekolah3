<?php
$this->load->view('depan/_banner', array('judul' => 'Absensi Guru', 'sub' => 'Pencatatan kehadiran guru', 'remah' => array('Absensi Guru' => NULL)));
$pesan = $this->session->flashdata('absen_guru');
?>
<div class="halaman" style="max-width:700px">
	<div class="panel" style="padding:48px">
		<?php if ($pesan): ?>
			<div class="sukses" style="padding:16px"><div class="sukses-ikon" aria-hidden="true">✅</div><h3>Absensi Tercatat!</h3><p>Terima kasih, <strong><?php echo html_escape($pesan); ?></strong>.</p><a class="btn btn-navy btn-kecil" href="<?php echo base_url('guru'); ?>">Absen Lagi</a></div>
		<?php else: ?>
			<div class="absen-kepala"><div class="absen-ikon" aria-hidden="true">👩‍🏫</div><h2>Teacher Attendance</h2><p><?php echo tgl_indo(date('Y-m-d')); ?></p></div>
			<form class="tumpuk-form" action="<?php echo base_url('guru/simpan_absen_guru'); ?>" method="post" data-kirim>
				<div class="field">
					<label for="g-nama" style="font-size:14px;font-weight:700">Nama Guru <span class="wajib">*</span></label>
					<?php if ($guru->num_rows()): ?>
					<select class="input" id="g-nama" name="nama" required style="padding:13px 16px;font-size:15px"><option value="">-- Pilih Nama --</option><?php foreach ($guru->result() as $g): ?><option><?php echo html_escape($g->guru_nama); ?></option><?php endforeach; ?></select>
					<?php else: ?>
					<input class="input" id="g-nama" name="nama" required style="padding:13px 16px;font-size:15px">
					<?php endif; ?>
				</div>
				<button type="submit" class="btn btn-navy btn-blok">Kirim Absensi ✓</button>
			</form>
		<?php endif; ?>
	</div>
</div>
