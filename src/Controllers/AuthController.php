<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\UserService;

class AuthController extends Controller
{
    private UserService $service;

    public function __construct()
    {
        $this->service = new UserService();
    }

    public function index()
    {
        $this->view('auth/index');
    }

    public function authenticate()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->service->authenticate($email, $password);
        // return $this->view('auth/index', compact('error'));
        $data = ['success' => true, 'stausCode' => 201, 'redirect' => '/users.php'];

        if (!$user) {
            $error = "E-mail ou senha inválidos.";
            $data = ['success' => false, 'stausCode' => 401, 'message' => $error];

            http_response_code($data['stausCode']);
            header('Content-Type', 'application/json; charset=utf-8');
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            exit;
        }

        // salva sessão
        $_SESSION['user'] = $user;

        $extra = 'users.php';

        http_response_code($data['stausCode']);
        header('Content-Type', 'application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }

    public function logout()
    {
        session_destroy();
        header("Location: /login.php");
    }
}
