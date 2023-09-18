<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaction;
use App\Models\cart;
use App\Models\order;
use App\Models\order_detail;

class TransactionController extends Controller
{
    // =====================
    // ===== USER PAGE =====
    // =====================

    public function index(){
        // return order::with('produk', 'order_details')->get();
        $datas = order_detail::with('order', 'order.produk')->latest()->paginate(3);
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

    // =====================
    // == DASHBOARD ADMIN ==
    // =====================

    public function masterAdm(){
        $datas = order_detail::with('User', 'order.produk')->get();
        // return $datas;
        return view('admin.transaksi.masterTransaksi', compact('datas'));        
    }

    public function buktiAdm(){
        $datas = order_detail::where('status', 4)->with('User', 'order.produk')->get();
        return view('admin.transaksi.buktiTransaksi', compact('datas'));    
    }

    public function prosesAdm(){
        $datas = order_detail::where('status', 2)->with('User', 'order.produk')->get();
        return view('admin.transaksi.prosesTransaksi', compact('datas'));    
    }

    public function riwayatAdm(){
        $datas = order_detail::where('status',3)->with('User', 'order.produk')->get();
        return view('admin.transaksi.riwayatTransaksi', compact('datas'));    
    }

    public function cancelTrans($id){
        // return $id;
        order_detail::where('id', $id)->update([
            'status' => 2
        ]);
        return redirect()->back();
    }
    
    public function completeTrans($id){
        // return $id;
        order_detail::where('id', $id)->update([
            'status' => 3
        ]);
        return redirect()->back();
    }
    
}
