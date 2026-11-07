<?php $this->load->view('depan/_banner', array('judul' => 'Download', 'sub' => 'Dokumen dan file sekolah', 'remah' => array('Download' => NULL))); ?>
<div class="halaman" style="max-width:900px">
	<?php if ($data->num_rows() == 0): ?><div class="panel kosong"><div aria-hidden="true">📁</div><h3>Belum ada file</h3></div><?php endif; ?>
	<?php foreach ($data->result() as $f): ?>
	<div class="kartu daftar-baris">
		<div class="info-ikon" aria-hidden="true">📄</div>
		<div style="min-width:0">
			<h3><?php echo html_escape($f->file_judul); ?></h3>
			<p><?php echo ringkas($f->file_deskripsi, 140); ?> <?php if ($f->file_oleh): ?>• <?php echo html_escape($f->file_oleh); ?><?php endif; ?></p>
		</div>
		<a class="btn btn-navy btn-kecil" href="<?php echo base_url('download/get_file/'.$f->file_id); ?>">Unduh</a>
	</div>
	<?php endforeach; ?>
</div>
