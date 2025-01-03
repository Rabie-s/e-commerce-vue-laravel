<?php

namespace Database\Seeders;


use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductTableData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        /*         Product::factory()->create([
            'name' => 'aa',
            'slug' => 'aa',
            'price' => 3.2,
            'main_image' => 'https://image-us.samsung.com/SamsungUS/configurator/A54-01-Purple-Configurator-DT-800x600.jpg',
            'quantity' => 2,
            'description' => '',
            'category_id' => 1,
            'admin_id' => 1,
        ]); */

        $randomImages =[
            'https://m.media-amazon.com/images/I/41WpqIvJWRL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61ghDjhS8vL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61c1QC4lF-L._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/710VzyXGVsL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61EPT-oMLrL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71r3ktfakgL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61CqYq+xwNL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71cVOgvystL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71E+oh38ZqL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61uSHBgUGhL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71nDK2Q8HAL._AC_UL640_QL65_.jpg',
            'https://smartbuy-me.com/cdn/shop/files/ABJ1501ST0343-1.jpg?v=1727622623&width=500',
            'https://smartbuy-me.com/cdn/shop/files/ABJ1406ST0005.jpg?v=1734264931&width=300',
            'https://smartbuy-me.com/cdn/shop/files/ABJ1502ST0173_79913bf9-3d90-4123-a60f-ee68bd6db314.jpg?v=1722951983&width=600'
       ];

        for ($i = 0; $i < 100; $i++) {
            DB::table('products')->insert([
                'name' => $faker->sentence(2),
                'slug' => $faker->sentence(2),
                'price' => $faker->randomFloat(1, 20, 30),
                'main_image' => $randomImages[rand(0, 10)],
                'quantity' => $faker->numberBetween(1, 10),
                'description' => '',
                'category_id' => $faker->numberBetween(1, 2),
                'admin_id' => 1,
            ]);
        }


    }
}
