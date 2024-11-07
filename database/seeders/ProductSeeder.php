<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'title' => "Lorem ipsum dolorem artem.",
            'price' => 19.03,
            'quantity' => 3,
            'category_id' => 1,
            'brand_id' => 1,
            'description' => "Mollit irure deserunt est fugiat deserunt cillum sit labore anim ut sunt. Ad ullamco ut nulla minim do eiusmod. Consequat est reprehenderit do cupidatat aliquip elit adipisicing consectetur. Quis esse sunt exercitation aute non nostrud. Officia voluptate adipisicing labore incididunt labore adipisicing. Ipsum nisi excepteur ea fugiat velit eu mollit cillum proident non reprehenderit proident eu laboris. Non sit proident adipisicing duis tempor esse proident reprehenderit ipsum.",
        ]);
    }
}
