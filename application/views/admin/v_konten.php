<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<?php $this->load->view('admin/_kepala', array('judul' => $def['label'], 'remah' => array(in_array($grup, array('syarat', 'jadwal_ppdb', 'info_ppdb')) ? 'PPDB' : 'Tampilan Website', $def['label']),
	'aksi' => '<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">+ Tambah</button>')); ?>
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
	<div class="card">
		<div class="card-body py-6">
			<?php if ( ! empty($def['keterangan'])): ?><div class="notice bg-light-primary rounded border-primary border border-dashed p-4 mb-6 text-gray-700"><?php echo html_escape($def['keterangan']); ?></div><?php endif; ?>
			<div class="table-responsive">
			<table class="table table-row-bordered align-middle gy-4">
				<thead><tr class="fw-bolder text-muted">
					<th style="width:70px">Urutan</th>
					<?php foreach ($def['kolom'] as $label): ?><th><?php echo html_escape($label); ?></th><?php endforeach; ?>
					<th>Status</th><th class="text-end">Aksi</th>
				</tr></thead>
				<tbody>
				<?php if ( ! $data): ?><tr><td colspan="<?php echo count($def['kolom']) + 3; ?>" class="text-center text-muted py-10">Belum ada data. Klik "+ Tambah".</td></tr><?php endif; ?>
				<?php foreach ($data as $d): ?>
				<tr>
					<td><?php echo (int) $d->urutan; ?></td>
					<?php foreach ($def['kolom'] as $k => $label): ?>
					<td><?php if ($k === 'warna'): ?><span class="d-inline-block rounded" style="width:22px;height:22px;background:<?php echo html_escape($d->warna); ?>"></span> <code><?php echo html_escape($d->warna); ?></code><?php elseif ($k === 'ikon'): ?><span class="fs-2"><?php echo html_escape($d->ikon); ?></span><?php else: echo html_escape($d->$k); endif; ?></td>
					<?php endforeach; ?>
					<td><?php echo $d->aktif ? '<span class="badge badge-light-success">Tampil</span>' : '<span class="badge badge-light">Disembunyikan</span>'; ?></td>
					<td class="text-end text-nowrap">
						<button type="button" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#modalUbah<?php echo $d->id; ?>">Ubah</button>
						<form class="d-inline" action="<?php echo base_url('admin/konten/hapus/'.$grup); ?>" method="post" onsubmit="return confirm('Hapus data ini?')">
							<input type="hidden" name="id" value="<?php echo $d->id; ?>">
							<button type="submit" class="btn btn-sm btn-light-danger">Hapus</button>
						</form>
					</td>
				</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="judulTambah" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered"><div class="modal-content">
		<form action="<?php echo base_url('admin/konten/simpan/'.$grup); ?>" method="post">
			<div class="modal-header"><h3 class="modal-title" id="judulTambah">Tambah <?php echo html_escape($def['label']); ?></h3><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button></div>
			<div class="modal-body"><?php $this->load->view('admin/_form_konten', array('def' => $def, 'item' => NULL, 'idp' => 'baru_')); ?></div>
			<div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button><button type="submit" class="btn btn-primary">Simpan</button></div>
		</form>
	</div></div>
</div>
<?php foreach ($data as $d): ?>
<div class="modal fade" id="modalUbah<?php echo $d->id; ?>" tabindex="-1" aria-labelledby="judulUbah<?php echo $d->id; ?>" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered"><div class="modal-content">
		<form action="<?php echo base_url('admin/konten/update/'.$grup); ?>" method="post">
			<input type="hidden" name="id" value="<?php echo $d->id; ?>">
			<div class="modal-header"><h3 class="modal-title" id="judulUbah<?php echo $d->id; ?>">Ubah <?php echo html_escape($def['label']); ?></h3><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button></div>
			<div class="modal-body"><?php $this->load->view('admin/_form_konten', array('def' => $def, 'item' => $d, 'idp' => 'u'.$d->id.'_')); ?></div>
			<div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button><button type="submit" class="btn btn-primary">Simpan</button></div>
		</form>
	</div></div>
</div>
<?php endforeach; ?>
