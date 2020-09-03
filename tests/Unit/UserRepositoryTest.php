<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

use App\Repositories\UserRepository;

class UserRepositoryTest extends TestCase
{

    use WithFaker;

    public function testShow()
    {
        $User = new UserRepository(new User());
        $show = $User->show(1);
        $this->assertIsObject($show);
    }

    public function testStore()
    {
        $User = new UserRepository(new User());

        $created = $User->store([
            'name' => $this->faker->name(true),
            'email' => $this->faker->email,
            'password' => Hash::make($this->faker->password)
        ]);

        $this->assertIsObject($created);
    }
}
