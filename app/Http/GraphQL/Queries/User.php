<?php

namespace App\Http\GraphQL\Queries;

use App\Services\UserService;

class User extends Show
{
    public function __construct(UserService $service)
    {
        parent::__construct($service);
    }
}
