<?php

namespace App\Http\GraphQL\Queries;

use App\Services\UserService;

class Users extends Paginator
{
    public function __construct(UserService $service)
    {
        parent::__construct($service);
    }
}
