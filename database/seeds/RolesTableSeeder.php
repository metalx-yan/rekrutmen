<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['administrator', 'hrd','direktur'];

        foreach ($roles as $role) {
            App\Role::create([
                'name' => $role
            ]);
        }
    }
}
