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

        Category::create([
            'nama'=> "category1",
            'deskripsi'=> "Lorem Ipsum is simply dummy text of the simply dummy text of the prin",
            'foto'=> "post-images/sF96fFDRdxNBJtt3s41LYK3Mnu2qqM8G7IgArfxN.jpg",
            'status'=> 0
        ]);

        Category::create([
            'nama'=> "category2",
            'deskripsi'=> "Lorem Ipsum is simply dummy text of the simply dummy text of the prin",
            'foto'=> "post-images/sF96fFDRdxNBJtt3s41LYK3Mnu2qqM8G7IgArfxN.jpg",
            'status'=> 0
        ]);

        produk::create([
            'category_id'=> 1,
            'image'=> "1667646475_IMG-20210526-WA0068.jpg",
            'nama'=> "produk1",
            'harga'=> 12000,
            'stok'=> 12,
            'deskripsi'=> "Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima consequuntur temporibus obcaecati, mollitia optio voluptatibus?",
            'keterangan'=> "kelas 12",
            'status'=> 0
        ]); 

        produk::create([
            'category_id'=> 1,
            'image'=> "1667646475_IMG-20210526-WA0068.jpg",
            'nama'=> "produk2",
            'harga'=> 12000,
            'stok'=> 12,
            'deskripsi'=> "Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima consequuntur temporibus obcaecati, mollitia optio voluptatibus?",
            'keterangan'=> "kelas 12",
            'status'=> 0
        ]); 
        produk::create([
            'category_id'=> 2,
            'image'=> "1667646475_IMG-20210526-WA0068.jpg",
            'nama'=> "produk3",
            'harga'=> 12000,
            'stok'=> 12,
            'deskripsi'=> "Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima consequuntur temporibus obcaecati, mollitia optio voluptatibus?",
            'keterangan'=> "kelas 12",
            'status'=> 0
        ]); 

        // transaction::create([
        //     'cart_id'=> 1,
        //     'user_id'=> 2,
        //     'status'=> 1
        // ]);  
        
        // post-images/sF96fFDRdxNBJtt3s41LYK3Mnu2qqM8G7IgArfxN.jpg
    }
}
