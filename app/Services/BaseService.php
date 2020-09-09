<?php


namespace App\Services;

use App\Interfaces\BaseInterface;
use App\Repositories\BaseRepository;

abstract class BaseService
{
    protected $repository;

    public function __construct(BaseInterface $repository)
    {
        $this->repository = $repository;
    }

    public function show(int $id, array $fields = ['*']) : object
    {
        return $this->repository->show($id, $fields);
    }

    public function store(array $data) : object
    {
        return $this->repository->store($data);
    }

    public function paginate(int $itemsPerPage = 10, array $fields = ['*'], string $pageName = 'page', int $currentPage = 1) : object
    {
        return $this->repository->paginate($itemsPerPage, $fields, $pageName, $currentPage);
    }
}
