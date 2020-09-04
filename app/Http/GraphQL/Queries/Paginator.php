<?php

namespace App\Http\GraphQL\Queries;

use App\Services\BaseService;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

abstract class Paginator
{
    protected $service;

    public function __construct(BaseService $service)
    {
        $this->service = $service;
    }

    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {

        $fields = $resolveInfo->getFieldSelection(1);
        $requestData = (isset($fields['data']) and is_array($fields['data'])) ? array_keys($fields['data']) : [];
        $paginate = $this->service->paginate($args['first'], $requestData, 'page', $args['page']);

        $data['data'] = $paginate->items();

        if(isset($fields['paginatorInfo']) and is_array($fields['paginatorInfo'])) {
            $paginatorInfo = $fields['paginatorInfo'];

            if (isset($paginatorInfo['count']))
                $data['paginatorInfo']['count'] = $paginate->count();

            if (isset($paginatorInfo['currentPage']))
                $data['paginatorInfo']['currentPage'] = $paginate->currentPage();

            if (isset($paginatorInfo['firstItem']))
                $data['paginatorInfo']['firstItem'] = $paginate->firstItem();

            if (isset($paginatorInfo['hasMorePages']))
                $data['paginatorInfo']['hasMorePages'] = $paginate->hasMorePages();

            if (isset($paginatorInfo['lastItem']))
                $data['paginatorInfo']['lastItem'] = $paginate->lastItem();

            if (isset($paginatorInfo['lastPage']))
                $data['paginatorInfo']['lastPage'] = $paginate->lastPage();

            if (isset($paginatorInfo['perPage']))
                $data['paginatorInfo']['perPage'] = $paginate->perPage();

            if (isset($paginatorInfo['total']))
                $data['paginatorInfo']['total'] = $paginate->total();
        }

        return $data;
    }
}
