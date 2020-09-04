<?php

namespace App\Http\GraphQL\Queries;

use GraphQL\Type\Definition\ResolveInfo;
use App\Repositories\UserRepository;

class User
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($rootValue, array $args, $context, ResolveInfo $resolveInfo)
    {
        // TODO implement the resolver
        return $this->repository->show($args["id"]);
    }
}
