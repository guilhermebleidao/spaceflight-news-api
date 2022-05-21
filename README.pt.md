# spaceflight-news-api

<i>Leia isso em outros idiomas:</i> [Inglês](README.md)

Uma API Restful baseado no [Space Flight News](https://api.spaceflightnewsapi.net/v3/documentation), um projeto público com dados sobre lançamentos espaciais.

Este projeto é um case do programa de estágio da Code N' App.

## Deve ter

#### Rotas
- [x] - [GET] / : Retorna "Space Flight News"
- [x] - [GET] /articles/ : Lista todos os artigos da base de dados (com paginação)
- [x] - [GET] /articles/{id} : Obtém informação sobre um artigo
- [x] - [POST] /articles /: Adiciona um artigo
- [x] - [PUT] /articles/{id} : Atualiza um artigo baseado no id
- [x] - [DELETE] /articles/{id} : Deleta um artigo baseado no id
- [x] - [GET] /blogs/ : Lista todos os blogs da base de dados (com paginação)
- [x] - [GET] /blogs/{id} : Obtém informação sobre um blog
- [x] - [POST] /blogs/ : Adiciona um blog
- [x] - [PUT] /blogs/{id} : Atualiza um blog baseado no id
- [x] - [DELETE] /blogs/{id} : Deleta um blog baseado no id

#### Funcionalidades
- [ ] - Criar um script para alimentar a base de dados com todos os artigos e blogs do Space Flight News
- [ ] - Criar um CRON que rode diariamente às 9am atualizando a base de dados com novos artigos e blogs do Space Flight News
- [ ] - Criar um alerta para enviar um email se houver alguma falha durante a sincronização
- [x] - Documentar a API usando [L5-Swagger](https://github.com/DarkaOnLine/L5-Swagger)
- [ ] - Criar testes unitários para os endpoints da API

## Seria bom ter

- [ ] - Entrega contínua
- [ ] - Login e sistema de controle de acesso
- [ ] - Histórico de Log

## Como começar

#### Instalando o projeto

Abra o terminal no mesmo diretório que contém o arquivo `package.json`, e execute:

```bash
php artisan key:generate

composer install
```

#### Executando o projeto

Abra o terminal no mesmo diretório que contém o arquivo `package.json`, e execute:

```bash
php artisan serve
```

## Documentação

Após executar o projeto você pode acessar a documentação em [/api/docs](http://127.0.0.1:8000/api/docs)
