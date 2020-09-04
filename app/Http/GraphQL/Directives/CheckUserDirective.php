<?php


namespace App\Http\GraphQL\Directives;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Schema\Directives\BaseDirective;
use Nuwave\Lighthouse\Schema\Values\FieldValue;
use Nuwave\Lighthouse\Support\Contracts\FieldMiddleware;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class CheckUserDirective extends BaseDirective implements FieldMiddleware
{
    public static function definition(): string
    {
        return /** @lang GraphQL */ <<<'SDL'
            directive @checkUser(
              userLevel: Int!
            ) on FIELD_DEFINITION
            SDL;
    }

    public function handleField(FieldValue $fieldValue, Closure $next)
    {
        $previousResolver = $fieldValue->getResolver();

        //https://github.com/nuwave/lighthouse/blob/b73a6f62eda4f6e002afaa0df73a4b62498bf832/src/Schema/Directives/CanDirective.php#L91

        return $next(
            $fieldValue->setResolver(
                function ($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo) use ($previousResolver) {
                    $userLevel = $this->directiveArgValue('userLevel');

                    if ($userLevel) {
                        var_dump("oi");
                        exit;
                    }

                    return $previousResolver($root, $args, $context, $resolveInfo);
                }
            )
        );
    }
}
