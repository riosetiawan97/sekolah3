<?php
/* Pembungkus halaman admin lama (gaya AdminLTE) agar tampil rapi di layout Metronic. Variabel: $isi (nama view), $data_isi. */
?>
<style>
.lama .content-header{display:flex;align-items:center;flex-wrap:wrap;gap:12px;margin-bottom:20px}
.lama .content-header h1{font-size:1.4rem;font-weight:700;margin:0}
.lama .content-header .breadcrumb{margin:0;font-size:.85rem}
.lama .content-header .breadcrumb li+li::before{content:"›";padding:0 6px;color:#a1a5b7}
.lama .breadcrumb{list-style:none;display:flex;padding:0}
.lama .form-group{margin-bottom:1rem}
.lama .box-header{margin-bottom:1rem}
.lama .btn-flat{border-radius:.475rem}
.lama .fa-pencil::before{content:"Ubah";font-family:inherit;font-style:normal}
.lama .fa-trash::before{content:"Hapus";font-family:inherit;font-style:normal;color:#f1416c}
.lama .fa-plus::before{content:"+ ";font-style:normal}
.lama table td .btn{padding:4px 10px;font-size:12px;background:#f5f8fa}
</style>
<div class="content d-flex flex-column flex-column-fluid lama" id="kt_content">
	<div class="post d-flex flex-column-fluid" id="kt_post">
		<div id="kt_content_container" class="container-xxl">
			<div class="card"><div class="card-body py-8">
				<?php $this->load->view($isi, $data_isi); ?>
			</div></div>
		</div>
	</div>
</div>
