<?php

namespace App\core;

use App\Core\Database;

abstract class BaseModel extends Database
{
    protected string $tableName;

    abstract public function find(int $id);

    abstract public function all(): array;

    abstract public function create(array $data);

    abstract public function update(int $id, array $data);

    abstract public function delete(int $id);

    abstract public function save(): bool;
}
