<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\produk;
use App\Models\transaction;

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

        for ($i=1; $i <= 10; $i++) { 
            Category::create([
                'nama'=> "category".$i,
                'deskripsi'=> "Lorem Ipsum is simply dummy text of the simply dummy text of the prin",
                'foto'=> "post-images/YU5m3USW54iI4qReKRGUZu0IJJ4h5IMk5dMRZNXX.jpg",
                'status'=> 0
            ]);
        }

        for ($i=1; $i <= 10; $i++) { 
            produk::create([
                'category_id'=> $i,
                'image'=> "1667646475_IMG-20210526-WA0068.jpg",
                'nama'=> "produk".$i,
                'harga'=> 10000 * $i,
                'stok'=> 12,
                'deskripsi'=> "Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima consequuntur temporibus obcaecati, mollitia optio voluptatibus?",
                'keterangan'=> "kelas 12",
                'status'=> 0
            ]); 
        }

        
        // post-images/sF96fFDRdxNBJtt3s41LYK3Mnu2qqM8G7IgArfxN.jpg
    }
}
