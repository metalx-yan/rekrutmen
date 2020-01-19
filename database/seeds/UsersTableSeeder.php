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
            'name' => 'hrd',
            'username' => 'hrd',
            'password' => 'user',
            'role_id' => 1
        ]);

        App\User::create([
            'name' => 'direktur',
            'username' => 'direktur',
            'password' => 'user',
            'role_id' => 2
        ]);
    }
}
