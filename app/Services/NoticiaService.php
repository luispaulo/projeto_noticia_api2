<?php

namespace App\Services;

use App\Models\Noticia;

class NoticiaService
{
    public function getAll()
    {
        return Noticia::all();
    }

    public function create($data)
    {
        return Noticia::create($data);
    }

    public function find($id)
    {
        return Noticia::findOrFail($id);
    }

    public function update($id, $data)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->update($data);

        return $noticia;
    }

    public function delete($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();

        return ['message' => 'Notícia deletada com sucesso'];
    }
}
