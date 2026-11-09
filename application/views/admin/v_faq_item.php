<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<?php $this->load->view('admin/_kepala', array('judul' => 'FAQ: '.$faq->faq_judul, 'remah' => array('FAQ', 'Pertanyaan & Jawaban'),
	'aksi' => '<a href="'.base_url('admin/faq').'" class="btn btn-sm btn-light">← Kategori FAQ</a> <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">+ Tambah Pertanyaan</button>')); ?>
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
	<div class="card"><div class="card-body py-6">
		<div class="notice bg-light-primary rounded border-primary border border-dashed p-4 mb-6 text-gray-700">Pertanyaan tampil sebagai daftar buka-tutup di halaman FAQ. Jika kategori ini belum punya pertanyaan, halaman FAQ menampilkan isi "Description" kategori.</div>
		<div class="table-responsive">
		<table class="table table-row-bordered align-middle gy-4">
			<thead><tr class="fw-bolder text-muted"><th style="width:70px">Urutan</th><th>Pertanyaan</th><th>Jawaban</th><th class="text-end">Aksi</th></tr></thead>
			<tbody>
			<?php if ( ! $data): ?><tr><td colspan="4" class="text-center text-muted py-10">Belum ada pertanyaan.</td></tr><?php endif; ?>
			<?php foreach ($data as $d): ?>
			<tr>
				<td><?php echo (int) $d->urutan; ?></td>
				<td class="fw-bold"><?php echo html_escape($d->pertanyaan); ?></td>
				<td><?php echo html_escape(mb_strimwidth(trim(html_entity_decode(strip_tags($d->jawaban), ENT_QUOTES)), 0, 160, '…')); ?></td>
				<td class="text-end text-nowrap">
					<button type="button" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#ubah<?php echo $d->id; ?>">Ubah</button>
					<form class="d-inline" action="<?php echo base_url('admin/faq/hapus_item'); ?>" method="post" onsubmit="return confirm('Hapus pertanyaan ini?')"><input type="hidden" name="id" value="<?php echo $d->id; ?>"><button type="submit" class="btn btn-sm btn-light-danger">Hapus</button></form>
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
<?php
$form = function ($item, $p) { ?>
	<div class="mb-5"><label class="form-label fw-bold" for="<?php echo $p; ?>q">Pertanyaan</label><input class="form-control form-control-solid" id="<?php echo $p; ?>q" name="pertanyaan" maxlength="255" value="<?php echo $item ? html_escape($item->pertanyaan) : ''; ?>" required></div>
	<div class="mb-5"><label class="form-label fw-bold" for="<?php echo $p; ?>a">Jawaban</label><textarea class="ckeditor" id="<?php echo $p; ?>a" name="jawaban"><?php echo $item ? html_escape($item->jawaban) : ''; ?></textarea></div>
	<div class="mb-3" style="max-width:160px"><label class="form-label fw-bold" for="<?php echo $p; ?>u">Urutan</label><input type="number" class="form-control form-control-solid" id="<?php echo $p; ?>u" name="urutan" value="<?php echo $item ? (int) $item->urutan : ''; ?>" placeholder="Otomatis"></div>
<?php }; ?>
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="jt" aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-lg"><div class="modal-content">
	<form action="<?php echo base_url('admin/faq/simpan_item'); ?>" method="post">
		<input type="hidden" name="faq_id" value="<?php echo $faq->faq_id; ?>">
		<div class="modal-header"><h3 class="modal-title" id="jt">Tambah Pertanyaan</h3><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button></div>
		<div class="modal-body"><?php $form(NULL, 'b_'); ?></div>
		<div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button><button type="submit" class="btn btn-primary">Simpan</button></div>
	</form>
</div></div></div>
<?php foreach ($data as $d): ?>
<div class="modal fade" id="ubah<?php echo $d->id; ?>" tabindex="-1" aria-labelledby="ju<?php echo $d->id; ?>" aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-lg"><div class="modal-content">
	<form action="<?php echo base_url('admin/faq/update_item'); ?>" method="post">
		<input type="hidden" name="id" value="<?php echo $d->id; ?>">
		<div class="modal-header"><h3 class="modal-title" id="ju<?php echo $d->id; ?>">Ubah Pertanyaan</h3><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button></div>
		<div class="modal-body"><?php $form($d, 'u'.$d->id.'_'); ?></div>
		<div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button><button type="submit" class="btn btn-primary">Simpan</button></div>
	</form>
</div></div></div>
<?php endforeach; ?>
