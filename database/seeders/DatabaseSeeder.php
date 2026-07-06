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
        // Admin User
        User::updateOrCreate(
            ['email' => 'admin@ryokiskincare.co.id'],
            [
                'name' => 'Administrator Ryoki',
                'password' => Hash::make('passwordadmin123'),
            ]
        );

        // Products
        $products = [
            [
                'name' => 'Ryoki Gentle Glow Facial Wash',
                'slug' => 'ryoki-gentle-glow-facial-wash',
                'description' => 'Pembersih wajah dengan pH seimbang yang membersihkan kotoran tanpa membuat kulit terasa tertarik. Diformulasikan khusus untuk kulit sensitif dan berjerawat.',
                'usage' => 'Basahi wajah, tuangkan secukupnya ke telapak tangan. Pijat lembut ke seluruh wajah lalu bilas hingga bersih.',
                'ingredients' => 'Aqua, Glycerin, Niacinamide, Centella Asiatica Extract, Ceramide NP.',
                'price' => 75000,
                'category' => 'Facial Wash',
                'image' => null,
                'in_stock' => true,
                'is_best_seller' => true,
            ],
            [
                'name' => 'Ryoki Luminous Niacinamide Serum',
                'slug' => 'ryoki-luminous-niacinamide-serum',
                'description' => 'Serum pencerah dengan Niacinamide 10% dan ekstrak Licorice untuk meratakan warna kulit dan menyamarkan noda hitam.',
                'usage' => 'Gunakan 2-3 tetes pada wajah yang bersih. Tepuk perlahan hingga meresap. Gunakan pagi dan malam hari.',
                'ingredients' => 'Aqua, Niacinamide, Butylene Glycol, Licorice Root Extract, Sodium Hyaluronate.',
                'price' => 129000,
                'category' => 'Serum',
                'image' => null,
                'in_stock' => true,
                'is_best_seller' => true,
            ],
            [
                'name' => 'Ryoki Barrier Restore Ceramide Moisturizer',
                'slug' => 'ryoki-barrier-restore-ceramide-moisturizer',
                'description' => 'Pelembap ringan dengan 5 jenis Ceramide untuk mengunci kelembapan, memperbaiki skin barrier, dan menenangkan kulit kemerahan.',
                'usage' => 'Oleskan secukupnya pada wajah dan leher setelah menggunakan serum.',
                'ingredients' => 'Aqua, Ceramide NP, Ceramide AP, Ceramide EOP, Hyaluronic Acid, Panthenol.',
                'price' => 145000,
                'category' => 'Moisturizer',
                'image' => null,
                'in_stock' => true,
                'is_best_seller' => false,
            ],
            [
                'name' => 'Ryoki Aqua Shield Sunscreen SPF 50 PA++++',
                'slug' => 'ryoki-aqua-shield-sunscreen',
                'description' => 'Tabir surya bertekstur air yang ringan, tidak whitecast, dan memberikan perlindungan maksimal dari sinar UV A dan UV B.',
                'usage' => 'Aplikasikan sebanyak dua ruas jari pada wajah dan leher 15 menit sebelum terpapar sinar matahari. Reapply setiap 3-4 jam.',
                'ingredients' => 'Aqua, Ethylhexyl Methoxycinnamate, Zinc Oxide, Titanium Dioxide, Aloe Barbadensis Leaf Water.',
                'price' => 95000,
                'category' => 'Sunscreen',
                'image' => null,
                'in_stock' => true,
                'is_best_seller' => true,
            ],
            [
                'name' => 'Ryoki Acne Spot Treatment Gel',
                'slug' => 'ryoki-acne-spot-treatment-gel',
                'description' => 'Gel perawatan jerawat dengan Salicylic Acid dan Tea Tree Oil yang efektif meredakan jerawat meradang dalam 24 jam.',
                'usage' => 'Totolkan pada area jerawat di malam hari sebagai langkah terakhir skincare.',
                'ingredients' => 'Aqua, Salicylic Acid, Melaleuca Alternifolia (Tea Tree) Leaf Oil, Centella Asiatica.',
                'price' => 65000,
                'category' => 'Acne Care',
                'image' => null,
                'in_stock' => true,
                'is_best_seller' => false,
            ],
            [
                'name' => 'Ryoki Hydrating Essence Toner',
                'slug' => 'ryoki-hydrating-essence-toner',
                'description' => 'Toner sekaligus essence yang menghidrasi kulit secara mendalam dan mempersiapkan kulit untuk menerima produk skincare selanjutnya.',
                'usage' => 'Tuangkan ke kapas atau telapak tangan, aplikasikan pada wajah yang bersih.',
                'ingredients' => 'Aqua, Glycerin, Sodium Hyaluronate, Rose Extract, Panthenol.',
                'price' => 89000,
                'category' => 'Toner',
                'image' => null,
                'in_stock' => true,
                'is_best_seller' => false,
            ],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }

        // Articles
        $articles = [
            [
                'title' => 'Cara Mengetahui Jenis Kulitmu Agar Tidak Salah Pilih Skincare',
                'slug' => 'cara-mengetahui-jenis-kulit',
                'content' => 'Pernahkah kamu merasa skincare yang kamu gunakan tidak memberikan hasil yang maksimal, atau bahkan menimbulkan masalah baru pada kulitmu? Salah satu alasan utamanya mungkin karena kamu belum menggunakan produk yang sesuai dengan jenis kulitmu. Mari kenali jenis kulitmu dengan cara mudah berikut.',
                'thumbnail' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Pentingnya Skin Barrier dan Cara Merawatnya',
                'slug' => 'pentingnya-skin-barrier',
                'content' => 'Skin barrier adalah lapisan terluar kulit yang berfungsi melindungi tubuh dari faktor eksternal berbahaya. Jika skin barrier rusak, kulit menjadi lebih rentan terhadap iritasi, kemerahan, dan jerawat. Ryoki Barrier Restore Ceramide Moisturizer bisa jadi solusi andalanmu!',
                'thumbnail' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Rangkaian Skincare Pagi yang Tepat untuk Pemula',
                'slug' => 'rangkaian-skincare-pagi-pemula',
                'content' => 'Memulai rutinitas skincare tak perlu rumit. Untuk pemula, cukup terapkan basic skincare yang terdiri dari Cleansing, Moisturizing, dan Protecting (Sunscreen).',
                'thumbnail' => null,
                'is_published' => true,
            ]
        ];

        foreach ($articles as $article) {
            \App\Models\Article::create($article);
        }
    }
}
