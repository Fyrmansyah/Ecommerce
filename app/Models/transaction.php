<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $guarder = ['id'];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function cart(){
        return $this->belongsTo(cart::class);
    }
}
