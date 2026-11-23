<?php
/*
| Menu samping halaman, diambil dari Admin > Tampilan Website > Menu Navigasi.
| Isinya = menu dalam dropdown yang sama dengan halaman yang sedang dibuka.
| $jalur : link halaman ini (mis. 'about'), $grup : nama dropdown cadangan (mis. 'Tentang').
*/
$jalur = trim((string) $jalur, '/');
$cocok = function ($nilai) { return trim((string) $nilai, '/'); };
$semua = items('menu');
$nama_grup = '';
foreach ($semua as $m) {
	if (trim((string) $m->deskripsi) !== '' && $cocok($m->nilai) === $jalur) { $nama_grup = trim($m->deskripsi); break; }
}
if ($nama_grup === '') $nama_grup = $grup;
$isi = array();
foreach ($semua as $m) {
	if (trim((string) $m->deskripsi) === $nama_grup) $isi[] = $m;
}
if ( ! $isi) return;
?>
<aside class="sisi">
	<div class="sisi-kepala"><?php echo html_escape($nama_grup); ?></div>
	<ul class="sisi-menu">
		<?php foreach ($isi as $m): ?>
		<li><a href="<?php echo html_escape(tautan($m->nilai)); ?>" class="<?php echo $cocok($m->nilai) === $jalur ? 'aktif' : ''; ?>"><span><?php echo html_escape($m->judul); ?></span></a></li>
		<?php endforeach; ?>
	</ul>
</aside>
