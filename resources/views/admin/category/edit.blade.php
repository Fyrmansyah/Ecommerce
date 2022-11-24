@extends('layouts.inc.admin.admin')

@section('content')
<div class="row">
    
        <div class="col-md-12 ">           
            <div class="card">
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $item)
                        <li>{{$item}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="card-header">
                    <h3>edit Barang 
                    <a href="{{url ('admin/category') }}" class="btn btn-dark float-end">Kembali </a>           
                    </h3>       
                        <div class="row">
                        <div class="card-body">
                            <form action="{{url('admin/category/'.$category->id.'/update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class=" mb-3">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{$category->nama}}"/>
                                </div>                             
                                    <label>Deskripsi</label>
                                    <textarea  name="deskripsi" class="form-control" rows="3" >{{$category->deskripsi}}</textarea>
                                    </div>
                                <div class=" mb-3">
                                    <label>Foto</label>
                                    <input type="file" name="foto" class="form-control mb-2"/ >
                                    <img src="/storage/{{$category->foto}}" alt="" width="200px" height="200px">
                                    </div>
                                <div class=" mb-3">
                                    <label>Status</label>
                                    <input type="checkbox" name="status" {{ ($category->status) ? "checked" : "" }} }>
                                </div>
                                <div class=" mb-3">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary fload-end"> Update </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection