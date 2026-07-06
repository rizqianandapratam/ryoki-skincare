# Ryoki Skincare Company Profile

Website profil perusahaan (company profile) untuk Ryoki Skincare, brand kosmetik di bawah naungan PT Golden Intan Berlian. 
Aplikasi ini dibangun menggunakan Laravel 11, Tailwind CSS, Alpine.js, dan MySQL.

## Fitur Utama

- **Public Frontend:**
  - Beranda (Home) dengan carousel testimoni dan produk best seller.
  - Tentang Kami (Visi, Misi, Sejarah).
  - Katalog Produk (dengan filter kategori & pencarian).
  - Blog/Artikel (Ryoki Journal).
  - Halaman Kontak.
  - Mobile-first design, SEO friendly, clean aesthetics dengan warna *sage green* dan *soft pink*.

- **Admin Panel (Protected):**
  - Autentikasi dengan Laravel Breeze (Blade).
  - Dashboard ringkasan data.
  - Manajemen Produk (CRUD + Upload Gambar).
  - Manajemen Artikel (CRUD + Upload Gambar).
  - Kotak Masuk Pesan dari Pengunjung.

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL / MariaDB

## Instalasi

Ikuti langkah-langkah berikut untuk menjalankan aplikasi di komputer lokal Anda:

1. **Clone repository (jika dari git) atau letakkan folder di direktori server lokal (misalnya `c:\laragon\www\Ryoki`).**

2. **Install Dependensi PHP:**
   ```bash
   composer install
   ```

3. **Install Dependensi Frontend:**
   ```bash
   npm install
   ```

4. **Konfigurasi Environment:**
   Salin file konfigurasi environment dan sesuaikan kredensial database.
   ```bash
   cp .env.example .env
   ```
   Buka file `.env` dan atur koneksi database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ryoki
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

6. **Migrasi dan Seeding Database:**
   Perintah ini akan membuat tabel di database dan mengisi data dummy (admin, produk, artikel).
   ```bash
   php artisan migrate:fresh --seed
   ```

7. **Buat Symlink Storage:**
   Agar gambar yang diunggah dapat diakses oleh publik.
   ```bash
   php artisan storage:link
   ```

8. **Build Asset Frontend:**
   ```bash
   npm run build
   ```

9. **Jalankan Development Server:**
   ```bash
   php artisan serve
   ```
   Aplikasi publik dapat diakses di `http://127.0.0.1:8000`.

## Akses Admin Panel

Untuk mengelola website, masuk ke panel admin:
- **URL:** `http://127.0.0.1:8000/admin/login` (atau `/login`)
- **Email:** `admin@ryokiskincare.com`
- **Password:** `password`

## Lisensi

Aplikasi ini dibuat khusus untuk keperluan internal PT Golden Intan Berlian.
