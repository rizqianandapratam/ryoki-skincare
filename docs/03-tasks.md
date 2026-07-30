# 03 — Tasks & Action Plan (Sprint Roadmap)

## Sprint 1: Polish Frontend & Visual (Anti-AI Smell)
- [x] Import font 'Playfair Display' untuk `<h1>` dan `<h2>` di layout publik.
- [x] Refactor Hero Section di `home.blade.php` agar gambar produk PNG overlapping melayang.
- [x] Clean up seluruh teks `[BRACKET]` dan nuansa sistem di semua view publik.
- [x] Pastikan warna sesuai palet Light Aquatic di `02-design-system.md`.

## Sprint 2: Perbaikan Bug & Company Profile Catalog
- [x] Implementasi Model & Migration Product dengan `tiktok_shop_url` fallback.
- [x] Live Filter Kategori & Search Bar responsif via Alpine.js & API `/api/products`.
- [x] Redirection CTA "Beli di TikTok Shop" di seluruh card katalog produk.

## Sprint 3: Halaman Detail Produk & Legitimasi Perusahaan
- [x] Buat Product Detail Page (PDP) 2 kolom khusus Company Profile dengan TikTok Shop CTA (`target="_blank"`).
- [x] Buat Halaman "About Us" berdesain mewah dengan identitas **PT Golden Intan Berlian** (Bandar Lampung).
- [x] Tambahkan Testimonial Section / Social Proof (Verified Buyer badges, rating 5.0).
- [x] Tambahkan Floating Action Button (FAB Widget) untuk akses cepat WhatsApp CS & TikTok Shop.
- [x] Rapikan Footer resmi 4 kolom dengan legalitas BPOM RI & Halal.

## Sprint 4: Optimasi SEO, Performance & Cleanup
- [x] Dynamic Meta Tags (Title, Description, Keywords, Canonical URL).
- [x] Open Graph & Twitter Cards untuk preview WhatsApp, Instagram, & TikTok.
- [x] Favicon resmi Ryoki Skincare (SVG & ICO).
- [x] Lazy loading gambar (`loading="lazy"`), preconnect font, & Sticky Mobile CTA Bar.
- [x] Custom 404 Error Page (`resources/views/errors/404.blade.php`).
- [x] Purge total seluruh fitur & route Keranjang Belanja (murni Company Profile).
- [x] Build aset produksi bersih via `npm run build`.

---
*Status rinci setiap fitur dapat dilihat pada file [`docs/05-feature-status.md`](file:///d:/laragon/www/ryoki-skincare/docs/05-feature-status.md).*