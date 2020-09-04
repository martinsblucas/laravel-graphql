<?php

namespace App\Http\GraphQL\Mutations;

use App\Services\BaseService;
use GraphQL\Type\Definition\ResolveInfo;

abstract class Store
{
    protected $service;

    public function __construct(BaseService $service)
    {
        $this->service = $service;
    }

    public function __invoke($rootValue, array $args, $context, ResolveInfo $resolveInfo)
    {
        // TODO implement the resolver
        return $this->service->store($args["input"]);
    }
}
