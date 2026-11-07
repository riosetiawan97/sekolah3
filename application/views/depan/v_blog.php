<?php
$sub = t('hal_blog_sub');
if ( ! empty($filter['kategori_nama'])) $sub = 'Kategori: '.$filter['kategori_nama'];
if ( ! empty($filter['cari'])) $sub = 'Hasil pencarian "'.$filter['cari'].'" ('.$total.' artikel)';
$remah = empty($filter) ? array('Blog' => NULL) : array('Blog' => base_url('artikel'), ( ! empty($filter['kategori_nama']) ? $filter['kategori_nama'] : 'Pencarian') => NULL);
$this->load->view('depan/_banner', array('judul' => t('hal_blog_judul'), 'sub' => $sub, 'remah' => $remah));
?>
<div class="halaman dua-kolom-kanan">
	<div>
		<nav class="filter" aria-label="Filter kategori">
			<a href="<?php echo base_url('artikel'); ?>" class="<?php echo empty($filter['kategori']) ? 'aktif' : ''; ?>">Semua</a>
			<?php foreach ($category->result() as $k): if ( ! $k->jumlah) continue; ?>
			<a href="<?php echo base_url('blog/kategori/'.$k->kategori_id); ?>" class="<?php echo (isset($filter['kategori']) && $filter['kategori'] == $k->kategori_id) ? 'aktif' : ''; ?>"><?php echo html_escape($k->kategori_nama); ?></a>
			<?php endforeach; ?>
		</nav>

		<?php if ($data->num_rows() == 0): ?>
			<div class="panel kosong"><div aria-hidden="true">📰</div><h3>Belum ada artikel</h3><p>Coba kategori atau kata kunci lain.</p></div>
		<?php endif; ?>

		<?php foreach ($data->result() as $post): ?>
		<a class="kartu artikel" href="<?php echo base_url('artikel/'.$post->tulisan_slug); ?>">
			<div class="artikel-foto"><?php if ($post->tulisan_gambar): ?><img src="<?php echo html_escape(gambar_url($post->tulisan_gambar)); ?>" alt="" loading="lazy"><?php else: ?><div class="ph" style="height:100%"><small>Foto Artikel</small></div><?php endif; ?></div>
			<div class="artikel-isi">
				<div class="meta">
					<?php if ($post->tulisan_kategori_nama): ?><span class="chip-lembut" style="--c:<?php echo warna_teks($post->tulisan_kategori_nama); ?>"><?php echo html_escape($post->tulisan_kategori_nama); ?></span><?php endif; ?>
					<span><?php echo tgl_indo($post->tulisan_tanggal); ?></span>
					<?php if ($post->tulisan_author): ?><span>• <?php echo html_escape($post->tulisan_author); ?></span><?php endif; ?>
				</div>
				<h3><?php echo html_escape($post->tulisan_judul); ?></h3>
				<p><?php echo ringkas($post->tulisan_isi, 170); ?></p>
				<span class="baca">Baca Selengkapnya →</span>
			</div>
		</a>
		<?php endforeach; ?>

		<?php echo $page; ?>
	</div>
	<?php $this->load->view('depan/_sisi_blog'); ?>
</div>
