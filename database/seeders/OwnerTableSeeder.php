<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Owner::create([
            'name' => 'Emily Carter',
            'email' => 'emily.carter@email.com',
            'password' => 'emily123',
            'name' => 'Sommelier',
        ]);
        
         Owner::create([
            'name' => ' Jake Thompson',
            'email' => 'jake.t@email.com',
            'password' => 'securePass456',
            'name' => 'Attendant',
        ]);

         Owner::create([
            'name' => 'Olivia Brooks',
            'email' => 'olivia.b@email.com',
            'password' => 'wineStore789',
            'name' => 'Inventory',
        ]);
        
    }
}
