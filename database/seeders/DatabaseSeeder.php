<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin Users
        User::updateOrCreate(
            ['email' => 'ryokijapanskincaree@gmail.com'],
            [
                'name' => 'Administrator Ryoki',
                'password' => Hash::make('skincareryoki_10'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@ryokiskincare.com'],
            [
                'name' => 'Admin Ryoki',
                'password' => Hash::make('password'),
            ]
        );

        // Products (with full Shopee + TikTok combined sales data)
        $this->call(ProductSeeder::class);

        // ═══════════════════════════════════════════════════════════════
        // SKINPEDIA ARTICLES — SEO-Optimized Long-Form Content
        // These articles contain internal links to Ryoki products,
        // rich HTML formatting, and keyword-rich content designed to
        // rank on Google for skincare-related search queries.
        // ═══════════════════════════════════════════════════════════════

        // Clean up any old placeholder articles first
        \App\Models\Article::whereIn('slug', [
            'cara-mengetahui-jenis-kulit',
            'pentingnya-skin-barrier',
            'rangkaian-skincare-pagi-pemula',
        ])->delete();

        $articles = [
            // ─── ARTICLE 1: Panduan Lengkap Urutan Skincare ─────────────
            [
                'title' => 'Panduan Lengkap Urutan Skincare Pagi & Malam untuk Kulit Glowing, Cerah, dan Sehat Alami',
                'slug' => 'panduan-lengkap-urutan-skincare-pagi-malam-untuk-kulit-glowing-cerah-dan-sehat-alami',
                'content' => '<h2>Mengapa Urutan Skincare Sangat Penting untuk Kesehatan Kulit?</h2>
<p>Memiliki kulit wajah yang bersih, cerah, dan <strong>glowing alami</strong> adalah impian setiap orang — baik pria maupun wanita. Namun, seringkali pemula merasa bingung dengan banyaknya produk skincare yang beredar di pasaran. Kunci utama keberhasilan perawatan kulit bukanlah pada seberapa mahal produk yang digunakan, melainkan pada <strong>konsistensi dan urutan pemakaian skincare yang benar</strong>.</p>
<p>Menggunakan skincare dengan urutan yang salah tidak hanya mengurangi efektivitas produk, tetapi juga dapat menyebabkan <em>breakout</em>, iritasi, dan bahkan memperburuk kondisi kulit. Artikel ini akan membahas secara lengkap urutan skincare yang benar untuk pagi dan malam hari, beserta rekomendasi produk terbaik dari <strong>Ryoki Japan Skincare</strong>.</p>

<h2>Urutan Skincare Pagi Hari (AM Routine)</h2>

<h3>Step 1: Cleanser — Membersihkan Wajah dari Minyak & Kotoran</h3>
<p>Langkah pertama dan paling krusial dalam rutinitas skincare pagi adalah <strong>membersihkan wajah</strong>. Selama tidur, kulit tetap memproduksi sebum dan keringat yang bercampur dengan debu di bantal. Gunakan pembersih wajah yang lembut namun efektif.</p>
<p>Rekomendasi: <strong><a href="/products/ryoki-gentle-glow-facial-wash">Ryoki Gentle Glow Facial Wash</a></strong> — diformulasikan dengan <em>Fish Collagen</em> dari Jepang, <em>Niacinamide</em>, dan <em>Alpha Arbutin</em> yang membersihkan wajah secara mendalam sekaligus mencerahkan kulit tanpa membuat kering atau tertarik.</p>

<h3>Step 2: Toner — Menyeimbangkan pH Kulit</h3>
<p>Setelah mencuci muka, pH kulit biasanya naik menjadi basa. Toner berfungsi mengembalikan keseimbangan pH alami kulit (sekitar 5.5) dan mempersiapkan kulit untuk menyerap nutrisi dari produk selanjutnya secara maksimal.</p>
<p>Rekomendasi: <strong><a href="/products/ryoki-face-toner">Ryoki Face Toner</a></strong> — mengandung <em>Fish Collagen</em>, <em>Alpha Arbutin</em>, <em>Niacinamide</em>, dan <em>Aloe Barbadensis Extract</em> yang menghidrasi sekaligus menyegarkan kulit.</p>

<h3>Step 3: Serum — Menutrisi dengan Bahan Aktif Konsentrat Tinggi</h3>
<p>Serum adalah produk dengan konsentrasi bahan aktif paling tinggi dalam rangkaian skincare. Produk ini dirancang untuk mengatasi masalah kulit spesifik seperti <strong>flek hitam, bekas jerawat, pori-pori besar, dan kulit kusam</strong>.</p>
<p>Rekomendasi: <strong><a href="/products/ryoki-gold-whitening-serum">Ryoki Gold Whitening Serum</a></strong> — dengan <em>Niacinamide 10%</em> dan <em>Licorice Root Extract</em> yang terbukti mencerahkan kulit dan menyamarkan noda hitam membandel dalam 2-4 minggu pemakaian rutin.</p>

<h3>Step 4: Moisturizer Pagi — Mengunci Kelembapan & Proteksi UV</h3>
<p>Pelembap pagi harus ringan, tidak lengket, dan idealnya mengandung perlindungan dari sinar UV. Pelembap berfungsi sebagai <em>sealant</em> — mengunci semua nutrisi dari serum dan toner agar tidak menguap.</p>
<p>Rekomendasi: <strong><a href="/products/ryoki-day-cream">Ryoki Day Cream</a></strong> — dilengkapi <em>Niacinamide</em>, <em>UV Protection</em>, <em>Hyaluronic Acid</em>, dan <em>Collagen Extract</em> yang melindungi kulit dari paparan sinar matahari sekaligus menjaga kelembapan sepanjang hari.</p>

<h2>Urutan Skincare Malam Hari (PM Routine)</h2>

<h3>Step 1-3: Cleanser → Toner → Serum (Sama dengan Pagi)</h3>
<p>Tiga langkah pertama di malam hari sama dengan rutinitas pagi. Pastikan membersihkan wajah dari sisa makeup, sunscreen, dan polusi yang menempel sepanjang hari. Di malam hari, kulit memasuki fase regenerasi alami sehingga nutrisi dari serum akan bekerja lebih optimal.</p>

<h3>Step 4: Night Cream — Regenerasi Intensif Selama Tidur</h3>
<p>Krim malam biasanya mengandung konsentrasi bahan aktif lebih tinggi dibanding krim pagi karena kulit melakukan proses perbaikan sel (cell turnover) paling aktif antara pukul 22.00-02.00.</p>
<p>Rekomendasi: <strong><a href="/products/ryoki-night-cream">Ryoki Night Cream</a></strong> — dengan <em>Alpha Arbutin 2%</em> dan <em>Hydrolyzed Collagen</em> yang bekerja intensif selama tidur untuk memudarkan hiperpigmentasi, flek hitam, dan mengembalikan kecerahan alami kulit.</p>

<h2>Perawatan Tambahan Mingguan</h2>

<h3>Exfoliation: Mengangkat Sel Kulit Mati</h3>
<p>Lakukan eksfoliasi 2-3 kali seminggu untuk mengangkat tumpukan sel kulit mati yang membuat wajah tampak kusam dan bertekstur kasar. Eksfoliasi rutin juga membantu produk skincare lainnya meresap lebih baik.</p>
<p>Rekomendasi: <strong><a href="/products/ryoki-brightening-peeling-spray">Ryoki Brightening Peeling Spray</a></strong> — cukup semprotkan pada kulit kering, pijat lembut, dan lihat sel kulit mati terangkat secara instan tanpa perlu digosok kasar. Mengandung <em>Aloe Vera</em> dan <em>Grape Seed Extract</em> untuk menenangkan kulit setelah eksfoliasi.</p>

<h2>Tips Tambahan untuk Hasil Maksimal</h2>
<ul>
<li><strong>Konsistensi adalah kunci</strong> — Gunakan skincare secara rutin minimal 28 hari (1 siklus regenerasi kulit) sebelum menilai hasilnya.</li>
<li><strong>Jangan lupa area tubuh</strong> — Kulit tubuh juga membutuhkan perawatan. Gunakan <strong><a href="/products/ryoki-hand-body">Ryoki Hand & Body Lotion</a></strong> setelah mandi untuk menjaga kelembapan kulit tangan dan tubuh.</li>
<li><strong>Minum air putih minimal 2 liter/hari</strong> — Hidrasi dari dalam sama pentingnya dengan hidrasi dari luar.</li>
<li><strong>Tidur cukup 7-8 jam</strong> — Kurang tidur memicu produksi kortisol yang menyebabkan jerawat dan penuaan dini.</li>
<li><strong>Ganti sarung bantal 1x seminggu</strong> — Bakteri dan minyak di sarung bantal bisa menyebabkan breakout.</li>
</ul>',
                'thumbnail' => 'images/ryoki-japan.png',
                'is_published' => true,
            ],

            // ─── ARTICLE 2: Bahan Aktif Skincare Terbaik ────────────────
            [
                'title' => '7 Bahan Aktif Skincare Terbaik untuk Mencerahkan Kulit, Menghilangkan Flek Hitam & Bekas Jerawat',
                'slug' => '7-bahan-aktif-skincare-terbaik-untuk-mencerahkan-kulit-menghilangkan-flek-hitam-bekas-jerawat',
                'content' => '<h2>Kenapa Penting Memahami Kandungan Aktif dalam Skincare?</h2>
<p>Di era informasi seperti sekarang, membeli skincare tidak bisa lagi asal pilih berdasarkan kemasan cantik atau iklan yang menarik. <strong>Memahami kandungan aktif (active ingredients)</strong> dalam produk skincare adalah langkah cerdas untuk mendapatkan hasil maksimal tanpa merusak skin barrier.</p>
<p>Setiap bahan aktif memiliki fungsi spesifik — ada yang fokus mencerahkan, melembapkan, anti-aging, atau mengontrol minyak. Dengan memahami bahan-bahan ini, Anda bisa memilih produk yang tepat sesuai kebutuhan kulit Anda.</p>

<h2>7 Bahan Aktif Terbaik yang Wajib Ada di Skincare Anda</h2>

<h3>1. Niacinamide (Vitamin B3) — Si Multitasker Serba Bisa</h3>
<p><strong>Niacinamide</strong> adalah salah satu bahan aktif paling populer dan serba guna dalam dunia skincare. Bahan ini terbukti secara klinis mampu:</p>
<ul>
<li>Mengontrol produksi sebum (minyak berlebih) hingga 40%</li>
<li>Menyamarkan noda hitam dan bekas jerawat (post-inflammatory hyperpigmentation)</li>
<li>Mengecilkan tampilan pori-pori yang membesar</li>
<li>Meredakan peradangan dan kemerahan akibat jerawat</li>
<li>Meningkatkan produksi ceramide untuk memperkuat skin barrier</li>
</ul>
<p>Temukan Niacinamide konsentrasi tinggi pada <strong><a href="/products/ryoki-gold-whitening-serum">Ryoki Gold Whitening Serum</a></strong> dan <strong><a href="/products/ryoki-gentle-glow-facial-wash">Ryoki Gentle Glow Facial Wash</a></strong>.</p>

<h3>2. Alpha Arbutin — Pencerah Alami Tanpa Iritasi</h3>
<p><strong>Alpha Arbutin</strong> adalah derivatif alami dari tanaman Bearberry yang terbukti sangat efektif menghambat enzim tyrosinase — enzim yang bertanggung jawab atas pembentukan melanin penyebab flek hitam dan kulit kusam.</p>
<p>Keunggulan Alpha Arbutin dibanding bahan pencerah lainnya (seperti Hydroquinone) adalah sifatnya yang <strong>lebih gentle dan aman untuk semua jenis kulit</strong>, termasuk kulit sensitif, tanpa risiko iritasi atau penipisan kulit.</p>
<p>Hadir pada <strong><a href="/products/ryoki-night-cream">Ryoki Night Cream</a></strong> dan <strong><a href="/products/ryoki-face-toner">Ryoki Face Toner</a></strong> untuk pencerahkan intensif.</p>

<h3>3. Fish Collagen (Kolagen Ikan) — Rahasia Kulit Kenyal Ala Jepang</h3>
<p><strong>Fish Collagen</strong> dari Jepang memiliki struktur molekul yang lebih kecil dibanding collagen hewani biasa, sehingga lebih mudah meresap ke lapisan dalam kulit (dermis). Manfaatnya:</p>
<ul>
<li>Meningkatkan elastisitas dan kekenyalan kulit</li>
<li>Mengurangi tampilan garis halus dan kerutan (anti-aging)</li>
<li>Mempercepat proses penyembuhan luka dan bekas jerawat</li>
<li>Menjaga kelembapan kulit secara alami</li>
</ul>
<p>Fish Collagen premium dari Jepang menjadi bahan utama dalam <strong><a href="/products/ryoki-gentle-glow-facial-wash">Ryoki Gentle Glow Facial Wash</a></strong> — membersihkan sekaligus menutrisi kulit dalam satu langkah.</p>

<h3>4. Hyaluronic Acid — Magnet Kelembapan Super</h3>
<p><strong>Hyaluronic Acid (HA)</strong> adalah humektan alami yang mampu menahan air hingga <strong>1000x berat molekulnya</strong>. Bayangkan — 1 gram HA bisa menahan hingga 6 liter air! Inilah mengapa HA menjadi bahan wajib dalam setiap rangkaian skincare untuk kulit dehidrasi.</p>
<p>Ditemukan pada <strong><a href="/products/ryoki-day-cream">Ryoki Day Cream</a></strong> yang menjaga kulit tetap terhidrasi sepanjang hari di bawah terik matahari.</p>

<h3>5. Centella Asiatica (Cica) — Penenang Kulit Sensitif</h3>
<p><strong>Centella Asiatica</strong> atau yang dikenal sebagai Cica/Pegagan telah digunakan selama berabad-abad dalam pengobatan tradisional Asia. Bahan ini kaya akan <em>madecassoside</em> dan <em>asiaticoside</em> yang terbukti:</p>
<ul>
<li>Menenangkan kulit yang sedang iritasi atau meradang</li>
<li>Mempercepat penyembuhan jerawat dan luka</li>
<li>Mengurangi kemerahan (redness) pada kulit sensitif</li>
<li>Merangsang produksi kolagen alami untuk regenerasi kulit</li>
</ul>
<p>Diformulasikan dalam <strong><a href="/products/ryoki-gentle-glow-facial-wash">Ryoki Gentle Glow Facial Wash</a></strong> untuk membersihkan wajah tanpa memicu iritasi.</p>

<h3>6. Ceramide — Fondasi Utama Skin Barrier yang Sehat</h3>
<p><strong>Ceramide</strong> adalah komponen lipid alami yang menyusun sekitar 50% lapisan terluar kulit (stratum corneum). Tanpa ceramide yang cukup, skin barrier melemah dan kulit menjadi rentan terhadap:</p>
<ul>
<li>Dehidrasi dan kulit kering bersisik</li>
<li>Iritasi dari polusi dan bahan kimia</li>
<li>Infeksi bakteri penyebab jerawat</li>
<li>Penuaan dini akibat kerusakan UV</li>
</ul>
<p>Produk Ryoki mengandung kompleks ceramide untuk memperkuat pertahanan alami kulit Anda dari dalam.</p>

<h3>7. Aloe Vera & Grape Seed Extract — Duo Antioksidan Pelindung</h3>
<p><strong>Aloe Vera</strong> terkenal dengan efek mendinginkan dan menenangkan, sementara <strong>Grape Seed Extract</strong> kaya akan antioksidan proanthocyanidin yang 20x lebih kuat dari Vitamin C dalam melawan radikal bebas.</p>
<p>Kombinasi keduanya hadir dalam <strong><a href="/products/ryoki-brightening-peeling-spray">Ryoki Brightening Peeling Spray</a></strong> — mengangkat sel kulit mati sekaligus melindungi kulit dari kerusakan oksidatif.</p>

<h2>Cara Mengombinasikan Bahan Aktif dengan Benar</h2>
<p><strong>Aturan emas:</strong> Gunakan produk berbasis air terlebih dahulu (toner, serum), baru kemudian produk berbasis krim/minyak (moisturizer, night cream). Urutan dari tekstur paling encer ke paling kental memastikan setiap lapisan terserap sempurna.</p>
<p>Dengan rangkaian lengkap dari <strong>Ryoki Japan Skincare</strong>, Anda sudah mendapatkan kombinasi bahan aktif terbaik yang saling melengkapi — dari <a href="/products/ryoki-gentle-glow-facial-wash">Facial Wash</a> → <a href="/products/ryoki-face-toner">Toner</a> → <a href="/products/ryoki-gold-whitening-serum">Serum</a> → <a href="/products/ryoki-day-cream">Day Cream</a>/<a href="/products/ryoki-night-cream">Night Cream</a>.</p>',
                'thumbnail' => 'images/serum.png',
                'is_published' => true,
            ],

            // ─── ARTICLE 3: Penyebab & Solusi Kulit Kusam ──────────────
            [
                'title' => 'Penyebab Kulit Kusam, Berminyak & Berjerawat: Cara Mengatasinya dengan Skincare yang Tepat',
                'slug' => 'penyebab-kulit-kusam-berminyak-berjerawat-cara-mengatasinya-dengan-skincare-yang-tepat',
                'content' => '<h2>Mengapa Kulit Tampak Kusam, Berminyak, dan Mudah Berjerawat?</h2>
<p>Pernahkah Anda merasa sudah menggunakan berbagai macam skincare tapi kulit tetap saja <strong>kusam, berminyak, dan mudah breakout</strong>? Anda tidak sendirian. Menurut data dari <em>Indonesian Dermatology Association</em>, lebih dari 60% wanita Indonesia usia 18-35 tahun mengalami masalah kulit berminyak dan berjerawat.</p>
<p>Sebelum mencari solusinya, penting untuk memahami akar penyebabnya terlebih dahulu.</p>

<h2>5 Penyebab Utama Kulit Kusam & Bermasalah</h2>

<h3>1. Penumpukan Sel Kulit Mati (Dead Skin Cell Buildup)</h3>
<p>Kulit kita secara alami meregenerasi sel baru setiap 28 hari. Namun, proses ini bisa terhambat oleh berbagai faktor seperti usia, polusi, dan kurang tidur. Akibatnya, sel kulit mati menumpuk di permukaan wajah dan menyebabkan kulit tampak <strong>kusam, kasar, dan bertekstur tidak rata</strong>.</p>
<p><strong>Solusi:</strong> Lakukan eksfoliasi rutin 2 kali seminggu dengan <strong><a href="/products/ryoki-brightening-peeling-spray">Ryoki Brightening Peeling Spray</a></strong>. Cukup semprotkan pada kulit kering, pijat melingkar selama 10 detik, dan sel kulit mati terangkat secara instan tanpa perlu scrub kasar yang bisa merusak skin barrier.</p>

<h3>2. Dehidrasi & Kerusakan Skin Barrier</h3>
<p>Banyak orang mengira kulit berminyak = kulit terhidrasi. <strong>Ini salah besar!</strong> Kulit berminyak justru sering kali dehidrasi — kekurangan kadar air di dalam sel kulit. Ketika skin barrier rusak, kulit kehilangan kemampuan menahan air, sehingga memproduksi minyak berlebih sebagai mekanisme kompensasi.</p>
<p><strong>Solusi:</strong> Perbaiki skin barrier dengan pelembap yang mengandung Ceramide dan Hyaluronic Acid. Gunakan <strong><a href="/products/ryoki-day-cream">Ryoki Day Cream</a></strong> di pagi hari untuk mengunci kelembapan dengan UV protection, dan <strong><a href="/products/ryoki-night-cream">Ryoki Night Cream</a></strong> di malam hari untuk regenerasi intensif dengan Alpha Arbutin dan Collagen.</p>

<h3>3. Pembersihan Wajah yang Tidak Tepat</h3>
<p>Menggunakan sabun muka yang terlalu keras (high pH) atau bahkan tidak mencuci muka sama sekali sebelum tidur adalah kesalahan fatal. Sisa makeup, sunscreen, dan polusi yang tidak dibersihkan akan menyumbat pori-pori dan memicu <strong>komedo, jerawat, dan bruntusan</strong>.</p>
<p><strong>Solusi:</strong> Gunakan facial wash ber-pH rendah (seimbang) yang membersihkan efektif tanpa stripping minyak alami kulit. <strong><a href="/products/ryoki-gentle-glow-facial-wash">Ryoki Gentle Glow Facial Wash</a></strong> dengan formula Niacinamide + Fish Collagen membersihkan secara menyeluruh sambil tetap menjaga kelembapan kulit.</p>

<h3>4. Tidak Menggunakan Serum/Treatment</h3>
<p>Banyak pemula yang hanya mencuci muka lalu langsung pakai pelembap — melewatkan step serum. Padahal, <strong>serum adalah produk dengan konsentrasi bahan aktif tertinggi</strong> yang dirancang untuk mengatasi masalah kulit spesifik seperti hiperpigmentasi dan kusam.</p>
<p><strong>Solusi:</strong> Tambahkan <strong><a href="/products/ryoki-gold-whitening-serum">Ryoki Gold Whitening Serum</a></strong> ke rutinitas harian Anda. Dengan Niacinamide 10%, serum ini efektif mencerahkan kulit, menyamarkan flek hitam, dan memperbaiki tekstur kulit dalam 2-4 minggu.</p>

<h3>5. Paparan Sinar UV Tanpa Perlindungan</h3>
<p>Sinar UVA dan UVB adalah penyebab <strong>No. 1 penuaan dini, flek hitam, dan hiperpigmentasi</strong>. Bahkan di dalam ruangan, sinar UV tetap bisa menembus jendela kaca. Tanpa perlindungan UV, semua upaya skincare Anda menjadi sia-sia.</p>
<p><strong>Solusi:</strong> Selalu gunakan pelembap pagi dengan UV protection seperti <strong><a href="/products/ryoki-day-cream">Ryoki Day Cream</a></strong> sebagai langkah terakhir skincare pagi Anda, bahkan di hari mendung sekalipun.</p>

<h2>Rangkaian Lengkap Perawatan Kulit Kusam & Bermasalah</h2>
<p>Berikut adalah <strong>rutinitas skincare ideal</strong> untuk mengatasi kulit kusam, berminyak, dan berjerawat:</p>
<ol>
<li><strong>Pagi:</strong> <a href="/products/ryoki-gentle-glow-facial-wash">Facial Wash</a> → <a href="/products/ryoki-face-toner">Toner</a> → <a href="/products/ryoki-gold-whitening-serum">Serum</a> → <a href="/products/ryoki-day-cream">Day Cream (UV Protection)</a></li>
<li><strong>Malam:</strong> <a href="/products/ryoki-gentle-glow-facial-wash">Facial Wash</a> → <a href="/products/ryoki-face-toner">Toner</a> → <a href="/products/ryoki-gold-whitening-serum">Serum</a> → <a href="/products/ryoki-night-cream">Night Cream</a></li>
<li><strong>2x Seminggu:</strong> Eksfoliasi dengan <a href="/products/ryoki-brightening-peeling-spray">Peeling Spray</a> (sebelum toner)</li>
<li><strong>Setiap Hari:</strong> Rawat kulit tubuh dengan <a href="/products/ryoki-hand-body">Hand & Body Lotion</a></li>
</ol>

<h2>Kapan Harus Mulai Melihat Hasil?</h2>
<p>Dengan penggunaan rutin dan konsisten, Anda akan mulai merasakan perubahan dalam timeline berikut:</p>
<ul>
<li><strong>Minggu 1-2:</strong> Kulit terasa lebih lembap, kenyal, dan segar</li>
<li><strong>Minggu 2-4:</strong> Tekstur kulit membaik, pori-pori tampak lebih halus</li>
<li><strong>Minggu 4-8:</strong> Flek hitam mulai memudar, kulit tampak lebih cerah dan merata</li>
<li><strong>Minggu 8-12:</strong> Kulit glowing alami, skin barrier kuat, jarang breakout</li>
</ul>
<p><strong>Ingat:</strong> Tidak ada skincare yang memberikan hasil instan dalam semalam. Kulit butuh waktu minimal 1 siklus regenerasi (28 hari) untuk menunjukkan perubahan yang signifikan. Yang terpenting adalah <em>konsistensi</em> dan menggunakan produk yang tepat dari brand terpercaya seperti <strong>Ryoki Japan Skincare</strong>.</p>',
                'thumbnail' => 'images/peeling-spray.png',
                'is_published' => true,
            ],
        ];

        foreach ($articles as $article) {
            \App\Models\Article::updateOrCreate(
                ['slug' => $article['slug']],
                $article
            );
        }
    }
}
