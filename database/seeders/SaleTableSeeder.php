<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sale::create([
            'amount' => '6',
            'price' => '145.23',
            'bottle' => 'Pinot Noir Grand Cru',
        ]);
        
    }
}
