@extends('layouts.admin')
@section('title', 'Produk')
@section('content')
<!-- Modal Delete-->
@foreach($produk as $mdl)
<div class="modal fade" id="deletemodal{{$mdl->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         apakah anda ingin yakin menghapus {{$mdl->nama}}?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form action="produks/delete/{{$mdl->id}}" method="post">
                @csrf
                <button type="submit" class="btn btn-warning">Delete</button>
            </form>
        </div>
      </div>
    </div>
</div>
@endforeach
<div class="col-md-12">
    <div class="card p-4">
        <h2 class="fw-bold">PRODUK 
        <a href="{{url ('admin/produks/create') }}" class="btn btn-warning float-end rounded-pill">Tambah Produk</a>           
        </h2>     
        <table class="table-responsive table table-striped table-bordered mt-3 table-warning text-center">
            <thead class="table-dark">
                <th width="4%">No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>keterangan</th>
                <th width="17%">Action</th>
            </thead>
            <tbody>
                @foreach($produk as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="/produk-image/{{$item->image}}" alt="" width="40px" height="40px"></td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->category->nama}}</td>
                    <td>{{$item->harga}}</td>
                    <td>{{$item->stok}}</td>
                    <td>{{$item->keterangan}}</td>
                    <td class="">
                        <a href="{{ url('admin/produks/edit/' .$item->id ) }}" class="btn btn-info rounded-pill p-2 px-3">Edit</a>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#deletemodal{{$item->id}}" class="btn btn-danger rounded-pill p-2 px-3">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection