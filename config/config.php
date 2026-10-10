<?php

return [

    // 1. Configurações gerais da aplicação
    'app' => [
        'name' => 'MiniFrameworkPHP',
        'debug' => true,
        'timezone' => 'America/Sao_Paulo',
    ],

    // 2. Configurações de banco de dados
    'database' => [
        'driver'   => 'mysql',
        'host'     => 'localhost',
        'port'     => 3306,
        'dbname'   => 'meu_banco',
        'username' => 'root',
        'password' => '',
        'charset'  => 'utf8mb4',
    ],

    // 3. Caminhos importantes da aplicação
    'paths' => [
        'views' => __DIR__ . '/Views',
        'controllers' => __DIR__ . '/Controllers',
        'models' => __DIR__ . '/Models',
    ],

];
