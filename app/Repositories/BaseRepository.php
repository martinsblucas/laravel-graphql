<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function show(int $id) : object
    {
        return $this->model->findOrFail($id);
    }

    public function store(array $data) : object {
        return $this->model->create($data);
    }
}
