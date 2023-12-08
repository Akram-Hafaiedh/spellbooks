<?php

namespace Database\Seeders;

use App\Models\SpellBook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpellBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        SpellBook::factory()->count(10)->create();
    }
}
