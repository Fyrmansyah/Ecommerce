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
        $produk = Produk::with('category')->get();
        // return $produk;
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

    public function edit($id){
        // return $id;
        $produks = Produk::with('category')->find($id);
        // return $produks;
        $categories = Category::all();
        return view('admin.produks.edit', compact('categories', 'produks'));
    }
    
    public function update($id){
        $data = [
            'nama' => request()->nama,
            'stok' => request()->stok,
            'harga' => request()->harga,
            'deskripsi' => request()->deskripsi,
            'keterangan' => request()->keterangan
        ];
        
        if(request()->image){
            $file = request()->file('image');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload='./produk-image';
            $file->move($tujuan_upload,$nama_file);
            $data['image'] = $nama_file;
        }

        Produk::where('id', $id)->update($data);

        return redirect('/admin/produks');
    }

    public function destroy($id){
        Produk::destroy($id);
        return redirect()->back();
    }
}
