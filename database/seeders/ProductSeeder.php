<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Kaos Kaki Anti-Gravitasi', 'price' => 150000, 'stock' => 50, 'description' => 'Melangkah lebih ringan seakan tanpa beban.'],
            ['name' => 'Sisir Ajaib Penumbuh Kenangan', 'price' => 75000, 'stock' => 100, 'description' => 'Setiap sisiran membawa kembali memori indah.'],
            ['name' => 'Bantal Pengundang Mimpi Indah', 'price' => 250000, 'stock' => 30, 'description' => 'Tidur nyenyak dijamin, mimpi petualangan bonus.'],
            ['name' => 'Kopi "Senja Tanpa Sendu"', 'price' => 55000, 'stock' => 200, 'description' => 'Secangkir kopi untuk menemani senja yang ceria.'],
            ['name' => 'Teh "Tenang Walau Dikejar Deadline"', 'price' => 45000, 'stock' => 150, 'description' => 'Minuman wajib para pejuang tenggat waktu.'],
            ['name' => 'Mouse Gaming "Klik Kanan Menang"', 'price' => 350000, 'stock' => 40, 'description' => 'Akurasi tinggi untuk kemenangan instan.'],
            ['name' => 'Keyboard "Suara Hujan Rintik"', 'price' => 450000, 'stock' => 25, 'description' => 'Mengetik jadi lebih syahdu dan menenangkan.'],
            ['name' => 'Mug Bunglon Pengubah Mood', 'price' => 95000, 'stock' => 80, 'description' => 'Warna mug berubah sesuai suhu minuman dan mood Anda.'],
            ['name' => 'Sandal Jepit "Anti Maling"', 'price' => 120000, 'stock' => 60, 'description' => 'Dilengkapi GPS dan alarm, tapi bohong.'],
            ['name' => 'Topi Penangkal Pikiran Negatif', 'price' => 180000, 'stock' => 70, 'description' => 'Membuat Anda selalu berpikir positif, mungkin.'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
