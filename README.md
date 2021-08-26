<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instruções

Passos:
- Faça uma cópia do arquivo `.env.exemple` e renomeie para `.env`.
- Um arquivo `docker-compose.yml` cria um server php + nginx e banco de dados Mysql para uso em desenvolvimento, apenas use o comando `docker-compose up`. Para isso é preciso que o docker compose esteja devidamente instalado na maquina.
- Para rodar as migrations use o comando `php artisan migrate`.

Recomenda-se usar um banco local e fazer a conexão local para melhor experiência.

### Rotas
A aplicação possui duas rotas. Uma para gerar a hash e outra para listar todas as hashes geradas via linha de comando.

 - A rota que gera a hash é `GET localhost/api/hash/{inputText}`, sendo inputText a string a ser usada no algoritmo.
 - A segunda rota é `GET localhost/api/hashes`, sendo responsavel por retornar a query com todos as hashes no banco de dados. Possui apenas um parametro `GET localhost/api/hashes?attempts=8800`, sendo esse valor um filtro para buscar todas as hashes geradas com o numero de tentativas com o valor menor ou igual.

 ### Comando
 O comando tem o objetivo de gerar novas hashes e salvar na base de dados.
 No console digite `php artisan nofaro:teste string --requests=`, onde string é o input que será usado no algoritmo e requests é a quantidade de chaves que será gerado.

 ### Organização do projeto
 A estrutura padrão do laravel foi mantida, os endpoints acessam a controller que contem a lógica e devolve um response ao usuário. O comando também usa a estrutura padrão do laravel não sendo necessario nada diferente para a implementação.
 O delimitador de requisições foi feito no arquivo `RouteServiceProvider`, apenas alterando o método `configureRateLimiting`.

