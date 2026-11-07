<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| Fungsi bantu untuk halaman publik (desain baru).
*/

if ( ! function_exists('t'))
{
	// Nilai pengaturan tampilan (lihat config/tampilan.php).
	function t($kunci)
	{
		$CI =& get_instance();
		$CI->load->model('m_tampilan');
		$p = $CI->m_tampilan->pengaturan();
		return isset($p[$kunci]) ? $p[$kunci] : '';
	}
}

if ( ! function_exists('te'))
{
	// Nilai pengaturan, sudah di-escape untuk HTML.
	function te($kunci)
	{
		return html_escape(t($kunci));
	}
}

if ( ! function_exists('t_on'))
{
	function t_on($kunci)
	{
		return t($kunci) === '1';
	}
}

if ( ! function_exists('items'))
{
	// Daftar isi aktif untuk grup tertentu (statistik, program, syarat, ...).
	function items($grup)
	{
		$CI =& get_instance();
		$CI->load->model('m_tampilan');
		return $CI->m_tampilan->items($grup);
	}
}

if ( ! function_exists('tautan'))
{
	// Ubah isian link dari admin jadi URL: "pendaftaran" -> base_url, "#x" -> beranda#x, URL penuh apa adanya.
	function tautan($nilai)
	{
		$nilai = trim((string) $nilai);
		if ($nilai === '') return base_url();
		if (preg_match('#^(https?:|mailto:|tel:|//)#i', $nilai)) return $nilai;
		if ($nilai[0] === '#') return base_url().$nilai;
		return base_url(ltrim($nilai, '/'));
	}
}

if ( ! function_exists('gambar_url'))
{
	// URL file upload di assets/images (diarahkan ke Vercel Blob bila perlu).
	function gambar_url($file)
	{
		$file = trim((string) $file);
		if ($file === '') return '';
		if (preg_match('#^https?://#i', $file)) return $file;
		return base_url('assets/images/'.rawurlencode($file));
	}
}

if ( ! function_exists('file_url'))
{
	function file_url($file)
	{
		$file = trim((string) $file);
		if ($file === '') return '';
		if (preg_match('#^https?://#i', $file)) return $file;
		return base_url('assets/files/'.rawurlencode($file));
	}
}

if ( ! function_exists('wa_url'))
{
	// Nomor WhatsApp (08xx / +62 / 62) -> https://wa.me/62xxx
	function wa_url($nomor)
	{
		$angka = preg_replace('/\D+/', '', (string) $nomor);
		if ($angka === '') return '';
		if ($angka[0] === '0') $angka = '62'.substr($angka, 1);
		return 'https://wa.me/'.$angka;
	}
}

if ( ! function_exists('ig_url'))
{
	function ig_url($nilai)
	{
		$nilai = trim((string) $nilai);
		if ($nilai === '') return '';
		if (preg_match('#^https?://#i', $nilai)) return $nilai;
		return 'https://instagram.com/'.ltrim($nilai, '@');
	}
}

if ( ! function_exists('fb_url'))
{
	function fb_url($nilai)
	{
		$nilai = trim((string) $nilai);
		if ($nilai === '') return '';
		if (preg_match('#^https?://#i', $nilai)) return $nilai;
		if (strpos($nilai, ' ') === FALSE) return 'https://facebook.com/'.$nilai;
		return 'https://www.facebook.com/search/top?q='.rawurlencode($nilai);
	}
}

if ( ! function_exists('warna_teks'))
{
	// Warna tetap untuk sebuah teks (kategori), diambil dari palet.
	function warna_teks($teks)
	{
		$CI =& get_instance();
		$CI->config->load('tampilan', TRUE);
		$palet = $CI->config->item('tampilan_palet', 'tampilan');
		$teks = strtolower(trim((string) $teks));
		if ($teks === '') return $palet[0];
		return $palet[abs(crc32($teks)) % count($palet)];
	}
}

if ( ! function_exists('tgl_indo'))
{
	// "2026-04-20" / "20/04/2026" / timestamp -> "20 April 2026"
	function tgl_indo($tanggal, $singkat = FALSE)
	{
		if (empty($tanggal) || $tanggal === '0000-00-00') return '';
		if (preg_match('#^(\d{2})/(\d{2})/(\d{4})$#', $tanggal, $m)) {
			$ts = mktime(0, 0, 0, (int) $m[2], (int) $m[1], (int) $m[3]);
		} else {
			$ts = is_numeric($tanggal) ? (int) $tanggal : strtotime($tanggal);
		}
		if ( ! $ts) return html_escape($tanggal);
		$bulan = $singkat
			? array('', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des')
			: array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
		return date('j', $ts).' '.$bulan[(int) date('n', $ts)].' '.date('Y', $ts);
	}
}

if ( ! function_exists('rentang_tgl'))
{
	// Tanggal mulai-selesai agenda: "10–20 Juni 2026", "1 April – 30 Juni 2026".
	function rentang_tgl($mulai, $selesai)
	{
		$a = strtotime((string) $mulai);
		$b = strtotime((string) $selesai);
		if ( ! $a || $mulai === '0000-00-00') return $b ? tgl_indo($selesai) : '';
		if ( ! $b || $selesai === '0000-00-00' || $a === $b) return tgl_indo($mulai);
		if (date('Y-m', $a) === date('Y-m', $b)) {
			return date('j', $a).'–'.tgl_indo($selesai);
		}
		if (date('Y', $a) === date('Y', $b)) {
			$x = explode(' ', tgl_indo($mulai));
			return $x[0].' '.$x[1].' – '.tgl_indo($selesai);
		}
		return tgl_indo($mulai).' – '.tgl_indo($selesai);
	}
}

if ( ! function_exists('ringkas'))
{
	// Potong teks (HTML dibuang) jadi n karakter.
	function ringkas($html, $n = 150)
	{
		$teks = html_entity_decode(strip_tags(str_replace(array('<br', '</p>'), array(' <br', '</p> '), (string) $html)), ENT_QUOTES, 'UTF-8');
		$teks = trim(preg_replace('/\s+/u', ' ', $teks));
		if (mb_strlen($teks) > $n) {
			$teks = rtrim(mb_substr($teks, 0, $n)).'…';
		}
		return html_escape($teks);
	}
}

if ( ! function_exists('paragraf'))
{
	// Teks biasa dari admin -> <p> per paragraf (baris kosong = paragraf baru).
	function paragraf($teks, $kelas = '')
	{
		$hasil = '';
		foreach (preg_split("/\R\s*\R/", trim((string) $teks)) as $p) {
			if (trim($p) === '') continue;
			$hasil .= '<p'.($kelas ? ' class="'.$kelas.'"' : '').'>'.nl2br(html_escape(trim($p))).'</p>';
		}
		return $hasil;
	}
}

if ( ! function_exists('daftar_dari_html'))
{
	// Isi CKEditor (misi) -> array poin. Nomor di depan ("1.", "2)") dibuang.
	function daftar_dari_html($html)
	{
		$html = (string) $html;
		if (preg_match_all('#<li[^>]*>(.*?)</li>#is', $html, $m)) {
			$bagian = $m[1];
		} else {
			$bagian = preg_split('#</p>|<br\s*/?>|\R#i', $html);
		}
		$hasil = array();
		foreach ($bagian as $b) {
			$t = trim(html_entity_decode(strip_tags($b), ENT_QUOTES, 'UTF-8'));
			$t = trim(preg_replace('/\s+/u', ' ', $t), " \t\xC2\xA0");
			$t = preg_replace('/^(\d+[\.\)]|[-•*])\s*/u', '', $t);
			if ($t !== '') $hasil[] = $t;
		}
		return $hasil;
	}
}

if ( ! function_exists('teks_polos'))
{
	function teks_polos($html)
	{
		return trim(preg_replace('/\s+/u', ' ', html_entity_decode(strip_tags((string) $html), ENT_QUOTES, 'UTF-8')));
	}
}

if ( ! function_exists('nilai_statistik'))
{
	// Ganti {jumlah_siswa} dan {jumlah_guru} dengan angka dari database.
	function nilai_statistik($nilai)
	{
		if (strpos((string) $nilai, '{') === FALSE) return $nilai;
		$CI =& get_instance();
		$ganti = array(
			'{jumlah_siswa}' => $CI->db->count_all('tbl_siswa'),
			'{jumlah_guru}' => $CI->db->count_all('tbl_guru'),
		);
		return strtr($nilai, $ganti);
	}
}

if ( ! function_exists('cek_aktif'))
{
	// Kelas "aktif" untuk menu.
	function cek_aktif($halaman, $aktif)
	{
		return in_array($aktif, (array) $halaman, TRUE) ? ' aktif' : '';
	}
}

if ( ! function_exists('ikon'))
{
	// Ikon SVG kecil (sosial media, dokumen).
	function ikon($nama)
	{
		$p = array(
			'facebook' => '<path d="M24 12.07C24 5.41 18.63 0 12 0S0 5.4 0 12.07C0 18.1 4.39 23.1 10.13 24v-8.44H7.08v-3.49h3.04V9.41c0-3.02 1.8-4.7 4.54-4.7 1.31 0 2.68.24 2.68.24v2.97h-1.5c-1.5 0-1.96.93-1.96 1.89v2.26h3.32l-.53 3.5h-2.8V24C19.62 23.1 24 18.1 24 12.07z"/>',
			'instagram' => '<path d="M12 2.16c3.2 0 3.58.01 4.85.07 3.25.15 4.77 1.69 4.92 4.92.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.15 3.23-1.66 4.77-4.92 4.92-1.27.06-1.64.07-4.85.07s-3.58-.01-4.85-.07c-3.26-.15-4.77-1.7-4.92-4.92-.06-1.27-.07-1.64-.07-4.85s.01-3.58.07-4.85C2.38 3.92 3.9 2.38 7.15 2.23 8.42 2.17 8.8 2.16 12 2.16zM12 0C8.74 0 8.33.01 7.05.07 2.7.27.27 2.69.07 7.05.01 8.33 0 8.74 0 12s.01 3.67.07 4.95c.2 4.36 2.62 6.78 6.98 6.98 1.28.06 1.69.07 4.95.07s3.67-.01 4.95-.07c4.35-.2 6.78-2.62 6.98-6.98.06-1.28.07-1.69.07-4.95s-.01-3.67-.07-4.95C23.73 2.7 21.31.27 16.95.07 15.67.01 15.26 0 12 0zm0 5.84a6.16 6.16 0 100 12.32 6.16 6.16 0 000-12.32zM12 16a4 4 0 110-8 4 4 0 010 8zm6.41-11.85a1.44 1.44 0 100 2.88 1.44 1.44 0 000-2.88z"/>',
			'youtube' => '<path d="M23.5 6.19a3.02 3.02 0 00-2.12-2.14C19.5 3.55 12 3.55 12 3.55s-7.5 0-9.38.5A3.02 3.02 0 00.5 6.19C0 8.07 0 12 0 12s0 3.93.5 5.81a3.02 3.02 0 002.12 2.14c1.88.5 9.38.5 9.38.5s7.5 0 9.38-.5a3.02 3.02 0 002.12-2.14C24 15.93 24 12 24 12s0-3.93-.5-5.81zM9.55 15.57V8.43L15.82 12l-6.27 3.57z"/>',
			'tiktok' => '<path d="M12.53.02C13.84 0 15.14.01 16.44 0c.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>',
			'whatsapp' => '<path d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.16-.17.2-.35.22-.64.07-.3-.15-1.26-.46-2.39-1.47-.88-.79-1.48-1.76-1.65-2.06-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.03-.52-.07-.15-.67-1.61-.92-2.2-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.06 2.88 1.21 3.07c.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.7.63.71.23 1.36.2 1.87.12.57-.09 1.76-.72 2-1.41.25-.7.25-1.29.18-1.41-.08-.13-.27-.2-.57-.35zM12 21.88a9.88 9.88 0 01-5.03-1.38l-.36-.21-3.76.88.94-3.67-.24-.37A9.84 9.84 0 012.12 12C2.12 6.53 6.53 2.12 12 2.12S21.88 6.53 21.88 12 17.47 21.88 12 21.88zM12 0C5.37 0 0 5.37 0 12c0 2.12.55 4.12 1.52 5.85L0 24l6.34-1.48A11.95 11.95 0 0012 24c6.63 0 12-5.37 12-12S18.63 0 12 0z"/>',
			'dokumen' => '<path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6zM14 2v6h6M9 13h6M9 17h6"/>',
			'panah' => '<path d="M2 3.5L5 6.5L8 3.5" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>',
		);
		if ( ! isset($p[$nama])) return '';
		$vb = $nama === 'panah' ? '0 0 10 10' : '0 0 24 24';
		$ukuran = $nama === 'panah' ? ' width="10" height="10"' : '';
		$isi = $nama === 'dokumen' ? '' : ' fill="currentColor"';
		return '<svg viewBox="'.$vb.'"'.$ukuran.$isi.' aria-hidden="true" focusable="false">'.$p[$nama].'</svg>';
	}
}
