<?php

namespace App\Http\GraphQL\Mutations;

use App\Services\UserService;

class UserStore extends Store
{

    public function __construct(UserService $service)
    {
        parent::__construct($service);
    }
}
