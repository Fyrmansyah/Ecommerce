<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaction;

class TransactionController extends Controller
{
    public function index(){
        $datas = transaction::with('cart.produk')->get();
        return view('user.transaction', compact('datas'));
    }

    
}
