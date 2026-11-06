<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Aiven MySQL memakai sql_mode ketat (ANSI, ONLY_FULL_GROUP_BY, STRICT).
// Aplikasi ini ditulis untuk MySQL/MariaDB default, jadi mode-nya dilonggarkan per koneksi.
$hook['post_controller_constructor'][] = array(
	'class'    => 'Db_sql_mode',
	'function' => 'apply',
	'filename' => 'Db_sql_mode.php',
	'filepath' => 'hooks'
);
