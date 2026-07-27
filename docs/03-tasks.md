# 03 — Tasks & Action Plan

## Phase 1: Overhaul Theme & Visual (Priority 1)
- [ ] Update `public/css/style.css` dengan CSS variables warna baru (Light Aquatic).
- [ ] Refactor `resources/views/layouts/public.blade.php` (Navbar & Footer ke Light Theme).
- [ ] Refactor `resources/views/home.blade.php` (Hero section, Bento cards, Products section).
- [ ] Refactor `resources/views/about.blade.php`, `products/`, `articles/`, dan `contact.blade.php`.

## Phase 2: Refactoring Modul Artikel -> Skinpedia (Priority 2)
- [ ] Ubah label "Artikel" / "Journal" menjadi "Skinpedia" di Navbar, Footer, dan Views.
- [ ] Sembunyikan tanggal `created_at` di daftar dan detail Skinpedia.

## Phase 3: Perbaikan Dashboard Admin & Bug Fixes (Priority 3)
- [ ] Perbaiki statistik hardcoded di `Admin/DashboardController.php` agar dinamis dari DB.
- [ ] Pass data produk terbaru ke view dashboard admin.
- [ ] Perbaiki link sidebar admin yang mati (`#`).