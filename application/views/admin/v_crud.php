<?php
/* Halaman CRUD admin umum (lihat core/MY_Controller.php). Variabel: $def, $data. */
$pk = $def['pk'];
$tampil = function ($row, $k, $f) {
	$v = isset($row->$k) ? $row->$k : '';
	switch ($f['tipe']) {
		case 'image':
			return $v ? '<img src="'.html_escape(gambar_url($v)).'" alt="" style="width:44px;height:44px;object-fit:cover;border-radius:8px">' : '<span class="text-muted">-</span>';
		case 'file':
			return $v ? '<a href="'.html_escape(file_url($v)).'" target="_blank" rel="noopener">Unduh ↗</a>' : '<span class="text-muted">-</span>';
		case 'select':
			return isset($f['opsi'][$v]) ? html_escape($f['opsi'][$v]) : '<span class="text-muted">-</span>';
		default:
			$t = trim(html_entity_decode(strip_tags((string) $v), ENT_QUOTES, 'UTF-8'));
			return html_escape(mb_strlen($t) > 90 ? mb_substr($t, 0, 90).'…' : $t);
	}
};
$form = function ($row, $p) use ($def) {
	foreach ($def['kolom'] as $k => $f):
		if ( ! empty($f['hanya_tampil'])) continue;
		$v = $row && isset($row->$k) ? $row->$k : (isset($f['bawaan']) ? $f['bawaan'] : '');
		$id = $p.$k;
		$wajib = ! empty($f['wajib']) && ! (in_array($f['tipe'], array('image', 'file')) && $row) ? ' required' : '';
?>
	<div class="mb-5">
		<label class="form-label fw-bold<?php echo $wajib ? ' required' : ''; ?>" for="<?php echo $id; ?>"><?php echo html_escape($f['label']); ?></label>
		<?php if ($f['tipe'] === 'textarea'): ?>
			<textarea class="form-control form-control-solid" id="<?php echo $id; ?>" name="<?php echo $k; ?>" rows="3"<?php echo $wajib; ?>><?php echo html_escape($v); ?></textarea>
		<?php elseif ($f['tipe'] === 'select'): ?>
			<select class="form-select form-select-solid" id="<?php echo $id; ?>" name="<?php echo $k; ?>"<?php echo $wajib; ?>>
				<?php foreach ($f['opsi'] as $ov => $ol): ?><option value="<?php echo html_escape($ov); ?>"<?php echo (string) $ov === (string) $v ? ' selected' : ''; ?>><?php echo html_escape($ol); ?></option><?php endforeach; ?>
			</select>
		<?php elseif ($f['tipe'] === 'image' || $f['tipe'] === 'file'): ?>
			<?php if ($v): ?><div class="form-text mb-2">File saat ini: <?php echo $f['tipe'] === 'image' ? '<img src="'.html_escape(gambar_url($v)).'" alt="" style="height:48px;border-radius:6px;vertical-align:middle">' : '<a href="'.html_escape(file_url($v)).'" target="_blank" rel="noopener">'.html_escape($v).'</a>'; ?> (pilih file baru untuk mengganti)</div><?php endif; ?>
			<input type="file" class="form-control form-control-solid" id="<?php echo $id; ?>" name="<?php echo $k; ?>"<?php echo $f['tipe'] === 'image' ? ' accept="image/*"' : ''; ?><?php echo $wajib; ?>>
		<?php else: ?>
			<input type="<?php echo $f['tipe'] === 'date' ? 'date' : 'text'; ?>" class="form-control form-control-solid" id="<?php echo $id; ?>" name="<?php echo $k; ?>" value="<?php echo html_escape($v); ?>"<?php echo isset($f['maks']) ? ' maxlength="'.(int) $f['maks'].'"' : ''; ?><?php echo isset($f['contoh']) ? ' placeholder="'.html_escape($f['contoh']).'"' : ''; ?><?php echo $wajib; ?>>
		<?php endif; ?>
		<?php if ( ! empty($f['bantuan'])): ?><div class="form-text"><?php echo html_escape($f['bantuan']); ?></div><?php endif; ?>
	</div>
<?php endforeach;
};
?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<?php $this->load->view('admin/_kepala', array('judul' => $def['judul'], 'remah' => $def['remah'],
	'aksi' => (isset($def['aksi']) ? $def['aksi'].' ' : '').'<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">+ Tambah</button>')); ?>
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
	<div class="card"><div class="card-body py-6">
		<?php if ( ! empty($def['keterangan'])): ?><div class="notice bg-light-primary rounded border-primary border border-dashed p-4 mb-6 text-gray-700"><?php echo html_escape($def['keterangan']); ?></div><?php endif; ?>
		<div class="table-responsive">
		<table id="example1" class="table table-row-bordered align-middle gy-3" style="font-size:13px">
			<thead><tr class="fw-bolder text-muted">
				<th style="width:40px">#</th>
				<?php foreach ($def['kolom'] as $f): if ( ! empty($f['sembunyi_tabel'])) continue; ?><th><?php echo html_escape($f['label']); ?></th><?php endforeach; ?>
				<th class="text-end">Aksi</th>
			</tr></thead>
			<tbody>
			<?php foreach ($data as $n => $row): ?>
			<tr>
				<td><?php echo $n + 1; ?></td>
				<?php foreach ($def['kolom'] as $k => $f): if ( ! empty($f['sembunyi_tabel'])) continue; ?><td><?php echo $tampil($row, $k, $f); ?></td><?php endforeach; ?>
				<td class="text-end text-nowrap">
					<button type="button" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#ubah<?php echo $row->$pk; ?>">Ubah</button>
					<form class="d-inline" action="<?php echo base_url($def['url'].'/hapus'); ?>" method="post" onsubmit="return confirm('Hapus data ini?')"><input type="hidden" name="id" value="<?php echo $row->$pk; ?>"><button type="submit" class="btn btn-sm btn-light-danger">Hapus</button></form>
				</td>
			</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		</div>
		<?php if ( ! $data): ?><p class="text-center text-muted py-10 mb-0">Belum ada data. Klik "+ Tambah".</p><?php endif; ?>
	</div></div>
</div>
</div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="judulTambah" aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"><div class="modal-content">
	<form action="<?php echo base_url($def['url'].'/simpan'); ?>" method="post" enctype="multipart/form-data">
		<div class="modal-header"><h3 class="modal-title" id="judulTambah">Tambah <?php echo html_escape($def['satuan']); ?></h3><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button></div>
		<div class="modal-body"><?php $form(NULL, 'b_'); ?></div>
		<div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button><button type="submit" class="btn btn-primary">Simpan</button></div>
	</form>
</div></div></div>
<?php foreach ($data as $row): ?>
<div class="modal fade" id="ubah<?php echo $row->$pk; ?>" tabindex="-1" aria-labelledby="ju<?php echo $row->$pk; ?>" aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"><div class="modal-content">
	<form action="<?php echo base_url($def['url'].'/update'); ?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $row->$pk; ?>">
		<div class="modal-header"><h3 class="modal-title" id="ju<?php echo $row->$pk; ?>">Ubah <?php echo html_escape($def['satuan']); ?></h3><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button></div>
		<div class="modal-body"><?php $form($row, 'u'.$row->$pk.'_'); ?></div>
		<div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button><button type="submit" class="btn btn-primary">Simpan</button></div>
	</form>
</div></div></div>
<?php endforeach; ?>
