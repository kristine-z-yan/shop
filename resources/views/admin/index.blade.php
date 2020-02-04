@extends('admin.app')
@section('content')
<!-- Page Content -->
<div id="page-content-wrapper container">
    <div class="accounting row">
        <div class="card text-white bg-success mb-3 col-4" style="max-width: 18rem;">
            <div class="card-header">Accounting</div>
            <div class="card-body">
                <h4 class="card-title">Income</h4>
                <h3 class="card-text">{{ $income }} $</h3>
            </div>
        </div>
        <div class="card text-white bg-warning mb-3 col-4" style="max-width: 18rem;">
            <div class="card-header">Stock</div>
            <div class="card-body">
                <h4 class="card-title">In Stock Products</h4>
                <h3 class="card-text">{{$in_stock_products_qnt}}</h3>
            </div>
        </div>
        <div class="card text-white bg-primary mb-3 col-4" style="max-width: 18rem;">
            <div class="card-header">Sold</div>
            <div class="card-body">
                <h4 class="card-title">Sold Products</h4>
                <h3 class="card-text">{{$sold_products_qnt}}</h3>
            </div>
        </div>
    </div>
</div>
@endsection
