@extends('trangchu')
@section('content')


<div class="features_items">
    <h2 class="title text-center">Sản phẩm mới nhất</h2>
    @foreach($all_product as $key => $value)
    
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <form>
                        @csrf
                        <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                        <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                        <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                        <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$value->product_id}}">


                        <a href="{{ URL::to('/chi-tiet-san-pham/'.$value->product_id) }}" class="">
                            <img src="{{ URL::to('public/images/uploads/product/'.$value->product_image)}}" alt="" />
                            <h2>{{ $value->product_name }}</h2>
                            <p>{{ number_format($value->product_price).' '.'VND'}}</p>
                        </a>
                        <button type="button" name="add-to-cart" class="btn btn-default add-to-cart" data-id="{{$value->product_id}}">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @endforeach
</div><!--features_items-->

<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
            <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
            <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
            <li><a href="#kids" data-toggle="tab">Kids</a></li>
            <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="tshirt" >
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery1.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection