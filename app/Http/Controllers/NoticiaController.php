<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class NoticiaController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/noticias",
     *     tags={"Noticias"},
     *     summary="Retorna todas as noticias",
     *     @OA\Response(response="200", description="Sucesso")
     * )
     */
    public function index()
    {
        return Noticia::all();
    }

    /**
     * @OA\Post(
     *     path="/api/noticias",
     *     tags={"Noticias"},
     *     summary="Cria uma nova notícia",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"titulo", "descricao"},
     *             @OA\Property(property="titulo", type="string", example="Título da Notícia"),
     *             @OA\Property(property="descricao", type="string", example="Descrição da Notícia")
     *         ),
     *     ),
     *     @OA\Response(response="200", description="Notícia criada com sucesso"),
     *     @OA\Response(response="422", description="Erro de validação")
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
        ]);

        return Noticia::create($request->all());
    }

    /**
     * @OA\Get(
     *     path="/api/noticias/{id}",
     *     tags={"Noticias"},
     *     summary="Retorna uma notícia específica",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(response="200", description="Sucesso"),
     *     @OA\Response(response="404", description="Notícia não encontrada")
     * )
     */
    public function show($id)
    {
        return Noticia::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/api/noticias/{id}",
     *     tags={"Noticias"},
     *     summary="Atualiza uma notícia existente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"titulo", "descricao"},
     *             @OA\Property(property="titulo", type="string", example="Novo Título da Notícia"),
     *             @OA\Property(property="descricao", type="string", example="Nova Descrição da Notícia")
     *         ),
     *     ),
     *     @OA\Response(response="200", description="Notícia atualizada com sucesso"),
     *     @OA\Response(response="404", description="Notícia não encontrada"),
     *     @OA\Response(response="422", description="Erro de validação")
     * )
     */
    public function update(Request $request, $id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->update($request->all());

        return $noticia;
    }

    /**
     * @OA\Delete(
     *     path="/api/noticias/{id}",
     *     tags={"Noticias"},
     *     summary="Deleta uma notícia existente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(response="200", description="Notícia deletada com sucesso"),
     *     @OA\Response(response="404", description="Notícia não encontrada")
     * )
     */
    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();

        return response()->json(['message' => 'Notícia deletada com sucesso']);
    }
}
