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
    public function transindex(){
        return view('admin.transaksi.transindex');
    }

    public function adminindex()
    {
        $data = transaction::get();
        // $data = array('title' => 'Data Transaksi');
        $datas = transaction::with('cart.produk', 'user')->get(); 
        // return $datas;
        return view('admin.transaksi.transindex',compact('datas'));

    }

}
