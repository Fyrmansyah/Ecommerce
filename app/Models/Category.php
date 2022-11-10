<?php

namespace App\Models;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table ='category';

    protected $fillable=[
        'nama',
        'deskripsi',
        'foto',
        'status',
        

    ];

    public function produk(){
        return $this->hasMany(produk::class);
    }

}
