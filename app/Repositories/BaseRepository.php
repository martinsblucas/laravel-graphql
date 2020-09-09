<?php

namespace App\Repositories;

use App\Interfaces\BaseInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function show(int $id, array $fields = ['*']) : object
    {
        return $this->model->where('id', '=', $id)->first($fields);
    }

    public function store(array $data) : object
    {
        return $this->model->create($data);
    }

    public function paginate(int $itemsPerPage = 10, array $fields = ['*'], string $pageName = 'page', int $currentPage = 1) : object
    {
        return $this->model->paginate($itemsPerPage, $fields, $pageName, $currentPage);
    }
}
