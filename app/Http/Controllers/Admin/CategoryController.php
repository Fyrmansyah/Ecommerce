<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // ================================================================================
    // ================================== FOR USER ====================================
    // ================================================================================

    public function indexUser()
    {
        $categories = Category::get();
        return view('user.category', compact('categories'));
    }

    public function getAllProducts()
    {
        return response()->json(produk::get()); 
    }

    public function search()
    {
        if(request()->has('val')){
            $categories = produk::where('nama', 'LIKE', '%'.request()->get('val').'%')->get();
        }else{
            $categories = produk::get();
        }
        $html = view('user.search', compact('categories'))->render();
        return response()->json([
            'success' => true,
            'html' => $html
        ], 200);
    }
    
    public function filter($id, Request $request)
    {
        // return $request;

        foreach ($request->valueFilter as $item) {
            $data[] = $item;
        }

        // return $data;
        $produks = produk::whereIn('category_id', $data)->get();

        return response()->json([
            "data" => $produks,
            "success" => true,
            "message" => "barang berhasil ditambahkan ke keranjang"
        ]);
    }













    // ================================================================================
    // ================================== FOR ADMIN ===================================
    // ================================================================================

    public function index()
    {
        // return "k";
        return view('admin.category.index');
    }
    
    public function create()
    {
        return view('admin.category.create');
    }


    public function toko(Request $request)
    {
        // $validatedData = $request->validated();
        // return $request;
        $message=[
            'required' => ':attribute harus di isi!',
            'min' => ':attribute minimal :min karakter!',
            'max' => ':attribute maksimal :max karakter!',
            'numeric' => ':attribute harus di isi dengan angka',
            'mimes' => ':attribute harus di bertipe mimes: jpg,png,jpeg',
            

        ];
        // validasi form
        $this->validate($request,[
            'nama'=>'required|min:3|max:30',
            'deskripsi'=>'required', 
            'foto'=>'required|mimes:jpg,jpeg',
            

        ],$message);

        // $validate = [];
        $category = new Category;
        $category->nama = $request->nama;
        $category->deskripsi= $request->deskripsi;    
        $category->foto = $request->file("foto")->store('post-images', 'public');
        $category->status = $request->status== true ?'1':'0';
        // return $category;
        $category->save();

        return redirect('admin/category')->with('message','Category berhasil di tambahkan');
    }
    public function edit($category)
    {
        // return
        $category = category::find($category);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request, $category)
    {
        // return $category;
        
        $update = [
            'nama'=> $request->nama,
            'deskripsi'=> $request->deskripsi,
            'status'=> $request->status== true ?'1':'0'
        ];

        if($request->hasFile('foto')){
            $update["foto"] = $request->file("foto")->store('post-images', 'public');
        }

        category::where('id', $category)->update($update);
        return redirect('admin/category')->with('message','Category berhasil di perbarui');
    }
}
