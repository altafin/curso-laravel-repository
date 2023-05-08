<?php

namespace App\Repositories\Core;

use App\Repositories\Contracts\RepositoryInterface;

class BaseEloquentRepository implements RepositoryInterface
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }

    public function findWhere($column, $value)
    {
        // TODO: Implement findWhere() method.
    }

    public function findWhereFirst($column, $value)
    {
        // TODO: Implement findWhereFirst() method.
    }

    public function paginate($totalPage = 10)
    {
        // TODO: Implement paginate() method.
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
