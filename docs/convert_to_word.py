"""
Script untuk mengkonversi tinjauan pustaka markdown ke Word (.docx)
Format: Times New Roman 12pt, 1.5 spasi, justified, margin standar skripsi
"""

from docx import Document
from docx.shared import Pt, Cm, RGBColor
from docx.enum.text import WD_ALIGN_PARAGRAPH
from docx.enum.style import WD_STYLE_TYPE
import re

doc = Document()

# === PAGE SETUP ===
for section in doc.sections:
    section.top_margin = Cm(4)
    section.bottom_margin = Cm(3)
    section.left_margin = Cm(4)
    section.right_margin = Cm(3)

# === SETUP STYLES ===

# Normal style (body text)
style_normal = doc.styles['Normal']
style_normal.font.name = 'Times New Roman'
style_normal.font.size = Pt(12)
style_normal.paragraph_format.line_spacing = 1.5
style_normal.paragraph_format.space_after = Pt(0)
style_normal.paragraph_format.space_before = Pt(0)
style_normal.paragraph_format.alignment = WD_ALIGN_PARAGRAPH.JUSTIFY

# Heading 1 style (BAB)
style_h1 = doc.styles['Heading 1']
style_h1.font.name = 'Times New Roman'
style_h1.font.size = Pt(14)
style_h1.font.bold = True
style_h1.font.color.rgb = RGBColor(0, 0, 0)
style_h1.paragraph_format.alignment = WD_ALIGN_PARAGRAPH.CENTER
style_h1.paragraph_format.space_before = Pt(0)
style_h1.paragraph_format.space_after = Pt(24)
style_h1.paragraph_format.line_spacing = 1.5

# Heading 2 style (Sub-bab)
style_h2 = doc.styles['Heading 2']
style_h2.font.name = 'Times New Roman'
style_h2.font.size = Pt(12)
style_h2.font.bold = True
style_h2.font.color.rgb = RGBColor(0, 0, 0)
style_h2.paragraph_format.alignment = WD_ALIGN_PARAGRAPH.LEFT
style_h2.paragraph_format.space_before = Pt(18)
style_h2.paragraph_format.space_after = Pt(12)
style_h2.paragraph_format.line_spacing = 1.5

# === HELPER FUNCTIONS ===

def add_formatted_paragraph(doc, text, style='Normal', indent_first_line=True):
    """Add a paragraph with inline bold/italic formatting from markdown."""
    p = doc.add_paragraph(style=style)
    if indent_first_line and style == 'Normal':
        p.paragraph_format.first_line_indent = Cm(1.27)

    # Parse markdown bold/italic
    # Split by **bold** and *italic* markers
    parts = re.split(r'(\*\*.*?\*\*|\*.*?\*)', text)

    for part in parts:
        if part.startswith('**') and part.endswith('**'):
            run = p.add_run(part[2:-2])
            run.bold = True
            run.font.name = 'Times New Roman'
            run.font.size = Pt(12)
        elif part.startswith('*') and part.endswith('*'):
            run = p.add_run(part[1:-1])
            run.italic = True
            run.font.name = 'Times New Roman'
            run.font.size = Pt(12)
        else:
            run = p.add_run(part)
            run.font.name = 'Times New Roman'
            run.font.size = Pt(12)

    return p


def add_reference_block(doc, lines):
    """Add a reference/citation block with hanging indent."""
    for line in lines:
        line = line.strip()
        if not line:
            continue
        # Remove markdown link syntax [text](url) -> text (url)
        line = re.sub(r'\[([^\]]+)\]\(([^)]+)\)', r'\1', line)
        # Remove > prefix
        line = re.sub(r'^>\s*', '', line)

        if not line:
            continue

        p = doc.add_paragraph(style='Normal')
        p.paragraph_format.first_line_indent = Cm(0)
        p.paragraph_format.left_indent = Cm(1.27)

        # Parse bold/italic in reference
        parts = re.split(r'(\*\*.*?\*\*|\*.*?\*)', line)
        for part in parts:
            if part.startswith('**') and part.endswith('**'):
                run = p.add_run(part[2:-2])
                run.bold = True
            elif part.startswith('*') and part.endswith('*'):
                run = p.add_run(part[1:-1])
                run.italic = True
            else:
                run = p.add_run(part)
            run.font.name = 'Times New Roman'
            run.font.size = Pt(11)


def add_numbered_item(doc, number_text, content):
    """Add a numbered list item with formatting."""
    p = doc.add_paragraph(style='Normal')
    p.paragraph_format.first_line_indent = Cm(0)
    p.paragraph_format.left_indent = Cm(1.27)

    # Add the number
    run = p.add_run(number_text + ' ')
    run.font.name = 'Times New Roman'
    run.font.size = Pt(12)

    # Parse the rest with bold/italic
    parts = re.split(r'(\*\*.*?\*\*|\*.*?\*)', content)
    for part in parts:
        if part.startswith('**') and part.endswith('**'):
            run = p.add_run(part[2:-2])
            run.bold = True
        elif part.startswith('*') and part.endswith('*'):
            run = p.add_run(part[1:-1])
            run.italic = True
        else:
            run = p.add_run(part)
        run.font.name = 'Times New Roman'
        run.font.size = Pt(12)


def add_table(doc, headers, rows):
    """Add a formatted table."""
    table = doc.add_table(rows=1 + len(rows), cols=len(headers))
    table.style = 'Table Grid'

    # Header row
    for i, header in enumerate(headers):
        cell = table.rows[0].cells[i]
        cell.text = ''
        p = cell.paragraphs[0]
        p.alignment = WD_ALIGN_PARAGRAPH.CENTER
        run = p.add_run(header)
        run.bold = True
        run.font.name = 'Times New Roman'
        run.font.size = Pt(11)

    # Data rows
    for r_idx, row in enumerate(rows):
        for c_idx, cell_text in enumerate(row):
            cell = table.rows[r_idx + 1].cells[c_idx]
            cell.text = ''
            p = cell.paragraphs[0]
            p.alignment = WD_ALIGN_PARAGRAPH.LEFT
            # Parse italic
            parts = re.split(r'(\*.*?\*)', cell_text)
            for part in parts:
                if part.startswith('*') and part.endswith('*'):
                    run = p.add_run(part[1:-1])
                    run.italic = True
                else:
                    run = p.add_run(part)
                run.font.name = 'Times New Roman'
                run.font.size = Pt(11)


# ====================================
# === DOCUMENT CONTENT STARTS HERE ===
# ====================================

# === BAB TITLE ===
doc.add_heading('BAB 2', level=1)
p_title = doc.add_paragraph()
p_title.alignment = WD_ALIGN_PARAGRAPH.CENTER
p_title.paragraph_format.space_after = Pt(36)
run = p_title.add_run('TINJAUAN PUSTAKA')
run.bold = True
run.font.name = 'Times New Roman'
run.font.size = Pt(14)

# === 2.1 WEBSITE ===
doc.add_heading('2.1 Website', level=2)

add_formatted_paragraph(doc,
    'Website adalah sekumpulan halaman web (web pages) yang saling terhubung melalui hyperlink '
    'dan diakses menggunakan protokol HTTP (Hypertext Transfer Protocol) atau HTTPS (HTTP Secure) '
    'melalui aplikasi browser. Setiap website memiliki alamat unik yang disebut URL (Uniform '
    'Resource Locator) dan di-hosting pada sebuah web server yang terhubung ke jaringan internet. '
    'Menurut Laudon & Laudon (2020), website merupakan komponen utama dalam sistem informasi '
    'berbasis web yang memungkinkan organisasi menyampaikan informasi, layanan, dan produk kepada '
    'pengguna secara global tanpa batasan waktu dan geografis.'
)

add_formatted_paragraph(doc,
    'Secara umum, website dapat dikategorikan menjadi dua jenis berdasarkan sifat kontennya: '
    '**website statis** dan **website dinamis**. Website statis menampilkan konten yang tetap dan '
    'tidak berubah kecuali dilakukan pembaruan manual pada kode sumbernya. Sebaliknya, website '
    'dinamis menghasilkan konten secara real-time berdasarkan interaksi pengguna, data dari '
    'database, atau logika pemrograman di sisi server. Website dinamis umumnya dibangun '
    'menggunakan bahasa pemrograman server-side seperti PHP, Python, atau JavaScript (Node.js) '
    'yang dipadukan dengan sistem manajemen basis data (Laudon & Laudon, 2020).'
)

add_formatted_paragraph(doc,
    'Dalam konteks bisnis modern, website berfungsi sebagai media komunikasi digital utama yang '
    'menghubungkan organisasi dengan pelanggan, mitra, dan pemangku kepentingan lainnya. Website '
    'memungkinkan organisasi untuk membangun kehadiran digital (*online presence*), memperluas '
    'jangkauan pasar, meningkatkan kredibilitas, serta menyediakan saluran informasi dan layanan '
    'yang dapat diakses selama 24 jam penuh tanpa batasan geografis.'
)

add_reference_block(doc, [
    '> Laudon, K. C., & Laudon, J. P. (2020). *Management Information Systems: Managing the Digital Firm* (16th ed.). Pearson.',
    '> ISBN: 978-0135191798',
    '> [https://www.pearson.com/en-us/subject-catalog/p/management-information-systems-managing-the-digital-firm/P200000003295](link)',
])

# === 2.2 BRAND WEBSITE ===
doc.add_heading('2.2 Brand Website', level=2)

add_formatted_paragraph(doc,
    'Brand website adalah jenis website yang dikelola oleh pemilik merek (*brand owner*) untuk '
    'merepresentasikan identitas, nilai, dan produk suatu merek secara digital kepada publik. '
    'Berbeda dengan website *company profile* yang berfokus pada profil perusahaan induk '
    '(struktur organisasi, laporan tahunan, portofolio bisnis), brand website secara spesifik '
    'berfokus pada **satu merek tertentu** — menampilkan cerita merek (*brand story*), katalog '
    'produk, konten edukatif, testimoni pelanggan, dan mengarahkan pengunjung ke saluran '
    'penjualan yang tersedia (Keller, 2013).'
)

add_formatted_paragraph(doc,
    'Menurut Keller (2013), brand website merupakan salah satu *brand contact point* yang '
    'paling efektif di era digital. Brand contact point adalah setiap titik interaksi di mana '
    'konsumen bersentuhan langsung dengan sebuah merek, baik secara fisik maupun digital. '
    'Melalui brand website, perusahaan dapat mengontrol sepenuhnya narasi dan citra merek yang '
    'ingin disampaikan kepada konsumen — mulai dari visual identity (logo, warna, tipografi), '
    'tone of voice, hingga pengalaman pengguna (*user experience*) saat menjelajahi website '
    'tersebut.'
)

add_formatted_paragraph(doc,
    'Dalam praktiknya, brand website pada industri kosmetik dan skincare memiliki beberapa '
    'karakteristik umum. Pertama, website menampilkan **identitas visual merek** yang konsisten '
    'dengan kemasan produk fisik dan materi pemasaran lainnya. Kedua, tersedia **katalog produk '
    'lengkap** dengan informasi detail seperti kandungan bahan (*ingredients*), manfaat, cara '
    'pemakaian, dan harga. Ketiga, brand website sering kali menyediakan **konten edukatif** '
    'berupa artikel atau blog seputar perawatan kulit yang berfungsi sebagai strategi *content '
    'marketing*. Keempat, terdapat **call-to-action (CTA)** yang mengarahkan pengunjung ke '
    'saluran pembelian, baik marketplace (Shopee, TikTok Shop), toko fisik, maupun WhatsApp '
    'untuk konsultasi (Chaffey & Ellis-Chadwick, 2019).'
)

add_formatted_paragraph(doc,
    'Contoh brand website pada industri skincare Indonesia antara lain wardahbeauty.com (brand '
    'Wardah milik PT Paragon Technology and Innovation), skintific.com (brand Skintific), dan '
    'somethinc.com (brand Somethinc milik PT Beautyhaul Global). Website-website tersebut tidak '
    'menampilkan profil perusahaan induk secara detail, melainkan berfokus sepenuhnya pada '
    'identitas dan produk merek masing-masing.'
)

add_reference_block(doc, [
    '> Keller, K. L. (2013). *Strategic Brand Management: Building, Measuring, and Managing Brand Equity* (4th ed.). Pearson.',
    '> ISBN: 978-0132664257',
    '> https://www.pearson.com/en-us/subject-catalog/p/strategic-brand-management-building-measuring-and-managing-brand-equity/P200000005955',
    '>',
    '> Chaffey, D., & Ellis-Chadwick, F. (2019). *Digital Business and E-Commerce Management* (7th ed.). Pearson.',
    '> ISBN: 978-1292193335',
    '> https://www.pearson.com/en-gb/subject-catalog/p/digital-business-and-e-commerce-management/P200000004017',
])

# === 2.3 KATALOG PRODUK DIGITAL DAN STRATEGI OMNICHANNEL ===
doc.add_heading('2.3 Katalog Produk Digital dan Strategi Omnichannel', level=2)

add_formatted_paragraph(doc,
    'Katalog produk digital adalah penyajian informasi produk secara online yang menggantikan '
    'fungsi katalog cetak konvensional. Dalam katalog digital, setiap produk ditampilkan dengan '
    'informasi lengkap meliputi gambar produk, nama, deskripsi, spesifikasi, harga, dan '
    'ketersediaan. Keunggulan katalog digital dibandingkan katalog cetak antara lain: kemudahan '
    'pembaruan informasi secara real-time, kemampuan pencarian dan filter produk, jangkauan '
    'audiens yang tidak terbatas, serta biaya produksi dan distribusi yang jauh lebih rendah '
    '(Laudon & Traver, 2021).'
)

add_formatted_paragraph(doc,
    'Dalam konteks ritel modern, katalog produk digital sering diintegrasikan dengan strategi '
    '**omnichannel**. Omnichannel adalah pendekatan pemasaran dan penjualan yang mengintegrasikan '
    'seluruh saluran distribusi — baik online (website, marketplace, media sosial) maupun offline '
    '(toko fisik) — menjadi satu pengalaman pelanggan yang mulus (*seamless*) dan konsisten. '
    'Verhoef et al. (2015) mendefinisikan omnichannel retailing sebagai pengelolaan sinergis '
    'dari berbagai saluran dan titik sentuh pelanggan (*touchpoints*), di mana pengalaman '
    'pelanggan di seluruh saluran dan kinerja keseluruhan saluran dioptimalkan secara bersamaan.'
)

add_formatted_paragraph(doc,
    'Berbeda dengan pendekatan **multichannel** di mana setiap saluran beroperasi secara '
    'terpisah, strategi omnichannel memastikan bahwa informasi produk, harga, dan pengalaman '
    'merek tetap konsisten di semua platform. Sebagai contoh, seorang pelanggan dapat melihat '
    'produk di brand website, membandingkan harga, lalu menyelesaikan pembelian di marketplace '
    'pilihan mereka (Shopee atau TikTok Shop) — semuanya dengan informasi yang sinkron dan '
    'konsisten. Verhoef et al. (2015) menemukan bahwa integrasi antar saluran secara signifikan '
    'meningkatkan kepuasan dan loyalitas pelanggan karena memberikan fleksibilitas dan kenyamanan '
    'dalam proses pembelian.'
)

add_reference_block(doc, [
    '> Verhoef, P. C., Kannan, P. K., & Inman, J. J. (2015). From Multi-Channel Retailing to Omni-Channel Retailing: Introduction to the Special Issue on Multi-Channel Retailing. *Journal of Retailing*, 91(2), 174–181.',
    '> DOI: 10.1016/j.jretai.2015.02.005',
    '>',
    '> Laudon, K. C., & Traver, C. G. (2021). *E-Commerce 2021: Business, Technology, Society* (17th ed.). Pearson.',
    '> ISBN: 978-0136929192',
    '> https://www.pearson.com/en-us/subject-catalog/p/e-commerce-2021-2022-business-technology-and-society/P200000003299',
])

# === 2.4 ARSITEKTUR MVC ===
doc.add_heading('2.4 Arsitektur Model-View-Controller (MVC)', level=2)

add_formatted_paragraph(doc,
    'Model-View-Controller (MVC) adalah pola arsitektur perangkat lunak (*architectural pattern*) '
    'yang memisahkan aplikasi menjadi tiga komponen utama yang saling terpisah namun berinteraksi '
    'satu sama lain. Konsep MVC pertama kali dikemukakan oleh Trygve Reenskaug pada tahun 1979 '
    'saat bekerja di Xerox PARC, dan sejak saat itu menjadi standar arsitektur yang diadopsi '
    'secara luas oleh framework web modern (Fowler, 2002).'
)

p_intro = add_formatted_paragraph(doc,
    'Tiga komponen dalam arsitektur MVC adalah sebagai berikut:', indent_first_line=True
)

add_numbered_item(doc, '1.',
    '**Model** — komponen yang bertanggung jawab atas data dan logika bisnis aplikasi. Model '
    'mengelola interaksi dengan basis data, melakukan validasi data, dan menjalankan aturan '
    'bisnis. Dalam konteks framework Laravel, Model diimplementasikan melalui Eloquent ORM '
    'yang memetakan tabel basis data ke objek PHP.'
)

add_numbered_item(doc, '2.',
    '**View** — komponen yang bertanggung jawab atas tampilan antarmuka pengguna (*user '
    'interface*). View mengambil data dari Model dan menampilkannya dalam format yang dapat '
    'dibaca oleh pengguna, seperti halaman HTML. Dalam Laravel, View diimplementasikan melalui '
    'Blade templating engine.'
)

add_numbered_item(doc, '3.',
    '**Controller** — komponen yang bertindak sebagai penghubung antara Model dan View. '
    'Controller menerima input dari pengguna (melalui HTTP request), memproses logika yang '
    'diperlukan dengan memanggil Model, lalu mengembalikan respons yang sesuai melalui View.'
)

add_formatted_paragraph(doc,
    'Keuntungan utama dari penerapan arsitektur MVC adalah **pemisahan tanggung jawab** '
    '(*separation of concerns*), di mana setiap komponen dapat dikembangkan, diuji, dan '
    'dipelihara secara independen tanpa memengaruhi komponen lainnya. Pemisahan ini meningkatkan '
    'modularitas kode, memudahkan kolaborasi tim, mempermudah proses debugging, serta '
    'memungkinkan penggunaan ulang (*reusability*) komponen di berbagai bagian aplikasi '
    '(Fowler, 2002).'
)

add_reference_block(doc, [
    '> Fowler, M. (2002). *Patterns of Enterprise Application Architecture*. Addison-Wesley Professional.',
    '> ISBN: 978-0321127426',
    '> https://martinfowler.com/books/eaa.html',
])

# === 2.5 PHP ===
doc.add_heading('2.5 PHP', level=2)

add_formatted_paragraph(doc,
    'PHP (*Hypertext Preprocessor*) adalah bahasa pemrograman server-side yang dirancang khusus '
    'untuk pengembangan aplikasi web. PHP pertama kali dibuat oleh Rasmus Lerdorf pada tahun '
    '1994 dan saat ini dikembangkan oleh The PHP Group sebagai proyek open-source. PHP memproses '
    'logika di sisi server (*server-side scripting*), menghasilkan output berupa halaman HTML '
    'yang kemudian dikirimkan ke browser klien melalui protokol HTTP (The PHP Group, 2024).'
)

add_formatted_paragraph(doc,
    'PHP memiliki beberapa karakteristik yang menjadikannya populer untuk pengembangan web. '
    'Pertama, PHP mudah dipelajari karena memiliki sintaks yang mirip dengan bahasa C dan Perl. '
    'Kedua, PHP mendukung berbagai sistem manajemen basis data populer seperti MySQL, MariaDB, '
    'PostgreSQL, dan SQLite. Ketiga, PHP memiliki ekosistem yang sangat luas dengan ribuan '
    'library dan framework (seperti Laravel, Symfony, CodeIgniter) serta pengelola dependensi '
    'Composer. Keempat, PHP didukung oleh hampir seluruh penyedia layanan hosting web.'
)

add_formatted_paragraph(doc,
    'Menurut survei W3Techs (2024), PHP digunakan oleh 76,2% dari seluruh website yang '
    'menggunakan bahasa pemrograman server-side, menjadikannya bahasa backend paling dominan di '
    'dunia. Platform-platform besar seperti WordPress (43% dari seluruh website di dunia), '
    'Facebook, dan Wikipedia dibangun menggunakan PHP. Pada project ini digunakan PHP versi 8.2 '
    'yang memperkenalkan fitur-fitur modern seperti *readonly classes*, *enum*, *fiber*, dan '
    'peningkatan performa signifikan melalui JIT (*Just-In-Time*) compilation.'
)

add_reference_block(doc, [
    '> The PHP Group. (2024). *PHP: Hypertext Preprocessor — Official Documentation*.',
    '> https://www.php.net/docs.php',
    '>',
    '> W3Techs. (2024). *Usage Statistics of Server-side Programming Languages for Websites*.',
    '> https://w3techs.com/technologies/overview/programming_language',
])

# === 2.6 FRAMEWORK LARAVEL ===
doc.add_heading('2.6 Framework Laravel', level=2)

add_formatted_paragraph(doc,
    'Laravel adalah framework PHP open-source yang diciptakan oleh Taylor Otwell pada tahun '
    '2011. Laravel dibangun di atas arsitektur MVC dan dirancang untuk mempermudah pengembangan '
    'aplikasi web dengan menyediakan sintaks yang elegan dan ekspresif (*expressive syntax*). '
    'Laravel menerapkan prinsip *Convention over Configuration*, yang berarti framework telah '
    'menyediakan konfigurasi default yang optimal sehingga pengembang dapat langsung fokus pada '
    'logika bisnis tanpa harus mengonfigurasi banyak hal dari awal (Otwell, 2024).'
)

add_formatted_paragraph(doc,
    'Laravel menyediakan sejumlah fitur bawaan (*built-in features*) yang mempercepat proses '
    'pengembangan, antara lain:'
)

add_numbered_item(doc, '1.',
    '**Eloquent ORM** — Object-Relational Mapping yang memetakan tabel basis data ke model '
    'PHP, memungkinkan manipulasi data menggunakan sintaks berorientasi objek tanpa menulis '
    'query SQL secara langsung.'
)
add_numbered_item(doc, '2.',
    '**Blade Templating Engine** — mesin template yang memungkinkan pembuatan tampilan HTML '
    'secara modular dengan fitur *template inheritance*, *components*, dan *directives*.'
)
add_numbered_item(doc, '3.',
    '**Artisan CLI** — antarmuka baris perintah (*command-line interface*) untuk mengotomasi '
    'tugas-tugas rutin seperti pembuatan model, controller, migrasi, dan seeder.'
)
add_numbered_item(doc, '4.',
    '**Migration & Seeder** — sistem pengelolaan skema basis data menggunakan kode PHP, '
    'memungkinkan version control pada struktur database serta pengisian data awal secara otomatis.'
)
add_numbered_item(doc, '5.',
    '**Routing** — sistem routing yang fleksibel untuk mendefinisikan endpoint URL dan '
    'menghubungkannya dengan controller yang sesuai.'
)
add_numbered_item(doc, '6.',
    '**Middleware** — mekanisme untuk memfilter HTTP request yang masuk, misalnya untuk '
    'autentikasi, otorisasi, atau CSRF protection.'
)

add_formatted_paragraph(doc,
    'Dari sisi keamanan, Laravel menyediakan proteksi bawaan terhadap beberapa jenis serangan '
    'siber umum, meliputi: **CSRF** (*Cross-Site Request Forgery*) melalui token otomatis pada '
    'setiap form, **SQL Injection** melalui parameterized query pada Eloquent dan Query Builder, '
    'serta **XSS** (*Cross-Site Scripting*) melalui escape otomatis pada output Blade '
    '(Otwell, 2024). Pada project ini digunakan Laravel versi 12, yang merupakan versi terbaru '
    'dengan dukungan PHP 8.2+.'
)

add_reference_block(doc, [
    '> Otwell, T. (2024). *Laravel — The PHP Framework for Web Artisans*.',
    '> https://laravel.com/docs',
    '>',
    '> Stauffer, M. (2024). *Laravel: Up & Running* (3rd ed.). O\'Reilly Media.',
    '> ISBN: 978-1098153267',
    '> https://www.oreilly.com/library/view/laravel-up/9781098153250/',
])

# === 2.7 TAILWIND CSS ===
doc.add_heading('2.7 Tailwind CSS', level=2)

add_formatted_paragraph(doc,
    'Tailwind CSS adalah framework CSS yang menganut pendekatan **utility-first**, di mana '
    'pengembang menyusun tampilan antarmuka menggunakan kelas-kelas utilitas (*utility classes*) '
    'yang telah didefinisikan langsung di dalam elemen HTML, tanpa perlu menulis file CSS kustom '
    'terpisah. Tailwind CSS diciptakan oleh Adam Wathan dan dirilis pertama kali pada tahun 2017 '
    'sebagai alternatif dari framework CSS berbasis komponen seperti Bootstrap (Wathan, 2024).'
)

add_formatted_paragraph(doc,
    'Pada pendekatan utility-first, setiap kelas CSS hanya memiliki satu tanggung jawab '
    'spesifik. Misalnya, kelas text-center mengatur perataan teks ke tengah, bg-blue-500 '
    'mengatur warna latar belakang, dan p-4 mengatur padding sebesar 1rem. Dengan menggabungkan '
    'kelas-kelas utilitas ini langsung di elemen HTML, pengembang dapat membangun tampilan yang '
    'kompleks tanpa meninggalkan file HTML — berbeda dengan pendekatan tradisional yang '
    'mengharuskan pengembang berpindah-pindah antara file HTML dan CSS.'
)

add_formatted_paragraph(doc,
    'Keunggulan utama Tailwind CSS meliputi beberapa aspek. Pertama, **konsistensi desain** '
    'melalui *design token* (skala warna, spacing, tipografi) yang telah dikonfigurasi secara '
    'sistematis. Kedua, **responsivitas bawaan** melalui *responsive prefix* (sm:, md:, lg:, '
    'xl:) yang memudahkan pembuatan tampilan responsif tanpa media query manual. Ketiga, '
    '**ukuran file CSS yang sangat kecil** pada mode production melalui proses *tree-shaking* '
    '(atau *purge*) yang secara otomatis menghapus semua kelas yang tidak digunakan. Keempat, '
    '**kustomisasi mudah** melalui file konfigurasi tailwind.config.js yang memungkinkan '
    'penyesuaian tema, warna, font, dan spacing sesuai kebutuhan desain.'
)

add_reference_block(doc, [
    '> Wathan, A. (2024). *Tailwind CSS Documentation*.',
    '> https://tailwindcss.com/docs',
])

# === 2.8 ALPINE.JS ===
doc.add_heading('2.8 Alpine.js', level=2)

add_formatted_paragraph(doc,
    'Alpine.js adalah framework JavaScript ringan dengan ukuran hanya ~17 KB yang menyediakan '
    'fungsionalitas reaktif langsung di dalam markup HTML. Alpine.js diciptakan oleh Caleb '
    'Porzio dan dirilis pertama kali pada tahun 2020 sebagai alternatif ringan dari framework '
    'JavaScript berskala besar seperti React, Vue, atau Angular. Alpine.js sering dijuluki '
    'sebagai "Tailwind for JavaScript" karena filosofi pendekatannya yang serupa — memberikan '
    'fungsionalitas melalui atribut deklaratif langsung di HTML (Mead, 2024).'
)

add_formatted_paragraph(doc,
    'Alpine.js bekerja menggunakan atribut HTML khusus yang disebut *directives*, antara lain:'
)

add_numbered_item(doc, '1.',
    '**x-data** — mendeklarasikan state (data) reaktif pada sebuah elemen HTML beserta seluruh '
    'elemen turunannya.'
)
add_numbered_item(doc, '2.',
    '**x-show** dan **x-if** — mengontrol visibilitas elemen berdasarkan kondisi tertentu.'
)
add_numbered_item(doc, '3.',
    '**x-on** (atau @) — menangani event seperti klik, hover, input, dan submit.'
)
add_numbered_item(doc, '4.',
    '**x-bind** (atau :) — mengikat (*bind*) atribut HTML ke ekspresi JavaScript secara reaktif.'
)
add_numbered_item(doc, '5.',
    '**x-model** — menghubungkan input form dengan state secara dua arah (*two-way binding*).'
)
add_numbered_item(doc, '6.',
    '**x-for** — melakukan iterasi untuk merender daftar elemen secara dinamis.'
)
add_numbered_item(doc, '7.',
    '**x-transition** — menambahkan animasi transisi saat elemen muncul atau menghilang.'
)

add_formatted_paragraph(doc,
    'Alpine.js sangat cocok digunakan bersama framework backend seperti Laravel karena tidak '
    'memerlukan proses build terpisah, tidak membutuhkan virtual DOM, dan dapat langsung '
    'diintegrasikan ke dalam template Blade. Pada project ini, Alpine.js digunakan untuk '
    'menangani interaktivitas pada sisi klien seperti toggle navigasi mobile, filter pencarian '
    'produk secara real-time, accordion FAQ, dan komponen modal.'
)

add_reference_block(doc, [
    '> Mead, C. (2024). *Alpine.js — Your New, Lightweight JavaScript Framework*.',
    '> https://alpinejs.dev',
])

# === 2.9 SEO ===
doc.add_heading('2.9 Search Engine Optimization (SEO)', level=2)

add_formatted_paragraph(doc,
    'Search Engine Optimization (SEO) adalah serangkaian teknik dan strategi yang bertujuan '
    'untuk meningkatkan visibilitas dan peringkat sebuah website di halaman hasil pencarian '
    'mesin pencari (*Search Engine Results Page*/SERP), khususnya Google. SEO yang baik '
    'memungkinkan website ditemukan oleh pengguna yang secara aktif mencari informasi, produk, '
    'atau layanan yang relevan — tanpa harus membayar iklan (*organic search*). Menurut Google '
    '(2024), SEO merupakan standar dasar yang harus diterapkan dalam setiap pengembangan website '
    'agar konten dapat diindeks dan diperingkat secara optimal oleh mesin pencari.'
)

add_formatted_paragraph(doc,
    'Teknik SEO secara umum dibagi menjadi dua kategori utama. **SEO on-page** mencakup optimasi '
    'yang dilakukan di dalam website itu sendiri, meliputi:'
)

add_numbered_item(doc, '1.',
    '**Meta tags** — title tag dan meta description yang deskriptif dan relevan untuk setiap halaman.'
)
add_numbered_item(doc, '2.',
    '**Heading hierarchy** — penggunaan heading HTML (H1 hingga H6) secara terstruktur dengan satu H1 per halaman.'
)
add_numbered_item(doc, '3.',
    '**Sitemap XML** — file yang memberi tahu mesin pencari daftar seluruh halaman yang tersedia untuk diindeks.'
)
add_numbered_item(doc, '4.',
    '**Robots.txt** — file yang mengontrol halaman mana yang boleh atau tidak boleh di-crawl oleh bot mesin pencari.'
)
add_numbered_item(doc, '5.',
    '**Canonical URL** — tag yang menunjukkan versi utama suatu halaman untuk menghindari duplikasi konten.'
)
add_numbered_item(doc, '6.',
    '**Open Graph & Twitter Cards** — meta tags khusus yang mengontrol tampilan pratinjau saat tautan dibagikan ke media sosial (Facebook, Twitter, WhatsApp).'
)
add_numbered_item(doc, '7.',
    '**Semantic HTML** — penggunaan elemen HTML5 semantik (article, nav, section, main) untuk membantu mesin pencari memahami struktur konten.'
)

add_formatted_paragraph(doc,
    'Sedangkan **SEO off-page** mencakup optimasi di luar website seperti backlink, social '
    'signals, dan brand mentions. Selain itu, terdapat protokol modern seperti **IndexNow** yang '
    'memungkinkan website mengirimkan notifikasi secara instan kepada mesin pencari saat ada '
    'konten baru dipublikasikan, sehingga proses indeksasi menjadi lebih cepat tanpa harus '
    'menunggu jadwal crawl rutin (Google, 2024).'
)

add_reference_block(doc, [
    '> Google. (2024). *Google Search Central — SEO Starter Guide*.',
    '> https://developers.google.com/search/docs/fundamentals/seo-starter-guide',
])

# === 2.10 PENGUJIAN BLACK-BOX ===
doc.add_heading('2.10 Pengujian Black-Box', level=2)

add_formatted_paragraph(doc,
    'Pengujian black-box (*black-box testing*) adalah metode pengujian perangkat lunak yang '
    'memvalidasi fungsionalitas sistem berdasarkan spesifikasi kebutuhan (*requirement '
    'specification*), tanpa mengetahui atau memperhatikan struktur internal kode program. '
    'Penguji memperlakukan sistem sebagai "kotak hitam" — hanya memberikan input dan '
    'memverifikasi apakah output yang dihasilkan sesuai dengan hasil yang diharapkan. Metode '
    'ini berfokus pada **apa yang dilakukan** sistem, bukan **bagaimana** sistem melakukannya '
    'secara internal (Pressman & Maxim, 2020).'
)

add_formatted_paragraph(doc,
    'Terdapat beberapa teknik pengujian black-box yang umum digunakan:'
)

add_numbered_item(doc, '1.',
    '**Equivalence Partitioning** — membagi domain input menjadi beberapa partisi (kelas '
    'ekuivalensi) yang masing-masing mewakili sekelompok data input dengan perilaku yang sama. '
    'Pengujian cukup dilakukan dengan satu data dari setiap partisi, sehingga mengurangi jumlah '
    'kasus uji tanpa mengurangi cakupan pengujian.'
)
add_numbered_item(doc, '2.',
    '**Boundary Value Analysis (BVA)** — menguji nilai-nilai pada batas (*boundary*) dari '
    'setiap partisi input, karena kesalahan perangkat lunak cenderung lebih sering terjadi pada '
    'batas-batas nilai. Misalnya, jika input yang valid adalah 1–100, maka BVA akan menguji '
    'nilai 0, 1, 100, dan 101.'
)
add_numbered_item(doc, '3.',
    '**Decision Table Testing** — menggunakan tabel keputusan untuk menguji kombinasi kondisi '
    'input dan aksi yang dihasilkan, terutama berguna untuk menguji logika bisnis yang kompleks.'
)
add_numbered_item(doc, '4.',
    '**State Transition Testing** — menguji perilaku sistem berdasarkan perubahan state '
    '(keadaan) yang dipicu oleh event tertentu. Teknik ini cocok untuk menguji alur kerja '
    '(*workflow*) seperti proses login, proses pemesanan, atau perubahan status pesan.'
)

add_formatted_paragraph(doc,
    'Keunggulan pengujian black-box adalah dapat dilakukan oleh penguji yang tidak memiliki '
    'pengetahuan teknis tentang bahasa pemrograman atau arsitektur internal sistem. Pengujian '
    'ini juga mewakili perspektif pengguna akhir (*end-user*), sehingga efektif untuk '
    'memastikan bahwa seluruh fitur berfungsi sesuai spesifikasi dari sudut pandang pengguna. '
    'Pada project ini, pengujian black-box diterapkan untuk memvalidasi seluruh fitur CRUD '
    '(Create, Read, Update, Delete) pada modul produk, artikel, dan pesan pelanggan, serta '
    'menguji alur autentikasi admin (Pressman & Maxim, 2020).'
)

add_reference_block(doc, [
    '> Pressman, R. S., & Maxim, B. R. (2020). *Software Engineering: A Practitioner\'s Approach* (9th ed.). McGraw-Hill Education.',
    '> ISBN: 978-1260548006',
    '> https://www.mheducation.com/highered/product/software-engineering-practitioner-s-approach-pressman-maxim/M9781259872976.html',
])

# === DAFTAR REFERENSI TABLE ===
doc.add_heading('Daftar Referensi', level=2)

p_note = doc.add_paragraph(style='Normal')
p_note.paragraph_format.first_line_indent = Cm(0)
run = p_note.add_run('Ringkasan referensi untuk import ke Zotero:')
run.font.name = 'Times New Roman'
run.font.size = Pt(12)

ref_headers = ['No', 'Referensi', 'Tipe', 'Identifier']
ref_rows = [
    ['1', 'Laudon & Laudon (2020) — Management Information Systems (16th ed.)', 'Buku', 'ISBN: 978-0135191798'],
    ['2', 'Keller (2013) — Strategic Brand Management (4th ed.)', 'Buku', 'ISBN: 978-0132664257'],
    ['3', 'Chaffey & Ellis-Chadwick (2019) — Digital Business and E-Commerce Management (7th ed.)', 'Buku', 'ISBN: 978-1292193335'],
    ['4', 'Verhoef, Kannan, & Inman (2015) — From Multi-Channel to Omni-Channel Retailing', 'Jurnal', 'DOI: 10.1016/j.jretai.2015.02.005'],
    ['5', 'Laudon & Traver (2021) — E-Commerce 2021 (17th ed.)', 'Buku', 'ISBN: 978-0136929192'],
    ['6', 'Fowler (2002) — Patterns of Enterprise Application Architecture', 'Buku', 'ISBN: 978-0321127426'],
    ['7', 'The PHP Group (2024) — PHP Documentation', 'Web', 'https://www.php.net/docs.php'],
    ['8', 'W3Techs (2024) — Usage Statistics of Server-side Programming Languages', 'Web', 'https://w3techs.com'],
    ['9', 'Otwell (2024) — Laravel Documentation', 'Web', 'https://laravel.com/docs'],
    ['10', 'Stauffer (2024) — Laravel: Up & Running (3rd ed.)', 'Buku', 'ISBN: 978-1098153267'],
    ['11', 'Wathan (2024) — Tailwind CSS Documentation', 'Web', 'https://tailwindcss.com/docs'],
    ['12', 'Mead (2024) — Alpine.js Documentation', 'Web', 'https://alpinejs.dev'],
    ['13', 'Google (2024) — SEO Starter Guide', 'Web', 'https://developers.google.com/search/docs'],
    ['14', 'Pressman & Maxim (2020) — Software Engineering (9th ed.)', 'Buku', 'ISBN: 978-1260548006'],
]

add_table(doc, ref_headers, ref_rows)

# === SAVE ===
output_path = r'd:\laragon\www\ryoki-skincare\docs\BAB-2-Tinjauan-Pustaka.docx'
doc.save(output_path)
print(f'File Word berhasil dibuat: {output_path}')
