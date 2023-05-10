<?php

namespace App\Repositories\Core\QueryBuilder;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Core\BaseQueryBuilderRepository;
use Illuminate\Support\Str;

class QueryBuilderCategoryRepository extends BaseQueryBuilderRepository implements CategoryRepositoryInterface
{
    protected $table = 'categories';

    public function search(array $data)
    {
        // TODO: Implement search() method.
    }

    public function store(array $data)
    {
        $data['url'] = Str::kebab($data['title']);
        return $this->db->table($this->tb)
            ->insert($data);
    }

    public function update($id, array $data)
    {
        $data['url'] = Str::kebab($data['title']);
        return $this->db->table($this->tb)
            ->where('id', $id)
            ->update($data);
    }

}
