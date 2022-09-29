@extends('layouts.admin')

@section('content')
<div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        <h3>Category 
                            <a href="{{url ('admin/category/create') }}" class="btn btn-primary float-end">Tambah Category</a>
                        </h3>
                            <div class="card-body">
                                <div class="row">
                                    @foreach()
                                    <div class="col-md-3">
                                        <img src="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
           </div>

</div>
@endsection