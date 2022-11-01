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

    public function image()
    {
        return $this->belongsToMany(Image::class,'produk_image', 'id');
    }
   
}
