<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert(
            [
                'name' => 'Phones',
                'slug' => 'phones',
                'main_image' => 'https://i0.wp.com/technode.com/wp-content/uploads/2023/11/oppo-1.png?resize=640%2C427&ssl=1',
            ],
        );

        DB::table('categories')->insert(
            [
                'name' => 'GPU',
                'slug' => 'gpu',
                'main_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSiFzjW5wBrClDJ2gMOZQsw3Oy4-iQ9fH6s4KD7qo_0-XlPrw9FgywSvH8VNPswGxm-cpU&usqp=CAU',
            ]
        );
    }
}
