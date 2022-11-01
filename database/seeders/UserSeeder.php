<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'role_as' => 1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'user',
            'role_as' => 0,
            'email' => 'user@gmail.com',
            'password' => Hash::make('password')
        ]);

        Category::create([
            'nama'=> "lukman sholeh",
            'deskripsi'=> "Lorem Ipsum is simply dummy text of the simply dummy text of the prin",
            'harga'=> 20000,
            'stok' => 12,
            'foto'=> "post-images/sF96fFDRdxNBJtt3s41LYK3Mnu2qqM8G7IgArfxN.jpg",
            'status'=> 0
        ]);

        Category::create([
            'nama'=> "Asmuin",
            'deskripsi'=> "Lorem Ipsum is simply dummy text of the simply dummy text of the prin",
            'harga'=> 20000,
            'stok' => 12,
            'foto'=> "post-images/atOCcR26xoRsTgXdXjvMJo0RebsRhdjMxPduyKCx.jpg",
            'status'=> 0
        ]);
        
        Category::create([
            'nama'=> "mukhamad syaifullah",
            'deskripsi'=> "Lorem Ipsum is simply dummy text of the simply dummy text of the prin",
            'harga'=> 20000,
            'stok' => 12,
            'foto'=> "post-images/opHZCwVSJ7AzCKdRPpWNTnf0Chp1uu73iAHoHCqO.jpg",
            'status'=> 0
        ]);

        Category::create([
            'nama'=> "mochamad arsyad",
            'deskripsi'=> "Lorem Ipsum is simply dummy text of the simply dummy text of the prin",
            'harga'=> 20000,
            'stok' => 12,
            'foto'=> "post-images/2kLyUjXg0RllSsUMNvKZ5B2CNv27sguIu4AB5qM3.jpg",
            'status'=> 0
        ]);

        // post-images/sF96fFDRdxNBJtt3s41LYK3Mnu2qqM8G7IgArfxN.jpg
    }
}
