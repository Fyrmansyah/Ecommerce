<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Produk;
use App\Models\order;
use App\Models\order_detail;
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

    public function addTrans(){

        // return request()->post('total');

        order_detail::create([
            'user_id' => Auth::user()->id,
            'status' => 1,
            'total' => request()->post('total')
        ]);

        $order = order_detail::latest()->first();
        // return $order->id;
        foreach (request()->cartId as $key => $loop) {
            // echo $loop;
            // echo request()->qty[$key];
            order::create([
                'produk_id' => $loop,
                'order_details_id' =>  $order->id,
                'jumlah' => request()->qty[$key]
            ]); 
        }
        

        return response()->json([
            "success" => true,
            "message" => 'barang berhasil di check out'
        ]);
    }

    public function updateQty(){

        // return request();
        cart::where('produk_id', request()->id)->update([
            'jumlah' => request()->qty
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'qty barang berhasil di update'
        ]);
    }

    public function deleteCart($id){
        cart::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'cart barang berhasil di hapus'
        ]);
    }


}
