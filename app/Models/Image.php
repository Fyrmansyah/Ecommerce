<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function produk()
    {
        return $this->belongsToMany(Produk::class,'produk_image', 'id');
    }
}
