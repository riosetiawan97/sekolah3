<?php $p = $idp; ?>
<div class="row">
	<div class="col-4 mb-5"><label class="form-label fw-bold" for="<?php echo $p; ?>langkah">Langkah ke-</label><input type="number" min="1" class="form-control form-control-solid" id="<?php echo $p; ?>langkah" name="langkah" value="<?php echo $item ? (int) $item->langkah : ''; ?>" required></div>
	<div class="col-8 mb-5"><label class="form-label fw-bold" for="<?php echo $p; ?>judul">Judul</label><input class="form-control form-control-solid" id="<?php echo $p; ?>judul" name="judul" maxlength="100" value="<?php echo $item ? html_escape($item->judul) : ''; ?>" required></div>
</div>
<div class="mb-5"><label class="form-label fw-bold" for="<?php echo $p; ?>deskripsi">Deskripsi</label><textarea class="form-control form-control-solid" id="<?php echo $p; ?>deskripsi" name="deskripsi" rows="3"><?php echo $item ? html_escape($item->deskripsi) : ''; ?></textarea></div>
<div class="row">
	<div class="col-6 mb-3"><label class="form-label fw-bold" for="<?php echo $p; ?>ikon">Ikon (emoji)</label><input class="form-control form-control-solid" id="<?php echo $p; ?>ikon" name="ikon" maxlength="20" value="<?php echo $item ? html_escape($item->ikon) : ''; ?>" placeholder="Kosong = otomatis"></div>
	<div class="col-6 mb-3">
		<label class="form-label fw-bold" for="<?php echo $p; ?>warna">Warna</label>
		<div class="d-flex align-items-center gap-3">
			<input type="color" class="form-control form-control-solid form-control-color" id="<?php echo $p; ?>warna" name="warna" value="<?php echo html_escape($item ? $item->warna_tampil : '#e8a020'); ?>" style="width:60px;height:42px">
			<label class="form-check form-check-sm form-check-custom"><input class="form-check-input" type="checkbox" name="warna_otomatis" value="1"<?php echo ( ! $item || empty($item->warna)) ? ' checked' : ''; ?>> <span class="form-check-label">Otomatis</span></label>
		</div>
	</div>
</div>
