<?php $warna = array('Baru' => 'warning', 'Dihubungi' => 'info', 'Diterima' => 'success', 'Ditolak' => 'danger'); ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<?php $this->load->view('admin/_kepala', array('judul' => 'Data Pendaftar', 'remah' => array('PPDB', 'Data Pendaftar'),
	'aksi' => '<a href="'.base_url('admin/tampilan/index/ppdb').'" class="btn btn-sm btn-light">Pengaturan formulir</a>')); ?>
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
	<div class="card">
		<div class="card-header align-items-center">
			<div class="d-flex flex-wrap gap-2 py-3">
				<a href="<?php echo base_url('admin/pendaftar'); ?>" class="btn btn-sm <?php echo $filter === '' ? 'btn-primary' : 'btn-light'; ?>">Semua (<?php echo array_sum($hitung); ?>)</a>
				<?php foreach ($daftar_status as $s): ?>
				<a href="<?php echo base_url('admin/pendaftar?status='.$s); ?>" class="btn btn-sm <?php echo $filter === $s ? 'btn-primary' : 'btn-light'; ?>"><?php echo $s; ?> (<?php echo isset($hitung[$s]) ? $hitung[$s] : 0; ?>)</a>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="card-body py-4">
			<div class="table-responsive">
			<table id="example1" class="table table-row-bordered align-middle gy-3" style="font-size:13px">
				<thead><tr class="fw-bolder text-muted">
					<th>Tanggal</th><th>Nama Siswa</th><th>Asal Sekolah</th><th>Orang Tua/Wali</th><th>No. HP</th><th>Email</th><th>Status</th><th>Catatan</th><th class="text-end">Aksi</th>
				</tr></thead>
				<tbody>
				<?php foreach ($data->result() as $d): ?>
				<tr>
					<td class="text-nowrap" data-order="<?php echo html_escape($d->tanggal); ?>"><?php echo date('d/m/Y H:i', strtotime($d->tanggal)); ?></td>
					<td class="fw-bold"><?php echo html_escape($d->nama); ?></td>
					<td><?php echo html_escape($d->asal_sekolah); ?></td>
					<td><?php echo html_escape($d->nama_ortu); ?></td>
					<td class="text-nowrap"><a href="<?php echo html_escape(wa_url($d->no_hp)); ?>" target="_blank" rel="noopener" title="Chat WhatsApp"><?php echo html_escape($d->no_hp); ?></a></td>
					<td><?php echo html_escape($d->email); ?></td>
					<td><span class="badge badge-light-<?php echo $warna[$d->status] ?? 'primary'; ?>"><?php echo html_escape($d->status); ?></span></td>
					<td><?php echo html_escape($d->catatan); ?></td>
					<td class="text-end text-nowrap">
						<button type="button" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#ubah<?php echo $d->id; ?>">Ubah</button>
						<form class="d-inline" action="<?php echo base_url('admin/pendaftar/hapus'); ?>" method="post" onsubmit="return confirm('Hapus data pendaftar ini?')">
							<input type="hidden" name="id" value="<?php echo $d->id; ?>"><button type="submit" class="btn btn-sm btn-light-danger">Hapus</button>
						</form>
					</td>
				</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
			</div>
			<?php if ($data->num_rows() == 0): ?><p class="text-center text-muted py-10 mb-0">Belum ada pendaftar.</p><?php endif; ?>
		</div>
	</div>
</div>
</div>
</div>
<?php foreach ($data->result() as $d): ?>
<div class="modal fade" id="ubah<?php echo $d->id; ?>" tabindex="-1" aria-labelledby="judul<?php echo $d->id; ?>" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered"><div class="modal-content">
		<form action="<?php echo base_url('admin/pendaftar/update'); ?>" method="post">
			<input type="hidden" name="id" value="<?php echo $d->id; ?>"><input type="hidden" name="filter" value="<?php echo html_escape($filter); ?>">
			<div class="modal-header"><h3 class="modal-title" id="judul<?php echo $d->id; ?>"><?php echo html_escape($d->nama); ?></h3><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button></div>
			<div class="modal-body">
				<div class="mb-5">
					<label class="form-label fw-bold" for="st<?php echo $d->id; ?>">Status</label>
					<select class="form-select form-select-solid" id="st<?php echo $d->id; ?>" name="status">
						<?php foreach ($daftar_status as $s): ?><option<?php echo $s === $d->status ? ' selected' : ''; ?>><?php echo $s; ?></option><?php endforeach; ?>
					</select>
				</div>
				<div><label class="form-label fw-bold" for="ct<?php echo $d->id; ?>">Catatan</label><textarea class="form-control form-control-solid" id="ct<?php echo $d->id; ?>" name="catatan" rows="3"><?php echo html_escape($d->catatan); ?></textarea></div>
			</div>
			<div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button><button type="submit" class="btn btn-primary">Simpan</button></div>
		</form>
	</div></div>
</div>
<?php endforeach; ?>
