<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Categoria::create(['nombre' => 'Actualidad']);

        // DB::table('categorias')->insert([
        //     ['nombre' => 'Actualidad'],
        //     ['nombre' => 'Política'],
        //     ['nombre' => 'Deportes'],
        //     ['nombre' => 'Tecnología'],
        //     ['nombre' => 'Ciencia'],
        // ]);
    }
}
