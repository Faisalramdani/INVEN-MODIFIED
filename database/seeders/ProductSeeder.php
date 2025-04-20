<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => 'Pulsa Telkomsel 5K',
                'stock' => 100,
                'capital_price' => 4800,
                'selling_price' => 5000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Paket Data XL 1GB',
                'stock' => 50,
                'capital_price' => 9500,
                'selling_price' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
