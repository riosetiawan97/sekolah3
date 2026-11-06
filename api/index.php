<?php
// Entry point untuk Vercel (runtime vercel-php). Meneruskan semua request ke CodeIgniter.
chdir(dirname(__DIR__));
if ( ! isset($_SERVER['CI_ENV'])) {
	$_SERVER['CI_ENV'] = getenv('CI_ENV') ?: 'production';
}
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['SCRIPT_FILENAME'] = dirname(__DIR__).'/index.php';
require dirname(__DIR__).'/index.php';
