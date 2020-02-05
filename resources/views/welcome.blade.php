@extends('layout.app')
@section('content')
    <!-- Hero section -->
    <section class="hero-section set-bg" data-setbg="img/bg.jpg">
        <div class="hero-slider owl-carousel">
            <div class="hs-item">
                <div class="hs-left"><img src="img/slider-img.png" alt=""></div>
                <div class="hs-right">
                    <div class="hs-content">
                        <div class="price">from $19.90</div>
                        <h2><span>2018</span> <br>summer collection</h2>
                        <a href="" class="site-btn">Shop NOW!</a>
                    </div>
                </div>
            </div>
            <div class="hs-item">
                <div class="hs-left"><img src="img/slider-img.png" alt=""></div>
                <div class="hs-right">
                    <div class="hs-content">
                        <div class="price">from $19.90</div>
                        <h2><span>2018</span> <br>summer collection</h2>
                        <a href="" class="site-btn">Shop NOW!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero section end -->

    <!-- Product section -->
    <section class="product-section spad">
        <div class="container">
            <ul class="product-filter controls">
                <li class="control" data-filter=".new">New arrivals</li>
                <li class="control" data-filter="all">Recommended</li>
                <li class="control" data-filter=".best">Best sellers</li>
            </ul>
            <div class="row" id="product-filter">
                @foreach($products as $product)
                    <div class="mix col-lg-3 col-md-6 best">
                    <div class="product-item">
                        <figure>
                            <img src="img/products/{{ $product->img }}" alt="">
{{--                            <div class="pi-meta">--}}
{{--                                <div class="pi-m-left">--}}
{{--                                    <img src="img/icons/eye.png" alt="">--}}
{{--                                    <p>quick view</p>--}}
{{--                                </div>--}}
{{--                                <div class="pi-m-right">--}}
{{--                                    <img src="img/icons/heart.png" alt="">--}}
{{--                                    <p>save</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </figure>
                        <div class="product-info">
                            <h6>{{$product->name}}</h6>
                            <p>${{$product->price}}</p>
                            <a href="{{ route('add-to-cart', $product->id) }}" class="site-btn btn-line">ADD TO CART</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product section end -->

