<?php /* Sidebar blog. Variabel: $category, $populer (atau $terkait), $filter. */ ?>
<aside class="tumpuk">
	<div class="sisi">
		<div class="sisi-kepala">Cari Artikel</div>
		<form class="sisi-isi cari" action="<?php echo base_url('blog/search'); ?>" method="get" role="search">
			<label class="sr-only" for="cari-artikel">Kata kunci</label>
			<input class="input" id="cari-artikel" name="keyword" placeholder="Kata kunci..." value="<?php echo isset($filter['cari']) ? html_escape($filter['cari']) : ''; ?>">
			<button class="btn btn-navy" type="submit">Cari</button>
		</form>
	</div>
	<?php if (isset($category) && $category->num_rows()): ?>
	<div class="sisi">
		<div class="sisi-kepala">Kategori</div>
		<ul class="sisi-menu">
			<?php foreach ($category->result() as $k): ?>
			<li><a href="<?php echo base_url('blog/kategori/'.$k->kategori_id); ?>" class="<?php echo (isset($filter['kategori']) && $filter['kategori'] == $k->kategori_id) ? 'aktif' : ''; ?>"><span><?php echo html_escape($k->kategori_nama); ?></span><span class="hitung"><?php echo (int) $k->jumlah; ?></span></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>
	<?php $daftar = isset($terkait) ? $terkait : $populer; ?>
	<?php if ($daftar->num_rows()): ?>
	<div class="sisi">
		<div class="sisi-kepala"><?php echo isset($terkait) ? 'Artikel Terbaru' : 'Artikel Populer'; ?></div>
		<div class="mini-list">
			<?php foreach ($daftar->result() as $p): ?>
			<a href="<?php echo base_url('artikel/'.$p->tulisan_slug); ?>">
				<span class="thumb"><?php if ($p->tulisan_gambar): ?><img src="<?php echo html_escape(gambar_url($p->tulisan_gambar)); ?>" alt="" loading="lazy"><?php else: ?><span class="ph" style="height:100%;display:block"></span><?php endif; ?></span>
				<span><b><?php echo html_escape($p->tulisan_judul); ?></b><small><?php echo tgl_indo($p->tulisan_tanggal); ?></small></span>
			</a>
			<?php endforeach; ?>
		</div>
	</div>
	<?php endif; ?>
</aside>
