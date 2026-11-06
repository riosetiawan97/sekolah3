<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| Koneksi database dibaca dari environment variable (Vercel / Aiven MySQL).
| Nilai default di bawah dipakai untuk development lokal (XAMPP).
|
|   DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
|   MYSQL_SSL_CA_CONTENT  -> isi sertifikat CA Aiven (opsional, mengaktifkan SSL)
*/

$active_group = 'default';
$query_builder = TRUE;

$db_ssl = FALSE;
$ca_content = getenv('MYSQL_SSL_CA_CONTENT');
if ($ca_content) {
	$ca_file = sys_get_temp_dir().'/aiven-ca.pem';
	if ( ! is_file($ca_file)) {
		file_put_contents($ca_file, str_replace('\n', "\n", $ca_content));
	}
	$db_ssl = array('ssl_ca' => $ca_file, 'ssl_verify' => TRUE);
}

$db['default'] = array(
	'dsn'      => '',
	'hostname' => getenv('DB_HOST') ?: 'localhost',
	'port'     => getenv('DB_PORT') ?: 3306,
	'username' => getenv('DB_USERNAME') ?: 'root',
	'password' => getenv('DB_PASSWORD') ?: '',
	'database' => getenv('DB_DATABASE') ?: 'sekolah',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8mb4',
	'dbcollat' => 'utf8mb4_unicode_ci',
	'swap_pre' => '',
	'encrypt'  => $db_ssl,
	'compress' => FALSE,
	'stricton' => NULL, // jangan diubah: sql_mode diatur di hooks/Db_sql_mode.php
	'failover' => array(),
	'save_queries' => FALSE
);
