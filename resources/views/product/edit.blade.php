@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title">
                    <h2> Edit Product</h2>
                </div>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('product-update', $edit->id) }}" enctype="multipart/form-data" method="POST">@csrf @method('put')
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $edit->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="number" name="price" class="form-control" value="{{ $edit->price }}" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary mt-3">Update</button>
                                    <a href="{{route('product')}}" class="btn btn-danger mt-3"><i class="fa fa-arrow-left"></i> Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection