<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'username'               => 'Admin',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified_at'        => '2021-04-22 03:05:06',
                'verification_token' => '',
            ],
        ];

        User::insert($users);
    }
}
