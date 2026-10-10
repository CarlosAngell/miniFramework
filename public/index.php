<?php

use App\Core\Router;

require_once __DIR__ . '/../vendor/autoload.php';

// Inicia a sessão
session_start();

// Carrega variáveis de ambiente (.env)
if (file_exists(__DIR__ . '/../.env')) {
    $env = parse_ini_file(__DIR__ . '/../.env');
    foreach ($env as $key => $value) {
        $_ENV[$key] = $value;
    }
}

// Carrega rotas
$router = Router::load(__DIR__ . '/../routes/web.php');

// Executa o roteador
$router->run();
