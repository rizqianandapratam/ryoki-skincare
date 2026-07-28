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
        $this->call(ProductSeeder::class);

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
