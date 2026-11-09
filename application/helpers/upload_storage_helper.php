<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| Penyimpanan file upload.
|
| - Lokal (tanpa env BLOB_READ_WRITE_TOKEN): file disimpan di ./assets/images/ dan ./assets/files/ seperti biasa.
| - Vercel (ada BLOB_READ_WRITE_TOKEN): file diupload dulu ke folder sementara, lalu di akhir request
|   dikirim ke Vercel Blob dengan path images/<nama> atau files/<nama>. Nama file di database tidak berubah.
|   URL /assets/images/<nama> yang tidak ada di deploy diarahkan ke Blob oleh api/blob.php.
*/

if ( ! function_exists('blob_public_base_url'))
{
	// https://<storeId>.public.blob.vercel-storage.com
	function blob_public_base_url()
	{
		$parts = explode('_', (string) getenv('BLOB_READ_WRITE_TOKEN'));
		return isset($parts[3]) ? 'https://'.strtolower($parts[3]).'.public.blob.vercel-storage.com' : '';
	}
}

if ( ! function_exists('blob_request'))
{
	function blob_request($method, $path, $body, array $headers)
	{
		$api = getenv('VERCEL_BLOB_API_URL') ?: 'https://vercel.com/api/blob';
		$ch = curl_init($api.$path);
		$headers[] = 'authorization: Bearer '.getenv('BLOB_READ_WRITE_TOKEN');
		$headers[] = 'x-api-version: 13';
		curl_setopt_array($ch, array(
			CURLOPT_CUSTOMREQUEST  => $method,
			CURLOPT_POSTFIELDS     => $body,
			CURLOPT_HTTPHEADER     => $headers,
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_TIMEOUT        => 60,
		));
		$res = curl_exec($ch);
		$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		if ($code < 200 OR $code >= 300)
		{
			log_message('error', "Vercel Blob $method $path gagal ($code): $res");
			return FALSE;
		}
		return json_decode($res, TRUE);
	}
}

if ( ! function_exists('blob_put_file'))
{
	function blob_put_file($local_file, $pathname)
	{
		$types = array('jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif',
			'bmp' => 'image/bmp', 'webp' => 'image/webp', 'pdf' => 'application/pdf');
		$ext = strtolower(pathinfo($local_file, PATHINFO_EXTENSION));
		$type = isset($types[$ext]) ? $types[$ext] : 'application/octet-stream';

		return blob_request('PUT', '/?pathname='.rawurlencode($pathname), file_get_contents($local_file), array(
			'x-vercel-blob-access: public',
			'x-add-random-suffix: 0',
			'x-allow-overwrite: 1',
			'x-content-type: '.$type,
		));
	}
}

if ( ! function_exists('upload_storage_sync'))
{
	// Dipanggil otomatis di akhir request: kirim file baru di folder sementara ke Blob.
	function upload_storage_sync()
	{
		foreach (array('images' => UPLOAD_IMAGES_PATH, 'files' => UPLOAD_FILES_PATH) as $folder => $dir)
		{
			foreach ((array) glob($dir.'*') as $file)
			{
				if (is_file($file) && blob_put_file($file, $folder.'/'.basename($file)) !== FALSE)
				{
					@unlink($file);
				}
			}
		}
	}
}

if ( ! function_exists('upload_delete'))
{
	// Pengganti unlink() untuk file upload: hapus file lokal dan/atau di Blob.
	function upload_delete($path)
	{
		// Hanya nama file yang dipakai, jadi tidak bisa keluar dari folder upload (mis. "../../index.php").
		$is_files = strpos((string) $path, UPLOAD_FILES_PATH) === 0;
		$name = basename((string) $path);
		if ($name === '' OR $name === '.' OR $name === '..') { return; }
		$path = ($is_files ? UPLOAD_FILES_PATH : UPLOAD_IMAGES_PATH).$name;
		if (is_file($path)) { @unlink($path); }
		if ( ! UPLOAD_ON_BLOB) { return; }

		$folder = (strpos($path, UPLOAD_FILES_PATH) === 0) ? 'files' : 'images';
		$name = basename($path);
		if ($name === '' OR $name === 'images' OR $name === 'files') { return; }
		blob_request('POST', '/delete', json_encode(array('urls' => array(blob_public_base_url().'/'.$folder.'/'.$name))),
			array('content-type: application/json'));
	}
}

if ( ! function_exists('upload_read'))
{
	// Isi file upload untuk download: dari deploy jika ada, kalau tidak dari Blob.
	function upload_read($folder, $name)
	{
		$local = './assets/'.$folder.'/'.$name;
		if (is_file($local)) { return file_get_contents($local); }
		if ( ! UPLOAD_ON_BLOB) { return FALSE; }
		return @file_get_contents(blob_public_base_url().'/'.$folder.'/'.rawurlencode($name));
	}
}

if ( ! defined('UPLOAD_ON_BLOB'))
{
	define('UPLOAD_ON_BLOB', (string) getenv('BLOB_READ_WRITE_TOKEN') !== '');
	$upload_base = UPLOAD_ON_BLOB ? rtrim(sys_get_temp_dir(), '/').'/uploads/' : './assets/';
	define('UPLOAD_IMAGES_PATH', $upload_base.'images/');
	define('UPLOAD_FILES_PATH', $upload_base.'files/');

	if (UPLOAD_ON_BLOB)
	{
		foreach (array(UPLOAD_IMAGES_PATH, UPLOAD_FILES_PATH) as $dir)
		{
			if ( ! is_dir($dir)) { @mkdir($dir, 0777, TRUE); }
		}
		register_shutdown_function('upload_storage_sync');
	}
}
