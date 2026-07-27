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

### Styling (Dua Lapis)

Proyek ini menggunakan **dua cara styling** yang berjalan bersamaan:

1. **`resources/css/app.css`** → Diproses oleh Vite + Tailwind CSS (`@tailwind base/components/utilities`).
2. **`public/css/style.css`** → File CSS manual yang di-link langsung via `{{ asset('css/style.css') }}`. Berisi semua custom variables dan class utama.

---

## Cara Kerja Styling

### Halaman Publik
- Extended dari `layouts.public`.
- Memakai tema **Fresh, Clean & Aquatic Japanese Skincare** (Sky Blue, Ocean Blue, White, Lime Accent).
- Tipografi: **Playfair Display** (Heading Serif) & **Plus Jakarta Sans** (Body text).

### Halaman Admin
- Menggunakan `<x-app-layout>` dari Breeze dan Bootstrap 5 via CDN pada `admin/dashboard.blade.php`.

---

## Database & Routing

- **Database:** SQLite (`database/database.sqlite`).
- **Routing:** Semua route berada di `routes/web.php` (Publik, Admin Auth, dan Admin CRUD).