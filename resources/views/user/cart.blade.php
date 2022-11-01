@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="2">Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($data as $cart)
                        <tr>
                            <td><img class="rounded-circle" src="storage/{{$cart->category->foto}}" alt="" style="width: 50px;"></td>
                            <td class="align-middle">{{$cart->category->nama}}</td>
                            <td class="align-middle" id="harga">Rp. {{$cart->category->harga}}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" onclick="ahayy({{$cart->category->harga}}, {{$cart->category->id}}, 'min')">
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input id="jumlah{{$cart->category->id}}" type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="{{$cart->jumlah}}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus" onclick="ahayy({{$cart->category->harga}}, {{$cart->category->id}}, 'plus')">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle" id="totalperitem{{$cart->category->id}}">Rp. {{$cart->category->harga * $cart->jumlah}}</td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                {{-- <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6>$150</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
                </div> --}}
                <div>
                    <div class="d-flex justify-content-between ">
                        <h5>Total</h5>
                        <h5>$160</h5>
                    </div>
                    <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script> 

// $('#jumlah').on('input', function() {
    //  alert("adfasdfasdfsadf")
    // });
    
    function ahayy(harga, id, act) {
        let jumlah = $('#jumlah'+id).val() 
        // let harga = $('#harga').val()
        act == 'plus' 
        ?  $('#totalperitem'+id).text("Rp. "+(harga*(parseInt(jumlah)+1))) 
        : $('#totalperitem'+id).text("Rp. "+(harga*(parseInt(jumlah)-1))) 
       
        // console.log(act)
    };
    // $(document).ready(function () {
    //   setTimeout(function () {
    //     alert('Reloading Page');
    //     location.reload(true);
    //   }, 5000);
    // });

</script>