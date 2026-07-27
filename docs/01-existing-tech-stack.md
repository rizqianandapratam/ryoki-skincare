# 01 — Tech Stack & Struktur Folder

## Overview Proyek

Ini adalah website profil + katalog produk untuk brand skincare **Ryoki Skincare** (PT Golden Intan Berlian, Bandar Lampung). Web ini punya dua sisi: **frontend publik** untuk pengunjung, dan **panel admin** untuk kelola produk, artikel, dan pesan masuk.

---

## Framework & Library Utama

### Backend

| Teknologi | Versi | Keterangan |
|---|---|---|
| **PHP** | `^8.2` | Bahasa backend |
| **Laravel** | `^12.0` | Framework utama |
| **Laravel Breeze** | `*` | Scaffolding autentikasi (login, register) |
| **Laravel Tinker** | `^2.10.1` | REPL untuk debug di terminal |

### Frontend

| Teknologi | Versi | Keterangan |
|---|---|---|
| **Tailwind CSS** | `^3.1.0` | Utility-first CSS framework |
| **@tailwindcss/forms** | `^0.5.2` | Plugin reset form untuk Tailwind |
| **Alpine.js** | `^3.4.2` | Framework JS ringan untuk interaktivitas (accordion, navbar toggle, dll) |
| **Vite** | `^7.0.7` | Build tool & dev server |
| **laravel-vite-plugin** | `^2.0.0` | Integrasi Vite dengan Laravel |
| **Axios** | `^1.11.0` | HTTP client JS (tersedia tapi belum banyak dipakai) |

### Styling (Dua Lapis)

Proyek ini menggunakan **dua cara styling** yang berjalan bersamaan:

1. **`resources/css/app.css`** → Diproses oleh Vite + Tailwind CSS (hanya berisi `@tailwind base/components/utilities`)
2. **`public/css/style.css`** → File CSS manual yang di-link langsung tanpa Vite. Berisi semua custom class dan CSS variables utama (bento-card, btn-premium, navbar-glass, dll).

> ⚠️ **Catatan penting:** `style.css` di `public/css/` di-load via `{{ asset('css/style.css') }}`, BUKAN diproses Tailwind. Artinya class-class utama UI seperti `.bento-card` dan `.btn-premium` ada di sini, bukan di Tailwind config.

### Database

| Teknologi | Keterangan |
|---|---|
| **SQLite** | Default di `.env.example`. Cocok untuk dev lokal. Bisa diganti MySQL/PostgreSQL. |

---

## Struktur Folder

```
ryoki-skincare/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomeController.php          # Halaman beranda
│   │   │   ├── AboutController.php         # Halaman tentang kami
│   │   │   ├── ProductController.php       # Katalog produk (publik)
│   │   │   ├── ArticleController.php       # Daftar & detail artikel (publik)
│   │   │   ├── ContactController.php       # Form kontak (publik)
│   │   │   ├── ProfileController.php       # Profil user (dari Breeze)
│   │   │   ├── AdminAuthController.php     # Login admin khusus
│   │   │   └── Admin/
│   │   │       ├── DashboardController.php # Dashboard admin
│   │   │       ├── ProductController.php   # CRUD produk (admin)
│   │   │       ├── ArticleController.php   # CRUD artikel (admin)
│   │   │       └── ContactController.php   # Kelola pesan masuk (admin)
│   │   └── Requests/                       # (kosong / belum diisi)
│   ├── Models/
│   │   ├── User.php
│   │   ├── Product.php
│   │   ├── Article.php
│   │   └── Contact.php
│   ├── Providers/
│   └── View/
│
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   ├── 2026_07_03_082043_create_products_table.php
│   │   ├── 2026_07_03_082044_create_articles_table.php
│   │   └── 2026_07_03_082044_create_contacts_table.php
│   ├── factories/
│   └── seeders/
│
├── resources/
│   ├── css/
│   │   └── app.css                         # Entry point Tailwind (minimal)
│   ├── js/
│   │   └── app.js                          # Entry point JS (dari Breeze)
│   └── views/
│       ├── layouts/
│       │   ├── public.blade.php            # Layout UTAMA untuk halaman publik (navbar + footer sudah ada di sini)
│       │   ├── app.blade.php               # Layout Breeze (untuk area auth)
│       │   ├── guest.blade.php             # Layout untuk halaman login/register
│       │   └── navigation.blade.php        # Navbar default Breeze (tidak dipakai di publik)
│       ├── components/                     # Komponen Blade dari Breeze (button, input, modal, dll)
│       ├── home.blade.php                  # Halaman beranda
│       ├── about.blade.php                 # Halaman tentang kami
│       ├── contact.blade.php               # Halaman kontak
│       ├── dashboard.blade.php             # Dashboard Breeze default (tidak dipakai untuk admin)
│       ├── welcome.blade.php               # Halaman welcome default Laravel (sangat besar, 82KB)
│       ├── products/
│       │   ├── index.blade.php             # Katalog produk
│       │   └── show.blade.php              # Detail produk
│       ├── articles/
│       │   ├── index.blade.php             # Daftar artikel
│       │   └── show.blade.php              # Detail artikel
│       ├── auth/                           # Halaman login/register dari Breeze
│       ├── profile/                        # Halaman edit profil dari Breeze
│       └── admin/
│           ├── dashboard.blade.php         # Dashboard admin (pakai Bootstrap, beda styling!)
│           ├── login.blade.php             # Login admin
│           ├── products/
│           │   ├── index.blade.php         # List produk (admin)
│           │   ├── create.blade.php        # Form tambah produk
│           │   └── edit.blade.php          # Form edit produk
│           ├── articles/
│           │   ├── index.blade.php         # List artikel (admin)
│           │   ├── create.blade.php        # Form tambah artikel
│           │   └── edit.blade.php          # Form edit artikel
│           └── contacts/
│               ├── index.blade.php         # Daftar pesan masuk
│               └── show.blade.php          # Detail pesan
│
├── routes/
│   ├── web.php                             # Semua route web
│   └── auth.php                            # Route autentikasi Breeze
│
├── public/
│   └── css/
│       └── style.css                       # CSS custom utama (bento, btn-premium, dll)
│
├── tailwind.config.js                      # Konfigurasi Tailwind + warna custom
├── vite.config.js                          # Konfigurasi Vite
├── package.json                            # Dependensi NPM
└── composer.json                           # Dependensi PHP
```

---

## Cara Kerja Routing

Semua route ada di `routes/web.php`. Dibagi 3 kelompok:

### 1. Route Publik (tanpa login)

```
GET  /                          → HomeController@index         (home)
GET  /about                     → AboutController@index        (about)
GET  /products                  → ProductController@index      (products.index)
GET  /products/{slug}           → ProductController@show       (products.show)
GET  /articles                  → ArticleController@index      (articles.index)
GET  /articles/{slug}           → ArticleController@show       (articles.show)
GET  /contact                   → ContactController@index      (contact.index)
POST /contact                   → ContactController@store      (contact.store)
```

### 2. Route Admin Auth (tanpa login)

```
GET  /admin/login               → AdminAuthController@showLoginForm    (admin.login)
POST /admin/login               → AdminAuthController@login
POST /admin/logout              → AdminAuthController@logout           (admin.logout)
```

### 3. Route Admin (butuh login / middleware `auth`)

```
GET  /admin/dashboard           → view('admin.dashboard')             (admin.dashboard)

# Products CRUD (resource)
GET  /admin/products            → Admin\ProductController@index        (admin.products.index)
GET  /admin/products/create     → Admin\ProductController@create       (admin.products.create)
POST /admin/products            → Admin\ProductController@store        (admin.products.store)
GET  /admin/products/{id}/edit  → Admin\ProductController@edit         (admin.products.edit)
PUT  /admin/products/{id}       → Admin\ProductController@update       (admin.products.update)
DEL  /admin/products/{id}       → Admin\ProductController@destroy      (admin.products.destroy)

# Articles CRUD (resource)
GET  /admin/articles            → Admin\ArticleController@index        (admin.articles.index)
... (sama strukturnya dengan products)

# Contacts (hanya baca + hapus)
GET    /admin/contacts          → Admin\ContactController@index        (admin.contacts.index)
GET    /admin/contacts/{id}     → Admin\ContactController@show         (admin.contacts.show)
PATCH  /admin/contacts/{id}/mark-read → Admin\ContactController@markRead
DELETE /admin/contacts/{id}     → Admin\ContactController@destroy
```

> ⚠️ **Bug potensial di routing:** Ada duplikasi prefix `admin.` pada grup route (baris 27 dan 34 di `web.php`). Grup admin auth dan admin protected keduanya sama-sama punya `->name('admin.')`, ini bisa menyebabkan konflik nama route.

---

## Cara Kerja Styling

### Halaman Publik

Halaman publik extend `layouts.public`, yang sudah load:
- Font **Figtree** (dari bunny.net) + **Plus Jakarta Sans** & **Space Mono** (dari Google Fonts via `style.css`)
- `public/css/style.css` (load langsung via `asset()`)
- `resources/css/app.css` via Vite (Tailwind utilities)
- Alpine.js via CDN

Design system-nya menggunakan **"Dark Tech / Cyberpunk Bento"** aesthetic:
- Background gelap (`#020617`)
- Card dengan `border-radius: 20px` dan border tipis
- Accent warna neon lime (`#CCFF00`)
- Semua teks di-style dengan font mono untuk kesan tech

### Halaman Admin

Admin **TIDAK** extend `layouts.public`. Sebagian besar view admin (products, articles, contacts) menggunakan `<x-app-layout>` dari Breeze, sedangkan `admin/dashboard.blade.php` bahkan punya HTML sendiri dan load **Bootstrap 5 via CDN** — beda total dari halaman publik!

---

## Cara Menjalankan Lokal

```bash
# 1. Install dependensi
composer install
npm install

# 2. Setup environment
cp .env.example .env
php artisan key:generate

# 3. Jalankan migrasi database
php artisan migrate

# 4. Buat symlink storage (untuk upload gambar)
php artisan storage:link

# 5. Jalankan dev server (semua sekaligus)
composer run dev
# atau manual:
php artisan serve    # Backend di http://localhost:8000
npm run dev          # Vite dev server
```
