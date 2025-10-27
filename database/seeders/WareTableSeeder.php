<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stock;

class WareTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stock::create([
            'supply' => '25',
            'bottle' => 'Rosé Provence',
            'age' => '1',
            'price' => '118.62',
            'wine_type' => 'Rosé',
            'temperature' => '12',
            
        ]);
        
    }
}
