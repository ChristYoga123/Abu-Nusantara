<?php

namespace Database\Seeders;

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
        $users = [
            [
                'name' => 'Super Admin Yoga',
                'email' => 'superadmin@gmail.com',
                'phone' => '082230555413',
                'password' => bcrypt('ayamungkep'),
                'avatar' => 'default.png',
                'role_id' => 1,

            ],
            [
                'name' => 'Admin Ester',
                'email' => 'adminester@gmail.com',
                'phone' => '085893288061',
                'password' => bcrypt('ayamungkep'),
                'avatar' => 'default.png',
                'role_id' => 2,
            ],
            [
                'name' => 'Admin Eta',
                'email' => 'admineta@gmail.com',
                'phone' => '081376350461',
                'password' => bcrypt('ayamungkep'),
                'avatar' => 'default.png',
                'role_id' => 2,
            ]
        ];

        foreach($users as $user) {
            User::create($user);
        }
        
    }
}
