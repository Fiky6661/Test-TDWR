@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title">
                    <h2> Data Product @if(Auth::user()->role == 1) <a href="{{route('product-create')}}" class="btn btn-primary text-right"><i class="fa fa-plus"></i> Add Product</a>@endif </h2>
                </div>
                <div class="tile-body">
                @if(Session::has('message'))
                    <div class="alert alert-success alert-rounded alert-dismissible fade show" role="alert" > <i class="fas fa-check"></i> {{ Session::get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(Session::has('message_error'))
                    <div class="alert alert-danger alert-rounded alert-dismissible fade show" role="alert"> <i class="fas fa-check"></i> {{ Session::get('message_error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Price</th>
                                    @if(Auth::user()->role == 1)
                                    <th class="text-center">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $val)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$val->name}}</td>
                                    <td class="text-center">Rp {{number_format($val->price)}}</td>
                                    @if(Auth::user()->role == 1)
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('product-edit', $val->id) }}" class="btn btn-warning">Edit</a>
                                            <a href="#" class="btn btn-danger" onclick="confirmDelete({{$val->id}})" id="confirm-delete" >Delete</a>
                                        </div>
                                    </td>
                                    @endif
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function confirmDelete(id) {
        swal({
            title: "Konfirmasi",
            text: "Are you sure ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                window.location.replace('{{ url('product/delete') }}'+"/"+id+"/");
                swal("Deleted","Data Deleted", "success");
            }else{
                swal("Failed","Deleted Failed", "error");
            }
        });
    }    
</script>