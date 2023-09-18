@extends('layouts.app')
@section('content')
    

    <div class="loader"></div>
    <div class="container-fluid on-load" style="visibility: hidden">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1">
                            <label class="custom-control-label" for="price-1">Rp. 0 - Rp 5000</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">Rp. 5000 - Rp 10000</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">Rp. 10000 - Rp 20000</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-4">
                            <label class="custom-control-label" for="price-4">Rp. 20000 - Rp 50000</label>
                        </div>
                    </form>
                </div>
                <!-- Price End -->
                
                <!-- category Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by category</span></h5>
                <div class="bg-light p-4 mb-30">
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input onclick="cbAllCategory()" type="checkbox" class="custom-control-input" checked id="category-all">
                        <label class="custom-control-label" for="category-all">All category</label>
                    </div>
                    <form>
                        @foreach ($categories as $category)
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input filter" value="{{$category->id}}" id="category-{{$category->id}}" onclick="cbFilter(event, {{$category->id}})">
                            <label class="custom-control-label" for="category-{{$category->id}}">{{$category->nama}}</label>
                        </div>
                        @endforeach
                    </form>
                </div>
                <!-- category End -->

                <!-- Size Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by grade</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="size-all">
                            <label class="custom-control-label" for="size-all">All Size</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-1">
                            <label class="custom-control-label" for="size-1">10</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-2">
                            <label class="custom-control-label" for="size-2">11</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-3">
                            <label class="custom-control-label" for="size-3">12</label>
                        </div>
                    </form>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Popularity</a>
                                        <a class="dropdown-item" href="#">Best Rating</a>
                                    </div>
                                </div>
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">10</a>
                                        <a class="dropdown-item" href="#">20</a>
                                        <a class="dropdown-item" href="#">30</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="produks" class="d-flex row m-3">
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <script>
        
        $(document).ready(function() {
            // loading()
           
            getAll()
        });
        
        // function loading(){
        //     $(".on-load").html('<h1>loading</h1>')
        // }

        function getAll(){
            $.ajax({
                url: "/category/all",
                type:"GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res){
                    $(".on-load").css("visibility", "visible");
                    $(".loader").css("visibility", "hidden");
                    if(res.length < 1){
                        $("#produks").html('<h1>produk kosong </h1>')
                    }
                    // console.log(res)
                    let data= []
                    for (i = 0; i < res.length; i++) {
                        data[i] =
                        '<div class="col-lg-4 col-md-6 col-sm-6 pb-1">'+
                            '<div class="product-item bg-light mb-4">'+
                                '<div class="product-img position-relative overflow-hidden">'+
                                    '<img class="img-fluid w-100" src="/produk-image/'+res[i].image+'" alt="">'+
                                    '<div class="product-action">'+
                                        '<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>'+
                                        '<a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>'+
                                        '<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>'+
                                        '<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="text-center py-4">'+
                                    '<a class="h6 text-decoration-none text-truncate" href="/detail/'+res[i].id+'">'+res[i].nama+'</a>'+
                                    '<div class="d-flex align-items-center justify-content-center mt-2">'+
                                        '<h5>Rp. '+res[i].harga+'</h5><h6 class="text-muted ml-2"></h6>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                    }
                    for (i = 0; i < res.length; i++) {
                        // console.log(data[i])
                        $("#produks").html(data)
                    }
                

                },
                error: function(error) {
                    console.log(error)
                }
            });
        }

        function cbAllCategory(){
            getAll()
            $('.filter').prop('checked', false);
        }

        function cbFilter(e, id) {
            let valueFilter = []
            // console.log(document.forms[2])
            $.each(document.forms[2], (index, val) => {
                if (val.checked) {
                    // console.log(val.value)
                    valueFilter.push(val.value)
                } 
            })
            
            // console.log(valueFilter.length)
            if(valueFilter.length > 0){
                $('#category-all').prop("checked", false)
                ajaxFilter(id, valueFilter)
            }else{
                $('#category-all').prop("checked", true)
                getAll()
            } 
        }

        function ajaxFilter(id, valueFilter){
            $.ajax({
                url: "/category/"+ id +"/filter",
                type:"GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {valueFilter},
                success: function(res){
                    let data= []
                    $.each(res.data, (index, value) => {
                        data[index] =
                        '<div class="col-lg-4 col-md-6 col-sm-6 pb-1">'+
                            '<div class="product-item bg-light mb-4">'+
                                '<div class="product-img position-relative overflow-hidden">'+
                                    '<img class="img-fluid w-100" src="/produk-image/'+value.image+'" alt="">'+
                                    '<div class="product-action">'+
                                        '<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>'+
                                        '<a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>'+
                                        '<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>'+
                                        '<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="text-center py-4">'+
                                    '<a class="h6 text-decoration-none text-truncate" href="/detail/'+value.id+'">'+value.nama+'</a>'+
                                    '<div class="d-flex align-items-center justify-content-center mt-2">'+
                                        '<h5>Rp. '+value.harga+'</h5><h6 class="text-muted ml-2"></h6>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                    });
                    $.each(res.data, () => {
                        $("#produks").html(data)
                    })
                    // console.log(res.data)
                    if(res.data.length < 1){
                        $("#produks").html('<h1>produk kosong </h1>')
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            });
        }
    </script>
@endsection