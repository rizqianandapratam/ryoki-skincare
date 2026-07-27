# 03 — Tasks & Action Plan (Sprint Roadmap)

## Sprint 1: Polish Frontend & Visual (Anti-AI Smell)
- [ ] Import font 'Playfair Display' untuk `<h1>` dan `<h2>` di layout publik.
- [ ] Refactor Hero Section di `home.blade.php` agar gambar produk PNG overlapping melayang.
- [ ] Clean up seluruh teks `[BRACKET]` dan nuansa sistem di semua view publik.
- [ ] Pastikan warna sesuai palet Light Aquatic di `02-design-system.md`.

## Sprint 2: Perbaikan Bug & Dashboard Admin
- [ ] Perbaiki statistik hardcoded di `Admin/DashboardController.php` dengan query DB asli.
- [ ] Kirim data `$latest_products` ke view dashboard admin.
- [ ] Perbaiki link sidebar admin yang mati (`#`) ke route Skinpedia/Artikel.

## Sprint 3: Fitur Micro & Interaktivitas
- [ ] Tambahkan CTA "Order via WhatsApp" otomatis di detail produk.
- [ ] Refactor modul Artikel menjadi Skinpedia ( Evergreen & Sembunyikan `created_at`).

## Sprint 4: Cleanup & Production Readiness
- [ ] Hapus file demo bawaan Breeze `resources/views/welcome.blade.php`.
- [ ] Buat file `robots.txt` dan `sitemap.xml` sederhana di folder `public/`.
- [ ] Testing responsivitas mobile dan build aset dengan `npm run build`.