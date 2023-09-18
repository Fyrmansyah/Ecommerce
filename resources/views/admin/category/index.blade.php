@extends('layouts.admin')
@section('content')
{{-- MODAL DELETE --}}
@foreach($categories as $mdl)
<div class="modal fade" id="deletemodal{{$mdl->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         apakah anda ingin yakin menghapus {{$mdl->nama}}?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form action="/admin/category/{{$mdl->id}}/destroy" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-warning">Delete</button>
            </form>
        </div>
      </div>
    </div>
</div>
@endforeach
<div class="card p-4">
    <h2 class="fw-bold" >KATEGORI PRODUK
        <a href="{{url ('admin/category/create') }}" class="btn btn-warning float-end rounded-pill">Tambah Category</a>
    </h2 >
    <table class="table table-bordered table-striped my-4 table-warning text-center shadow">
        <thead class="table-dark">
            <tr>
                <th width="5%">ID</th>
                <th width="7%">Foto</th>
                <th>Category</th>
                <th width="17%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td><img src="/storage/{{$category->foto}}" alt="" width="40px" height="40px"></td>
                <td>{{$category->nama}}</td>
                <td width="25%">
                    <div class="d-flex justify-content-around"">
                        <a href="{{ url('admin/category/'.$category->id.'/edit') }}"class="btn btn-success rounded-pill">Edit</a>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#deletemodal{{$category->id}}" class="btn btn-danger rounded-pill p-2 px-3">
                            Delete
                        </button>
                        {{-- <a href="#" wire:click="deleteCategory({{$category->id}})"data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger rounded-pill ml-3">Delete</a> --}}
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$categories->links()}}
</div>
@endsection