<div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100" id="dropdownCategory">
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <button type="button" class="navbar-toggler mb-2" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-toggler">
                    <a href="" class="btn px-0">
                        <i class="fas fa-heart text-primary"></i>
                        <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="/cart" class="btn px-0 ml-3">
                        <i class="fas fa-shopping-cart text-primary"></i>
                        <span class="countCart badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                       
                        <a href="/home" class="nav-item nav-link bold">Home</a>
                        <a href="/category/filter" class="nav-item nav-link">Categories</a>
                        <a href="/transaction" class="nav-item nav-link">Transaction</a>
                        
                    </div>
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        <a href="" class="btn px-0">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a>
                        <a href="/cart" class="btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="countCart badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

<script>
      $.ajax({
        url: "/getcart",
        type:"GET",
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(res){
            $('.countCart').text(res)
        //   console.log(response)
        },
        error: function(error) {
         console.log(error)
        }
       });

      $.ajax({
        url: "/getcategory",
        type:"GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(res){
            for (i = 0; i < res.length; i++) {
                // console.log(res[i].nama)
                $("#dropdownCategory").append('<a href="" class="nav-item nav-link">' + res[i].nama + '</a>');
            }
          console.log(res)
        },
        error: function(error) {
         console.error(error)
        }
       });
</script>