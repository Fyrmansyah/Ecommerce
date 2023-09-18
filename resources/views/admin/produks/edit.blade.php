@extends('layouts.admin')
@section('title', 'Edit Produk')
@section('content')


<div class="card p-4">
    <h3> Tambah Produk 
    <a href="{{url ('admin/produks') }}" class="btn btn-warning float-end rounded-pill">Kembali</a>           
    </h3>   
    <div class="shadow p-4 mt-4 m-2 card-header">
        <form action="/admin/produks/{{$produks->id}}/edit" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input value="{{$produks->nama}}" type="text" name="nama" class="form-control"/>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="category_id" class="form-select" >
                    <option value="{{$produks->category->id}}" selected>{{$produks->category->nama}}</option>
                    @foreach($categories as $category )
                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input value="{{$produks->stok}}" type="text" name="stok" class="form-control"/>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input value="{{$produks->harga}}" type="text" name="harga" class="form-control"/>
            </div>
            <div class=" mb-3">
                <label class="form-label">Foto</label>
                <input type="file" name="image" class="form-control mb-2" />
                <img src="{{ asset('/produk-image/'.$produks->image) }} " alt="" width="200px" height="200px">
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan Produk</label>
                <input value="{{$produks->keterangan}}" type="text" name="keterangan" class="form-control"/>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Produk</label>
                <input value="{{$produks->deskripsi}}" type="text" name="deskripsi" class="form-control"/>
            </div>
            <button type="submit" class="btn btn-warning float-end mt-3 rounded-pill">Submit</button>
        </form>    
    </div>
</div>

@endsection