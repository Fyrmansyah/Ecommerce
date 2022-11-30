@extends('layouts.inc.admin.admin')

@section('content')
<!-- Button trigger modal -->



<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">
            Data Transaksi
          </h2>
        </div>
        <div class="card-body">
          <div class="">
            <table class="table-responsive table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>nomor Transaksi</th>
                  <th>User</th>
                  <th>Tanggal</th>
                  <th>Total</th>
                  <th>Status Pembayaran</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($datas as $item)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$item->id}}</td>
                  <td>{{$item->user->name}}</td>
                  <td>{{$item->created_at}}</td>
                  <td>{{$item->created_at}}</td>
                  @if ($item->status == 1)
                      
                  <td width="10%">
                    <button class="btn btn-danger" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">{{$item->status}}</button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="#">2</a></li>
                      <li><a class="dropdown-item" href="#">3</a></li>
                    </ul>
                  </td>
                  @endif
                  
                  @if ($item->status == 2)
                  <td width="10%">
                    <button class="btn btn-warning" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">{{$item->status}}</button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="#">1</a></li>
                      <li><a class="dropdown-item" href="#">3</a></li>
                    </ul>
                  </td>
                  @endif

                  @if ($item->status == 3)
                  <td width="10%">
                    <button class="btn btn-success">{{$item->status}}</button>
                  </td>
                  @endif
                  
                  <td class="d-flex " width="30%" >
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}" class="btn btn-dark">DETAIL</button>     
                    <!-- Modal -->
<div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table-responsive table table-bordered">
          <thead>
            <tr>
              <th>nomor Transaksi</th>
              <th>User</th>
              <th>Tanggal</th>
              <th>Total</th>
              <th>Status Pembayaran</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->user->name}}</td>
              <td>{{$item->created_at}}</td>
              <td>{{$item->created_at}}</td>
              @if ($item->status == 1)
                  
              <td width="10%">
                <button class="btn btn-danger">{{$item->status}}</button>
              </td>
              @endif
              
              @if ($item->status == 2)
              <td width="10%">
                <button class="btn btn-warning">{{$item->status}}</button>
              </td>
              @endif

              @if ($item->status == 3)
              <td width="10%">
                <button class="btn btn-success">{{$item->status}}</button>
              </td>
              @endif
              <td></td>

            </tr>

              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>        
                    <form action="" method="post">
                    </form>
                  </td>
                </tr>
                
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection