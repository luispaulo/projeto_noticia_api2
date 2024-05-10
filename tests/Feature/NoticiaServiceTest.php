<?php

namespace Tests;

use App\Models\Noticia;
use App\Services\NoticiaService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class NoticiaServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $noticiaService;
    protected $noticiaMock;

    protected function setUp(): void
    {
        parent::setUp();
        $this->noticiaMock = Mockery::mock(Noticia::class);
        $this->noticiaService = new NoticiaService($this->noticiaMock);
    }

    public function testGetAll()
    {

    }

    public function testCreate()
    {
        $data = [
            'titulo' => 'Teste Título',
            'descricao' => 'Teste Descrição',
        ];

        $noticia = new Noticia($data);

        $this->noticiaMock->shouldReceive('create')->with($data)->andReturn($noticia);

        $result = $this->noticiaService->create($data);

        $this->assertInstanceOf(Noticia::class, $result);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }
}
