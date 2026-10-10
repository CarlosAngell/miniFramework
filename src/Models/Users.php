<?php

namespace App\Models;

use App\Models\UsersBaseModel;
use App\Core\Database;
use PDO;

class Users extends UsersBaseModel
{

    public function findByEmail(string $email)
    {
        $this->db = Database::getConnection();
        $statement = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $statement->execute([$email]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
