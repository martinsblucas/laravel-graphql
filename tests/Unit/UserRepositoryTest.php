<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\UserRepository;

class UserRepositoryTest extends TestCase
{

    use WithFaker;

    public function testShow()
    {
        $UserRepository = new UserRepository(new User());
        $show = $UserRepository->show(1);
        $this->assertIsObject($show);
    }

    public function testStore()
    {
        $UserRepository = new UserRepository(new User());

        $created = $UserRepository->store([
            'name' => $this->faker->name(true),
            'email' => $this->faker->email,
            'password' => $this->faker->password
        ]);

        $this->assertIsObject($created);
    }

    public function testPaginate()
    {
        $UserRepository = new UserRepository(new User());

        $this->assertIsObject($UserRepository->paginate());
    }
}
