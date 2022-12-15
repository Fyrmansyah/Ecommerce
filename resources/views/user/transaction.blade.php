@extends('layouts.app')
@section('content')
<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button> --}}
  
  <!-- Modal  upload bukti-->
@foreach ($datas as $modal)
<div class="modal fade" id="exampleModal{{$modal->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title my-auto" id="exampleModalLabel">Upload Bukti</h5>
            <p class="ml-3 my-auto">{{$modal->created_at}}</p>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/uploadbukti" method="POST" id="fileform" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$modal->id}}">
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="image" name="bukti">
            </div>
            <div class="input-group">
                <img id="preview-image-before-upload" style="max-height: 250px;">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
        </div>
    </div>
</div>
@endforeach


  <!-- Modal detail transaksis-->
@foreach ($datas as $modaltrans)
<div class="modal fade" id="modalTrans{{$modaltrans->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title my-auto" id="exampleModalLabel">Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-0">
                <div class="row" style="min-height: 500px">
                    <div class="col-8 bg-secondary p-2">
                        <div class="card px-4 py-3 mb-2">
                            @if($modaltrans->status == 1)
                                <h5 class="text-warning">Menunggu Pembayaran <i class="far fa-clock"></i></h5> 
                            @elseif($modaltrans->status == 3)
                                <h5 class="text-success">Selesai <i class="fas fa-check"></i></h5> 
                            @elseif($modaltrans->status == 4)
                                <h5 class="text-info">diproses <i class="fas fa-shipping-fast"></i></h5>
                            @endif
                             
                            <hr class="m-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0 mt-1">Tanggal Pembelian</p><hr>
                                <p class="mb-0 mt-1">{{$modaltrans->created_at}}</p>
                            </div>
                        </div>
                        <div class="card px-4 py-3 mb-2">
                            <h5>Detail Produk</h5> 
                            @foreach ($modaltrans->order as $md)
                            <div class="d-flex my-2 p-2 px-3 border">
                                <img src="{{ asset('produk-image/'.$md->produk->image) }}" class="rounded mr-3" width="80px" height="80px">
                                <div>
                                    <h5 class=" m-0 mr-3 mt-1">{{$md->produk->nama}}</h5>
                                    <p class="m-0">{{$md->jumlah}} barang x Rp. {{$md->produk->harga}}</p>
                                </div>
                            </div>
                            @endforeach
                            <h5 class="ml-auto m-2">Total Harga &nbsp; <b>Rp. {{$modaltrans->total}}</b></h5>
                        </div>
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


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="mb-3">daftar transaksi</h3>
            <div class="card p-3">
                @foreach ($datas as $data)
                <div class="shadow p-1 mb-5 card">
                    <div class="d-flex align-items-center card-header">
                        <i class="fas fa-shopping-cart mr-3"></i>
                        <b class="mr-3">belanja</b>
                        <p class="m-0 mr-3">{{$data->created_at}}</p>
                        @if($data->status == 1)
                        <span class="badge p-2 bg-warning">
                            menunggu pembayaran <i class="far fa-clock"></i>
                        </span>
                        @elseif($data->status == 2)
                        <span class="badge p-2 bg-danger">
                            dicancel <i class="fas fa-times-circle"></i>
                        </span>
                        @elseif($data->status == 3)
                        <span class="badge p-2 bg-success">
                            selesai <i class="fas fa-check"></i>
                        </span>
                        @elseif($data->status == 4)
                        <span class="badge p-2 bg-info" >
                            diproses <i class="fas fa-shipping-fast"></i>
                        </span>
                        @endif
                    </div>
                    @foreach ($data->order->take(1) as $item)
                    <div class="d-flex my-4 p-1 px-3 card-body">
                        <img src="{{ asset('produk-image/'.$item->produk->image) }}" class="rounded mr-3" width="80px" height="80px">
                        <div>
                            <p class="fw-bold fs-5 m-0 mr-3">{{$item->produk->nama}}</p>
                            <p class="m-0">{{$item->jumlah}} barang x Rp. {{$item->produk->harga}}</p>
                        </div>
                    @endforeach
                        <div class="ml-auto my-auto">
                            <p class="m-0">Total belanja</p>
                            <p class="fw-bold fs-5 m-0 mr-3">Rp. {{$data->total}}</p>
                        </div>
                    </div>
                    
                    <div class="d-flex text-aligns-center card-footer">
                    @if($data->status == 1)
                    <button  data-bs-toggle="modal" data-bs-target="#modalTrans{{$data->id}}" class="p-2 w-25 btn btn-outline-warning m-0 mr-3 my-auto ml-auto">detail transaksi</button>
                    <button class="p-2 btn btn-warning rounded w-25 text-white" data-bs-toggle="modal" data-bs-target="#exampleModal{{$data->id}}">upload bukti</button>
                    @elseif($data->status == 2)
                    @elseif($data->status == 3)
                    <button  data-bs-toggle="modal" data-bs-target="#modalTrans{{$data->id}}" class="p-2 w-25 btn btn-outline-warning m-0 mr-3 my-auto ml-auto">detail transaksi</button>
                    <button class="p-2 btn btn-warning rounded w-25 text-white">beri ulasan</button>
                    @elseif($data->status == 4)
                    <button  data-bs-toggle="modal" data-bs-target="#modalTrans{{$data->id}}" class="p-2 w-25 btn btn-outline-warning m-0 mr-3 my-auto ml-auto">detail transaksi</button>
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
<script>
    $(document).ready(function (e) {
        previewImg()
    });

    function previewImg(){
        $('#image').change(function(){       
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-before-upload').attr('src', e.target.result); 
            }

            reader.readAsDataURL(this.files[0]); 
        
        });
    }
</script>
@endsection