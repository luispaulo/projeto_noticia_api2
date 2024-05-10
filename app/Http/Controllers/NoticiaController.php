<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class NoticiaController extends Controller
{
    public function index()
    {
        return Noticia::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
        ]);

        return Noticia::create($request->all());
    }

    public function show($id)
    {
        return Noticia::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->update($request->all());

        return $noticia;
    }

    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();

        return response()->json(['message' => 'Notícia deletada com sucesso']);
    }
}
