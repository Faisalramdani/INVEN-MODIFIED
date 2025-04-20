<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'id' => 1,
                'name' => 'Pelanggan Umum',
                'email' => null,
                'phone' => null,
                'address' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
