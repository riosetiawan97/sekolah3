<?php
/* Toolbar judul halaman admin. Variabel: $judul, $remah (array label), $aksi (HTML tombol, opsional). */
?>
<div class="toolbar" id="kt_toolbar">
	<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack flex-wrap gap-2">
		<div class="page-title d-flex align-items-center flex-wrap me-3 mb-2 mb-lg-0">
			<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><?php echo html_escape($judul); ?></h1>
			<span class="h-20px border-gray-200 border-start mx-4"></span>
			<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
				<li class="breadcrumb-item text-muted"><a href="<?php echo base_url('admin/dashboard'); ?>" class="text-muted text-hover-primary">Home</a></li>
				<?php foreach ($remah as $r): ?>
				<li class="breadcrumb-item"><span class="bullet bg-gray-200 w-5px h-2px"></span></li>
				<li class="breadcrumb-item text-muted"><?php echo html_escape($r); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php if ( ! empty($aksi)): ?><div class="d-flex align-items-center gap-2 py-1"><?php echo $aksi; ?></div><?php endif; ?>
	</div>
</div>
<?php $pesan = $this->session->flashdata('pesan'); if ($pesan): ?>
<div class="container-xxl mt-4">
	<div class="alert alert-<?php echo $pesan[0] === 'ok' ? 'success' : 'danger'; ?> alert-dismissible fade show mb-0" role="alert">
		<?php echo html_escape($pesan[1]); ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
	</div>
</div>
<?php endif; ?>
