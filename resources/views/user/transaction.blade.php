@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="mb-3">daftar transaksi</h3>
            <div class="card p-3">
                @foreach ($datas as $data)
                <div class="shadow p-4 mb-3">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-shopping-cart mr-3"></i>
                        <b class="mr-3">belanja</b>
                        <p class="m-0 mr-3">{{$data->created_at}}</p>
                        @if($data->status == 1)
                        <span class="badge bg-warning">
                            waiting...
                        </span>
                        @elseif($data->status == 2)
                        <span class="badge bg-danger">
                            error!
                        </span>
                        @elseif($data->status == 3)
                        <span class="badge bg-success">
                            success.
                        </span>
                        @endif
                    </div>
                    <div class="d-flex mb-3">
                        <img src="{{ asset('produk-image/'.$data->cart->produk->image) }}" class="rounded mr-3" width="80px" height="80px">
                        <div>
                            <p class="fw-bold fs-5 m-0 mr-3">{{$data->cart->produk->nama}}</p>
                            <p class="m-0">{{$data->cart->jumlah}} barang x Rp. {{$data->cart->produk->harga}}</p>
                        </div>
                        <div class="ml-auto p-2">
                            <p class="m-0">Total Harga</p>
                            <p class="fw-bold fs-5 m-0 mr-3">Rp. {{$data->cart->jumlah * $data->cart->produk->harga}}</p>
                        </div>
                    </div>
                    <div class="d-flex text-aligns-center">
                    @if($data->status == 1)
                    <a class="text-warning m-0 mr-3 my-auto ml-auto">lihat detail transaksi</a>
                    <button class="p-2 btn btn-warning rounded w-25 text-white">upload bukti</button>
                    @elseif($data->status == 2)
                    @elseif($data->status == 3)
                    <a class="text-warning m-0 mr-3 my-auto ml-auto">lihat detail transaksi</a>
                    <button class="p-2 btn btn-warning rounded w-25 text-white">beri ulasan</button>
                    @endif
                   

                       
                    </div>
                </div>  
                @endforeach
                {{-- <div class="shadow p-4 mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-shopping-cart mr-3"></i>
                        <b class="mr-3">belanja</b>
                        <p class="m-0 mr-3">20 Oktober 2004</p><span class="badge bg-danger">gagal!!</span>
                    </div>
                    <div class="d-flex mb-3">
                        <img src="{{ asset('halamanUser/img/user.jpg') }}" class="rounded mr-3" width="80px" height="80px">
                        <div>
                            <p class="fw-bold fs-5 m-0 mr-3">LKS CLOUD COMPUTING  </p>
                            <p class="m-0">1 barang x Rp. 20.000</p>
                        </div>
                        <div class="ml-auto p-2">
                            <p class="m-0">Total Harga</p>
                            <p class="fw-bold fs-5 m-0 mr-3">Rp. 20.000</p>
                        </div>
                    </div>
                    <div class="d-flex text-aligns-center">

                        <p class="text-warning m-0 mr-3 my-auto ml-auto">lihat detail transaksi</p>
                        <button class="p-2 btn btn-warning rounded w-25 text-white">beli lagi</button>
                    </div>
                </div>
                <div class="shadow p-4 mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-shopping-cart mr-3"></i>
                        <b class="mr-3">belanja</b>
                        <p class="m-0 mr-3">20 Oktober 2004</p><span class="badge bg-success">success</span>
                    </div>
                    <div class="d-flex mb-3">
                        <img src="{{ asset('halamanUser/img/user.jpg') }}" class="rounded mr-3" width="80px" height="80px">
                        <div>
                            <p class="fw-bold fs-5 m-0 mr-3">LKS CLOUD COMPUTING  </p>
                            <p class="m-0">1 barang x Rp. 20.000</p>
                        </div>
                        <div class="ml-auto p-2">
                            <p class="m-0">Total Harga</p>
                            <p class="fw-bold fs-5 m-0 mr-3">Rp. 20.000</p>
                        </div>
                    </div>
                    <div class="d-flex text-aligns-center">

                        <p class="text-warning m-0 mr-3 my-auto ml-auto">lihat detail transaksi</p>
                        <button class="p-2 btn btn-warning rounded w-25 text-white">beli lagi</button>
                    </div>
                </div> --}}
            </div>  
        </div>
    </div>
</div>
@endsection