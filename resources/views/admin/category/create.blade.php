@extends('layouts.admin')
@section('title', 'Tambah Kategori')         
@section('content')         
@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $item)
            <li>{{$item}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card p-4">
    <h3 class="fw-bold">TAMBAH KATEGORI 
    <a href="{{url ('admin/category') }}" class="btn btn-warning rounded-pill float-end">Kembali </a>           
    </h3>    
    <div class="card-header shadow p-4 m-2">
        <form action="{{url ('admin/category') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class=" mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{old('nama')}}" >
            </div>
            
            <div class=" mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea  name="deskripsi" class="form-control" rows="3" >{{old('deskripsi')}}</textarea>
            </div>
            <div class=" mb-4">
                <label class="form-label">Foto</label>
                <input type="file" name="foto" class="form-control"/ >
            </div>
            <button type="submit" class="btn btn-warning float-end rounded-pill px-4"> Save</button>
            
        </form>
    </div>
</div>
@endsection