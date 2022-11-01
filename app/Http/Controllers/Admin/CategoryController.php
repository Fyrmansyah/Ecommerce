<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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
