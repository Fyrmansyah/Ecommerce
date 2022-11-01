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
<<<<<<< HEAD

    public function cart(){
        return $this->hasMany(cart::class);
    }

=======
    public function produks()
    {
        return $this->hasMany(Produk::class,'category_id', 'id');
    }
>>>>>>> dfd032d2cb9e9d57e9133aadf9224ad4194c8301
}
