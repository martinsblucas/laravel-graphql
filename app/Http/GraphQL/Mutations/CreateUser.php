<?php

namespace App\Http\GraphQL\Mutations;

use App\Repositories\UserRepository;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Hash;

class CreateUser
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($rootValue, array $args, $context, ResolveInfo $resolveInfo)
    {
        // TODO implement the resolver
        return $this->repository->store([
            "name" => $args["input"]["name"],
            "email" => $args["input"]["email"],
            "password" => Hash::make($args["input"]["password"]),
        ]);
    }
}
