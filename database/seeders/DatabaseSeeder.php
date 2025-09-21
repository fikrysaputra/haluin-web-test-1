<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name'      => 'Muhammad Ilham Ferdiansyah',
            'role_id'   => 1,
            'username'  => 'ilhamferdx',
            'email'     => 'ilhamferdiansyah737@gmail.com',
            'password'  => bcrypt('password123'),
            'is_active' => 1,
            'email_verified_at' => now()
        ]);
    }
}
