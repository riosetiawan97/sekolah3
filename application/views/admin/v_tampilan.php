<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<?php $this->load->view('admin/_kepala', array('judul' => 'Pengaturan Tampilan', 'remah' => array('Tampilan Website', $semua_grup[$grup]['label']),
	'aksi' => '<a href="'.base_url().'" target="_blank" rel="noopener" class="btn btn-sm btn-light-primary">Lihat Website ↗</a>')); ?>
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
	<div class="card mb-5">
		<div class="card-header card-header-stretch overflow-auto">
			<ul class="nav nav-stretch nav-line-tabs fw-bold border-transparent flex-nowrap">
				<?php foreach ($semua_grup as $k => $g): ?>
				<li class="nav-item"><a class="nav-link text-active-primary<?php echo $k === $grup ? ' active' : ''; ?>" href="<?php echo base_url('admin/tampilan/index/'.$k); ?>"><?php echo html_escape($g['label']); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<form action="<?php echo base_url('admin/tampilan/simpan/'.$grup); ?>" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<?php if ( ! empty($semua_grup[$grup]['keterangan'])): ?>
			<div class="notice bg-light-primary rounded border-primary border border-dashed p-4 mb-8 text-gray-700"><?php echo html_escape($semua_grup[$grup]['keterangan']); ?></div>
			<?php endif; ?>
			<?php foreach ($semua_grup[$grup]['fields'] as $kunci => $f):
				$v = isset($nilai[$kunci]) ? $nilai[$kunci] : '';
				$id = 'f_'.$kunci;
			?>
				<?php if ($f['tipe'] === 'judul'): ?>
					<h4 class="fw-bolder text-dark mt-8 mb-4 pt-6 border-top"><?php echo html_escape($f['label']); ?></h4>
				<?php continue; endif; ?>
				<div class="row mb-6 align-items-start">
					<label class="col-lg-3 col-form-label fw-bold fs-6" for="<?php echo $id; ?>"><?php echo html_escape($f['label']); ?></label>
					<div class="col-lg-9">
						<?php if ($f['tipe'] === 'textarea'): ?>
							<textarea class="form-control form-control-solid" id="<?php echo $id; ?>" name="<?php echo $kunci; ?>" rows="<?php echo substr_count($v, "\n") > 2 || strlen($v) > 200 ? 5 : 3; ?>"><?php echo html_escape($v); ?></textarea>
						<?php elseif ($f['tipe'] === 'checkbox'): ?>
							<div class="form-check form-switch form-check-custom form-check-solid mt-2">
								<input class="form-check-input" type="checkbox" id="<?php echo $id; ?>" name="<?php echo $kunci; ?>" value="1"<?php echo $v === '1' ? ' checked' : ''; ?>>
								<label class="form-check-label" for="<?php echo $id; ?>">Ya</label>
							</div>
						<?php elseif ($f['tipe'] === 'color'): ?>
							<div class="d-flex align-items-center gap-3">
								<input type="color" class="form-control form-control-solid form-control-color" id="<?php echo $id; ?>" name="<?php echo $kunci; ?>" value="<?php echo html_escape($v); ?>" style="width:70px;height:44px">
								<code><?php echo html_escape($v); ?></code>
								<span class="text-muted fs-7">Bawaan: <?php echo html_escape($f['default']); ?></span>
							</div>
						<?php elseif ($f['tipe'] === 'image' || $f['tipe'] === 'file'): ?>
							<?php if ($v !== ''): ?>
								<div class="d-flex align-items-center gap-4 mb-3">
									<?php if ($f['tipe'] === 'image'): ?>
										<img src="<?php echo html_escape(gambar_url($v)); ?>" alt="" style="height:90px;border-radius:8px;object-fit:cover">
									<?php else: ?>
										<a href="<?php echo html_escape(file_url($v)); ?>" target="_blank" rel="noopener">Lihat file saat ini ↗</a>
									<?php endif; ?>
									<label class="form-check form-check-sm form-check-custom">
										<input class="form-check-input" type="checkbox" name="<?php echo $kunci; ?>_hapus" value="1"> <span class="form-check-label">Hapus</span>
									</label>
								</div>
							<?php endif; ?>
							<input type="file" class="form-control form-control-solid" id="<?php echo $id; ?>" name="<?php echo $kunci; ?>" accept="<?php echo $f['tipe'] === 'image' ? 'image/*' : '.pdf,image/*'; ?>">
						<?php else: ?>
							<input type="text" class="form-control form-control-solid" id="<?php echo $id; ?>" name="<?php echo $kunci; ?>" value="<?php echo html_escape($v); ?>">
						<?php endif; ?>
						<?php if ( ! empty($f['bantuan'])): ?><div class="form-text"><?php echo html_escape($f['bantuan']); ?></div><?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="card-footer d-flex justify-content-between">
			<button type="submit" class="btn btn-light btn-sm" form="form-reset" onclick="return confirm('Kembalikan semua isian di tab ini ke bawaan?')">Kembalikan ke bawaan</button>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</div>
		</form>
		<form id="form-reset" action="<?php echo base_url('admin/tampilan/reset/'.$grup); ?>" method="post"></form>
	</div>
</div>
</div>
</div>
