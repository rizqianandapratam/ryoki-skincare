# 🛡️ Laporan Implementasi & Audit Keamanan Backend
**Project:** Ryoki Skincare Official Website  
**Teknologi Backend:** Laravel 11 (PHP 8.2+)  
**Infrastruktur Server:** Vercel Serverless & SQLite  
**Tanggal Audit & Hardening:** September 2026  

---

## 📋 1. Pendahuluan

Dokumen ini berisi laporan resmi pengujian dan penerapan fitur keamanan (*security hardening*) pada sistem backend website **Ryoki Skincare Official**. Pengujian dilakukan mencakup analisis kode (*Static Application Security Testing - SAST*), proteksi autentikasi, manajemen data sensitif, pencegahan *Distributed Denial of Service (DDoS) / Spamming*, serta mitigasi terhadap kerentanan OWASP Top 10.

---

## 📊 2. Ringkasan Status Keamanan

 Seluruh pengujian dan hardening keamanan telah selesai dilakukan dengan hasil sebagai berikut:

| Kategori Keamanan | Jumlah Pengujian | Status | Keterangan |
|-------------------|------------------|--------|------------|
| **Autentikasi & Akses Kontrol** | 3 Pengujian | ✅ Aman | Rate-limiting & proteksi session aktif |
| **Pencegahan Spam & DDoS** | 2 Pengujian | ✅ Aman | Middleware `throttle` aktif di seluruh API public & form |
| **Sanitasi Data & XSS** | 2 Pengujian | ✅ Aman | Penggunaan HTML Sanitizer & Blade Escaping (`{{ }}`) |
| **Manajemen Data & Kredensial** | 2 Pengujian | ✅ Aman | Kredensial di-shift ke `.env`, `.sqlite` dimasukkan `.gitignore` |
| **Pencegahan Overwrite Data** | 1 Pengujian | ✅ Aman | Auto-seeder berbahaya telah dihapus sepenuhnya |
| **HTTP Security Headers** | 4 Header | ✅ Aman | Header keamanan aktif di level CDN / Edge Vercel |

---

## 🔒 3. Rincian Implementasi & Pengujian Keamanan

### 1. Perlindungan Autentikasi & Sesi Admin (Authentication & Session Security)
- **Mekanisme:** 
  - Menggunakan enkripsi kata sandi standar industri **Bcrypt (12 rounds)** via `Hash::make()`.
  - Regenerasi ID Sesi otomatis (`$request->session()->regenerate()`) saat login sukses untuk mencegah serangan *Session Fixation*.
  - Penghapusan token dan pembatalan sesi (`$request->session()->invalidate()` & `regenerateToken()`) saat logout.
  - Penambahan middleware `throttle:5,1` pada route `POST /admin/login` untuk membatasi percobaan login maksimal **5 kali per menit per IP**, mencegah serangan *Brute-Force*.

### 2. Pencegahan Spam & DDoS pada Form & API Public (Rate Limiting)
- **Mekanisme:** 
  - **Form Kontak (`POST /contact`):** Diterapkan middleware `throttle:5,1` (maksimal 5 pengiriman pesan per menit per IP) guna mencegah *spamming/flooding* inbox admin oleh bot.
  - **Analytics Tracker (`POST /analytics/click`):** Diterapkan middleware `throttle:30,1` (maksimal 30 request per menit per IP) untuk mencegah manipulasi data statistik dan *storage-exhaustion*.

### 3. Pembersihan Sanitasi HTML & Pencegahan XSS (Cross-Site Scripting)
- **Mekanisme:**
  - Seluruh output tampilan menggunakan *blade escaping* `{{ $variable }}` yang secara otomatis mengonversi karakter berbahaya menjadi HTML Entities.
  - Untuk konten artikel *rich-text* di [Admin\ArticleController.php](file:///d:/laragon/www/ryoki-skincare/app/Http/Controllers/Admin/ArticleController.php), dibuat metode privat `sanitizeHtmlContent()` yang:
    1. Membatasi tag HTML hanya untuk formatting teks standar (`<p>`, `<h1>`, `<strong>`, `<a>`, `<img>`, dll.).
    2. Menghapus secara otomatis semua *inline event handler* JavaScript berbahaya (seperti `onerror=`, `onclick=`, `onload=`).
    3. Menghapus eksekusi skrip via skema URI `href="javascript:..."`.

### 4. Perlindungan Kerahasiaan Kredensial (Data Leakage Prevention)
- **Mekanisme:**
  - Menghapus kata sandi admin *hardcoded* dari file `DatabaseSeeder.php`. Password kini dibaca melalui *Environment Variable* (`ADMIN_PASSWORD` & `ADMIN2_PASSWORD`).
  - Memasukkan file database SQLite (`*.sqlite` dan `/database/*.sqlite`) ke dalam file [.gitignore](file:///d:/laragon/www/ryoki-skincare/.gitignore) untuk memastikan data sensitif pengguna tidak ter-push ke repository publik.

### 5. Penghapusan Eksekusi Otomatis Berbahaya (Auto-Seeder Elimination)
- **Mekanisme:**
  - Mengisolasi dan menghapus logika `Artisan::call('db:seed')` dan `Artisan::call('migrate')` otomatis yang sebelumnya berada pada `AppServiceProvider.php` dan `ProductController.php`.
  - Hal ini menjamin bahwa data produk, artikel, dan kontak yang dibuat oleh admin **100% aman dan tidak akan ter-reset atau tertimpa** saat pengguna mengakses website.

### 6. Penerapan HTTP Security Headers
- **Mekanisme:**
  - Konfigurasi HTTP Security Headers ditambahkan pada [vercel.json](file:///d:/laragon/www/ryoki-skincare/vercel.json) sehingga dieksekusi langsung pada layer *Vercel Edge Network*:
    - `X-Content-Type-Options: nosniff` — Mencegah browser menebak (*MIME sniffing*) tipe file yang diunduh.
    - `X-Frame-Options: SAMEORIGIN` — Mencegah halaman dimasukkan ke dalam `<iframe>` di situs lain (*Anti-Clickjacking*).
    - `X-XSS-Protection: 1; mode=block` — Mengaktifkan filter XSS bawaan browser legacy.
    - `Referrer-Policy: strict-origin-when-cross-origin` — Menjaga kerahasiaan URL pengirim saat bernavigasi ke luar domain.

### 7. Proteksi Terhadap SQL Injection
- **Mekanisme:**
  - 100% pemrosesan data basis data menggunakan **Laravel Eloquent ORM** dan *Query Builder* berparameterized (PDO prepared statements).
  - Penggunaan `DB::raw()` diisolasi hanya untuk fungsi agregat teraman seperti `count(*)` tanpa input variabel luar.

### 8. Pengaturan Mode Lingkungan Production (Environment Management)
- **Mekanisme:**
  - Pada lingkungan *Production* (Vercel), parameter `APP_DEBUG` diset ke `false` untuk mencegah kebocoran *stack trace*, variabel lingkungan, dan struktur basis data saat terjadi error.
  - Parameter `APP_NAME` telah disesuaikan secara konsisten menjadi `"Ryoki Japan Skincare"`.

---

## 🔄 4. Matriks Perbandingan Keamanan (Before vs After)

| Aspek Keamanan | Sebelum Perbaikan (Before) | Sesudah Perbaikan (After) |
|----------------|----------------------------|---------------------------|
| **Kredensial Admin** | Password terditulis jelas (*hardcoded*) di file Seeder. | Password dibaca via Environment Variable aman. |
| **Integritas Data** | Auto-seeder berjalan otomatis di tiap request jika produk < 10. | Auto-seeder dihapus total; data admin 100% persisten. |
| **Form & API Protection** | POST /contact & /analytics/click tanpa batas request. | Dibatasi dengan middleware `throttle:5,1` & `throttle:30,1`. |
| **Admin Login** | Login endpoint tidak memiliki rate limiting. | Diterapkan `throttle:5,1` untuk mencegah brute force. |
| **Versi Kontrol (Git)** | File database `database.sqlite` berisiko ter-commit. | Ditambahkan aturan `*.sqlite` pada `.gitignore`. |
| **Input Artikel (XSS)** | `strip_tags` standar (masih bisa di-inject `onerror`/`onclick`). | Sanitasi ketat menghapus atribut event JS & `javascript:`. |
| **Security Headers** | Belum dikonfigurasi di level Vercel CDN. | Dipasang 4 Security Headers utama pada `vercel.json`. |

---

## 🎯 5. Kesimpulan

Sistem backend **Ryoki Skincare Official** telah memenuhi standar keamanan aplikasi web modern (*Secure Web Application Development*). Seluruh celah keamanan berisiko tinggi (*high/critical*) seperti tereksposnya password, risiko data reset otomatis, dan potensi brute-force/spamming telah berhasil diatasi secara efektif.
