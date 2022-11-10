<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $guarded=[
        'id'
    ];

    public function produk(){
        return $this->belongsTo(produk::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }

    public function transaction(){
        return $this->hasMany(transaction::class);
    }
}
