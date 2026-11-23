<?php
$this->load->view('depan/_banner', array('judul' => t('hal_daftar_judul'), 'sub' => t('hal_daftar_sub'), 'remah' => array('PPDB' => base_url('alur_pendaftaran'), t('hal_daftar_judul') => NULL)));
$info = items('info_ppdb');
?>
<div class="halaman dua-kolom">
	<div class="tumpuk" style="gap:16px">
		<?php $this->load->view('depan/_sisi_menu', array('jalur' => 'pendaftaran', 'grup' => 'PPDB')); ?>
		<?php if ($info): ?>
		<div class="kotak-abu">
			<h4><?php echo te('judul_info_ppdb'); ?></h4>
			<ul><?php foreach ($info as $i): ?><li><?php echo html_escape($i->judul); ?></li><?php endforeach; ?></ul>
		</div>
		<?php endif; ?>
	</div>
	<section class="panel">
		<div class="judul-panel"><h2><?php echo te('judul_formulir'); ?></h2></div>
		<?php $this->load->view('depan/_form_daftar', array('gelap' => FALSE, 'kembali' => 'pendaftaran')); ?>
	</section>
</div>
