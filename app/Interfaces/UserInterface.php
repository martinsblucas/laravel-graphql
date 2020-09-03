<?php


namespace App\Interfaces;

interface UserInterface
{
    public function show(int $id) : object;

    public function store (array $data) : object;
}
