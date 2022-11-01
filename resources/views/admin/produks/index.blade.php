@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header">
            <h3>Produk 
            <a href="{{url ('admin/produks/create') }}" class="btn btn-primary float-end">Tambah Produk</a>           
            </h3>       
        </div>
            <div class="card-body">
                <table class="table-responsive table table-bordered">
                    <thead>
                        <th>No</th>
                        <th>foto</th>
                        <th>Nama</th>
                        <th>harga</th>
                        <th>stok</th>
                        <th>deskripsi</th>
                        <th>keterangan</th>
                        <th>status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($produk as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img src="/produk-image/{{$item->image}}" alt="" width="40px" height="40px"></td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->harga}}</td>
                            <td>{{$item->stok}}</td>
                            <td>{{$item->deskripsi}}</td>
                            <td>{{$item->keterangan}}</td>
                            <td>{{$item->status}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection