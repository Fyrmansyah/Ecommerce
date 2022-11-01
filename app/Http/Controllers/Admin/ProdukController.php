<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProdukFormRequest;
use App\Models\Category;
use App\Models\Produk;


class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('admin.produks.index', compact('produk'));
    }   

    public function create()

    {
        $categories = Category::all();
        // return $categories;
        return view('admin.produks.create', compact('categories'));
    }
    public function store (Request $request)
    {
        // dd($request)
        if($request->image){
           
        $file = $request->file('image');
        
        $nama_file = time()."_".$file->getClientOriginalName();

        //4 proses upload
        $tujuan_upload='./produk-image';
        $file->move($tujuan_upload,$nama_file);
        // return $request;
        // $valiatedData = $request->validate([
        //     'category_id' => 'required',
        //     'deskripsi' => 'required',
        //     'nama' => 'required',
        //     'keterangan' => 'required',
        //     'deskripsi' => 'required',
        //     'harga' => 'required',
        //     'stok' => 'required',
        //     'image' => 'required',


      

            // return $valiatedData;
        // $categories = Category::findOrFail($valiatedData->'category_id']);
        // return $categories;

       $produks =new Produk();
          $produks->category_id = $request->category_id;
          $produks->nama =  $request->nama;
          $produks->keterangan = $request->keterangan;
          $produks->deskripsi =  $request->deskripsi;
          $produks->harga =  $request->harga;
          $produks->stok =  $request->stok;
          $produks->image = $nama_file;
          $produks->save();
          return redirect('admin/produks')->with('message','Produk berhasil di perbarui');
        }
        return 'null';

    }
}
