<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaction;
use App\Models\cart;
use App\Models\order;
use App\Models\order_detail;

class TransactionController extends Controller
{
    public function index(){
        // return order::with('produk', 'order_details')->get();
        $datas = order_detail::with('order', 'order.produk')->get();
        // $trans = transaction::where('user_id', auth()->user()->id)->get();
        // foreach ($trans as $key) {
        //     $cartId = $key;
        // }
            // return $datas;
        // $datas = cart::whereIn('id', $cartId->barang)->where('user_id', auth()->user()->id)->with('produk')->get();
        
        // $cartId->barang = $datas;
        // // return $cartId;

        return view('user.transaction', compact('datas'));
    }

    public function uploadImg(){
        order_detail::where('id', request()->id)->update([
            'bukti_img' => request()->file('bukti')->store('bukti-img', 'public'),
            'status' => 4
        ]);

        return redirect()->back();
    }

    
}
