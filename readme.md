# Website SMP Islam Al-Hadiriyah (sekolah3)

Website profil sekolah dan sistem informasi sederhana untuk SMP Islam Al-Hadiriyah, Duren Sawit, Jakarta Timur. Ada halaman publik untuk pengunjung (berita, agenda, galeri, PPDB, absensi) dan panel admin untuk mengelola semua kontennya.

**Live:** https://sekolah3-riosetiawan97s-projects.vercel.app

## Fitur

**Halaman publik**
- Beranda dengan slider, berita terbaru, agenda, dan pengumuman
- Tentang sekolah, visi & misi
- Berita/artikel dengan kategori dan komentar (`/artikel`)
- Agenda/event, pengumuman, FAQ
- Galeri foto per album
- Download file/dokumen sekolah
- PPDB: alur pendaftaran, syarat, jadwal, dan formulir pendaftaran online (data masuk ke admin)
- Absensi guru (`/guru`) dan absensi siswa (`/siswa`)
- Kontak: formulir pesan, peta lokasi, WhatsApp, Instagram

**Tampilan baru** mengikuti desain "SMP Al Hadiriyah" dari Claude Design (font Plus Jakarta Sans, warna navy & emas). Hampir semua teks, warna, gambar, dan daftar di halaman publik bisa diubah dari admin:

| Bagian di website | Diatur di admin |
| --- | --- |
| Warna, nama di logo, pita pengumuman, bar info atas, tombol "Daftar Sekarang" | Tampilan Website > Pengaturan Tampilan (tab Umum, Header) |
| Hero beranda (label, judul, deskripsi, 2 tombol) | Pengaturan Tampilan > Hero Beranda; foto latar = foto galeri bertanda Slider |
| Statistik, Program Unggulan, Fakta Sekolah | Tampilan Website > Statistik / Program / Fakta |
| Kepala sekolah (foto, nama, sambutan singkat) | Pengaturan Tampilan > Kepala Sekolah |
| Tampil/sembunyi & judul setiap bagian beranda | Pengaturan Tampilan > Bagian Beranda |
| Judul & subjudul banner setiap halaman | Pengaturan Tampilan > Judul Halaman |
| Visi, misi, About, data kontak, logo | Setup (menu lama) |
| Langkah pendaftaran (ikon & warna), syarat, jadwal, info penting | PPDB > Alur / Syarat / Jadwal / Info Penting |
| Formulir pendaftaran PPDB (buka/tutup, pesan) & data pendaftar | PPDB > Data Pendaftar; Pengaturan Tampilan > PPDB |
| Tanya-jawab FAQ per kategori | FAQ > tombol "Pertanyaan & Jawaban" |
| Kategori event (label berwarna) | Agenda > isian Kategori |
| Menu navigasi (termasuk dropdown) dan link footer | Tampilan Website > Menu Navigasi / Link Footer |
| Guru, siswa, kelas (pilihan di Absensi), file download | Data Sekolah |
| Email pemberitahuan pendaftar baru | Pengaturan Tampilan > PPDB (alamat tujuan) + env `SMTP_*` |
| Peta Google Maps, YouTube, TikTok, brosur PDF, footer | Pengaturan Tampilan > Kontak & Footer |

Tabel baru (`tbl_pengaturan`, `tbl_konten_item`, `tbl_faq_item`, `tbl_pendaftar`) dan kolom baru dibuat otomatis saat website pertama kali dibuka (`application/hooks/Skema_tampilan.php`), jadi database yang sudah ada tidak perlu diimport ulang. Daftar semua pengaturan beserta nilai bawaannya ada di `application/config/tampilan.php`.

**Panel admin** (`/administrator`)
- Dashboard ringkasan, pendaftar PPDB terbaru, dan statistik pengunjung
- Kelola berita/tulisan, kategori, komentar, dan inbox pesan
- Kelola agenda, pengumuman, FAQ (tanya-jawab), brosur, alur pendaftaran
- Kelola tampilan website dan data pendaftar PPDB
- Kelola galeri, album, video YouTube, dan file download
- Kelola data guru, siswa, kelas, file download, dan kuis (menu Data Sekolah)
- Kelola pengguna admin (level admin / user)
- Pengaturan website: nama sekolah, logo, alamat, kontak, halaman About, Visi Misi, Pendaftaran

**Penyimpanan upload**: foto dan file dari panel admin disimpan di Vercel Blob, jadi tidak hilang saat redeploy. Nama file di database tetap sama, dan URL `/assets/images/<nama>` otomatis diarahkan ke Blob.

## Stack

| Bagian | Teknologi |
| --- | --- |
| Framework | CodeIgniter 3.1.13 (PHP 8.3) |
| Tampilan | Publik: HTML/CSS/JS sendiri (`assets/depan/`); admin: Metronic 8 (Bootstrap 5), jQuery |
| Database | MySQL 8 (Aiven), koneksi SSL |
| Session | Disimpan di database (tabel `ci_sessions`) |
| Upload file | Vercel Blob (store `sekolah3-uploads`) |
| Deploy | Vercel, runtime `vercel-php` |

## Environment variable

| Nama | Keterangan |
| --- | --- |
| `DB_HOST`, `DB_PORT` | Host dan port MySQL Aiven |
| `DB_USERNAME`, `DB_PASSWORD` | User dan password database |
| `DB_DATABASE` | Nama database (`sekolah3`) |
| `MYSQL_SSL_CA_CONTENT` | Isi sertifikat CA Aiven untuk SSL |
| `APP_KEY` | Encryption key CodeIgniter (string acak) |
| `CI_ENV` | `production` (error tidak ditampilkan ke pengunjung) |
| `BLOB_READ_WRITE_TOKEN` | Otomatis terisi saat store Blob dihubungkan ke project |
| `APP_URL` | Opsional, paksa base URL (default: dideteksi dari domain) |
| `SMTP_HOST`, `SMTP_PORT`, `SMTP_USER`, `SMTP_PASS` | Opsional. Server email untuk pemberitahuan pendaftar PPDB baru (mis. Gmail: `smtp.gmail.com`, port `587`, pakai App Password) |
| `SMTP_CRYPTO`, `SMTP_FROM` | Opsional. Enkripsi (`tls` bawaan, `ssl` untuk port 465) dan alamat pengirim (bawaan: `SMTP_USER`) |

Semua variabel di atas opsional untuk development lokal. Tanpa variabel tersebut aplikasi memakai `localhost`, user `root`, dan menyimpan upload di folder `assets/`.

## Menjalankan secara lokal

Butuh PHP 8.x (ekstensi `mysqli`, `gd`, `curl`) dan MySQL/MariaDB (misalnya XAMPP).

1. Buat database, lalu import `install/database.sql`.
2. Atur koneksi lewat environment variable, atau ubah nilai default di `application/config/database.php`.
3. Jalankan:

```bash
php -S localhost:8000 api/index.php
```

Buka http://localhost:8000. Panel admin ada di http://localhost:8000/administrator.

## Deploy (Vercel)

1. Import repo ini di Vercel (tanpa framework; `vercel.json` sudah mengatur runtime PHP).
2. Isi environment variable di atas, lalu hubungkan Vercel Blob dari tab **Storage**.
3. Isi database kosong sekali: set env `INSTALL_TOKEN` (string acak), deploy, lalu buka `https://<domain>/install?token=<INSTALL_TOKEN>`. Installer membuat database `DB_DATABASE` dan mengimpor `install/database.sql`. Setelah selesai, hapus `INSTALL_TOKEN` lalu redeploy.

Setiap push ke branch `main` otomatis terdeploy.

Catatan Aiven: `sql_mode` Aiven ketat (ANSI, STRICT, ONLY_FULL_GROUP_BY). Hook `application/hooks/Db_sql_mode.php` melonggarkannya per koneksi, jadi query lama tetap jalan.

## Struktur

```
api/
  index.php        entry point Vercel, meneruskan request ke CodeIgniter
  install.php      installer database sekali pakai (/install?token=...)
  blob.php         redirect file upload ke Vercel Blob
application/
  controllers/     halaman publik; admin/ untuk panel admin
  models/          query database (M_*.php)
  views/           depan/ (publik), admin/ (panel admin), template
  helpers/         upload_storage_helper.php (upload ke Vercel Blob), dll.
  hooks/           Db_sql_mode.php (kompatibilitas sql_mode Aiven)
  config/          konfigurasi (membaca environment variable)
assets/            CSS/JS (Metronic, plugin), gambar & file bawaan
theme/             aset tema halaman publik
install/           database.sql: dump siap import ke MySQL 8 / Aiven
system/            core CodeIgniter 3.1.13
vercel.json        runtime PHP dan aturan routing
```

File `*.sql` di root (mis. `127_0_0_1.sql`) adalah dump lama dari hosting sebelumnya, disimpan sebagai arsip. Untuk instalasi baru pakai `install/database.sql`.
