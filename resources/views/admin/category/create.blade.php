@extends('layouts.admin')

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
                    <h3>Tambah Category 
                    <a href="{{url ('admin/category') }}" class="btn btn-dark float-end">Kembali </a>           
                    </h3>       
                        <div class="row">
                        <div class="card-body">
                            <form action="{{url ('admin/category') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class=" mb-3">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" >
                                </div>
                                <div class=" mb-3">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" >
                                </div>
                                <div class=" mb-3">
                                    <label>Deskripsi</label>
                                    <textarea  name="deskripsi" class="form-control" rows="3" ></textarea>
                                    </div>
                                <div class=" mb-3">
                                    <label>Foto</label>
                                    <input type="file" name="foto" class="form-control"/ >
                                    </div>
                                <div class=" mb-3">
                                    <label>Status</label>
                                    <input type="checkbox" name="status" >
                                </div>
                                <div class=" mb-3">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary fload-end"> Save </button>
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