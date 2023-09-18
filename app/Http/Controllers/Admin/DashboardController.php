<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Produk;
use App\Models\order_detail;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // $Category = Category::all()->count();
        $Produk_habis = Produk::where('stok', '<', 1)->count();
        $datas = order_detail::with('User', 'order.produk')->limit(3)->get();
        $terjual = order_detail::where('status', 3)->get();
        $terselesaikan = $terjual->count();
        $pengguna = User::count();

        // return $Produk_habis;
        $total = 0;
        foreach ($terjual as $val) {
            $total += $val->total;
        }

        return view('admin.dashboard', compact('Produk_habis', 'pengguna', 'datas', 'total' ,'terselesaikan'));

    }
}
