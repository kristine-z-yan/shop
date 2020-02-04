@extends('admin.app')
@section('content')
    <div id="page-content-wrapper">
        <div class="container">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <h4 class="modal-title">Edit Product</h4>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required value="{{$product->name}}">
                    </div>
                    <div class="form-group">
                        <label>Cost Price</label>
                        <input type="number" class="form-control" name="cost_price" required value="{{$product->cost_price}}">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price" required value="{{$product->price}}">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="qnt" required value="{{$product->qnt}}">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <img src="/img/products/{{$product->img}}" alt="">
                        <input type="file" class="form-control" name="img">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
@endsection
