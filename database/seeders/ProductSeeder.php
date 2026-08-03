<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Seed the products table with 8 realistic Ryoki Skincare products.
     */
    public function run(): void
    {
        $products = [
            [
                'name'           => 'Ryoki Gentle Glow Facial Wash',
                'slug'           => 'ryoki-gentle-glow-facial-wash',
                'description'    => 'RYOKI Facial Wash hadir dengan formula Fish Collagen dari Jepang, Niacinamide, dan Alpha Arbutin untuk membersihkan wajah sekaligus merawat kelembapan serta mencerahkan kulit.',
                'usage'          => 'Basahi wajah dengan air hangat. Tuangkan 1-2 pump ke telapak tangan, busakan, lalu pijat lembut ke seluruh wajah selama 30 detik. Bilas hingga bersih.',
                'ingredients'    => 'Aqua, Glycerin, Cocamidopropyl Betaine, Niacinamide, Centella Asiatica Extract, Ceramide NP, Allantoin, Sodium Hyaluronate, Phenoxyethanol.',
                'price'          => 60000,
                'category'       => 'Cleanser',
                'image'          => 'images/facial-wash.png',
                'rating'         => 4.9,
                'stock'          => 150,
                'in_stock'       => true,
                'is_best_seller' => true,
                'is_featured'    => true,
            ],
            [
                'name'           => 'Ryoki Gold Whitening Serum',
                'slug'           => 'ryoki-gold-whitening-serum',
                'description'    => 'Serum pencerah wajah dengan konsentrasi Niacinamide 10% dan ekstrak Licorice Root yang bekerja sinergis meratakan warna kulit, menyamarkan noda hitam, dan mengecilkan tampilan pori-pori.',
                'usage'          => 'Setelah toner, teteskan 2-3 tetes pada wajah dan leher. Tepuk-tepuk lembut hingga meresap sempurna. Gunakan setiap pagi dan malam hari.',
                'ingredients'    => 'Aqua, Niacinamide, Butylene Glycol, Glycyrrhiza Glabra (Licorice) Root Extract, Sodium Hyaluronate, Panthenol, Adenosine, Phenoxyethanol.',
                'price'          => 60000,
                'category'       => 'Serum',
                'image'          => 'images/serum.png',
                'rating'         => 4.8,
                'stock'          => 120,
                'in_stock'       => true,
                'is_best_seller' => true,
                'is_featured'    => true,
            ],
            [
                'name'           => 'Ryoki Day Cream',
                'slug'           => 'ryoki-day-cream',
                'description'    => 'Pelembap ringan dengan kompleks 5 jenis Ceramide yang mengunci kelembapan hingga 72 jam, memperbaiki skin barrier yang rusak, dan menenangkan kulit kemerahan akibat iritasi.',
                'usage'          => 'Ambil secukupnya, oleskan merata pada wajah dan leher setelah menggunakan serum. digunakan di pagi.',
                'ingredients'    => 'Niacinamide, UV Protection, Hyaluronic Acid, Collagen Extract.',
                'price'          => 75000,
                'category'       => 'Moisturizer',
                'image'          => 'images/day-cream.png',
                'rating'         => 4.9,
                'stock'          => 85,
                'in_stock'       => true,
                'is_best_seller' => false,
                'is_featured'    => true,
            ],
            [
                'name'           => 'Ryoki Night Cream',
                'slug'           => 'ryoki-night-cream',
                'description'    => 'Krim malam intensif dengan Alpha Arbutin 2% dan Collagen yang bekerja selama tidur untuk menyamarkan hiperpigmentasi, memudarkan flek hitam, dan mengembalikan kecerahan alami kulit.',
                'usage'          => 'Oleskan merata pada wajah dan leher sebelum tidur sebagai langkah terakhir. Gunakan setiap malam untuk hasil optimal dalam 4 minggu.',
                'ingredients'    => 'Aqua, Alpha Arbutin, Hydrolyzed Collagen, Niacinamide, Sodium Hyaluronate, Squalane, Tocopheryl Acetate, Phenoxyethanol.',
                'price'          => 96000,
                'category'       => 'Moisturizer',
                'image'          => 'images/night-cream.png',
                'rating'         => 4.9,
                'stock'          => 75,
                'in_stock'       => true,
                'is_best_seller' => false,
                'is_featured'    => true,
            ],
            [
                'name'           => 'Ryoki Face Toner',
                'slug'           => 'ryoki-face-toner',
                'description'    => 'Toner sekaligus essence dengan Hyaluronic Acid berlapis yang menghidrasi kulit secara mendalam dan mempersiapkan kulit untuk menyerap produk skincare selanjutnya secara maksimal.',
                'usage'          => 'Tuangkan secukupnya ke telapak tangan atau kapas. Aplikasikan pada wajah yang sudah dibersihkan dengan gerakan menepuk lembut.',
                'ingredients'    => 'Fish Collagen, Alpha Arbutin, Niacinamide, Aloe Barbadensis Extract.',
                'price'          => 63000,
                'category'       => 'Toner',
                'image'          => 'images/face-toner.png',
                'rating'         => 4.7,
                'stock'          => 95,
                'in_stock'       => true,
                'is_best_seller' => false,
                'is_featured'    => false,
            ],
            [
                'name'           => 'Miss Comby Comby',
                'slug'           => 'miss-comby-comby',
                'description'    => 'Jaga kesehatan dan kenyamanan area intimmu dengan Miss Comby Comb, sabun kewanitaan berbahan dasar ekstrak daun sirih & bahan alami pilihan.',
                'usage'          => 'Kocok botol terlebih dahulu sebelum digunakan, Semprotkan Miss Comb Comb langsung pada area kewanitaan bagian luar dari jarak ±10–15 cm, Diamkan beberapa detik agar formula alami meresap dan memberi rasa segar, Tidak perlu dibilas, cukup biarkan kering dengan sendirinya, Bisa digunakan setiap hari, terutama setelah aktivitas, saat menstruasi, atau sebelum tidur.',
                'ingredients'    => 'Ekstrak Sirih Alami, pH Balanced. tica Extract,',
                'price'          => 65000,
                'category'       => 'Cleanser',
                'image'          => 'images/miss-comby-comby.png',
                'rating'         => 4.6,
                'stock'          => 110,
                'in_stock'       => true,
                'is_best_seller' => false,
                'is_featured'    => false,
            ],
            [
                'name'           => 'Ryoki Brightening Peeling Spray',
                'slug'           => 'ryoki-brightening-peeling-spray',
                'description'    => 'Exfoliating spray yang mengangkat sel kulit mati secara instan tanpa perlu digosok kasar. Diperkaya Aloe Vera dan Grape Seed Extract untuk menghaluskan tekstur dan mencerahkan kulit wajah serta tubuh.',
                'usage'          => 'Semprotkan pada area kulit yang kering, diamkan 10 detik, lalu pijat lembut secara melingkar. Bilas dengan air bersih. Gunakan 2-3 kali seminggu.',
                'ingredients'    => 'Aqua, Aloe Barbadensis Leaf Extract, Vitis Vinifera (Grape) Seed Extract, Glycolic Acid, Cellulose, Glycerin, Panthenol, Phenoxyethanol.',
                'price'          => 116000,
                'category'       => 'Cleanser',
                'image'          => 'images/peeling-spray.png',
                'rating'         => 4.8,
                'stock'          => 130,
                'in_stock'       => true,
                'is_best_seller' => true,
                'is_featured'    => true,
            ],
            [
                'name'           => 'Ryoki Deodorant Spray',
                'slug'           => 'ryoki-deodorant-spray',
                'description'    => 'Deodorant spray praktis dengan ekstrak alami yang memberikan kesegaran tahan lama dan menjaga area ketiak tetap kering tanpa rasa lengket.',
                'usage'          => 'Kocok sebelum gunakan. Semprotkan 10-15 cm dari ketiak yang bersih dan kering. Gunakan setiap pagi atau kapan saja diperlukan.',
                'ingredients'    => 'Aqua, Alcohol Denat, Aluminum Chlorohydrate, Aloe Barbadensis Leaf Extract, Fragrance, Glycerin, Phenoxyethanol.',
                'price'          => 75000,
                'category'       => 'Personal Care',
                'image'          => 'images/deodorant-spray.png',
                'rating'         => 4.7,
                'stock'          => 90,
                'in_stock'       => true,
                'is_best_seller' => false,
                'is_featured'    => false,
            ],
            [
                'name'           => 'Ryoki Hand Body',
                'slug'           => 'ryoki-hand-body',
                'description'    => 'Hand body lotion ringan dengan aroma lembut dan formula pelembap yang menjaga kelembapan kulit tangan dan tubuh sepanjang hari.',
                'usage'          => 'Tuangkan secukupnya pada tangan, lalu usapkan merata ke seluruh tubuh setelah mandi atau kapan saja kulit terasa kering.',
                'ingredients'    => 'Aqua, Glycerin, Shea Butter, Niacinamide, Aloe Barbadensis Leaf Extract, Fragrance, Phenoxyethanol.',
                'price'          => 76000,
                'category'       => 'Body Care',
                'image'          => 'images/hand-body.png',
                'rating'         => 4.7,
                'stock'          => 120,
                'in_stock'       => true,
                'is_best_seller' => false,
                'is_featured'    => false,
            ],
        ];

        foreach ($products as $data) {
            Product::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
