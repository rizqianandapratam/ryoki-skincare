# 📋 Dokumentasi Pengujian API (Postman Testing)

## Website Ryoki Japan Skincare

**Framework:** Laravel 12  
**Base URL:** `http://127.0.0.1:8000`  
**Database:** SQLite  
**Tanggal Pengujian:** 3 September 2026  

---

## Daftar Isi

1. [Pendahuluan](#1-pendahuluan)
2. [Daftar Endpoint yang Diuji](#2-daftar-endpoint-yang-diuji)
3. [Pengujian Endpoint Publik](#3-pengujian-endpoint-publik)
   - 3.1 [GET /api/products — Daftar Semua Produk](#31-get-apiproducts--daftar-semua-produk)
   - 3.2 [GET /api/products?category=Serum — Filter Berdasarkan Kategori](#32-get-apiproductscategoryserum--filter-berdasarkan-kategori)
   - 3.3 [GET /api/products?search=facial — Pencarian Produk](#33-get-apiproductssearchfacial--pencarian-produk)
   - 3.4 [POST /contact — Kirim Pesan Kontak](#34-post-contact--kirim-pesan-kontak)
   - 3.5 [POST /analytics/click — Tracking Klik Marketplace](#35-post-analyticsclick--tracking-klik-marketplace)
4. [Pengujian Endpoint SEO & Crawler](#4-pengujian-endpoint-seo--crawler)
   - 4.1 [GET /robots.txt](#41-get-robotstxt)
   - 4.2 [GET /sitemap.xml](#42-get-sitemapxml)
5. [Pengujian Endpoint Admin (Protected)](#5-pengujian-endpoint-admin-protected)
   - 5.1 [POST /admin/login — Autentikasi Admin](#51-post-adminlogin--autentikasi-admin)
   - 5.2 [CRUD Produk (Admin)](#52-crud-produk-admin)
   - 5.3 [CRUD Artikel (Admin)](#53-crud-artikel-admin)
   - 5.4 [Manajemen Kontak / Inbox (Admin)](#54-manajemen-kontak--inbox-admin)
6. [Ringkasan Hasil Pengujian](#6-ringkasan-hasil-pengujian)
7. [Kesimpulan](#7-kesimpulan)

---

## 1. Pendahuluan

Pengujian API dilakukan menggunakan **Postman** dan tools pendukung lainnya untuk memastikan setiap endpoint pada website Ryoki Japan Skincare berfungsi sesuai spesifikasi. Pengujian mencakup endpoint publik (dapat diakses tanpa login), endpoint SEO/crawler, serta endpoint admin yang dilindungi autentikasi.

### Tools yang Digunakan

| Tool | Fungsi |
|------|--------|
| **Postman** | Pengujian API secara manual (GET, POST, PUT, DELETE) |
| **Laravel Artisan** | Verifikasi route list dan database |
| **Browser** | Verifikasi tampilan response JSON dan halaman web |
| **cURL / PowerShell** | Pengujian endpoint via command line |

### Environment Setup

| Variabel | Nilai |
|----------|-------|
| `base_url` | `http://127.0.0.1:8000` |
| `content_type` | `application/json` |
| `accept` | `application/json` |

---

## 2. Daftar Endpoint yang Diuji

| No | Method | Endpoint | Deskripsi | Auth |
|----|--------|----------|-----------|------|
| 1 | `GET` | `/api/products` | Daftar semua produk (JSON) | ❌ |
| 2 | `GET` | `/api/products?category={nama}` | Filter produk per kategori | ❌ |
| 3 | `GET` | `/api/products?search={keyword}` | Pencarian produk | ❌ |
| 4 | `POST` | `/contact` | Kirim pesan kontak | ❌ (CSRF) |
| 5 | `POST` | `/analytics/click` | Tracking klik tombol marketplace | ❌ |
| 6 | `GET` | `/robots.txt` | File robots.txt untuk crawler | ❌ |
| 7 | `GET` | `/sitemap.xml` | XML Sitemap dinamis | ❌ |
| 8 | `POST` | `/admin/login` | Login admin | ❌ |
| 9 | `GET` | `/admin/products` | Daftar produk (admin) | ✅ |
| 10 | `POST` | `/admin/products` | Tambah produk baru | ✅ |
| 11 | `PUT` | `/admin/products/{id}` | Edit produk | ✅ |
| 12 | `DELETE` | `/admin/products/{id}` | Hapus produk | ✅ |
| 13 | `GET` | `/admin/articles` | Daftar artikel (admin) | ✅ |
| 14 | `POST` | `/admin/articles` | Tambah artikel baru | ✅ |
| 15 | `GET` | `/admin/contacts` | Daftar pesan masuk | ✅ |
| 16 | `PATCH` | `/admin/contacts/{id}/mark-read` | Tandai pesan dibaca | ✅ |
| 17 | `DELETE` | `/admin/contacts/{id}` | Hapus pesan | ✅ |

---

## 3. Pengujian Endpoint Publik

### 3.1 GET /api/products — Daftar Semua Produk

Endpoint ini mengembalikan seluruh data produk dalam format JSON, digunakan oleh frontend (Alpine.js) untuk menampilkan katalog produk secara interaktif.

**Request:**
```
GET http://127.0.0.1:8000/api/products
Accept: application/json
```

**Response: ✅ 200 OK**
```json
{
  "products": [
    {
      "id": 1,
      "name": "Ryoki Gentle Glow Facial Wash",
      "slug": "ryoki-gentle-glow-facial-wash",
      "description": "RYOKI Facial Wash hadir dengan formula Fish Collagen dari Jepang...",
      "category": "Cleanser",
      "price": 50000,
      "price_formatted": "Rp 50.000",
      "rating": "5.0",
      "is_best_seller": true,
      "image_url": "http://127.0.0.1:8000/images/facial-wash.png",
      "url": "http://127.0.0.1:8000/products/ryoki-gentle-glow-facial-wash",
      "tiktok_url": "https://www.tiktok.com/@ryokijapanskin",
      "shopee_url": "https://shopee.co.id/RYOKI-Facial-Wash-Japan-..."
    },
    {
      "id": 2,
      "name": "Ryoki Gold Whitening Serum",
      "slug": "ryoki-gold-whitening-serum",
      "description": "Serum pencerah wajah dengan konsentrasi Niacinamide 10%...",
      "category": "Serum",
      "price": 60000,
      "price_formatted": "Rp 60.000",
      "rating": "4.9",
      "is_best_seller": true,
      "image_url": "http://127.0.0.1:8000/images/serum.png",
      "url": "http://127.0.0.1:8000/products/ryoki-gold-whitening-serum",
      "tiktok_url": "https://www.tiktok.com/@ryokijapanskin",
      "shopee_url": "https://shopee.co.id/RYOKI-Gold-Whitening-Serum-..."
    }
  ],
  "categories": [
    "Cleanser",
    "Serum",
    "Moisturizer",
    "Toner",
    "Personal Care",
    "Body Care",
    "Hair Care"
  ]
}
```

**Hasil Pengujian:**

| Aspek | Hasil |
|-------|-------|
| Status Code | `200 OK` ✅ |
| Jumlah Produk | 10 produk |
| Jumlah Kategori | 7 kategori |
| Format Response | JSON valid |
| Waktu Response | ~500ms |

---

### 3.2 GET /api/products?category=Serum — Filter Berdasarkan Kategori

Endpoint ini mendukung query parameter `category` untuk memfilter produk berdasarkan kategori tertentu.

**Request:**
```
GET http://127.0.0.1:8000/api/products?category=Serum
Accept: application/json
```

**Response: ✅ 200 OK**
```json
{
  "products": [
    {
      "id": 2,
      "name": "Ryoki Gold Whitening Serum",
      "slug": "ryoki-gold-whitening-serum",
      "description": "Serum pencerah wajah dengan konsentrasi Niacinamide 10%...",
      "category": "Serum",
      "price": 60000,
      "price_formatted": "Rp 60.000",
      "rating": "4.9",
      "is_best_seller": true,
      "image_url": "http://127.0.0.1:8000/images/serum.png",
      "url": "http://127.0.0.1:8000/products/ryoki-gold-whitening-serum",
      "tiktok_url": "https://www.tiktok.com/@ryokijapanskin",
      "shopee_url": "https://shopee.co.id/RYOKI-Gold-Whitening-Serum-..."
    }
  ],
  "categories": ["Cleanser", "Serum", "Moisturizer", "Toner", "Personal Care", "Body Care", "Hair Care"]
}
```

**Hasil Pengujian:**

| Aspek | Hasil |
|-------|-------|
| Status Code | `200 OK` ✅ |
| Jumlah Produk (Serum) | 1 produk |
| Filter Berfungsi | ✅ Benar, hanya produk kategori "Serum" |
| Kategori Tetap Lengkap | ✅ Semua 7 kategori tetap dikembalikan |

---

### 3.3 GET /api/products?search=facial — Pencarian Produk

Endpoint ini mendukung query parameter `search` untuk mencari produk berdasarkan nama, deskripsi, atau kategori.

**Request:**
```
GET http://127.0.0.1:8000/api/products?search=facial
Accept: application/json
```

**Response: ✅ 200 OK**
```json
{
  "products": [
    {
      "id": 1,
      "name": "Ryoki Gentle Glow Facial Wash",
      "slug": "ryoki-gentle-glow-facial-wash",
      "description": "RYOKI Facial Wash hadir dengan formula Fish Collagen...",
      "category": "Cleanser",
      "price": 50000,
      "price_formatted": "Rp 50.000",
      "rating": "5.0",
      "is_best_seller": true,
      "image_url": "http://127.0.0.1:8000/images/facial-wash.png",
      "url": "http://127.0.0.1:8000/products/ryoki-gentle-glow-facial-wash",
      "tiktok_url": "https://www.tiktok.com/@ryokijapanskin",
      "shopee_url": "https://shopee.co.id/RYOKI-Facial-Wash-Japan-..."
    }
  ],
  "categories": ["Cleanser", "Serum", "Moisturizer", "Toner", "Personal Care", "Body Care", "Hair Care"]
}
```

**Hasil Pengujian:**

| Aspek | Hasil |
|-------|-------|
| Status Code | `200 OK` ✅ |
| Jumlah Produk Ditemukan | 1 produk (mengandung kata "facial") |
| Pencarian Berfungsi | ✅ Benar, pencarian mencakup nama, deskripsi, dan kategori |
| Case-Insensitive | ✅ |

---

### 3.4 POST /contact — Kirim Pesan Kontak

Endpoint ini menerima data form kontak dari pengunjung website. Dilindungi oleh **CSRF Token** dan **Rate Limiter** (5 request per menit) untuk keamanan.

**Request:**
```
POST http://127.0.0.1:8000/contact
Content-Type: application/json
Accept: application/json
X-CSRF-TOKEN: {csrf_token}

{
  "name": "Budi Santoso",
  "email": "budi@example.com",
  "phone": "081234567890",
  "message": "Halo, saya tertarik dengan produk Ryoki Facial Wash. Apakah tersedia?"
}
```

**Response (Tanpa CSRF Token): ⚠️ 419 CSRF Token Mismatch**
```json
{
  "message": "CSRF token mismatch."
}
```

**Response (Dengan CSRF Token valid): ✅ 302 Redirect**
```
Status: 302 Found
Location: /contact
Session Flash: "Pesan Anda berhasil dikirim. Kami akan segera menghubungi Anda."
```

**Validasi Rules:**

| Field | Rules |
|-------|-------|
| `name` | `required`, `string`, `max:255` |
| `email` | `required`, `email`, `max:255` |
| `phone` | `nullable`, `string`, `max:20` |
| `message` | `required`, `string` |

**Hasil Pengujian:**

| Aspek | Hasil |
|-------|-------|
| CSRF Protection | ✅ Aktif (419 jika tidak ada token) |
| Rate Limiter | ✅ Aktif (throttle: 5 request/menit) |
| Validasi Input | ✅ Berfungsi (menolak input tidak valid) |
| Data Tersimpan | ✅ Data masuk ke tabel `contacts` di database |

---

### 3.5 POST /analytics/click — Tracking Klik Marketplace

Endpoint ini mencatat setiap klik tombol marketplace (Shopee, TikTok Shop, WhatsApp) untuk keperluan analytics dashboard admin.

**Request:**
```
POST http://127.0.0.1:8000/analytics/click
Content-Type: application/json
Accept: application/json

{
  "platform": "shopee",
  "product_id": 1,
  "product_name": "Ryoki Gentle Glow Facial Wash",
  "button_location": "product_detail"
}
```

**Response: ✅ 200 OK**
```json
{
  "status": "success",
  "message": "Click tracked successfully",
  "id": 1
}
```

**Hasil Pengujian:**

| Aspek | Hasil |
|-------|-------|
| Status Code | `200 OK` ✅ |
| Data Tersimpan | ✅ Klik tercatat di tabel `click_analytics` |
| Platform Valid | ✅ Hanya menerima: `shopee`, `tiktok`, `whatsapp`, `other` |
| Rate Limiter | ✅ Aktif (throttle: 30 request/menit) |
| IP Tracking | ✅ IP pengunjung tercatat otomatis |
| User-Agent | ✅ Browser user-agent tercatat otomatis |

---

## 4. Pengujian Endpoint SEO & Crawler

### 4.1 GET /robots.txt

File `robots.txt` dibuat secara dinamis oleh Laravel untuk mengontrol akses crawler dan search engine.

**Request:**
```
GET http://127.0.0.1:8000/robots.txt
```

**Response: ✅ 200 OK**
```
Content-Type: text/plain

# Ryoki Skincare — Official Website robots.txt (SEO & AI Search Engine Optimized)
# Website Sitemap: http://localhost/sitemap.xml

User-agent: Googlebot
Allow: /
Disallow: /admin/
Disallow: /analytics/
Disallow: /api/
Disallow: /login
Disallow: /register
Disallow: /sanctum/

User-agent: Google-Extended
Allow: /
Disallow: /admin/
Disallow: /analytics/
Disallow: /api/

User-agent: GPTBot
Allow: /
...

User-agent: *
Allow: /
Disallow: /admin/
Disallow: /analytics/
Disallow: /api/

Sitemap: http://localhost/sitemap.xml
```

**Hasil Pengujian:**

| Aspek | Hasil |
|-------|-------|
| Status Code | `200 OK` ✅ |
| Content-Type | `text/plain` ✅ |
| Googlebot Config | ✅ Allow `/`, Disallow `/admin/` |
| AI Bot Support | ✅ GPTBot, ClaudeBot, PerplexityBot dikonfigurasi |
| Sitemap Link | ✅ Dinyatakan di bagian bawah |

---

### 4.2 GET /sitemap.xml

XML Sitemap dibuat secara dinamis dan mencakup semua halaman publik (produk, artikel, halaman statis).

**Request:**
```
GET http://127.0.0.1:8000/sitemap.xml
```

**Response: ✅ 200 OK**
```xml
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>http://localhost</loc>
    <lastmod>2026-09-03</lastmod>
    <changefreq>daily</changefreq>
    <priority>1.0</priority>
  </url>
  <url>
    <loc>http://localhost/products</loc>
    <changefreq>daily</changefreq>
    <priority>0.9</priority>
  </url>
  <!-- Halaman detail setiap produk -->
  <url>
    <loc>http://localhost/products/ryoki-gentle-glow-facial-wash</loc>
    <lastmod>2026-07-29</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>
  <!-- ... dan seterusnya untuk semua produk & artikel -->
</urlset>
```

**Hasil Pengujian:**

| Aspek | Hasil |
|-------|-------|
| Status Code | `200 OK` ✅ |
| Content-Type | `application/xml` ✅ |
| Format XML | ✅ Valid XML Sitemap |
| Halaman Statis | ✅ Home, About, Products, Articles, Contact |
| Halaman Produk | ✅ 10 produk dengan slug unik |
| Halaman Artikel | ✅ Artikel yang dipublikasikan |
| Prioritas | ✅ Home (1.0), Produk (0.9), Detail (0.8) |

---

## 5. Pengujian Endpoint Admin (Protected)

Semua endpoint admin dilindungi oleh middleware `auth` — user harus login terlebih dahulu. Jika tidak login, server akan mengembalikan redirect ke halaman login.

### 5.1 POST /admin/login — Autentikasi Admin

**Request:**
```
POST http://127.0.0.1:8000/admin/login
Content-Type: application/x-www-form-urlencoded
X-CSRF-TOKEN: {csrf_token}

email=admin@ryoki.com
password=********
```

**Response (Tanpa Login): ⚠️ 302 Redirect**
```
Status: 302 Found
Location: /admin/login
```

**Response (Login Berhasil): ✅ 302 Redirect ke Dashboard**
```
Status: 302 Found
Location: /admin/dashboard
Session: Authenticated
```

**Hasil Pengujian:**

| Aspek | Hasil |
|-------|-------|
| Redirect Tanpa Auth | ✅ Redirect ke `/admin/login` |
| CSRF Protection | ✅ Aktif |
| Rate Limiter | ✅ Aktif (throttle: 5 attempt/menit) |
| Login Berhasil | ✅ Redirect ke dashboard |

---

### 5.2 CRUD Produk (Admin)

#### GET /admin/products — Daftar Produk

```
GET http://127.0.0.1:8000/admin/products
Cookie: laravel_session={session_id}
```
**Response:** ✅ `200 OK` — Menampilkan tabel daftar produk dengan pagination (10 per halaman)

#### POST /admin/products — Tambah Produk Baru

```
POST http://127.0.0.1:8000/admin/products
Content-Type: multipart/form-data
Cookie: laravel_session={session_id}
X-CSRF-TOKEN: {csrf_token}

name: Ryoki New Product
description: Deskripsi produk baru
price: 85000
category: Skincare
image: [file upload]
in_stock: 1
is_best_seller: 0
tiktok_shop_url: https://tiktok.com/shop/...
shopee_url: https://shopee.co.id/...
rating: 4.8
```

**Validasi Rules Produk:**

| Field | Rules |
|-------|-------|
| `name` | `required`, `string`, `max:255` |
| `description` | `nullable`, `string` |
| `usage` | `nullable`, `string` |
| `ingredients` | `nullable`, `string` |
| `price` | `nullable`, `numeric`, `min:0` |
| `category` | `nullable`, `string`, `max:255` |
| `image` | `nullable`, `image`, `max:5120` (5MB) |
| `gallery.*` | `nullable`, `image`, `max:5120` (5MB) |
| `tiktok_shop_url` | `nullable`, `string`, `max:500` |
| `shopee_url` | `nullable`, `string`, `max:500` |
| `rating` | `nullable`, `numeric`, `between:0,5` |

**Response:** ✅ `302 Redirect` ke `/admin/products` dengan flash message "Produk berhasil ditambahkan."

#### PUT /admin/products/{product} — Edit Produk

```
PUT http://127.0.0.1:8000/admin/products/ryoki-gentle-glow-facial-wash
Content-Type: multipart/form-data
Cookie: laravel_session={session_id}

name: Ryoki Gentle Glow Facial Wash (Updated)
price: 55000
...
```
**Response:** ✅ `302 Redirect` dengan flash message "Produk berhasil diperbarui."

#### DELETE /admin/products/{product} — Hapus Produk

```
DELETE http://127.0.0.1:8000/admin/products/ryoki-gentle-glow-facial-wash
Cookie: laravel_session={session_id}
X-CSRF-TOKEN: {csrf_token}
```
**Response:** ✅ `302 Redirect` dengan flash message "Produk berhasil dihapus."

> **Catatan:** Saat produk dihapus, gambar utama dan semua gambar galeri juga otomatis dihapus dari storage.

---

### 5.3 CRUD Artikel (Admin)

#### POST /admin/articles — Tambah Artikel Baru

```
POST http://127.0.0.1:8000/admin/articles
Content-Type: multipart/form-data
Cookie: laravel_session={session_id}

title: Panduan Skincare Routine Pagi dan Malam
content: <p>Konten artikel dalam format HTML...</p>
thumbnail: [file upload / base64 / URL]
is_published: 1
```

**Validasi Rules Artikel:**

| Field | Rules |
|-------|-------|
| `title` | `required`, `string`, `max:255` |
| `content` | `nullable`, `string` |
| `thumbnail` | `nullable`, `file`, `max:20480` (20MB) |
| `thumbnail_base64` | `nullable`, `string` |
| `thumbnail_url_input` | `nullable`, `string`, `max:2000` |
| `is_published` | `nullable` |

> **Fitur Keamanan:** Konten HTML di-sanitize secara otomatis — tag `<script>`, inline event handlers (`onerror`, `onclick`), dan `javascript:` links akan dihapus untuk mencegah serangan **XSS (Cross-Site Scripting)**.

---

### 5.4 Manajemen Kontak / Inbox (Admin)

#### GET /admin/contacts — Daftar Pesan Masuk

```
GET http://127.0.0.1:8000/admin/contacts
Cookie: laravel_session={session_id}
```
**Response:** ✅ `200 OK` — Tabel pesan masuk dengan pagination

#### PATCH /admin/contacts/{id}/mark-read — Tandai Sudah Dibaca

```
PATCH http://127.0.0.1:8000/admin/contacts/1/mark-read
Cookie: laravel_session={session_id}
X-CSRF-TOKEN: {csrf_token}
```
**Response:** ✅ `302 Redirect` dengan flash message "Pesan ditandai sudah dibaca."

#### DELETE /admin/contacts/{id} — Hapus Pesan

```
DELETE http://127.0.0.1:8000/admin/contacts/1
Cookie: laravel_session={session_id}
X-CSRF-TOKEN: {csrf_token}
```
**Response:** ✅ `302 Redirect` dengan flash message "Pesan berhasil dihapus."

---

## 6. Ringkasan Hasil Pengujian

### Tabel Ringkasan Seluruh Endpoint

| No | Method | Endpoint | Status | Hasil |
|----|--------|----------|--------|-------|
| 1 | `GET` | `/api/products` | ✅ `200 OK` | 10 produk, 7 kategori ditampilkan |
| 2 | `GET` | `/api/products?category=Serum` | ✅ `200 OK` | Filter berfungsi: 1 produk ditemukan |
| 3 | `GET` | `/api/products?search=facial` | ✅ `200 OK` | Pencarian berfungsi: 1 produk ditemukan |
| 4 | `POST` | `/contact` | ✅ `302 Redirect` | Pesan tersimpan, CSRF aktif |
| 5 | `POST` | `/analytics/click` | ✅ `200 OK` | Klik tercatat, tracking IP/UA aktif |
| 6 | `GET` | `/robots.txt` | ✅ `200 OK` | Dinamis, multi-bot support |
| 7 | `GET` | `/sitemap.xml` | ✅ `200 OK` | XML valid, mencakup semua halaman publik |
| 8 | `POST` | `/admin/login` | ✅ `302 Redirect` | Autentikasi + rate limiter aktif |
| 9 | `GET` | `/admin/products` | ✅ `200 OK` | Pagination 10/halaman |
| 10 | `POST` | `/admin/products` | ✅ `302 Redirect` | CRUD Create berfungsi |
| 11 | `PUT` | `/admin/products/{id}` | ✅ `302 Redirect` | CRUD Update berfungsi |
| 12 | `DELETE` | `/admin/products/{id}` | ✅ `302 Redirect` | CRUD Delete + cleanup storage |
| 13 | `POST` | `/admin/articles` | ✅ `302 Redirect` | Artikel + sanitasi XSS |
| 14 | `PATCH` | `/admin/contacts/{id}/mark-read` | ✅ `302 Redirect` | Status baca diperbarui |
| 15 | `DELETE` | `/admin/contacts/{id}` | ✅ `302 Redirect` | Pesan berhasil dihapus |

### Statistik Pengujian

| Metrik | Nilai |
|--------|-------|
| **Total Endpoint Diuji** | 15 endpoint |
| **Endpoint Berhasil** | 15 / 15 (100%) |
| **Endpoint Gagal** | 0 |
| **Rata-rata Response Time** | < 600ms |
| **Fitur Keamanan Terverifikasi** | CSRF, Rate Limiter, Auth Middleware, XSS Sanitizer |

---

## 7. Kesimpulan

Berdasarkan hasil pengujian menggunakan Postman dan tools pendukung lainnya, seluruh endpoint API pada website **Ryoki Japan Skincare** berfungsi dengan baik dan sesuai spesifikasi. Berikut poin-poin utama:

1. **API Publik** — Endpoint `/api/products` berhasil mengembalikan data produk lengkap dalam format JSON dengan dukungan filter kategori dan pencarian teks. Response time rata-rata di bawah 600ms.

2. **Keamanan** — Seluruh endpoint yang memerlukan autentikasi dilindungi oleh middleware `auth`. Form submission menggunakan CSRF token protection, dan rate limiter aktif pada endpoint sensitif (login: 5 req/min, kontak: 5 req/min, analytics: 30 req/min).

3. **CRUD Operations** — Operasi Create, Read, Update, dan Delete pada modul Produk, Artikel, dan Kontak berfungsi dengan baik, termasuk validasi input, upload file (gambar), dan pembersihan storage saat data dihapus.

4. **SEO & Crawler** — File `robots.txt` dan `sitemap.xml` dihasilkan secara dinamis dan sudah dioptimasi untuk Google, Bing, serta AI crawler (GPTBot, ClaudeBot, PerplexityBot).

5. **Analytics Tracking** — Sistem click tracking berfungsi mencatat setiap interaksi user dengan tombol marketplace (Shopee, TikTok Shop, WhatsApp), termasuk data IP address dan user-agent untuk keperluan analisis.

---

> **Dokumen ini dibuat sebagai bagian dari Laporan Kerja Praktik**  
> **Proyek:** Website Ryoki Japan Skincare  
> **Framework:** Laravel 12 (PHP 8.x)  
> **Database:** SQLite  
> **Deployment:** Vercel (Serverless)
