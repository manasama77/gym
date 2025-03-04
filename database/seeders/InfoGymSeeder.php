<?php

namespace Database\Seeders;

use App\Models\InfoGym;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InfoGymSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InfoGym::create([
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        ]);
    }
}
