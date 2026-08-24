# 🌸 Ryoki Skincare — Company Profile & Product Catalog

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?logo=php&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.x-06B6D4?logo=tailwindcss&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-3.x-8BC0D0?logo=alpine.js&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-7.x-646CFF?logo=vite&logoColor=white)
![Vercel](https://img.shields.io/badge/Deploy-Vercel-000000?logo=vercel&logoColor=white)

Website resmi **Company Profile & Katalog Produk** untuk **Ryoki Skincare**, brand kosmetik Jepang di bawah naungan **PT Golden Intan Berlian** (Bandar Lampung, Indonesia).

Website ini **bukan** e-commerce — seluruh transaksi dialihkan ke marketplace resmi (**TikTok Shop** & **Shopee**). Dibangun dengan **Laravel 12**, **Tailwind CSS**, **Alpine.js**, dan di-deploy ke **Vercel** (Serverless PHP).

---

## ✨ Fitur Utama

### 🏠 Public Frontend

| Halaman | Deskripsi |
|---------|-----------|
| **Beranda (Home)** | Hero banner interaktif, testimoni pelanggan, ingredient highlights, dan produk best seller |
| **Tentang Kami** | Profil PT Golden Intan Berlian, visi & misi, 4 pilar keunggulan, statistik brand |
| **Katalog Produk** | Filter kategori & pencarian real-time (Alpine.js + REST API), grid responsif, badge best seller & rating |
| **Detail Produk** | Layout 2 kolom dengan galeri foto, info lengkap, harga live dari marketplace, CTA ke TikTok Shop & WhatsApp |
| **Skinpedia (Artikel)** | Blog edukasi skincare dengan artikel SEO-optimized & internal link ke produk |
| **Kontak** | Form pesan pengunjung langsung ke inbox admin |

**Desain & UX:**
- 🎨 **Aquatic Luxury** — skema warna Sky Blue, Deep Slate, dan Soft Ice Blue
- 📱 **Mobile-First Design** — sticky bottom bar untuk pembelian cepat
- 💬 **Floating Action Button (FAB)** — shortcut WhatsApp CS & TikTok Shop
- ⚡ **Lazy loading**, font preconnect, `dns-prefetch` untuk performa optimal
- 🚫 **Custom 404 Page** — halaman error berdesain tema Ryoki

---

### 🔐 Admin Panel (Protected)

| Fitur | Deskripsi |
|-------|-----------|
| **Dashboard** | Ringkasan total produk, artikel, pesan belum dibaca, dan total klik CTA |
| **Manajemen Produk** | CRUD lengkap + upload gambar utama & galeri multi-foto, link TikTok Shop & Shopee per produk |
| **Manajemen Artikel** | CRUD + rich text editor dengan upload gambar inline |
| **Kotak Masuk (Inbox)** | Baca, tandai sudah dibaca, dan hapus pesan dari pengunjung |
| **Click Analytics** | Dashboard analitik klik CTA — breakdown per platform (Shopee/TikTok/WhatsApp), per lokasi tombol, leaderboard produk terklik, dan log klik real-time |
| **Sync Harga Marketplace** | Sinkronisasi harga produk otomatis dari TikTok Shop & Shopee official store |

Autentikasi admin menggunakan **Laravel Breeze** (Blade stack) dengan halaman login kustom di `/admin/login`.

---

### 🔎 SEO & Discoverability

- **Dynamic XML Sitemap** (`/sitemap.xml`) — otomatis mengindeks semua halaman, produk, dan artikel
- **Dynamic `robots.txt`** — dikonfigurasi untuk Googlebot, Bingbot, GPTBot, PerplexityBot, ClaudeBot, dan Google-Extended (AI Search)
- **IndexNow Protocol** — verifikasi file untuk notifikasi instant ke mesin pencari
- **Open Graph & Twitter Cards** — pratinjau tautan yang rapi saat dibagikan ke media sosial
- **Dynamic Meta Tags** — judul, deskripsi, keywords, canonical URL per halaman
- **Favicon SVG/ICO** — berlogo Ryoki Skincare

---

### 💰 Marketplace Integration

- **Live Price Resolution** via `MarketplacePriceService`:
  - Menampilkan harga terkini dari Shopee & TikTok Shop
  - Cache 30 menit untuk performa optimal
  - Fallback ke harga database jika marketplace tidak tersedia
- **Tombol CTA per produk** langsung ke listing TikTok Shop & Shopee resmi
- **Click Tracking** — setiap klik tombol marketplace direkam untuk analitik

---

## 🛠 Tech Stack

| Layer | Teknologi |
|-------|-----------|
| **Backend** | Laravel 12, PHP 8.2+ |
| **Frontend** | Blade Templates, Tailwind CSS 3.x, Alpine.js 3.x |
| **Build Tool** | Vite 7.x |
| **Database** | MySQL / MariaDB (lokal), SQLite (opsional) |
| **Auth** | Laravel Breeze (Blade) |
| **Deployment** | Vercel (Serverless PHP via `vercel-php@0.7.1`) |
| **Sitemap** | Dynamic XML Sitemap (custom controller) |
| **Typography** | Playfair Display, Outfit, Plus Jakarta Sans (Google Fonts) |

---

## 📦 Persyaratan Sistem

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL / MariaDB (atau SQLite untuk development cepat)

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

Edit file `.env` dan atur koneksi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ryoki
DB_USERNAME=root
DB_PASSWORD=

SHOPEE_OFFICIAL_URL="https://shopee.co.id/ryokiofficialstore"
```

```bash
# 5. Generate application key
php artisan key:generate

# 6. Migrasi & seeding database
# (membuat tabel + data dummy: admin, produk, artikel)
php artisan migrate:fresh --seed

# 7. Buat symlink storage (agar gambar upload dapat diakses)
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

> Perintah `composer dev` menjalankan `php artisan serve`, `queue:listen`, dan `npm run dev` secara bersamaan menggunakan `concurrently`.

Aplikasi dapat diakses di `http://127.0.0.1:8000`.

---

## 🔑 Akses Admin Panel

| | Kredensial |
|---|---|
| **URL** | `http://127.0.0.1:8000/admin/login` |
| **Email** | `admin@ryokiskincare.com` |
| **Password** | `password` |

---

## 🌐 Deployment (Vercel)

Project ini dikonfigurasi untuk deploy ke **Vercel** menggunakan serverless PHP runtime:

- Konfigurasi: [`vercel.json`](vercel.json)
- Runtime: `vercel-php@0.7.1`
- Entry point: `api/index.php`
- Environment variables dikonfigurasi di Vercel Dashboard

---

## 📁 Struktur Project

```
ryoki-skincare/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/              # Dashboard, Product, Article, Contact CRUD
│   │   ├── AnalyticsController # Click tracking & analytics dashboard
│   │   ├── HomeController      # Landing page
│   │   ├── ProductController   # Public katalog + live price integration
│   │   ├── ArticleController   # Skinpedia public
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
│   ├── layouts/                # Layout templates (public & admin)
│   └── errors/                 # Custom error pages (404)
├── database/
│   ├── migrations/             # Schema database
│   └── seeders/                # Data dummy (admin, produk, artikel)
├── routes/
│   └── web.php                 # Semua route (public + admin + SEO)
├── docs/                       # Dokumentasi internal project
├── vercel.json                 # Konfigurasi deployment Vercel
└── tailwind.config.js          # Konfigurasi Tailwind CSS
```

---

## 📝 Lisensi

Aplikasi ini dibuat khusus untuk keperluan internal **PT Golden Intan Berlian**.
