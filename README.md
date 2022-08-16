## CONFIGURAÇÕES PARA MIGRAR A API PARA OUTRO SERVIDOR

<p>Necessário instalar o Driver de SQLITE no PHP:</p>

    `sudo apt install php8.1-sqlite3`

<p>Ativar extensões no php.ini de sua versão de PHP 8 ativa:</p>

    `extension=pdo_sqlite`

    `extension=sqlite3`

<p>Reiniciar o serviço PHP e provalvelmente o Nginx:</p>

    `sudo systemctl restart nginx`

    `sudo systemctl restart pp8.1-fpm`

## INSTALAR RECURSO DE INTERFACE COM VIEW PARA LOGIN BÁSICO

Necessário instalar via Composer a interface Bootstrap:

   1 - `composer require laravel/ui ^3.5`;

   2 - `php artisan ui bootstrap --auth`;
   
   3 - `npm install && npm run dev` (obrigatório existir ambiente NODE.JS instalado em desenvolvimento);
   
   4 - Para o devido teste de funcionamento deve-se configurar o arquivo da raiz do projeto de nome `.env` com as credenciais básicas de acesso:

   ```    
    DB_CONNECTION=sqlite
    DB_HOST=127.0.0.1
    DB_PORT=3306
    #DB_DATABASE=database/database.sqlite
    DB_USERNAME=root
    DB_PASSWORD=
   ```
   No arquivo de configuração (/config/database.php) temos que fazer o apontamento para o sqlite:

    `'default' => env('DB_CONNECTION', 'sqlite'),`


   5 - Executar as migrações Auth para o banco: `php artisan migrate`;

   6 - Para teste em ambiente de desenvolvimento:

    `php artisan server --port=9091`

## Instalando o Pacote JWT (JSON WEB TOKEN)

Pacote de terceiros para funcionar o serviço:

    `composer require tymon/jwt-auth`

## Adicione o pacote JWT em um provedor de serviços

Abra o arquivo de config/app.php e atualize o array de provedores e pseudônimos.

<!-- terminar de documentar os recursos criados => https://www.avyatech.com/rest-api-with-laravel-8-using-jwt-token/ -->

## Comandos basicos para gerenciar o SqLite3

    `sqlite3 --version`
    
    Conectar a base criada em databases:
    
    `sqlite3 database/database.sqlite`

    Listar todas as tabelas criadas:

    `.tables`
  

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

