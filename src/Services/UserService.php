<?php

namespace App\Services;

use App\Models\Users;

class UserService
{
    private Users $model;

    public function __construct()
    {

        $this->model = new Users();
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create($data)
    {
        // validação básica
        if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
            return ['error' => 'Preencha todos os campos!'];
        }

        // e-mail já existe?
        //if ($this->model->findByEmail($data['email'])) {
        //    return ['error' => 'E-mail já cadastrado!'];
        //}

        $options = [
            'memory_cost' => PASSWORD_ARGON2_DEFAULT_MEMORY_COST,
            'time_cost' => PASSWORD_ARGON2_DEFAULT_TIME_COST,
            'threads' => PASSWORD_ARGON2_DEFAULT_THREADS
        ];

        // gerar hash seguro da senha
        $data['password'] = password_hash($data['password'], PASSWORD_ARGON2ID, $options);

        // salvar
        //$this->model->insert($data);

        return ['success' => true];
    }

    public function update($id, $data)
    {
        if (empty($data['name']) || empty($data['email'])) {
            return ['error' => 'Preencha todos os campos!'];
        }

        $this->model->update($id, $data);

        return ['success' => true];
    }

    public function delete($id)
    {
        $this->model->delete($id);

        return ['success' => true];
    }

    public function authenticate($email, $password)
    {
        $user = $this->model->findByEmail($email);

        if (!$user || !password_verify($password, $user['password_hash'])) {
            return false;
        }

        return $user;
    }
}
