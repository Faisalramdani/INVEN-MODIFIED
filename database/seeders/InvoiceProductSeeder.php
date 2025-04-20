<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('invoice_products')->insert([
            [
                'id' => 1,
                'invoice_id' => 1,
                'product_id' => 1,
                'price' => 5000,
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'invoice_id' => 2,
                'product_id' => 2,
                'price' => 6000,
                'quantity' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'invoice_id' => 8,
                'product_id' => 1,
                'price' => 14000,
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'invoice_id' => 9,
                'product_id' => 1,
                'price' => 14000,
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'invoice_id' => 10,
                'product_id' => 2,
                'price' => 13000,
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'invoice_id' => 11,
                'product_id' => 2,
                'price' => 156000,
                'quantity' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'invoice_id' => 12,
                'product_id' => 1,
                'price' => 14000,
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'invoice_id' => 13,
                'product_id' => 2,
                'price' => 13000,
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
