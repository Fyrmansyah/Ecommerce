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
<<<<<<< HEAD
        $this->call([
            UserSeeder::class
       ]);
=======
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
>>>>>>> dfd032d2cb9e9d57e9133aadf9224ad4194c8301
    }
}
