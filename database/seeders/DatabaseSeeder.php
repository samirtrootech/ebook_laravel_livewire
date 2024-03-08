<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Roles::insert([
            ["name" => 'admin'],
            ["name" => 'user']
        ]);

        \App\Models\User::create([
            'role_id' => \App\Models\Roles::where('name', 'admin')->first()->id,
            'firstName' => 'Admin',
            'lastName' => 'Books',
            'email' => 'admin.example@mail.com',
            'password' => Hash::make('password'),
            "profileImage" => "https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg"
        ]);

        \App\Models\User::create([
            'role_id' => \App\Models\Roles::where('name', 'user')->first()->id,
            'firstName' => 'User',
            'lastName' => 'Books',
            'email' => 'user.example@mail.com',
            'password' => Hash::make('password'),
            "profileImage" => "https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg"
        ]);

        \App\Models\Books::factory(100)->create();
    }
}
