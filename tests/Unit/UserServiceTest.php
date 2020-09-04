<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\UserRepository;
use App\Services\UserService;

class UserServiceTest extends TestCase
{

    use WithFaker;

    public function testShow()
    {
        $UserService = new UserService(new UserRepository(new User()));
        $show = $UserService->show(1);
        $this->assertIsObject($show);
    }

    public function testStore()
    {
        $UserService = new UserService(new UserRepository(new User()));

        $created = $UserService->store([
            'name' => $this->faker->name(true),
            'email' => $this->faker->email,
            'password' => $this->faker->password
        ]);

        $this->assertIsObject($created);
    }

    public function testPaginate()
    {
        $UserService = new UserService(new UserRepository(new User()));

        $this->assertIsObject($UserService->paginate());
    }
}
