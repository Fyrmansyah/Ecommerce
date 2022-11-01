<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'admin',
            'role_as' => 1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'name' => 'user',
            'role_as' => 0,
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
