# 02 — Design System (Fresh Clean Aquatic)

## Ringkasan Visual

Website Ryoki Skincare menggunakan tema **"Fresh, Clean & Aquatic Japanese Skincare"**. Tampilan didominasi warna putih bersih, sentuhan sky/ocean blue, dan gradasi lime/yellow-green lembut yang mencerminkan kesegaran serta kelembaban kulit.

---

## Palet Warna Baru

### CSS Variables (`public/css/style.css`)

| Variable | Hex Code | Penggunaan |
|---|---|---|
| `--bg-base` | `#F8FAFC` | Background utama halaman (Very Light Slate / Off-White) |
| `--bg-card` | `#FFFFFF` | Background card / container (Pure White) |
| `--primary-blue` | `#0EA5E9` | Sky Blue (Warna utama brand Ryoki) |
| `--secondary-blue` | `#0284C7` | Ocean Blue (Heading & elemen penekanan) |
| `--accent-lime` | `#84CC16` | Lime Green (Aksen kelembaban/botanical khas botol produk) |
| `--text-primary` | `#0F172A` | Teks utama (Slate 900 - Gelap dan kontras tinggi) |
| `--text-muted` | `#64748B` | Teks sekunder / deskripsi (Slate 500) |

---

## Tipografi & Aesthetic

- **Heading Utama (h1, h2):** `Playfair Display` (Serif) — Memberikan kesan Japanese Luxury Skincare.
- **Body & Teks:** `Plus Jakarta Sans` / `Inter` (Clean & Legible).
- **Sub-head / Label Halus:** `Space Mono` (Dipakai sangat minimalis tanpa bracket).

---

## Gaya Komponen (Anti-AI Layout)

### 1. Minimalist Borderless Layout
- Hindari membungkus semua elemen dengan bento-card tebal.
- Gunakan *macro white space* (padding luas) dan garis pemisah sangat tipis (`#E2E8F0`).

### 2. Buttons (`.btn-premium`)
- **Primary CTA:** Background `--primary-blue` (`#0EA5E9`), Teks Putih, Rounded Full.
- **Secondary CTA:** Background Transparent, Border `--primary-blue`, Teks `--primary-blue`.

### 3. Image Overlapping
- Foto produk PNG dibuat melayang/overlapping keluar dari container menggunakan negative margin (`-mt-10` atau `translate-y-8`) agar visual dinamis.