<?php $this->load->view('depan/_banner', array('judul' => 'Pengumuman', 'sub' => 'Informasi resmi dari sekolah', 'remah' => array('Pengumuman' => NULL))); ?>
<div class="halaman" style="max-width:900px">
	<?php if ($data->num_rows() == 0): ?><div class="panel kosong"><div aria-hidden="true">📢</div><h3>Belum ada pengumuman</h3></div><?php endif; ?>
	<div class="akordeon">
		<?php foreach ($data->result() as $i => $p): ?>
		<div class="akor kartu<?php echo $i === 0 ? ' buka' : ''; ?>" style="border-radius:14px">
			<button type="button" aria-expanded="<?php echo $i === 0 ? 'true' : 'false'; ?>"><span>📢 <?php echo html_escape($p->pengumuman_judul); ?><br><small style="color:var(--gray);font-weight:500"><?php echo tgl_indo($p->pengumuman_tanggal); ?></small></span><i aria-hidden="true">+</i></button>
			<div class="akor-isi konten"><?php echo $p->pengumuman_deskripsi; ?></div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
