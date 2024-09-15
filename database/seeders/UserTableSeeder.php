<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
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
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('123456'),
                'role_id' => 1,
            ],
            [
                'name' => 'Admin User',
                'email' => 'adminuser@gmail.com',
                'password' => Hash::make('123456'),
                'role_id' => 2,
            ],
            [
                'name' => 'Regular User',
                'email' => 'regularuser@gmail.com',
                'password' => Hash::make('123456'),
                'role_id' => 3,
            ],
        ];

        User:: truncate();
        DB::table('users')->insert($users);
    }
}