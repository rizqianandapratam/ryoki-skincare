# 🧪 Laporan Pengujian Black Box (Black Box Testing Report)
**Project Name:** Ryoki Skincare Official Website  
**Target Environment:** Local (Laragon) & Production (Vercel Serverless)  
**Metodologi Pengujian:** Black Box Testing (Equivalence Partitioning, Boundary Value Analysis, State Transition, & Error Guessing)  
**Tanggal Pengujian:** September 2026  
**Status Pengujian:** ✅ PASS (100% Test Cases Passed)  

---

## 📋 1. Pendahuluan

### 1.1 Latar Belakang
Pengujian *Black Box Testing* dilakukan untuk memverifikasi fungsionalitas, keamanan antarmuka, aliran navigasi, validasi input, serta penanganan error pada website **Ryoki Skincare** tanpa melihat struktur kode internal (*source code*). Pengujian difokuskan pada perspektif pengguna akhir (*end-user*) dan administrator sistem (*admin panel*).

### 1.2 Teknik Pengujian yang Digunakan
1. **Equivalence Partitioning (EP):** Mengelompokkan input data menjadi kondisi valid dan tidak valid untuk menguji respon sistem.
2. **Boundary Value Analysis (BVA):** Menguji nilai ambang batas input (misal: jumlah karakter masukan, batas *rate limiting*).
3. **State Transition Testing:** Memeriksa perubahan status sesi (misal: dari status *Guest* → *Authenticated Admin* → *Logged Out*).
4. **Error Guessing & Resilience Testing:** Menguji pengiriman payload acak, manipulasi URL, serta serangan pembatasan request (*rate limit threshold*).

---

## 💻 2. Lingkungan Pengujian (Test Environment)

| Parameter | Spesifikasi Lingkungan |
|-----------|------------------------|
| **Sistem Operasi Tester** | Windows 11 / macOS / Linux |
| **Peramban (Browser)** | Google Chrome (v128+), Mozilla Firefox (v129+), Safari Mobile |
| **Resolusi Layar** | Desktop (1920x1080), Tablet (768x1024), Mobile (375x812) |
| **Base URL Target** | `http://ryoki-skincare.test` (Lokal) & `https://ryoki-skincare-app.vercel.app` (Production) |
| **Server Backend Engine** | Laravel 11 / PHP 8.2 (Vercel Serverless Engine) |

---

## 📊 3. Ringkasan Eksekusi Pengujian

| Modul Pengujian | Jumlah Case | Status Pass | Status Fail | Pass Rate |
|-----------------|-------------|-------------|-------------|-----------|
| **Modul 1: Navigasi & Halaman Publik** | 6 | 6 | 0 | 100% |
| **Modul 2: Katalog Produk & Pencarian** | 5 | 5 | 0 | 100% |
| **Modul 3: Form Kontak & Inbox Masuk** | 4 | 4 | 0 | 100% |
| **Modul 4: Analytics Click Tracker** | 3 | 3 | 0 | 100% |
| **Modul 5: Autentikasi Admin & Akses Kontrol** | 5 | 5 | 0 | 100% |
| **Modul 6: Admin Panel (CRUD Produk & Artikel)** | 6 | 6 | 0 | 100% |
| **Modul 7: SEO, Robots & Engine Sitemap** | 3 | 3 | 0 | 100% |
| **Modul 8: Security & Rate Limiting Test** | 4 | 4 | 0 | 100% |
| **TOTAL** | **36** | **36** | **0** | **100%** |

---

## 📝 4. Matriks Kasus Uji & Hasil Pengujian (Test Case Execution Matrix)

### 📌 Modul 1: Navigasi & Halaman Publik

| ID Case | Skenario Pengujian | Input / Aksi | Hasil yang Diharapkan | Hasil Aktual | Status |
|---------|--------------------|--------------|-----------------------|--------------|--------|
| **TC-NAV-01** | Akses Halaman Beranda (Homepage) | Buka URL `/` | Halaman beranda tampil lengkap dengan Hero Banner, Produk Unggulan, Best Seller, & FAB Widget | Tampil sesuai harapan tanpa layout pecah | **PASS** |
| **TC-NAV-02** | Akses Halaman Tentang Kami | Klik menu "Tentang Kami" | Menampilkan profil brand Ryoki, legalitas PT Golden Intan Berlian, & nilai produk | Tampil lengkap dengan animasi smooth | **PASS** |
| **TC-NAV-03** | Akses Halaman Katalog Produk | Klik menu "Produk Skincare" | Menampilkan seluruh katalog produk Ryoki beserta filter kategori | Tampil 10 produk Ryoki aktif | **PASS** |
| **TC-NAV-04** | Akses Halaman Skinpedia | Klik menu "Skinpedia" | Menampilkan artikel edukasi kesehatan kulit beserta thumbnail | Tampil daftar artikel terpublikasi | **PASS** |
| **TC-NAV-05** | Navigasi Menu Responsif Mobile | Klik tombol *Hamburger Menu* di layar HP | Menu dropdown mobile terbuka lancar dengan tombol toko resmi Shopee/TikTok | Menu toggle beroperasi normal | **PASS** |
| **TC-NAV-06** | Penanganan Halaman 404 Not Found | Buka URL acak misal `/halaman-tidak-ada` | Menampilkan halaman kustom 404 yang ramah pengguna dengan tombol kembali ke Beranda | Tampil Halaman 404 Kustom Ryoki | **PASS** |

---

### 📌 Modul 2: Katalog Produk, Filter & Integrasi Marketplace

| ID Case | Skenario Pengujian | Input / Aksi | Hasil yang Diharapkan | Hasil Aktual | Status |
|---------|--------------------|--------------|-----------------------|--------------|--------|
| **TC-PRD-01** | Pencarian Produk (Search Filter) | Ketik "Serum" pada kolom pencarian | Katalog menyaring otomatis dan hanya menampilkan produk yang mengandung kata "Serum" | Menampilkan produk Ryoki Gold Whitening Serum | **PASS** |
| **TC-PRD-02** | Filter Berdasarkan Kategori | Klik tombol filter "Cleanser" | Katalog menyaring otomatis dan hanya menampilkan produk kategori Cleanser | Menampilkan Facial Wash, Miss Comby & Peeling Spray | **PASS** |
| **TC-PRD-03** | Akses Detail Produk (Slug-Based) | Klik card produk "Ryoki Day Cream" | Berpindah ke `/products/ryoki-day-cream` menampilkan deskripsi, cara pakai, komposisi, & galeri foto | Detail produk terbuka presisi | **PASS** |
| **TC-PRD-04** | Pengalihan ke Shopee Official Store | Klik tombol "Beli di Shopee" | Membuka tab baru mengarah ke URL produk resmi Ryoki di Shopee | Membuka tautan Shopee dengan benar | **PASS** |
| **TC-PRD-05** | Pengalihan ke TikTok Shop | Klik tombol "Beli di TikTok Shop" | Membuka tab baru mengarah ke TikTok Shop resmi Ryoki | Membuka tautan TikTok Shop dengan benar | **PASS** |

---

### 📌 Modul 3: Form Kontak & Pengiriman Pesan Pengunjung

| ID Case | Skenario Pengujian | Input / Aksi | Hasil yang Diharapkan | Hasil Aktual | Status |
|---------|--------------------|--------------|-----------------------|--------------|--------|
| **TC-CNT-01** | Pengiriman Pesan Valid | Isi Nama, Email valid, No WA, & Pesan -> Klik "Kirim Pesan" | Pesan berhasil terkirim, muncul notifikasi sukses, & data tersimpan di Inbox Admin | Pesan masuk ke DB & notifikasi hijau muncul | **PASS** |
| **TC-CNT-02** | Form Kontak Kosong (Validation Check) | Kosongkan semua field -> Klik "Kirim Pesan" | Browser / sistem menahan pengiriman & menampilkan pesan validasi wajib diisi | Validasi HTML5 & Laravel aktif menolak request | **PASS** |
| **TC-CNT-03** | Format Email Tidak Valid | Isi Email dengan `usertanpaat.com` | Sistem menolak pengiriman & meminta format email yang benar | Pesan kesalahan format email muncul | **PASS** |
| **TC-CNT-04** | Respon Tombol Balas WhatsApp Admin | Admin klik "Balas via WhatsApp" di Inbox Admin | Membuka `wa.me/628xxx` (otomatis mengubah format `08` menjadi kode negara `62`) | Berhasil membuka WhatsApp Web/App ke nomor pengirim | **PASS** |

---

### 📌 Modul 4: Analytics Click Tracker

| ID Case | Skenario Pengujian | Input / Aksi | Hasil yang Diharapkan | Hasil Aktual | Status |
|---------|--------------------|--------------|-----------------------|--------------|--------|
| **TC-ANC-01** | Tracking Klik Tombol Shopee | Klik tombol Shopee di Halaman Utama / Detail | Request asynchronous `POST /analytics/click` terikirim & mencatat platform `shopee` di DB | Data klik tercatat di database | **PASS** |
| **TC-ANC-02** | Tracking Klik Tombol TikTok | Klik tombol TikTok Shop | Request mencatat platform `tiktok` beserta nama produk & lokasi tombol | Log terdeteksi di Dashboard Admin | **PASS** |
| **TC-ANC-03** | Tracking Klik WhatsApp CS | Klik widget Floating FAB WhatsApp | Request mencatat platform `whatsapp` | Log tersimpan di `click_analytics` | **PASS** |

---

### 📌 Modul 5: Autentikasi Admin & Proteksi Sesi

| ID Case | Skenario Pengujian | Input / Aksi | Hasil yang Diharapkan | Hasil Aktual | Status |
|---------|--------------------|--------------|-----------------------|--------------|--------|
| **TC-ATH-01** | Login Admin Kredensial Valid | Masukkan Email & Password Admin yang benar | Berhasil login, sesi terbentuk, & di-redirect ke `/admin/dashboard` | Masuk ke Dashboard Admin | **PASS** |
| **TC-ATH-02** | Login Admin Password Salah | Masukkan Email benar & Password salah | Login ditolak, muncul pesan "Email atau password yang Anda masukkan salah" | Menampilkan pesan error merah | **PASS** |
| **TC-ATH-03** | Proteksi Route Admin (Unauthenticated) | Akses langsung `/admin/dashboard` tanpa login terlebih dahulu | Ditolak oleh middleware `auth` & di-redirect otomatis ke `/admin/login` | Redirect ke Halaman Login | **PASS** |
| **TC-ATH-04** | Logout Admin | Klik tombol "Logout" di header Admin | Sesi di-hancurkan (*invalidated*), token di-reset, & di-redirect ke halaman login | Sesi bersih & keluar aman | **PASS** |
| **TC-ATH-05** | Akses Kembali Setelah Logout | Tekan tombol *Back* di browser setelah logout | Sistem menolak akses halaman cached admin & meminta login ulang | Berhasil dicegah | **PASS** |

---

### 📌 Modul 6: Manajemen Admin Panel (CRUD Produk & Artikel)

| ID Case | Skenario Pengujian | Input / Aksi | Hasil yang Diharapkan | Hasil Aktual | Status |
|---------|--------------------|--------------|-----------------------|--------------|--------|
| **TC-ADM-01** | Tambah Produk Baru | Admin isi Form Tambah Produk + Upload Foto -> Simpan | Produk baru tersimpan di DB, slug ter-generate otomatis, & tampil di katalog | Produk berhasil ditambahkan | **PASS** |
| **TC-ADM-02** | Update Data Produk | Edit harga & stok produk -> Simpan | Data produk ter-update real-time tanpa merusak galeri foto | Perubahan tersimpan sempurna | **PASS** |
| **TC-ADM-03** | Hapus Produk | Klik tombol Hapus Produk -> Konfirmasi | Produk & file gambar terkait terhapus dari sistem | Produk terhapus dari daftar | **PASS** |
| **TC-ADM-04** | Tambah Artikel Skinpedia | Admin isi judul & konten Rich Text -> Publish | Artikel tersimpan, thumbnail terkompresi Base64/Storage, & tampil di halaman Skinpedia | Artikel terpublikasi lancar | **PASS** |
| **TC-ADM-05** | Fitur Sinkronisasi Harga Live Marketplace | Klik tombol "⚡ Sync Harga Live Marketplace" | Sistem memanggil Service Sync, mengambil harga terbaru dari API Shopee, & meng-update DB | Muncul notifikasi "Berhasil menyinkronkan X produk" | **PASS** |
| **TC-ADM-06** | Balas Email via Gmail Composer | Klik "Balas via Gmail" di detail pesan kontak | Membuka tab baru `mail.google.com` dengan penerima & subjek pesan terisi otomatis | Terbuka Gmail Compose tab baru | **PASS** |

---

### 📌 Modul 7: SEO Engine, Robots.txt & Dynamic Sitemap

| ID Case | Skenario Pengujian | Input / Aksi | Hasil yang Diharapkan | Hasil Aktual | Status |
|---------|--------------------|--------------|-----------------------|--------------|--------|
| **TC-SEO-01** | Generator Sitemap XML Dinamis | Buka URL `/sitemap.xml` | Menghasilkan dokumen XML terstruktur berisi URL Homepage, Produk, Artikel, & Kontak | XML ter-render valid `text/xml` | **PASS** |
| **TC-SEO-02** | Pengujian `robots.txt` | Buka URL `/robots.txt` | Menampilkan aturan crawling (Allow public, Disallow `/admin/`, & izin bot AI) | Text file ter-render valid | **PASS** |
| **TC-SEO-03** | Verifikasi Protokol IndexNow | Buka URL `/indexnow.txt` | Menampilkan kunci verifikasi instan untuk mesin pencari | Menampilkan key verifikasi 200 OK | **PASS** |

---

### 📌 Modul 8: Security & Resilience Testing (Rate Limiting & Safety)

| ID Case | Skenario Pengujian | Input / Aksi | Hasil yang Diharapkan | Hasil Aktual | Status |
|---------|--------------------|--------------|-----------------------|--------------|--------|
| **TC-SEC-01** | Test Rate Limiting Form Kontak | Kirim Form Kontak > 5 kali secara berturut-turut dalam 1 menit | HTTP Response `429 Too Many Requests` aktif menolak spamming | Muncul respon `429 Too Many Requests` | **PASS** |
| **TC-SEC-02** | Test Rate Limiting Login Admin | Coba login salah > 5 kali berturut-turut | Sistem mengunci form login sementara dengan status `429` | Penguncian brute-force bekerja | **PASS** |
| **TC-SEC-03** | Uji Injeksi XSS pada Artikel | Admin memasukkan payload `<script>alert('xss')</script>` / `<img onerror=...>` pada artikel | Skrip berbahaya dibersihkan oleh `sanitizeHtmlContent()`, hanya tag format aman yang tersisa | Payload XSS berhasil dinetralkan | **PASS** |
| **TC-SEC-04** | Pengujian HTTP Security Headers | Periksa HTTP Response Header via DevTools Network | Memiliki header `X-Content-Type-Options`, `X-Frame-Options`, `X-XSS-Protection`, & `Referrer-Policy` | Header keamanan terdeteksi aktif | **PASS** |

---

## 🎯 5. Kesimpulan & Rekomendasi

### 5.1 Kesimpulan
Berdasarkan hasil pengujian *Black Box Testing* yang telah dieksekusi pada 36 kasus uji di seluruh modul sistem, dapat disimpulkan bahwa:
1. **Fungsionalitas Utama (100% Valid):** Seluruh fitur utama (katalog produk, filter interaktif, artikel Skinpedia, pengiriman pesan, integrasi Shopee/TikTok, & admin panel) berjalan sesuai spesifikasi kebutuhan pengguna.
2. **Resiliensi & Keamanan:** Fitur pembatasan request (*Rate Limiting*), proteksi dari XSS, serta pengamanan sesi admin berfungsi dengan sangat baik dalam menahan berbagai skenario percobaan serangan/spam.
3. **Persistensi Data:** Data yang dikelola oleh administrator tersimpan secara aman tanpa risiko ter-reset saat ada *request deployment* atau kunjungan pengguna.

### 5.2 Rekomendasi
- Melakukan pemantauan berkala (*monitoring log*) pada Vercel Analytics.
- Mendaftarkan domain resmi pada **Google Search Console** dan **Bing Webmaster Tools** dengan memanfaatkan URL `/sitemap.xml` yang telah teruji.
