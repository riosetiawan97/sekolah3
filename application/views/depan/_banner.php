<?php
/* Banner judul halaman. Variabel: $judul, $sub (opsional), $remah = array(label => url|null). */
?>
<section class="banner">
	<div class="banner-isi">
		<nav aria-label="Breadcrumb">
			<ol class="remah">
				<li><a href="<?php echo base_url(); ?>">Beranda</a></li>
				<?php foreach ($remah as $label => $url): ?>
				<li><?php if ($url): ?><a href="<?php echo $url; ?>"><?php echo html_escape($label); ?></a><?php else: ?><span aria-current="page"><?php echo html_escape($label); ?></span><?php endif; ?></li>
				<?php endforeach; ?>
			</ol>
		</nav>
		<h1><?php echo html_escape($judul); ?></h1>
		<?php if ( ! empty($sub)): ?><p><?php echo html_escape($sub); ?></p><?php endif; ?>
	</div>
</section>
