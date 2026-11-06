<?php
/*
| Installer database sekali pakai untuk Vercel + Aiven MySQL.
|
| Aktif hanya jika env INSTALL_TOKEN di-set. Buka:
|   https://<domain>/install?token=<INSTALL_TOKEN>
| Membuat database DB_DATABASE (jika belum ada) lalu mengimpor install/database.sql.
| Setelah berhasil, HAPUS env INSTALL_TOKEN di Vercel agar endpoint ini mati.
*/
header('Content-Type: text/plain; charset=utf-8');

$token = (string) getenv('INSTALL_TOKEN');
if ($token === '' || ! isset($_GET['token']) || ! hash_equals($token, (string) $_GET['token'])) {
	http_response_code(404);
	exit("Not found\n");
}

$db_name = (string) getenv('DB_DATABASE');
if ($db_name === '' || ! preg_match('/^[A-Za-z0-9_]+$/', $db_name) || in_array(strtolower($db_name), array('defaultdb', 'mysql', 'sys', 'information_schema', 'performance_schema'), TRUE)) {
	http_response_code(400);
	exit("DB_DATABASE harus diisi dengan nama database khusus aplikasi ini (bukan defaultdb).\n");
}

mysqli_report(MYSQLI_REPORT_OFF);
$mysqli = mysqli_init();
$flags = 0;
$ca_content = getenv('MYSQL_SSL_CA_CONTENT');
if ($ca_content) {
	$ca_file = sys_get_temp_dir().'/aiven-ca.pem';
	file_put_contents($ca_file, str_replace('\n', "\n", $ca_content));
	$mysqli->ssl_set(NULL, NULL, $ca_file, NULL, NULL);
	$flags = MYSQLI_CLIENT_SSL;
}
if ( ! @$mysqli->real_connect(getenv('DB_HOST'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'), NULL, (int) getenv('DB_PORT'), NULL, $flags)) {
	http_response_code(500);
	exit('Gagal konek ke MySQL: '.mysqli_connect_error()."\n");
}
$mysqli->set_charset('utf8mb4');
$mysqli->query("SET SESSION sql_mode = 'NO_ENGINE_SUBSTITUTION'");

if ( ! $mysqli->query("CREATE DATABASE IF NOT EXISTS `$db_name` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci")) {
	http_response_code(500);
	exit('Gagal membuat database: '.$mysqli->error."\n");
}
$mysqli->select_db($db_name);

$res = $mysqli->query("SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = '$db_name'");
$existing = (int) $res->fetch_row()[0];
if ($existing > 0 && ! isset($_GET['force'])) {
	exit("Database `$db_name` sudah berisi $existing tabel. Import dilewati.\n"
		."Tambahkan &force=1 untuk menimpa (semua data di database ini akan diganti).\n");
}

$sql = file_get_contents(dirname(__DIR__).'/install/database.sql');
if ($sql === FALSE) {
	http_response_code(500);
	exit("File install/database.sql tidak ditemukan.\n");
}

if ( ! $mysqli->multi_query($sql)) {
	http_response_code(500);
	exit('Import gagal: '.$mysqli->error."\n");
}
$n = 0;
do {
	$n++;
	if ($r = $mysqli->store_result()) { $r->free(); }
} while ($mysqli->more_results() && $mysqli->next_result());
if ($mysqli->errno) {
	http_response_code(500);
	exit("Import berhenti di statement ke-$n: ".$mysqli->error."\n");
}

$res = $mysqli->query("SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = '$db_name'");
echo "Import selesai: ".$res->fetch_row()[0]." tabel di database `$db_name`.\n";
echo "Sekarang hapus env INSTALL_TOKEN di Vercel dan redeploy.\n";
