<?php


namespace App\Interfaces;

interface BaseInterface
{
    public function show(int $id, array $fields) : object;

    public function store(array $data) : object;

    public function paginate(int $itemsPerPage, array $fields, string $pageName, int $currentPage) : object;
}
