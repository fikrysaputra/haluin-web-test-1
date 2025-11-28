<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\MenuCMS;
use App\Models\RoleMenuCMS;
use App\Models\Artist;
use App\Models\Event;
use App\Models\Tickets;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // ===== ROLE =====
        $adminRole = Role::create([
            'name' => 'Administrator',
            'description' => 'Role Administrator'
        ]);

        $userRole = Role::create([
            'name' => 'User Normal',
            'description' => 'Role User Normal'
        ]);

        // ===== USERS =====
        $users = [
            [
                'name' => 'Muhammad Ilham Ferdiansyah',
                'username' => 'ilhamferdx',
                'email' => 'ilhamferdiansyah737@gmail.com',
                'password' => bcrypt('password123'),
                'gender' => 'male', // <-- gender male
            ],
            [
                'name' => 'Fikry Admin',
                'username' => 'fikryadmin',
                'email' => 'fikrysaputran28@gmail.com',
                'password' => bcrypt('password123'),
                'gender' => 'male',
            ],
            [
                'name' => 'Fikry Users',
                'username' => 'fikryusers',
                'email' => 'fikrysaputra0@gmail.com',
                'password' => bcrypt('qwerty123'),
                'gender' => 'male',
            ],
        ];

        foreach ($users as $user) {
            User::create(array_merge($user, [
                'role_id' => $adminRole->id,
                'is_active' => 1,
                'email_verified_at' => now()
            ]));
        }

        // ===== MENU CMS =====
        $menus = [
            ['main_id' => 0, 'name' => 'Dashboard', 'description' => 'Halaman Dashboard dari Home', 'orderno' => 1, 'link' => 'dashboard', 'icon' => 'ti ti-dashboard', 'published' => 1],
            ['main_id' => 0, 'name' => 'Setup Utilities', 'description' => 'Halaman Induk Setup Utilities', 'orderno' => 2, 'link' => 'setup', 'icon' => 'ti ti-key', 'published' => 1],
            ['main_id' => 2, 'name' => 'Setup Roles', 'description' => 'Halaman Setup Roles dari Setup Utilities', 'orderno' => 1, 'link' => 'setup.roles', 'icon' => 'ti ti-key', 'published' => 1],
            ['main_id' => 2, 'name' => 'Setup Menu CMS', 'description' => 'Halaman Setup Menu dari Setup Utilities', 'orderno' => 2, 'link' => 'setup.menu-cms', 'icon' => 'ti ti-menu', 'published' => 1],
            ['main_id' => 2, 'name' => 'Setup Role Menu CMS', 'description' => 'Halaman Setup Role Menu dari Setup Utilities', 'orderno' => 3, 'link' => 'setup.rolemenus', 'icon' => 'ti ti-menu', 'published' => 1],
            ['main_id' => 2, 'name' => 'Setup User CMS', 'description' => 'Halaman Setup User dari Setup Utilities', 'orderno' => 4, 'link' => 'setup.user-cms', 'icon' => 'ti ti-user', 'published' => 1],
        ];

        foreach ($menus as $menu) {
            MenuCMS::create($menu);
        }

        // ===== ROLE MENU CMS =====
        foreach (range(1,6) as $menuId) {
            RoleMenuCMS::create([
                'role_id' => $adminRole->id,
                'menu_id' => $menuId
            ]);
        }

        // ===== ARTISTS =====
        $artistNames = [
            'Ustadz Ahmad', 'Ustadzah Fatimah',
            'Ustadz Yusuf', 'Ustadzah Aisyah',
            'Ustadz Bilal', 'Ustadzah Khadijah',
            'Ustadz Hasan', 'Ustadzah Maryam'
        ];

        $artistModels = [];
        foreach ($artistNames as $name) {
            $artistModels[] = Artist::create(['name' => $name]);
        }

        // ===== EVENTS =====
        $eventsData = [
            ['name' => 'Pengajian Jumat Berkah', 'description' => 'Pengajian rutin Jumat malam di Masjid Al-Ikhlas', 'location' => 'Masjid Al-Ikhlas, Jakarta', 'start_date' => now()->addDays(5), 'end_date' => now()->addDays(5)->addHours(2), 'poster' => 'poster1.jpg', 'thumbnail' => 'thumb1.jpg'],
            ['name' => 'Kajian Tafsir Al-Quran', 'description' => 'Kajian tafsir Al-Quran oleh Ustadz ternama', 'location' => 'Masjid Al-Hikmah, Bandung', 'start_date' => now()->addDays(10), 'end_date' => now()->addDays(10)->addHours(3), 'poster' => 'poster2.jpg', 'thumbnail' => 'thumb2.jpg'],
            ['name' => 'Workshop Akhlak Islami', 'description' => 'Workshop tentang akhlak dan perilaku Islami', 'location' => 'Masjid Al-Falah, Surabaya', 'start_date' => now()->addDays(15), 'end_date' => now()->addDays(15)->addHours(4), 'poster' => 'poster3.jpg', 'thumbnail' => 'thumb3.jpg'],
            ['name' => 'Ceramah Inspiratif Ramadan', 'description' => 'Ceramah inspiratif menyambut Ramadan', 'location' => 'Masjid Al-Muhajirin, Yogyakarta', 'start_date' => now()->addDays(20), 'end_date' => now()->addDays(20)->addHours(2), 'poster' => 'poster4.jpg', 'thumbnail' => 'thumb4.jpg'],
        ];

        foreach ($eventsData as $index => $data) {
            $event = Event::create(array_merge($data, [
                'quota_reguler' => 100,
                'quota_vip' => 50,
            ]));

            // Attach 2 artists per event
            $artistStartIndex = $index * 2;
            $event->artists()->attach([
                $artistModels[$artistStartIndex]->id,
                $artistModels[$artistStartIndex + 1]->id
            ]);

            // Buat tiket VIP & Reguler di tabel 'ticket'
            Tickets::create([
                'event_id' => $event->id,
                'type' => 'VIP',
                'price' => 200_000 + ($index * 50_000),
                'quota' => 50
            ]);

            Tickets::create([
                'event_id' => $event->id,
                'type' => 'Reguler',
                'price' => 100_000 + ($index * 25_000),
                'quota' => 100
            ]);
        }
    }
}