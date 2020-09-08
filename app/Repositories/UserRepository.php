<?php


namespace App\Repositories;
use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class UserRepository extends BaseRepository implements UserInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function auth(string $email, string $password)
    {
        $user = $this->model->where('email', $email)->firstOrFail();

        if (Hash::check($password, $user->password)) {

            $user->api_token = '';

            $user->save();

            return $user->api_token;
        }

        throw new UnauthorizedHttpException('Unauthorized');
    }
}
