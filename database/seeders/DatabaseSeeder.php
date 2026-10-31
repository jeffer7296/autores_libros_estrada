<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    $autores = \App\Models\Autor::factory(3)->create();

    foreach ($autores as $autor) {
        \App\Models\Libro::factory(3)->create(['autor_id' => $autor->id]);
    }
    
    \App\Models\Libro::factory(1)->create(['autor_id' => $autores->first()->id]);
    }

}
