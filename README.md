# PROJETO NOTICIA - API - BACK-END

## Subindo a API com Docker
Detalhes de como subir o projeto back-end com Docker.

1. `docker-compose build`

2. `docker-compose up`

## Subindo a API direto no laravel
Detalhes de como subir o projeto back-end com Docker.

1. `php artisan serve`
  

## Carregando as migration e seeds

Executar os comandos para criar e popular as tabelas

1. `php artisan migrate`

2. `php artisan db:seed`

3. Para acessar as rotas do endpoints:

  `http://localhost:8001/api`

## Para acessar a documentacao SWAGGER:

Acessar a documentacao do swagger e testar os endpoints:
Executar no terminal:

`php artisan l5-swagger:generate`

Apos acessa a url:

`http://localhost:8001/api/documentation`
