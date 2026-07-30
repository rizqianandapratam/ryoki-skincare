# 05 — Status Fitur Ryoki Skincare (Feature Roadmap Status)

Dokumen ini mencatat status terkini seluruh fitur pada proyek **Ryoki Skincare**, sebuah website **Company Profile resmi & Katalog Produk** yang dikelola oleh **PT Golden Intan Berlian** (Bandar Lampung) dengan pengalihan transaksi pembelian utama ke **TikTok Shop Official**.

---

## 🟢 Fitur Yang Sudah Selesai (Completed Features)

### 1. Landing Page & Visual Luxury Aesthetic
- [x] **Hero Banner Interaktif**: Typography Playfair Display + Outfit, badge best seller, dan tombol CTA utama ke katalog & TikTok Shop.
- [x] **Social Proof / Customer Testimonials**: Section "Apa Kata Mereka Tentang Ryoki?" dengan rating 5 bintang, tag *Verified Buyer*, nama & asal kota pelanggan, serta tag produk yang dibeli.
- [x] **Ingredient Highlights Section**: Kartu penjelasan kandungan utama (Niacinamide, Alpha Arbutin, Collagen, & Ekstrak Botanikal).
- [x] **Desain Light Aquatic Luxury**: Skema warna Sky Blue (`#0284C7`), Deep Slate (`#0F172A`), dan Soft Ice Blue (`#F6F9FC`).

### 2. Katalog Produk Interaktif & Filter Real-Time
- [x] **Live Category Filter & Search**: Filter kategori (*All, Cleanser, Serum, Moisturizer, Sunscreen, Peeling*) dan pencarian nama produk secara real-time via Alpine.js & Endpoint API `/api/products`.
- [x] **Product Grid Responsif**: Layout 1 kolom (Mobile) hingga 4 kolom (Desktop) dengan lencana *Best Seller* dan Rating Bintang.
- [x] **Direct TikTok Shop CTA**: Seluruh tombol produk langsung bertuliskan **"Beli di TikTok Shop"** dengan `target="_blank"`.

### 3. Product Detail Page (PDP) - Company Profile Mode
- [x] **Layout 2 Kolom**: Galeri foto produk utama di sisi kiri dan detail informasi di sisi kanan.
- [x] **Informasi Lengkap Produk**: Category badge, Playfair heading, rating 5.0, harga resmi PT Golden Intan Berlian, deskripsi singkat, ingredients pills, dan cara pemakaian.
- [x] **CTA Redirection**: Tombol utama **"Beli di TikTok Shop Official"** (`target="_blank"`) dan tombol sekunder **"Konsultasi Produk via WhatsApp CS"**.
- [x] **Related Products Section**: Rekomendasi produk serupa di bagian bawah halaman detail.

### 4. Halaman "About Us" (Tentang Ryoki Skincare)
- [x] **Header Filosofi Japanese Beauty**: Penjelasan komitmen perawatan *skin barrier* dan kelembaban alami.
- [x] **Statistik Utama Brand**: 4 poin highlight (100% BPOM RI, 50k+ Pelanggan, 4.9 Rating, 0% Harsh Chemicals).
- [x] **Profil Perusahaan Legitimasi**: Identitas resmi **PT Golden Intan Berlian** yang berlokasi di Way Halim Permai, Bandar Lampung.
- [x] **Grid 4 Pilar Keunggulan**: *Cruelty-Free*, *BPOM Approved*, *Natural Ingredients*, & *Dermatology Tested*.
- [x] **Visi & Misi Perusahaan**: Visi menjadi pelopor skincare berkualitas Jepang di Indonesia.

### 5. Skinpedia (Edukasi Skincare / Artikel)
- [x] **Katalog Artikel Edukasi**: Daftar artikel seputar kesehatan kulit dan tips perawatan di route `/articles`.
- [x] **Detail Artikel**: Tampilan baca artikel ramah pembaca di route `/articles/{slug}`.

### 6. Saluran Komunikasi Langsung & Footer Resmi
- [x] **Floating Action Button (FAB Widget)**: Button melayang di sudut kanan bawah dengan efek *pulse notification ring*. Saat diklik menampilkan shortcut langsung ke WhatsApp CS dan TikTok Shop Official.
- [x] **Footer Resmi 4 Kolom**: Identitas PT Golden Intan Berlian, tautan navigasi, sosial media resmi (`@ryokijapanskin`, `@ryokiskincare.official`), serta lencana BPOM & Halal.

### 7. Optimasi SEO & Social Sharing Preview
- [x] **Dynamic Meta Tags Helper**: Judul halaman dinamis, meta description, meta keywords, author, dan canonical URL.
- [x] **Open Graph (OG) & Twitter Cards**: Pratinjau tautan yang rapi (gambar produk/brand, judul, deskripsi) saat dibagikan ke WhatsApp, Instagram, TikTok, atau Facebook.
- [x] **Favicon Resmi**: Favicon SVG & ICO berlogo Ryoki Skincare Sky Blue.

### 8. Optimasi Performa & UX Mobile
- [x] **Lazy Loading Images**: Seluruh gambar di bawah area hero menggunakan `loading="lazy"`.
- [x] **Akselerasi Font & FCP**: Preconnect & `dns-prefetch` Google Fonts (Playfair Display, Outfit, Plus Jakarta Sans) dengan `display=swap`.
- [x] **Sticky Mobile Bar**: Bottom bar khusus layar HP untuk mempermudah pembelian ke TikTok Shop / WhatsApp CS.
- [x] **Overflow-X Handling**: Mencegah pergeseran layar mendatar (*no horizontal scrollbar*).
- [x] **Build Asset Vite**: Terkompilasi bersih via `npm run build`.

### 9. Custom Error Handling
- [x] **Halaman 404 Custom**: Tampilan error 404 estetik tema Ryoki Skincare (`resources/views/errors/404.blade.php`) lengkap dengan tombol *"Kembali ke Beranda"*.

### 10. Refactoring & Purge Fitur Keranjang Belanja
- [x] **Purge Total Shopping Cart**: Menghapus CartController, CartService, CartTest, route `/cart`, view `cart/index.blade.php`, dan komponen `<x-cart-drawer />` agar website murni 100% Company Profile.

---

## 🟡 Fitur Belum Selesai / Rencana Pengembangan (Pending / Backlog)

### 1. Enhancements CMS Dashboard Admin
- [ ] **Rich Text Editor (WYSIWYG)**: Integrasi editor teks (seperti Quill / TinyMCE) untuk mempermudah penulisan artikel Skinpedia dari Dashboard Admin.
- [ ] **Multi-Image Upload Product**: Kemampuan mengunggah lebih dari 1 foto galeri produk langsung dari admin panel.

### 2. Multi-Channel E-Commerce Integration (Optional)
- [ ] **Dukungan Channel Shopee & Tokopedia**: Penambahan kolom `shopee_url` dan `tokopedia_url` pada model `Product` jika perusahaan membuka official store di Shopee & Tokopedia.

### 3. Tracking Traffic & Analytics
- [ ] **Integrasi Analytics & Pixels**: Pemasangan Google Analytics 4 (GA4), Meta Pixel, atau TikTok Pixel untuk melacak jumlah klik pada tombol CTA "Beli di TikTok Shop".

### 4. Dynamic Sitemap & Meta Automation
- [ ] **Auto-Generated Sitemap.xml**: Pembuatan file `sitemap.xml` dinamis yang mengindeks otomatis seluruh produk dan artikel Skinpedia.

---

*Dokumen diperbarui terakhir: 2026-07-29*
