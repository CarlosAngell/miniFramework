<?php

namespace App\Models;

use App\core\BaseModel;
use App\Core\Database;
use PDO;

class UsersBaseModel extends BaseModel
{
    protected object $db;

    public function find($id)
    {
        $this->db = Database::getConnection();
        $statement = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function all(): array
    {
        $this->db = Database::getConnection();
        $statement = $this->db->query("SELECT * FROM users ORDER BY id DESC");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data) {}

    public function update(int $id, array $data) {}

    public function delete(int $id) {}

    public function save(): bool
    {
        return 1;
    }
}
