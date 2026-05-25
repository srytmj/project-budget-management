# Project Budget Management

Sistem manajemen anggaran dan keuangan proyek berbasis web yang dibangun dengan framework Laravel 12. Aplikasi ini digunakan untuk mencatat, mengelola, dan melaporkan sirkulasi keuangan terkait proyek, mulai dari pengelolaan kas hingga pembentukan Laporan Realisasi Anggaran (LRA).

## Fitur Utama

Sistem ini memiliki beberapa modul utama untuk mendukung manajemen keuangan proyek:
- Autentikasi dan manajemen hak akses pengguna menggunakan Laravel Breeze.
- Manajemen Data Master: Chart of Accounts (COA), data vendor, dan data pemberi proyek.
- Manajemen Proyek: Pencatatan kontrak proyek beserta termin pembayarannya.
- Transaksi Keuangan: Pencatatan kas masuk dan kas keluar berdasarkan kategori kas yang ditentukan.
- Akuntansi: Pencatatan jurnal umum secara manual atau otomatis melalui sistem.
- Pelaporan Keuangan: Pembuatan Laporan Realisasi Anggaran (LRA) dan Laporan Laba Rugi.

## Kebutuhan Sistem

Sebelum menjalankan proyek ini, pastikan perangkat Anda sudah terinstal beberapa tools berikut:
- PHP versi 8.2 atau yang lebih baru
- Composer
- Node.js dan NPM
- Database server (MySQL, PostgreSQL, atau SQLite)

## Langkah Instalasi

Proyek ini sudah dilengkapi dengan skrip otomatis untuk mempercepat proses instalasi awal.

1. Clone repositori ke direktori lokal:

```bash
git clone https://github.com/srytmj/project-budget-management.git
cd project-budget-management

```

2. Jalankan perintah setup otomatis melalui Composer:
```bash
composer setup

```


Perintah di atas secara otomatis akan mengeksekusi rangkaian proses berikut:
* Instalasi dependensi PHP (`composer install`).
* Menyalin file `.env.example` menjadi `.env` jika belum tersedia di root folder.
* Membuat application key baru (`php artisan key:generate`).
* Menjalankan migrasi database ke sistem (`php artisan migrate --force`).
* Instalasi dependensi frontend via NPM (`npm install`).
* Melakukan kompilasi aset frontend untuk mode produksi (`npm run build`).



*Catatan:* Jika Anda menggunakan database selain SQLite (seperti MySQL), harap sesuaikan terlebih dahulu konfigurasi kredensial database di file `.env` sebelum menjalankan skrip di atas, atau jalankan perintah `php artisan migrate` secara manual setelah file konfigurasi selesai diubah.

## Menjalankan Aplikasi di Lingkungan Pengembangan

Untuk mempermudah proses development, Anda tidak perlu membuka banyak tab terminal terpisah. Cukup jalankan satu perintah berikut:

```bash
composer dev

```

Skrip ini akan menjalankan beberapa proses penting sekaligus dalam satu jendela terminal:

* Local development server Laravel (`php artisan serve`)
* Queue listener untuk background jobs (`php artisan queue:listen`)
* Log tailing secara real-time menggunakan Laravel Pail (`php artisan pail`)
* Vite development server untuk hot-reloading frontend (`npm run dev`)

Setelah berhasil berjalan, aplikasi dapat diakses melalui browser di alamat `http://localhost:8000`.

## Pengujian (Testing)

Untuk membersihkan cache konfigurasi lama dan menjalankan automated testing yang tersedia, Anda bisa menggunakan perintah:

```bash
composer test

```

## Tech Stack

* Backend: Framework Laravel 12 (PHP 8.2)
* Frontend: Tailwind CSS, Alpine.js, Vite
* Starter Kit: Laravel Breeze
* Dev Tools: Laravel Sail, Laravel Pint, Laravel Pail
