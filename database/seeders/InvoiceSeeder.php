<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('invoices')->insert([
            [
                'id' => 1,
                'customer_id' => 1,
                'user_id' => 1,
                'invoice_code' => 'INV-1',
                'total_price' => 10000,
                'payment' => 10000,
                'remaining_payment' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'customer_id' => 1,
                'user_id' => 1,
                'invoice_code' => 'INV-2',
                'total_price' => 12000,
                'payment' => 12000,
                'remaining_payment' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan invoice ke-3 sampai ke-8 disini sesuai data kamu...
        ]);
    }
}
