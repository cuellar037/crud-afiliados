<?php

namespace Database\Seeders;

use App\Models\Afiliado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AfiliadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Afiliado::factory()->count(20)->create();
    }
}
