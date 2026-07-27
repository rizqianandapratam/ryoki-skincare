# 04 — Rules & Coding Guidelines

1. **Light Mode Only:** Semua halaman publik wajib menggunakan tema Light Clean Aquatic. Hapus semua class dark mode yang tidak relevan (seperti `bg-[#020617]`, `bg-[#1E293B]`, `text-neon`).
2. **Jangan Mengubah Controller & Database Structure:** Hanya lakukan perubahan pada styling CSS (`style.css`), Tailwind config, dan Blade views (`resources/views/`).
3. **Module Skinpedia (Evergreen):** Sembunyikan/hapus atribut tanggal (`created_at`) pada tampilan artikel di frontend agar konten bersifat timeless.
4. **Mobile First & Fully Responsive:** Pastikan semua layout rapi di tampilan mobile (HP).
5. **Human-Centric UI/UX (Anti-AI Aesthetic):**
   - Hapus semua label bernuansa komputasi/system seperti `[BRACKET]`, `MODULE`, atau `SYSTEM_INFO`.
   - Hindari layout bento grid monoton di semua section. Variasikan dengan layout editorial/asimetris.
   - Load font Google 'Playfair Display' untuk heading (`<h1>` & `<h2>`) agar berasa kesan luxury.
   - Gunakan copywriting bahasa Indonesia yang natural dan ramah.