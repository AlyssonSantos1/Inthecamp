<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Owner;

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
            'password' => bcrypt('emily123'),
            'function' => 'Sommelier',
        ]);

        Owner::create([
            'name' => 'Jake Thompson',
            'email' => 'jake.t@email.com',
            'password' => bcrypt('jake123'),
            'function' => 'Attendant',
        ]);

        Owner::create([
            'name' => 'Olivia Brooks',
            'email' => 'olivia.b@email.com',
            'password' => bcrypt('olivia123'),
            'function' => 'Inventory',
        ]);
        
    }
}
