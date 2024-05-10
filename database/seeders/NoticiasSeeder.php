<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Noticia;

class NoticiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Noticia::create([
            'titulo' => 'Título da Notícia 1',
            'descricao' => 'Descrição da Notícia 1',
        ]);

        Noticia::create([
            'titulo' => 'Título da Notícia 2',
            'descricao' => 'Descrição da Notícia 2',
        ]);
    }
}
