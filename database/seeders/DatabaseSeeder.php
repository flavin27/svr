<?php

namespace Database\Seeders;

use App\Models\Agf;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $products = Product::factory(10)->create();
        $sales = Sale::factory(10)->create();
        $sales->map(function ($sale) use ($products) {
            $sale->Products()->attach(
                $products->random(rand(1, 3))->pluck('id')->toArray(),
                ['quantity' => rand(1, 3)]
            );

        });
    }
}
