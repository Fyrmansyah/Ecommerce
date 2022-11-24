@extends('layouts.inc.admin.admin')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            Data Transaksi
          </h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>nomor_transaksi</th>
                  <th>user</th>
                  <th>Diskon</th>
                  <th>Total</th>
                  <th>Status Pembayaran</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($datas as $item)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$item->id}}</td>
                  <td>{{$item->user->name}}</td>
                  <td>17%</td>
                  <td>20.000</td>
                  <td width="10%">
                    <button class="btn btn-warning">{{$item->status}}</button>
                  </td>
                  <td width="10%">
                    <button type="button" class="btn btn-success">accept</button>
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