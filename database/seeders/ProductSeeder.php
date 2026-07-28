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
                'description'    => 'Pembersih wajah dengan pH seimbang yang mengangkat kotoran dan sisa makeup tanpa membuat kulit terasa kering atau tertarik. Diperkaya Niacinamide dan Centella Asiatica untuk menjaga kelembaban alami kulit sensitif.',
                'usage'          => 'Basahi wajah dengan air hangat. Tuangkan 1-2 pump ke telapak tangan, busakan, lalu pijat lembut ke seluruh wajah selama 30 detik. Bilas hingga bersih.',
                'ingredients'    => 'Aqua, Glycerin, Cocamidopropyl Betaine, Niacinamide, Centella Asiatica Extract, Ceramide NP, Allantoin, Sodium Hyaluronate, Phenoxyethanol.',
                'price'          => 75000,
                'category'       => 'Cleanser',
                'image'          => null,
                'rating'         => 4.9,
                'stock'          => 150,
                'in_stock'       => true,
                'is_best_seller' => true,
                'is_featured'    => true,
            ],
            [
                'name'           => 'Ryoki Luminous Niacinamide Serum',
                'slug'           => 'ryoki-luminous-niacinamide-serum',
                'description'    => 'Serum pencerah wajah dengan konsentrasi Niacinamide 10% dan ekstrak Licorice Root yang bekerja sinergis meratakan warna kulit, menyamarkan noda hitam, dan mengecilkan tampilan pori-pori.',
                'usage'          => 'Setelah toner, teteskan 2-3 tetes pada wajah dan leher. Tepuk-tepuk lembut hingga meresap sempurna. Gunakan setiap pagi dan malam hari.',
                'ingredients'    => 'Aqua, Niacinamide, Butylene Glycol, Glycyrrhiza Glabra (Licorice) Root Extract, Sodium Hyaluronate, Panthenol, Adenosine, Phenoxyethanol.',
                'price'          => 129000,
                'category'       => 'Serum',
                'image'          => null,
                'rating'         => 4.8,
                'stock'          => 120,
                'in_stock'       => true,
                'is_best_seller' => true,
                'is_featured'    => true,
            ],
            [
                'name'           => 'Ryoki Barrier Restore Ceramide Moisturizer',
                'slug'           => 'ryoki-barrier-restore-ceramide-moisturizer',
                'description'    => 'Pelembap ringan dengan kompleks 5 jenis Ceramide yang mengunci kelembapan hingga 72 jam, memperbaiki skin barrier yang rusak, dan menenangkan kulit kemerahan akibat iritasi.',
                'usage'          => 'Ambil secukupnya, oleskan merata pada wajah dan leher setelah menggunakan serum. Dapat digunakan pagi dan malam hari.',
                'ingredients'    => 'Aqua, Ceramide NP, Ceramide AP, Ceramide EOP, Phytosphingosine, Hyaluronic Acid, Panthenol, Squalane, Cholesterol, Phenoxyethanol.',
                'price'          => 145000,
                'category'       => 'Moisturizer',
                'image'          => null,
                'rating'         => 4.9,
                'stock'          => 85,
                'in_stock'       => true,
                'is_best_seller' => false,
                'is_featured'    => true,
            ],
            [
                'name'           => 'Ryoki Aqua Shield Sunscreen SPF 50 PA++++',
                'slug'           => 'ryoki-aqua-shield-sunscreen',
                'description'    => 'Tabir surya bertekstur air yang sangat ringan di kulit, tidak meninggalkan whitecast, dan memberikan perlindungan spektrum luas dari sinar UVA dan UVB sepanjang hari.',
                'usage'          => 'Aplikasikan sebanyak dua ruas jari pada wajah dan leher 15 menit sebelum keluar ruangan. Ulangi setiap 3-4 jam untuk perlindungan optimal.',
                'ingredients'    => 'Aqua, Ethylhexyl Methoxycinnamate, Zinc Oxide, Titanium Dioxide, Butyl Methoxydibenzoylmethane, Aloe Barbadensis Leaf Water, Tocopheryl Acetate.',
                'price'          => 95000,
                'category'       => 'Sunscreen',
                'image'          => null,
                'rating'         => 4.8,
                'stock'          => 200,
                'in_stock'       => true,
                'is_best_seller' => true,
                'is_featured'    => true,
            ],
            [
                'name'           => 'Ryoki Hydrating Essence Toner',
                'slug'           => 'ryoki-hydrating-essence-toner',
                'description'    => 'Toner sekaligus essence dengan Hyaluronic Acid berlapis yang menghidrasi kulit secara mendalam dan mempersiapkan kulit untuk menyerap produk skincare selanjutnya secara maksimal.',
                'usage'          => 'Tuangkan secukupnya ke telapak tangan atau kapas. Aplikasikan pada wajah yang sudah dibersihkan dengan gerakan menepuk lembut.',
                'ingredients'    => 'Aqua, Glycerin, Sodium Hyaluronate, Rosa Damascena Flower Water, Panthenol, Betaine, Allantoin, Phenoxyethanol.',
                'price'          => 89000,
                'category'       => 'Toner',
                'image'          => null,
                'rating'         => 4.7,
                'stock'          => 95,
                'in_stock'       => true,
                'is_best_seller' => false,
                'is_featured'    => false,
            ],
            [
                'name'           => 'Ryoki Acne Spot Treatment Gel',
                'slug'           => 'ryoki-acne-spot-treatment-gel',
                'description'    => 'Gel perawatan spot jerawat dengan Salicylic Acid 2% dan Tea Tree Oil yang efektif mengeringkan jerawat meradang, mengurangi kemerahan, dan mencegah bekas jerawat membandel.',
                'usage'          => 'Totolkan tipis pada area jerawat di malam hari sebagai langkah terakhir rutinitas skincare. Hindari area mata dan bibir.',
                'ingredients'    => 'Aqua, Salicylic Acid, Melaleuca Alternifolia (Tea Tree) Leaf Oil, Centella Asiatica Extract, Niacinamide, Zinc PCA, Phenoxyethanol.',
                'price'          => 65000,
                'category'       => 'Acne Care',
                'image'          => null,
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
                'price'          => 79000,
                'category'       => 'Cleanser',
                'image'          => null,
                'rating'         => 4.8,
                'stock'          => 130,
                'in_stock'       => true,
                'is_best_seller' => true,
                'is_featured'    => true,
            ],
            [
                'name'           => 'Ryoki Alpha Arbutin Whitening Night Cream',
                'slug'           => 'ryoki-alpha-arbutin-whitening-night-cream',
                'description'    => 'Krim malam intensif dengan Alpha Arbutin 2% dan Collagen yang bekerja selama tidur untuk menyamarkan hiperpigmentasi, memudarkan flek hitam, dan mengembalikan kecerahan alami kulit.',
                'usage'          => 'Oleskan merata pada wajah dan leher sebelum tidur sebagai langkah terakhir. Gunakan setiap malam untuk hasil optimal dalam 4 minggu.',
                'ingredients'    => 'Aqua, Alpha Arbutin, Hydrolyzed Collagen, Niacinamide, Sodium Hyaluronate, Squalane, Tocopheryl Acetate, Phenoxyethanol.',
                'price'          => 135000,
                'category'       => 'Moisturizer',
                'image'          => null,
                'rating'         => 4.9,
                'stock'          => 75,
                'in_stock'       => true,
                'is_best_seller' => false,
                'is_featured'    => true,
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
