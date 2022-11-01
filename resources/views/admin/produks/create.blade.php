@extends('layouts.admin')

@section('content')


<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
    <h3> Tambah Produk 
    <a href="{{url ('admin/produks') }}" class="btn btn-primary float-end">Kembali</a>           
    </h3>       
</div>
<div class="card-body">
    

   
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail-tab-pane" type="button" role="tab" aria-controls="detail-tab-pane fade bordered p-3" aria-selected="false">Detail</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">Image</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade border p-3 show active p-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <form action="/admin/produks" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Category</label>
                    <select name="category_id" class="form-control mt-1">
                        <option selected></option>
                        @foreach($categories as $category )
                        <option value="{{ $category->id }}">{{ $category->nama }}</option>
                        @endforeach
                    </select>
                </div>
                    <div class="mb-3">
                        <label>Nama Produk</label>
                        <input type="text" name="nama" class="form-control"/>
                    </div>
                    <div class=" mb-3">
                        <label>Foto</label>
                        <input type="file" name="image" class="form-control"/ >
                        </div>
                    <div class="mb-3">
                        <label>Keterangan Produk</label>
                        <input type="text" name="keterangan" class="form-control"/>
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi Produk</label>
                        <input type="text" name="deskripsi" class="form-control"/>
                    </div>
            </div>
                
        <div class="tab-pane fade border p-3" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab" tabindex="0">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label>Harga</label>
                            <input type="text" name="harga" class="form-control"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label>Stok</label>
                            <input type="text" name="stok" class="form-control"/>
                        </div>
                    </div>
                </div>
        </div>
                <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                    <div class="mb-3">
                        <label>Upload Image</label>
                        {{-- <input type="file" name="image"  class="form-control"> --}}
                    </div>
                </div>
                </div>
                <div>
                    <button class="btn btn-primary float-end">Submit</button>
                </div>
                </form> 
    </div>
    </div>
    </div>
    </div>
</div>

@endsection