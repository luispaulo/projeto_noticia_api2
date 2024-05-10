<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NoticiaService;

class NoticiaController extends Controller
{

    protected $noticiaService;

    public function __construct(NoticiaService $noticiaService)
    {
        $this->noticiaService = $noticiaService;
    }

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
        return $this->noticiaService->getAll();
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

        return $this->noticiaService->create($request->all());
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
        return $this->noticiaService->find($id);
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
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
        ]);

        return $this->noticiaService->update($id, $request->all());
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
        return $this->noticiaService->delete($id);

    }
}
