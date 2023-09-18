@extends('layouts.admin')
@section('title', 'Riwayat')
@section('content')
@foreach ($datas as $modaltrans)
<div class="modal fade" id="admTrans{{$modaltrans->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title my-auto" id="exampleModalLabel">Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-0">
                <div class="row" style="min-height: 500px">
                    <div class="col-8 card-header p-2 overflow-auto" style="max-height: 500px">
                        <div class="card px-4 py-3 mb-2">
                            @if($modaltrans->status == 1)
                                <h5 class="text-warning">Menunggu Pembayaran <i class="far fa-clock"></i></h5> 
                            @elseif($modaltrans->status == 3)
                                <h5 class="text-success">Selesai <i class="fas fa-check"></i></h5> 
                            @elseif($modaltrans->status == 2)
                                <h5 class="text-danger">dibatalkan <i class="fas fa-check"></i></h5> 
                            @elseif($modaltrans->status == 4)
                                <h5 class="text-info">diproses <i class="fas fa-shipping-fast"></i></h5>
                            @endif
                             
                            <hr class="m-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0 mt-1">nomor invoice</p><hr>
                                <p class="mb-0 mt-1 text-warning">{{$modaltrans->nomor_transaksi}}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0 mt-1">Tanggal Pembelian</p><hr>
                                <p class="mb-0 mt-1">{{$modaltrans->created_at}}</p>
                            </div>
                        </div>
                        <div class="card px-4 py-3 mb-2">
                            <h5>Detail Produk</h5> 
                            @foreach ($modaltrans->order as $md)
                            <div class="d-flex my-2 p-2 px-2 border rounded-pill">
                                <img src="{{ asset('produk-image/'.$md->produk->image) }}" class="rounded-circle" width="80px" height="80px">
                                <div class="px-3">
                                    <h5 class=" m-0 mr-3 mt-1">{{$md->produk->nama}}</h5>
                                    <p class="m-0">{{$md->jumlah}} barang x Rp. {{$md->produk->harga}}</p>
                                </div>
                            </div>
                            @endforeach
                            <h5 class="ml-auto m-2">Total Harga &nbsp; <b>Rp. {{$modaltrans->total}}</b></h5>
                        </div>
                        @if(! empty($modaltrans->bukti_img))
                        <div class="card px-4 py-3 mb-2">
                            <h5 class="mb-3">Bukti Pembayaran Transaksi</h5> 
                            <img src="{{ asset('storage/'.$modaltrans->bukti_img) }}" alt="" style="max-width:440px">
                        </div>
                        @endif
                    </div>
                    <div class="col-4 d-flex justify-content-center align-items-end" style="background: rgb(255,255,255);
                    background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(255,251,238,1) 32%, rgba(255,237,184,1) 74%, rgba(255,193,7,0.9948573179271709) 100%);">
                        <img class="shadow mb-5" src="{{ asset('admin/images/icon.ico') }}" alt="" width="170px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="card p-4">
    <h2 class="fw-bold mb-4">RIWAYAT TRANSAKSI</h2>
    <table class="table table-bordered table-warning table-striped table-sm table-responsive text-center">
        <thead class="table-dark">
          <tr>
            <th width="4%" >No</th>
            <th width="" >Nomor Invoice</th>
            <th width="" >Pengguna</th>
            <th width="" >Total</th>
            <th width="" >Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas as $data)
          <tr>
            <th>{{$loop->iteration}}</th>
            <td class="fw-bold text-decoration-underline">{{$data->nomor_transaksi}}</td>
            <td>{{$data->user->name}}</td>
            <td>Rp. {{$data->total}}</td>
            <td>
              <button data-bs-toggle="modal" data-bs-target="#admTrans{{$data->id}}" class="btn btn-success rounded-pill p-2 px-4 shadow">detail</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection