<?php
$this->load->view('depan/_banner', array('judul' => $post->tulisan_judul, 'remah' => array('Blog' => base_url('artikel'), 'Detail' => NULL)));
$url = base_url('artikel/'.$post->tulisan_slug);
$induk = array(); $balasan = array();
foreach ($komentar as $k) { if ($k->komentar_parent) $balasan[$k->komentar_parent][] = $k; else $induk[] = $k; }
$status = $this->session->flashdata('komentar');
?>
<div class="halaman dua-kolom-kanan">
	<article class="panel">
		<div class="meta" style="font-size:13px;margin-bottom:20px">
			<span>📅 <?php echo tgl_indo($post->tulisan_tanggal); ?></span>
			<?php if ($post->tulisan_author): ?><span>✍️ <?php echo html_escape($post->tulisan_author); ?></span><?php endif; ?>
			<?php if ($post->tulisan_kategori_nama): ?><a class="chip-lembut" style="--c:<?php echo warna_teks($post->tulisan_kategori_nama); ?>" href="<?php echo base_url('blog/kategori/'.$post->tulisan_kategori_id); ?>"><?php echo html_escape($post->tulisan_kategori_nama); ?></a><?php endif; ?>
			<span>👁 <?php echo (int) $post->tulisan_views + 1; ?>x dibaca</span>
		</div>
		<h1 class="detail-judul"><?php echo html_escape($post->tulisan_judul); ?></h1>
		<?php if ($post->tulisan_gambar): ?><div class="detail-gambar"><img src="<?php echo html_escape(gambar_url($post->tulisan_gambar)); ?>" alt=""></div><?php endif; ?>
		<div class="konten"><?php echo $post->tulisan_isi; ?></div>

		<div class="bagikan">
			<span>Bagikan:</span>
			<a href="https://wa.me/?text=<?php echo rawurlencode($post->tulisan_judul.' '.$url); ?>" target="_blank" rel="noopener">WhatsApp</a>
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode($url); ?>" target="_blank" rel="noopener">Facebook</a>
			<a href="https://twitter.com/intent/tweet?url=<?php echo rawurlencode($url); ?>&text=<?php echo rawurlencode($post->tulisan_judul); ?>" target="_blank" rel="noopener">X / Twitter</a>
		</div>

		<section class="komentar" id="komentar">
			<h3>Komentar (<?php echo count($komentar); ?>)</h3>
			<?php foreach ($induk as $k): ?>
			<div class="komen">
				<div class="avatar" aria-hidden="true"><?php echo html_escape(mb_strtoupper(mb_substr(html_entity_decode($k->komentar_nama, ENT_QUOTES), 0, 1))); ?></div>
				<div style="flex:1">
					<b><?php echo $k->komentar_nama; ?></b><small><?php echo tgl_indo($k->komentar_tanggal); ?></small>
					<p><?php echo $k->komentar_isi; ?></p>
					<?php if (isset($balasan[$k->komentar_id])): foreach ($balasan[$k->komentar_id] as $r): ?>
					<div class="balasan"><b><?php echo $r->komentar_nama; ?></b><small><?php echo tgl_indo($r->komentar_tanggal); ?></small><p><?php echo $r->komentar_isi; ?></p></div>
					<?php endforeach; endif; ?>
				</div>
			</div>
			<?php endforeach; ?>

			<?php if ($status === 'ok'): ?>
				<div class="pesan pesan-info" role="status">✅ Komentar terkirim! Komentar Anda akan tampil setelah disetujui admin.</div>
			<?php elseif ($status === 'error'): ?>
				<div class="pesan pesan-error" role="alert">Isi nama, email yang benar, dan komentar.</div>
			<?php endif; ?>
			<form class="tumpuk" style="gap:14px" action="<?php echo base_url('blog/komentar'); ?>" method="post" data-kirim>
				<input type="hidden" name="id" value="<?php echo (int) $post->tulisan_id; ?>">
				<div style="position:absolute;left:-9999px" aria-hidden="true"><input type="text" name="website" tabindex="-1" autocomplete="off"></div>
				<div class="form-grid" style="gap:14px">
					<div class="field"><label for="k-nama">Nama <span class="wajib">*</span></label><input class="input" id="k-nama" name="nama" maxlength="30" placeholder="Nama Anda" required></div>
					<div class="field"><label for="k-email">Email <span class="wajib">*</span></label><input class="input" id="k-email" type="email" name="email" maxlength="50" placeholder="email@contoh.com" required></div>
				</div>
				<div class="field"><label for="k-isi">Komentar <span class="wajib">*</span></label><textarea class="input" id="k-isi" name="komentar" rows="4" maxlength="120" placeholder="Tulis komentar Anda (maks. 120 karakter)" required></textarea></div>
				<div><button class="btn btn-navy btn-kecil" type="submit" style="padding:11px 28px;font-size:14px">Kirim Komentar →</button></div>
			</form>
		</section>
	</article>
	<?php $this->load->view('depan/_sisi_blog', array('filter' => array())); ?>
</div>
