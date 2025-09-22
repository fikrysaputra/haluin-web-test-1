<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\MenuCMS;
use App\Models\Role;
use App\Models\RoleMenuCMS;
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

        
        Role::create([
            'name'        => 'Administrator',
            'description' => 'Role Administrator'
        ]);
        Role::create([
            'name'        => 'User Normal',
            'description' => 'Role User Normal'
        ]);

        User::create([
            'name'      => 'Muhammad Ilham Ferdiansyah',
            'role_id'   => 1,
            'username'  => 'ilhamferdx',
            'email'     => 'ilhamferdiansyah737@gmail.com',
            'password'  => bcrypt('password123'),
            'is_active' => 1,
            'email_verified_at' => now()
        ]);

        MenuCMS::create([
            'main_id' => 0,
            'name' => 'Dashboard',
            'description' => 'Halaman Dashboard dari Home',
            'orderno' => 1,
            'link' => '/dashboard',
            'icon' => '<x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />',
            'published' => '1',
        ]);
        MenuCMS::create([
            'main_id' => 0,
            'name' => 'Setup Utilities',
            'description' => 'Halaman Induk Setup Utilities',
            'orderno' => 2,
            'published' => '1',
        ]);
        MenuCMS::create([
            'main_id' => 2,
            'name' => 'Setup Roles',
            'description' => 'Halaman Setup Roles dari Setup Utilities',
            'orderno' => 1,
            'link' => '/setup/roles',
            'icon' => 'ti ti-key',
            'published' => '1',
        ]);
        MenuCMS::create([
            'main_id' => 2,
            'name' => 'Setup Menu CMS',
            'description' => 'Halaman Setup Menu dari Setup Utilities',
            'orderno' => 2,
            'link' => '/setup/menu-cms',
            'icon' => 'ti ti-menu',
            'published' => '1',
        ]);

        RoleMenuCMS::create([
            'role_id' => '1',
            'menu_id' => '1'
        ]);
        RoleMenuCMS::create([
            'role_id' => '1',
            'menu_id' => '2'
        ]);
        RoleMenuCMS::create([
            'role_id' => '1',
            'menu_id' => '3'
        ]);
        RoleMenuCMS::create([
            'role_id' => '1',
            'menu_id' => '4'
        ]);
    }
}
