<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'SuperUser',
                'email' => 'superuser@test.com',
                'role' => 'superuser',
                'password' => bcrypt('superuser')
            ],
            [
                'name' => 'sales',
                'email' => 'sales@test.com',
                'role' => 'sales',
                'password' => bcrypt('sales')
            ],
            [
                'name' => 'Purchase',
                'email' => 'purchase@test.com',
                'role' => 'purchase',
                'password' => bcrypt('purchase')
            ],
            [
                'name' => 'Manager',
                'email' => 'manager@test.com',
                'role' => 'manager',
                'password' => bcrypt('manager')
            ],
            [
                'name' => 'user',
                'email' => 'user@test.com',
                'role' => 'user',
                'password' => bcrypt('user')
            ],
        ]);
    }
}
