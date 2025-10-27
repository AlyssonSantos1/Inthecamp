<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WareTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ware::create([
            'stock' => '25',
            'bottle' => 'Rosé Provence',
            'age' => '1',
            'wine_type' => 'Rosé',
            'temperature' => '12',
            
        ]);
        
    }
}
