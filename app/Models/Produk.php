<?php

namespace App\Models;
use App\Http\Controller\Admin\ProdukController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';

    protected $fillable = [

        'category_id',
        'nama',
        'keterangan',
        'harga',
        'stok',
        'deskripsi',
        'status',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function cart(){
        return $this->hasMany(cart::class);
    }
   
}
