@extends('trangchu')
@section('content')


<div class="features_items">
    @foreach($brand_name as $key => $brand_name_value)
    <h2 class="title text-center">{{ $brand_name_value->brand_name }}</h2>
    @endforeach
    @foreach($brand_by_id as $key => $value)
    <a href="{{ URL::to('/chi-tiet-san-pham/'.$value->product_id) }}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ URL::to('public/images/uploads/product/'.$value->product_image)}}" alt="" />
                            <h2>{{ $value->product_name }}</h2>
                            <p>{{ number_format($value->product_price).' '.'VND'}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{ $value->product_name }}</h2>
                                <p>{{ number_format($value->product_price).' '.'VND' }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div><!--features_items-->
@endsection