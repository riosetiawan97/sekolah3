<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<?php $this->load->view('admin/_kepala', array('judul' => 'Alur Pendaftaran', 'remah' => array('PPDB', 'Alur Pendaftaran'),
	'aksi' => '<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">+ Tambah Langkah</button>')); ?>
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
	<div class="card"><div class="card-body py-6">
		<div class="notice bg-light-primary rounded border-primary border border-dashed p-4 mb-6 text-gray-700">Langkah tampil di halaman How To Apply. Empat langkah pertama juga tampil di bagian "Cara Mendaftar" beranda. Gambar bagan alur (opsional) diatur di Setup &gt; Registration.</div>
		<div class="table-responsive">
		<table class="table table-row-bordered align-middle gy-4">
			<thead><tr class="fw-bolder text-muted"><th style="width:80px">Langkah</th><th style="width:60px">Ikon</th><th>Judul</th><th>Deskripsi</th><th class="text-end">Aksi</th></tr></thead>
			<tbody>
			<?php if ( ! $data): ?><tr><td colspan="5" class="text-center text-muted py-10">Belum ada langkah.</td></tr><?php endif; ?>
			<?php foreach ($data as $d): ?>
			<tr>
				<td><?php echo (int) $d->langkah; ?></td>
				<td><span class="d-inline-flex align-items-center justify-content-center rounded-circle fs-3" style="width:40px;height:40px;background:<?php echo html_escape($d->warna_tampil); ?>22;border:2px solid <?php echo html_escape($d->warna_tampil); ?>55"><?php echo html_escape($d->ikon_tampil); ?></span></td>
				<td class="fw-bold"><?php echo html_escape($d->judul); ?></td>
				<td><?php echo html_escape($d->deskripsi); ?></td>
				<td class="text-end text-nowrap">
					<button type="button" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#ubah<?php echo $d->id; ?>">Ubah</button>
					<form class="d-inline" action="<?php echo base_url('admin/alur_pendaftaran/hapus_alur_pendaftaran'); ?>" method="post" onsubmit="return confirm('Hapus langkah ini?')"><input type="hidden" name="id" value="<?php echo $d->id; ?>"><button type="submit" class="btn btn-sm btn-light-danger">Hapus</button></form>
				</td>
			</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		</div>
	</div></div>
</div>
</div>
</div>
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="jt" aria-hidden="true"><div class="modal-dialog modal-dialog-centered"><div class="modal-content">
	<form action="<?php echo base_url('admin/alur_pendaftaran/simpan_alur_pendaftaran'); ?>" method="post">
		<div class="modal-header"><h3 class="modal-title" id="jt">Tambah Langkah</h3><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button></div>
		<div class="modal-body"><?php $this->load->view('admin/_form_alur', array('item' => NULL, 'idp' => 'b_')); ?></div>
		<div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button><button type="submit" class="btn btn-primary">Simpan</button></div>
	</form>
</div></div></div>
<?php foreach ($data as $d): ?>
<div class="modal fade" id="ubah<?php echo $d->id; ?>" tabindex="-1" aria-labelledby="ju<?php echo $d->id; ?>" aria-hidden="true"><div class="modal-dialog modal-dialog-centered"><div class="modal-content">
	<form action="<?php echo base_url('admin/alur_pendaftaran/update_alur_pendaftaran'); ?>" method="post">
		<input type="hidden" name="id" value="<?php echo $d->id; ?>">
		<div class="modal-header"><h3 class="modal-title" id="ju<?php echo $d->id; ?>">Ubah Langkah</h3><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button></div>
		<div class="modal-body"><?php $this->load->view('admin/_form_alur', array('item' => $d, 'idp' => 'u'.$d->id.'_')); ?></div>
		<div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button><button type="submit" class="btn btn-primary">Simpan</button></div>
	</form>
</div></div></div>
<?php endforeach; ?>
