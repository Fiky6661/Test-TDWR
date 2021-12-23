@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title">
                    <h2> Create Product</h2>
                </div>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('product-store') }}" method="POST">@csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="number" name="price" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary icon-btn mt-2"><i class="fa fa-save"></i> Create</button>
                                    <a href="{{route('product')}}" class="btn btn-danger icon-btn mt-2"><i class="fa fa-arrow-left"></i> Cancel</a>
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