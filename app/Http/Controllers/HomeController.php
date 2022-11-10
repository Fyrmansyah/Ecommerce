<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Produk;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $cart = cart::where("user_id", Auth::user()->id)->count();
        // return $cart;
        $categories = category::get();
        $produks = produk::get();
        // return $categories;
        return view('user.home', compact("categories", 'produks'));
    }

    public function getCategory()
    {
        return response()->json(category::get());
    }

    public function detail($id)
    {
        $data = produk::find($id);
        // return $data;
        return view('user.detail', compact("data"));
    }

    public function cart()
    {
        
        $data = cart::where("user_id", Auth::user()->id)->with("produk")->get();
        // return $data;
        return view('user.cart', compact("data"));
    }

    public function getCart()
    {
        $cart = cart::where("user_id", Auth::user()->id)->count();
        return $cart;
    }

    public function addCart(Request $request)
    {
        // $data = category::find($id);
        $existCart = cart::where("user_id", $request->userId)->where("produk_id" , $request->categoryId)->count();
        if($existCart >= 1){
            cart::where("user_id", $request->userId)->where("produk_id" , $request->categoryId)
            ->update([
                "user_id" => $request->userId,
                "produk_id" => $request->categoryId ,
                "jumlah"=> $request->jumlah
            ]);
        } else {

            cart::create([
                "user_id" => $request->userId,
                "produk_id" => $request->categoryId ,
                "jumlah"=> $request->jumlah
            ]);
        }

        return response()->json([
            "success" => true,
            "message" => "barang berhasil ditambahkan ke keranjang"
        ]);
    }
}
