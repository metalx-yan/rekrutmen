<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'administrator',
            'username' => 'administrator',
            'password' => 'user',
            'role_id' => 1
        ]);
    }
}
