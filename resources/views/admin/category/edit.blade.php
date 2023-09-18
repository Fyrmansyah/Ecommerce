@extends('layouts.admin')
@section('title', 'Edit Kategori')         
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
    <h3 class="fw-bold mb-3">EDIT CATEGORY 
        <a href="{{url ('admin/category') }}" class="btn btn-warning rounded-pill float-end">Kembali </a>           
    </h3>       
    <div class="card-header m-3 p-4 shadow">
        <form action="{{url('admin/category/'.$category->id.'/update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class=" mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{$category->nama}}"/>
            </div>
            <div class=" mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea  name="deskripsi" class="form-control" rows="3" >{{$category->deskripsi}}</textarea>
            </div>
            <div class=" mb-4">
                <label class="form-label">Foto</label>
                <input type="file" name="foto" class="form-control mb-2"/ >
                <img src="/storage/{{$category->foto}}" alt="" width="200px" height="200px">
            </div>
            <button type="submit" class="btn btn-warning rounded-pill"> Update </button>
        </form>
    </div>
</div>
@endsection