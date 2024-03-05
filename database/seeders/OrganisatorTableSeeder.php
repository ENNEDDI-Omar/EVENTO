<?php

namespace Database\Seeders;

use App\Models\Organisator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganisatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organisator::factory()->count(2)->create(); 
    }
}
