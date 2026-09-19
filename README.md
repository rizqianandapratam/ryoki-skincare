# 🌸 Ryoki Skincare — Brand Website & Product Catalog

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?logo=php&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.x-06B6D4?logo=tailwindcss&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-3.x-8BC0D0?logo=alpine.js&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-7.x-646CFF?logo=vite&logoColor=white)
![Vercel](https://img.shields.io/badge/Deploy-Vercel-000000?logo=vercel&logoColor=white)

Website resmi **Brand Website & Katalog Produk** untuk **Ryoki Skincare**, brand kosmetik Jepang di bawah naungan **PT Golden Intan Berlian** (Bandar Lampung, Indonesia).

Website ini **bukan** e-commerce — seluruh transaksi dialihkan ke marketplace resmi (**TikTok Shop** & **Shopee**). Dibangun dengan **Laravel 12**, **Tailwind CSS**, **Alpine.js**, dan di-deploy ke **Vercel** (Serverless PHP).

---

## ✨ Fitur Utama

### 🏠 Halaman Publik

| Halaman | Deskripsi |
|---------|-----------|
| **Beranda (Home)** | Hero banner interaktif, testimoni pelanggan dengan tag *Verified Buyer*, ingredient highlights (Niacinamide, Alpha Arbutin, Collagen), dan produk best seller |
| **Tentang Kami** | Profil resmi PT Golden Intan Berlian, visi & misi perusahaan, 4 pilar keunggulan (Cruelty-Free, BPOM Approved, Natural Ingredients, Dermatology Tested), serta statistik brand |
| **Katalog Produk** | Filter kategori (Cleanser, Serum, Moisturizer, Sunscreen, Peeling) & pencarian real-time via Alpine.js, grid responsif 1–4 kolom, badge *Best Seller* & rating bintang |
| **Detail Produk** | Layout 2 kolom — galeri foto produk, deskripsi lengkap, ingredients, cara pemakaian, harga live dari marketplace, dan CTA langsung ke TikTok Shop & WhatsApp CS |
| **Skinpedia (Artikel)** | Blog edukasi seputar skincare & kesehatan kulit, SEO-optimized dengan internal link ke produk Ryoki |
| **Kontak** | Form pesan bagi pengunjung yang ingin bertanya atau bekerja sama |

### 🎨 Desain & User Experience

- **Aquatic Luxury Theme** — skema warna Sky Blue (`#0284C7`), Deep Slate (`#0F172A`), dan Soft Ice Blue (`#F6F9FC`)
- **Mobile-First Design** — sticky bottom bar untuk akses cepat ke TikTok Shop & WhatsApp CS
- **Floating Action Button (FAB)** — widget melayang dengan efek pulse notification untuk shortcut WhatsApp & TikTok Shop
- **Performa Optimal** — lazy loading gambar, font preconnect & `dns-prefetch`, build asset terkompilasi via Vite
- **Custom 404 Page** — halaman error berdesain tema Ryoki dengan navigasi kembali ke beranda
- **Typography Premium** — Playfair Display, Outfit, Plus Jakarta Sans (Google Fonts)

---

### 🔐 Admin Panel

Panel admin internal untuk mengelola seluruh konten website, dilindungi oleh autentikasi Laravel Breeze:

- **Dashboard** — ringkasan statistik website secara real-time
- **Manajemen Produk** — CRUD lengkap dengan upload gambar utama & galeri multi-foto, link marketplace per produk
- **Manajemen Artikel** — CRUD artikel Skinpedia dengan upload gambar inline
- **Kotak Masuk** — kelola pesan dari pengunjung (baca, tandai, hapus)
- **Click Analytics** — dashboard analitik klik CTA per platform (Shopee/TikTok/WhatsApp), leaderboard produk terklik, dan log aktivitas
- **Sync Harga Marketplace** — sinkronisasi harga produk otomatis dari official store

---

### 🔎 SEO & Discoverability

- **Dynamic XML Sitemap** (`/sitemap.xml`) — otomatis mengindeks semua halaman, produk, dan artikel
- **Dynamic `robots.txt`** — dikonfigurasi untuk Googlebot, Bingbot, GPTBot, PerplexityBot, ClaudeBot, dan Google-Extended (AI Search)
- **IndexNow Protocol** — notifikasi instant ke mesin pencari saat ada konten baru
- **Open Graph & Twitter Cards** — pratinjau tautan yang rapi saat dibagikan ke WhatsApp, Instagram, Facebook, atau Twitter
- **Dynamic Meta Tags** — judul, deskripsi, keywords, dan canonical URL per halaman
- **Favicon SVG/ICO** — berlogo Ryoki Skincare

---

### 💰 Integrasi Marketplace

- **Live Price Resolution** — menampilkan harga terkini langsung dari Shopee & TikTok Shop dengan cache 30 menit
- **Fallback Pricing** — otomatis menggunakan harga database jika marketplace tidak tersedia
- **Tombol CTA per produk** — link langsung ke listing resmi di TikTok Shop & Shopee
- **Click Tracking** — setiap klik tombol marketplace direkam untuk keperluan analitik bisnis

---

## 🛠 Tech Stack

| Layer | Teknologi |
|-------|-----------|
| **Backend** | Laravel 12, PHP 8.2+ |
| **Frontend** | Blade Templates, Tailwind CSS 3.x, Alpine.js 3.x |
| **Build Tool** | Vite 7.x |
| **Database** | SQLite (development), MySQL/MariaDB (production) |
| **Auth** | Laravel Breeze (Blade) |
| **Deployment** | Vercel (Serverless PHP via `vercel-php@0.7.1`) |

---

## 📦 Persyaratan Sistem

- PHP >= 8.2
- Composer
- Node.js & NPM

---

## 🚀 Instalasi Lokal

```bash
# 1. Clone repository
git clone https://github.com/rizqianandapratam/ryoki-skincare.git
cd ryoki-skincare

# 2. Install dependensi PHP
composer install

# 3. Install dependensi frontend
npm install

# 4. Konfigurasi environment
cp .env.example .env
```

Buka file `.env` dan sesuaikan konfigurasi jika diperlukan (secara default sudah menggunakan SQLite).

```bash
# 5. Generate application key
php artisan key:generate

# 6. Migrasi & seeding database
php artisan migrate:fresh --seed

# 7. Buat symlink storage
php artisan storage:link

# 8. Build asset frontend
npm run build

# 9. Jalankan development server
php artisan serve
```

Atau gunakan shortcut all-in-one:

```bash
composer dev
```

> Perintah `composer dev` menjalankan `php artisan serve`, `queue:listen`, dan `npm run dev` secara bersamaan.

Aplikasi dapat diakses di `http://127.0.0.1:8000`.

---

## 🌐 Deployment

Project ini dikonfigurasi untuk deploy ke **Vercel** menggunakan serverless PHP runtime (`vercel-php@0.7.1`). Konfigurasi deployment tersedia di [`vercel.json`](vercel.json). Environment variables dikonfigurasi melalui Vercel Dashboard.

---

## 📁 Struktur Project

```
ryoki-skincare/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/              # Dashboard, Product, Article, Contact CRUD
│   │   ├── AnalyticsController # Click tracking & analytics dashboard
│   │   ├── HomeController      # Landing page
│   │   ├── ProductController   # Katalog publik + live price integration
│   │   ├── ArticleController   # Skinpedia
│   │   ├── ContactController   # Form kontak pengunjung
│   │   └── SitemapController   # Dynamic XML Sitemap
│   ├── Models/
│   │   ├── Product             # Produk skincare (+ gallery, marketplace URLs)
│   │   ├── Article             # Artikel Skinpedia
│   │   ├── Contact             # Pesan pengunjung
│   │   ├── ProductImage        # Galeri multi-foto produk
│   │   └── ClickAnalytic       # Log klik tombol CTA marketplace
│   └── Services/
│       └── MarketplacePriceService  # Live price dari Shopee & TikTok
├── resources/views/
│   ├── home.blade.php          # Landing page
│   ├── about.blade.php         # Tentang Kami
│   ├── contact.blade.php       # Halaman Kontak
│   ├── products/               # Katalog & detail produk
│   ├── articles/               # Skinpedia (list & detail)
│   ├── admin/                  # Panel admin (dashboard, CRUD, analytics)
│   ├── layouts/                # Layout templates
│   └── errors/                 # Custom error pages (404)
├── database/
│   ├── migrations/             # Schema database
│   └── seeders/                # Data awal (produk, artikel)
├── routes/web.php              # Semua route (publik + admin + SEO)
├── docs/                       # Dokumentasi internal
├── vercel.json                 # Konfigurasi deployment Vercel
└── tailwind.config.js          # Konfigurasi Tailwind CSS
```

---

## 📝 Lisensi

Aplikasi ini dibuat khusus untuk keperluan internal **PT Golden Intan Berlian**.
