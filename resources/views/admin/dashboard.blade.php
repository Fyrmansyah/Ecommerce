@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="row">
  <div class="col-md-6 mb-4 col-lg-3 ">
    <div class="card border-danger border-3 shadow h-100 py-2">
      <div class="card-body ">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
              <div class="text-xs font-weight-bold text-blue text-uppercase mb-1">pembelian</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $terselesaikan }}</div>
          </div>
          <div class="col-auto">
              <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 mb-4 col-lg-3 ">
    <div class="card border-success border-3 shadow h-100 py-2">
      <div class="card-body ">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
              <div class="text-xs font-weight-bold text-blue text-uppercase mb-1">Barang Habis</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$Produk_habis}}</div>
          </div>
          <div class="col-auto">
              <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 mb-4 col-lg-3 ">
    <div class="card border-info border-3 shadow h-100 py-2">
      <div class="card-body ">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
              <div class="text-xs font-weight-bold text-blue text-uppercase mb-1">Pengguna</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pengguna }}</div>
          </div>
          <div class="col-auto">
              <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 mb-4 col-lg-3">
      <div class="card border-warning border-3 shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-blue text-uppercase mb-1">
                      pendapatan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ $total }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>
                </div>
          </div>
      </div>
  </div>

  
</div>

<div class="row m-0">
  <div class="col-md-8 mb-4">
    <div class="card">
      <div class="card-header bg-warning">
        <h5 class="m-2 fw-bold">PENJUALAN PERBULAN</h5>
      </div>
      <div class="card-body">
        <canvas id="perbulan"></canvas>
      </div>
    </div>
  </div>
  
  <div class="col-md-4 mb-4">
    <div class="card">
      <div class="card-header bg-warning">
        <h5 class="m-2 fw-bold">PENJUALAN TERTINGGI</h5>
      </div>
      <div class="card-body">
        <canvas id="tertinggi"></canvas>
      </div>
    </div>
  </div>

  <div class="col-md-3 mb-4">
    <div class="card p-4">
      <img class="shadow" src="{{ asset('admin/images/icon.ico') }}" alt="" width="99%">
    </div>
  </div>

  <div class="col-md-9 mb-4">
    <div class="card">
      <div class="card-header bg-warning">
        <h5 class="m-2 fw-bold">PENJUALAN TERAKHIR</h5>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped table-sm table-responsive text-center">
          <thead >
            <tr>
              <th width="4%" >No</th>
              <th width="" >Nomor Invoice</th>
              <th width="" >Pengguna</th>
              <th width="15%" >Total</th>
              <th width="25%" >Status</th>
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
                @if($data->status == 1)
                <span class="rounded-pill text-dark badge p-2 px-3 fw-bold  bg-warning shadow"style="min-width: 90px">
                    menunggu <i class="far fa-clock"></i>
                </span>
                @elseif($data->status == 2)
                <span class="rounded-pill text-dark badge p-2 px-3 fw-bold  bg-danger shadow" style="min-width: 90px">
                    dicancel <i class="fas fa-times-circle"></i>
                </span>
                @elseif($data->status == 3)
                <span class="rounded-pill text-dark badge p-2 px-3 fw-bold shadow" style="background-color: rgb(0, 225, 0); min-width: 90px;">
                    selesai <i class="fas fa-check"></i>
                </span>
                @elseif($data->status == 4)
                <span class="rounded-pill text-dark badge p-2 px-3 fw-bold  bg-info shadow" style="min-width: 90px">
                    diproses <i class="fas fa-shipping-fast"></i>
                </span>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
</div>

<script>
  // ==== DOM TO CANVAS HTML =====
  let penjualan_perbulan = document.getElementById('perbulan').getContext('2d')
  let penjualan_tertinggi = document.getElementById('tertinggi').getContext('2d')
  // =============================

  // == DATA PENJULAN PERBULAN ==
  let data_perbulan = {
    labels: [1,2,3,4,5,6,7],
    datasets: [{
      label: 'My First Dataset',
      data: [65, 59, 80, 81, 56, 55, 40],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };
  const config_perbulan = {
    type: 'bar',
    data: data_perbulan,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };
  // =============================

  //  DATA PENJUALAN PRODUK TERTINGGI
  const data_tertinggi = {
    labels: [
      'Red',
      'Blue',
      'Yellow'
    ],
    datasets: [{
      label: 'My First Dataset',
      data: [300, 50, 100],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
      hoverOffset: 4
    }]
  };
  const config_tertinggi = {
    type: 'doughnut',
    data: data_tertinggi,
  };
  // ================================

  // INSTANCE CHART JS ==============
  new Chart(penjualan_perbulan, config_perbulan)
  new Chart(penjualan_tertinggi, config_tertinggi)
  // ================================
</script>
@endsection