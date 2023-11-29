<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            Product::create([
                'product_name' => $faker->word,
                'small_description' => $faker->sentence,
                'basic_price' => $faker->randomFloat(2, 10, 1000),
                // Add more fields as needed
            ]);
        }
    }
}
