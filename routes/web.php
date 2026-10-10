<?php

use App\Core\Router;

// $router = new Router();

// Rotas de autenticação
$router->get('/login', 'AuthController@index');
$router->post('/login/authenticate', 'AuthController@authenticate');
$router->get('/logout', 'AuthController@logout');

// Rotas de usuários
$router->get('/users', 'UserController@index');
$router->get('/users/create', 'UserController@create');
$router->post('/users/store', 'UserController@store');
$router->get('/users/edit', 'UserController@edit');
$router->post('/users/update', 'UserController@update');
$router->get('/users/delete', 'UserController@delete');

// Página inicial
$router->get('/users/list', 'UserController@list');
$router->get('/users', 'UserController@index');
$router->post('/users/create', 'UserController@create');
$router->put('/users/edit', 'UserController@edit');
$router->delete('/users/delete', 'UserController@delete');
