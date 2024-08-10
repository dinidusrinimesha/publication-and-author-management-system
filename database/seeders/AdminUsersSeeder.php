<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            [
                'first_name' => 'Admin',
                'last_name' => 'User 1',
                'role' => User::USER_ROLE_ADMIN,
                'dob' => '2000-04-18',
                'gender' => 'male',
                'contact_number' => '0711231231',
                'city' => 'Pannipitiya',
                'email' => 'admin1@test.com',
                'password' => Hash::make('admin2003'),
            ],

            [
                'first_name' => 'Admin',
                'last_name' => 'User 2',
                'role' => User::USER_ROLE_ADMIN,
                'dob' => '2003-08-22',
                'gender' => 'male',
                'contact_number' => '0112123123',
                'city' => 'Kottawa',
                'email' => 'admin2@test.com',
                'password' => Hash::make('admin2003'),
            ]

        ];

        DB::table('users')->insert($admin);
    }
}
