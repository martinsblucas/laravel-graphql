<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $User = new User;

        $User->create([
            'name' => 'Lucas Martins Barroso',
            'email' => 'lucasmartins.av@gmail.com',
            'password' => 'TestSeeder',
        ]);
    }
}
