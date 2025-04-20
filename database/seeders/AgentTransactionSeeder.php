<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgentTransactionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('agent_transactions')->insert([
            [
                'id' => 1,
                'image' => null,
                'name' => 'Tarik Tunai Rp.50.000',
                'nilai' => 5000,
                'price' => 5000,
                'saldo_awal' => 1000000,
                'saldo_akhir' => 1000000,
                'category_id' => 1,
                'nilai_rupiah' => 5000,
                'created_at' => '2025-04-17 16:13:18',
                'updated_at' => '2025-04-18 23:38:50',
                'user_id' => 1,
            ],
            [
                'id' => 2,
                'image' => null,
                'name' => 'Tarik Tunai Rp. 60.000',
                'nilai' => 5000,
                'price' => 5000,
                'saldo_awal' => 1000000,
                'saldo_akhir' => 1000000,
                'category_id' => 1,
                'nilai_rupiah' => 5000,
                'created_at' => '2025-04-17 20:00:12',
                'updated_at' => '2025-04-18 03:05:06',
                'user_id' => 1,
            ],
            [
                'id' => 4,
                'image' => null,
                'name' => 'Tarik Tunai Rp. 70.000',
                'nilai' => 5000,
                'price' => 5000,
                'saldo_awal' => 1000000,
                'saldo_akhir' => 1000000,
                'category_id' => 1,
                'nilai_rupiah' => 5000,
                'created_at' => '2025-04-19 00:09:45',
                'updated_at' => '2025-04-19 00:09:45',
                'user_id' => 1,
            ],
            [
                'id' => 5,
                'image' => null,
                'name' => 'Tarik Tunai Rp. 80.000',
                'nilai' => 5000,
                'price' => 5000,
                'saldo_awal' => 1000000,
                'saldo_akhir' => 1000000,
                'category_id' => 1,
                'nilai_rupiah' => 5000,
                'created_at' => '2025-04-20 00:57:20',
                'updated_at' => '2025-04-20 00:57:20',
                'user_id' => 1,
            ],
        ]);
    }
}
