<?php
// File upload yang tidak ada di deploy (/assets/images/x, /assets/files/x) diarahkan ke Vercel Blob.
$p = isset($_GET['p']) ? (string) $_GET['p'] : '';
$parts = explode('_', (string) getenv('BLOB_READ_WRITE_TOKEN'));
if ( ! preg_match('#^(images|files)/[^/]+$#', $p) || ! isset($parts[3])) {
	http_response_code(404);
	exit("Not found\n");
}
list($folder, $name) = explode('/', $p, 2);
header('Cache-Control: public, max-age=300');
header('Location: https://'.strtolower($parts[3]).'.public.blob.vercel-storage.com/'.$folder.'/'.rawurlencode($name), TRUE, 302);
