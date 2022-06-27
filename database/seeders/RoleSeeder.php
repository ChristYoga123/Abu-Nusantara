<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'role_name' => 'Super Admin',
                'role_description' => 'Super Admin untuk website Abu Nusantara',
            ],
            [
                'role_name' => 'Admin',
                'role_description' => 'Admin untuk website Abu Nusantara',
            ],
            [
                'role_name' => 'User',
                'role_description' => 'User untuk website Abu Nusantara',
            ],
        ];

        foreach($roles as $role) {
            Role::create($role);
        }
    }
}
