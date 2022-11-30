
<div>
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Category Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Batal"></button>
      </div>
            <form wire:submit.prevent="destroyCategory">


                 <div class="modal-body">
                <h6> Apakah Data Akan Di Hapus?</h6>
                </div>
                  <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Ya. Hapus</button>
            </div>
            </form>

    </div>
  </div>
</div>


<div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Category 
                            <a href="{{url ('admin/category/create') }}" class="btn btn-primary float-end">Tambah Category</a>
                         </h3>
                         </div>
                            <div class="card-body">
                               <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">ID</th>
                                        <th width="7%">foto</th>
                                        <th>Category</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td><img src="/storage/{{$category->foto}}" alt="" width="40px" height="40px"></td>
                                            <td>{{$category->nama}}</td>
                                            <td>
                                                <a href="{{ url('admin/category/'.$category->id.'/edit') }}"class="btn btn-success">Edit</a>
                                                <a href="#" wire:click="deleteCategory({{$category->id}})"data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                               </table>
                               <div>
                               {{$categories->links()}}
                               </div>
                              <div class="row">
                                    <div class="col-md-3">
                                        <img src="">
                                    </div>
                                </div> 
                            </div>

                        </div>
                </div>
           </div>
</div>
</div>

@push('script')

<script>
    window.addEventListener('close-modal',event =>{
        $('#deleteModal').modal('hide');

    });
</script>
@endpush