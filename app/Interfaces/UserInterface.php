<?php


namespace App\Interfaces;

interface UserInterface
{
    public function show(int $id) : object;

    public function store(array $data) : object;

    public function paginate(int $itemsPerPage, array $fields, string $pageName, int $currentPage) : object;
}
