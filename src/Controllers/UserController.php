<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\UserService;

class UserController extends Controller
{

    private UserService $service;

    public function index()
    {
        $this->service = new UserService();
        $users = $this->service->getAll();
        $this->view('users/index', compact('users'));
    }

    public function create()
    {
        echo 'lista';
        exit;
    }
}
