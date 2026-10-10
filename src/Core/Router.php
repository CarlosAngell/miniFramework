<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    /**
     * Carrega o arquivo de rotas e retorna o roteador configurado.
     */
    public static function load(string $file)
    {
        $router = new static; // cria instância do Router

        require $file;        // dentro desse arquivo, $router EXISTE

        return $router;       // retorna o router com as rotas carregadas
    }

    /**
     * Registra rota GET
     */
    public function get(string $uri, string $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    /**
     * Registra rota POST
     */
    public function post(string $uri, string $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    /**
     * Registra rota PUT
     */
    public function put(string $uri, string $action)
    {
        $this->routes['PUT'][$uri] = $action;
    }

    public function delete(string $uri, string $action)
    {
        $this->routes['DELETE'][$uri] = $action;
    }

    /**
     * Executa a rota
     */
    public function run()
    {

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $scriptName = preg_replace('/(^\/|\.php)/', '', $_SERVER['SCRIPT_NAME']);
        $uri = preg_replace('#^/' . $scriptName . '\.php#', '', $uri);

        $method = $_SERVER['REQUEST_METHOD'];

        $action = $this->routes[$method][$uri] ?? null;
        if (!$action) {
            http_response_code(404);
            echo "404 - Rota não encontrada";
            return;
        }

        // "HomeController@index"
        [$controller, $method] = explode('@', $action);

        $controllerClass = "App\\Controllers\\{$controller}";

        $controllerInstance = new $controllerClass;

        return $controllerInstance->$method();
    }
}
