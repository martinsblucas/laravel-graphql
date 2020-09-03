<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{

    use WithFaker;

    public function testFind()
    {
        $response = User::findOrFail(1);
        $this->assertNotNull($response->getAttribute('email'));
    }

    /**
     * @return void
     */
    public function testAll()
    {
        $User = new User();
        $this->assertIsObject($User->all());
    }

    /**
     * @return void
     */
    public function testCreate()
    {
        $User = new User();
        $created = $User->create([
            'name' => $this->faker->name(true),
            'email' => $this->faker->email,
            'password' => Hash::make($this->faker->password)
        ]);

        $this->assertIsInt($created->id);
    }

    /**
     * @return void
     */
    public function testDestroy()
    {
        $User = new User();
        $created = $User->create([
            'name' => $this->faker->name(true),
            'email' => $this->faker->email,
            'password' => Hash::make($this->faker->password)
        ]);

        $this->assertIsInt($User->destroy($created->id));
    }

    /**
     * @return void
     */
    public function testOnlyTrashed()
    {
        $this->assertIsObject(User::onlyTrashed());
    }

    /**
     * @return void
     */
    public function testAuthTrue()
    {
        $this->assertTrue(
            Auth::attempt([
                'email' => 'lucasmartins.av@gmail.com',
                'password' => 'TestSeeder'
            ])
        );
    }

    /**
     * @return void
     */
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
