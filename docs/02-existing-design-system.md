# 02 — Design System yang Sudah Ada

## Ringkasan Visual

Website Ryoki Skincare menggunakan tema **"Dark Tech / Cyberpunk Bento"** — tampilan gelap premium dengan sentuhan neon electric lime, layout bento grid, dan elemen yang terasa seperti interface sistem komputer (font mono, label dengan `[BRACKET]`, istilah seperti "MODULE", "EXECUTE", "SYSTEM_INFO").

---

## Palet Warna

### CSS Variables (didefinisikan di `public/css/style.css`)

| Variable | Hex Code | Penggunaan |
|---|---|---|
| `--bg-base` | `#020617` | Background utama halaman (hampir hitam, navy sangat gelap) |
| `--bg-card` | `#1E293B` | Background card / bento box |
| `--accent-neon` | `#CCFF00` | Warna aksen utama — electric lime / neon yellow-green |
| `--text-primary` | `#F8FAFC` | Warna teks utama (hampir putih) |
| `--text-muted` | `#94A3B8` | Teks sekunder / placeholder (slate-400) |

### Warna Inline yang Sering Dipakai di View

| Hex Code | Konteks Penggunaan |
|---|---|
| `#020617` | Background base, background gambar produk |
| `#1E293B` | Card, sidebar admin, mobile menu |
| `#CCFF00` | CTA button, hover effect, badge "BEST SELLER", pulse indicator, border aktif |
| `#F8FAFC` | Teks utama, hover button neon |
| `#94A3B8` | Teks sekunder, ikon non-aktif |
| `#ef4444` | Warna error / out of stock (Tailwind red-500) |
| `#f87171` | Badge "HABIS TERJUAL" (Tailwind red-400) |

### Warna Kustom di `tailwind.config.js`

Warna Tailwind ini **didefinisikan tapi belum banyak dipakai** di view (sebagian besar view pakai hex langsung):

#### `ryoki` (Gold — Primary Brand)
| Token | Hex |
|---|---|
| `ryoki-50` | `#FDFBF7` |
| `ryoki-100` | `#F9F5E8` |
| `ryoki-200` | `#F1E7CA` |
| `ryoki-300` | `#E7D5A5` |
| `ryoki-400` | `#DEC07C` |
| `ryoki-500` | `#D4AF37` ← Muted Gold (Primary) |
| `ryoki-600` | `#BA942A` |
| `ryoki-700` | `#947225` |
| `ryoki-800` | `#7B5E26` |
| `ryoki-900` | `#674E25` |

#### `sage` (Sage Green — Secondary)
| Token | Hex |
|---|---|
| `sage-50` | `#F6F8F5` |
| `sage-100` | `#EBF1E9` |
| `sage-200` | `#D6E1D2` |
| `sage-300` | `#BBCBA9` |
| `sage-400` | `#A3B899` ← Soft Sage Green |
| `sage-500` | `#8A9E7F` |
| `sage-600` | `#6B7E62` |
| `sage-700` | `#55654E` |
| `sage-800` | `#465342` |
| `sage-900` | `#3A4537` |

#### `blush` (Blush Rose — Accent)
| Token | Hex |
|---|---|
| `blush-50` | `#FDF9F9` |
| `blush-100` | `#FAF1F2` |
| `blush-200` | `#F3E0E2` |
| `blush-300` | `#E8C5C8` ← Soft Blush Rose |
| `blush-400` | `#DBA3A8` |
| `blush-500` | `#CB7C84` |
| `blush-600` | `#B25D66` |
| `blush-700` | `#954B53` |
| `blush-800` | `#7E4249` |
| `blush-900` | `#693A3F` |

> 📌 **Catatan:** Palet `ryoki`, `sage`, dan `blush` kemungkinan adalah rancangan awal yang belum diimplementasikan. Design yang jadi pakai palet dark/neon yang berbeda.

---

## Tipografi

### Font Families

| Font | Sumber | Class / Penggunaan |
|---|---|---|
| **Plus Jakarta Sans** | Google Fonts (via `style.css`) | Font utama body — class `font-sans` (Tailwind) |
| **Space Mono** | Google Fonts (via `style.css`) | Font monospace — class `font-mono` (override Tailwind) |
| **Playfair Display** | Konfigurasi Tailwind (`tailwind.config.js`) | Didefinisikan sebagai `font-serif`, belum dipakai di view |
| **Inter** | Konfigurasi Tailwind (`tailwind.config.js`) | Fallback di `font-sans`, belum dipakai eksplisit |
| **Figtree** | Google Fonts via Bunny.net (di `public.blade.php`) | Di-load tapi tidak jadi font utama |

### Penggunaan Tipografi di UI

- **Heading besar:** `text-4xl md:text-5xl lg:text-6xl font-bold text-white`
- **Subheading:** `text-2xl md:text-3xl font-bold text-white`
- **Body text:** `text-sm md:text-lg text-[#94A3B8] font-light leading-relaxed`
- **Label / Badge:** `font-mono text-xs uppercase tracking-widest` (Space Mono)
- **Harga produk:** `font-mono font-bold text-3xl text-neon`

---

## Komponen UI yang Sudah Dibuat

### 1. Navbar (dalam `layouts/public.blade.php`)

**Posisi:** Fixed top, z-index 50, lebar penuh.

**Fitur:**
- Efek glassmorphism saat scroll (`navbar-glass`: `background: rgba(2,6,23,0.75)` + `backdrop-filter: blur(15px)`)
- Transparent saat belum scroll
- Desktop: horizontal links + tombol TikTok Shop + Login/Admin indicator
- Mobile: hamburger toggle menu (Alpine.js) dengan background `#1E293B`
- Conditional rendering: `@guest` / `@auth` untuk show/hide login button vs admin name

**CSS class:** `.navbar-glass` (di `style.css`)

```css
.navbar-glass {
    background: rgba(2, 6, 23, 0.75);
    backdrop-filter: blur(15px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}
```

---

### 2. Footer (dalam `layouts/public.blade.php`)

**Layout:** 4 kolom grid (1 kolom di mobile).

**Konten:**
- Kolom 1: Brand logo "RYOKI" + deskripsi singkat + nama PT
- Kolom 2: Tautan cepat (Beranda, Tentang, Produk, Artikel)
- Kolom 3: Informasi kontak (alamat, WA, email)
- Kolom 4: Social media icons (Facebook, Instagram, TikTok)

**Styling:** Background `#020617`, teks `text-gray-400`, border top `rgba(255,255,255,0.05)`.

---

### 3. Bento Card (`.bento-card`)

Komponen card utama yang dipakai hampir di seluruh halaman.

```css
.bento-card {
    background: var(--bg-card);      /* #1E293B */
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    padding: 20px;
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    overflow: hidden;
}

.bento-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0 20px rgba(204, 255, 0, 0.15);
    border-color: #CCFF00;
}
```

**Dipakai di:** Home (hero, brand story, product cards), About, Contact, Products listing, Products detail, Articles listing, Articles detail.

---

### 4. Premium Buttons (`.btn-premium`)

Dua varian button utama:

**Neon (Primary CTA):**
```css
.btn-premium-neon {
    background-color: #CCFF00;
    color: #020617;
}
/* Hover: background #F8FAFC + glow shadow */
```

**Outline (Secondary CTA):**
```css
.btn-premium-outline {
    background-color: transparent;
    border-color: rgba(255, 255, 255, 0.1);
    color: #F8FAFC;
}
/* Hover: border neon + text neon */
```

**Bentuk:** Pill / rounded-full (`border-radius: 9999px`), padding `0.75rem 2rem`.

**Dipakai di:** Hero section (Home), halaman Contact.

---

### 5. Contact Form Inputs (`.contact-input`)

Input form khusus dark theme:

```css
.contact-input {
    background-color: #020617;
    color: #F8FAFC;
    border: 1px solid rgba(255, 255, 255, 0.1);
    font-family: 'Plus Jakarta Sans', sans-serif;
}
.contact-input:focus {
    border-color: #CCFF00;
    box-shadow: 0 0 10px rgba(204, 255, 0, 0.2);
}
```

**Dipakai di:** `contact.blade.php`

---

### 6. Komponen Blade (dari Laravel Breeze)

File-file ini ada di `resources/views/components/` — dipakai di area **admin** dan **auth**, bukan di halaman publik:

| File | Fungsi |
|---|---|
| `primary-button.blade.php` | Tombol submit form (Breeze default, background gray-800) |
| `secondary-button.blade.php` | Tombol sekunder (Breeze) |
| `danger-button.blade.php` | Tombol hapus / aksi berbahaya |
| `text-input.blade.php` | Input text standar |
| `input-label.blade.php` | Label form |
| `input-error.blade.php` | Pesan error validasi |
| `dropdown.blade.php` | Komponen dropdown |
| `dropdown-link.blade.php` | Item di dalam dropdown |
| `nav-link.blade.php` | Link navigasi |
| `responsive-nav-link.blade.php` | Link nav untuk mobile |
| `modal.blade.php` | Modal dialog |
| `auth-session-status.blade.php` | Status sesi auth |
| `application-logo.blade.php` | Logo aplikasi SVG |

---

### 7. Animasi & Efek

| Nama | Cara Kerja | Dipakai Di |
|---|---|---|
| **Fade-in scroll** | CSS `.fade-in` + `.appear` via IntersectionObserver JS | `layouts/public.blade.php` (tapi belum dipasang di elemen spesifik) |
| **Neon glow card hover** | `box-shadow: 0 0 20px rgba(204, 255, 0, 0.15)` + `border-color: #CCFF00` | Semua `.bento-card:hover` |
| **Translate-up on hover** | `transform: translateY(-5px)` | Semua `.bento-card:hover` |
| **Animated pulse dot** | Tailwind `animate-pulse` | Navbar badge, status IN_STOCK, header section badges |
| **Mix-blend luminosity** | `mix-blend-luminosity` → `mix-blend-normal` on hover | Gambar produk & artikel |
| **Image scale on hover** | `transform group-hover:scale-105 transition duration-700` | Product card images |
| **Navbar glassmorphism** | Alpine.js detect scroll → toggle `.navbar-glass` class | Navbar |
| **Accordion** | Alpine.js `x-data`, `x-show`, `x-collapse` | Product detail page |
| **Neon blur glow bg** | `bg-[#CCFF00] opacity-X filter blur-Xpx` div absolut di belakang konten | Header section tiap halaman |

---

## Konvensi Penamaan & Bahasa Desain

- **Label sistem:** Teks dalam `[BRACKET]` dengan font mono (contoh: `[TENTANG KAMI]`, `[SYS.DESC]`, `[ERROR_404: DATA_NOT_FOUND]`)
- **Istilah teknis:** "MODULE", "EXECUTE_PURCHASE()", "TRANSACTION ROUTED TO TIKTOK_SHOP", "C:\\SYS>" — memberi kesan interface tech
- **Badge status:** `IN_STOCK`, `ERR_OUT_OF_STOCK`, `TOP_RATED`, `BEST SELLER`
- **Breadcrumb:** Diformat seperti path sistem: `C:\SYS> ROOT / MODULES / NAMA_PRODUK`
