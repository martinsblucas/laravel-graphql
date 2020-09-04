<?php

namespace App\Http\GraphQL\Queries;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use App\Services\BaseService;

abstract class Show
{
    protected $service;

    public function __construct(BaseService $service)
    {
        $this->service = $service;
    }

    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        // TODO implement the resolver
        return $this->service->show($args["id"], array_keys($resolveInfo->getFieldSelection()));
    }
}
