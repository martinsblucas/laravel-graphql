<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Pagination\LengthAwarePaginator;

class UserTest extends TestCase
{

    use WithFaker;

    public function testFind()
    {
        $response = User::findOrFail(1);
        $this->assertNotNull($response->getAttribute('email'));
    }

    public function testWhereIdFirst()
    {
        $response = User::where('id', '=', 1)->first(['name', 'email']);
        $this->assertNotNull($response->getAttribute('email'));
    }

    public function testAll()
    {
        $User = new User();
        $this->assertIsObject($User->all());
    }

    public function testPaginate()
    {
        $User = new User();
        $response = $User->paginate(10, ['*'], 'page', 5);
        $this->assertIsObject($response);
    }

    public function testCreate()
    {
        $User = new User();
        $created = $User->create([
            'name' => $this->faker->name(true),
            'email' => $this->faker->email,
            'password' => $this->faker->password
        ]);

        $this->assertIsInt($created->id);
    }

    public function testDestroy()
    {
        $User = new User();
        $created = $User->create([
            'name' => $this->faker->name(true),
            'email' => $this->faker->email,
            'password' => $this->faker->password
        ]);

        $this->assertIsInt($User->destroy($created->id));
    }

    public function testOnlyTrashed()
    {
        $this->assertIsObject(User::onlyTrashed());
    }

    public function testAuthTrue()
    {
        $this->assertTrue(
            Auth::attempt([
                'email' => 'lucasmartins.av@gmail.com',
                'password' => 'TestSeeder'
            ])
        );
    }

    public function testAuthFalse()
    {
        $this->assertFalse(
            Auth::attempt([
                'email' => 'lucasmartins.av@gmail.com',
                'password' => 'senhaIncorreta'
            ])
        );
    }
}
