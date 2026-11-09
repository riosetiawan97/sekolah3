<?php /* Isi form tambah/ubah item. Variabel: $def, $item (NULL = tambah), $idp (prefix id). */ ?>
<?php foreach ($def['kolom'] as $k => $label): $v = $item ? $item->$k : ''; ?>
<div class="mb-5">
	<label class="form-label fw-bold" for="<?php echo $idp.$k; ?>"><?php echo html_escape($label); ?></label>
	<?php if ($k === 'deskripsi' && (empty($def['tipe'][$k]) || $def['tipe'][$k] === 'textarea')): ?>
		<textarea class="form-control form-control-solid" id="<?php echo $idp.$k; ?>" name="<?php echo $k; ?>" rows="3"><?php echo html_escape($v); ?></textarea>
	<?php elseif ($k === 'warna'): ?>
		<input type="color" class="form-control form-control-solid form-control-color" id="<?php echo $idp.$k; ?>" name="<?php echo $k; ?>" value="<?php echo html_escape($v ?: '#1a2e5a'); ?>" style="width:70px;height:44px">
	<?php else: ?>
		<input type="text" class="form-control form-control-solid" id="<?php echo $idp.$k; ?>" name="<?php echo $k; ?>" value="<?php echo html_escape($v); ?>"<?php echo $k === 'judul' ? ' required' : ''; ?><?php echo $k === 'deskripsi' ? ' list="daftar-dropdown"' : ''; ?><?php echo $k === 'ikon' ? ' maxlength="20" placeholder="Contoh: 📖"' : ''; ?>>
		<?php if ($k === 'ikon'): ?><div class="form-text">Tempel satu emoji. Di Windows tekan tombol Windows + titik (.) untuk memilih emoji.</div><?php endif; ?>
	<?php endif; ?>
</div>
<?php endforeach; ?>
<div class="row">
	<div class="col-6 mb-3">
		<label class="form-label fw-bold" for="<?php echo $idp; ?>urutan">Urutan</label>
		<input type="number" class="form-control form-control-solid" id="<?php echo $idp; ?>urutan" name="urutan" value="<?php echo $item ? (int) $item->urutan : ''; ?>" placeholder="Otomatis">
	</div>
	<div class="col-6 mb-3 d-flex align-items-end">
		<div class="form-check form-switch form-check-custom form-check-solid mb-3">
			<input class="form-check-input" type="checkbox" id="<?php echo $idp; ?>aktif" name="aktif" value="1"<?php echo ( ! $item || $item->aktif) ? ' checked' : ''; ?>>
			<label class="form-check-label" for="<?php echo $idp; ?>aktif">Tampilkan</label>
		</div>
	</div>
</div>
