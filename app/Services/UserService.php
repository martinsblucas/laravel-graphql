<?php


namespace App\Services;

use App\Interfaces\UserInterface;

class UserService extends BaseService
{
    public function __construct(UserInterface $repository)
    {
        parent::__construct($repository);
    }
}
