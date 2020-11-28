@extends('trangchu')
@section('content')
@foreach($details_product as $key=>$details_product_value)
<div class="product-details"><!--product-details-->
	<div class="col-sm-5">
		<div class="view-product">
			<img src="{{ URL::to('public/images/uploads/product/'.$details_product_value->product_image) }}" alt="" />
			<h3>ZOOM</h3>
		</div>
		<div id="similar-product" class="carousel slide" data-ride="carousel">
			
			  <!-- Wrapper for slides -->
			    <div class="carousel-inner">
					<div class="item active">
					  <a href=""><img src="{{ asset('images/product-details/similar1.jpg') }}" alt=""></a>
					  <a href=""><img src="{{ asset('images/product-details/similar2.jpg') }}" alt=""></a>
					  <a href=""><img src="{{ asset('images/product-details/similar3.jpg') }}" alt=""></a>
					</div>
					<div class="item">
					  <a href=""><img src="{{ asset('images/product-details/similar1.jpg') }}" alt=""></a>
					  <a href=""><img src="{{ asset('images/product-details/similar2.jpg') }}" alt=""></a>
					  <a href=""><img src="{{ asset('images/product-details/similar3.jpg') }}" alt=""></a>
					</div>
					<div class="item">
					  <a href=""><img src="{{ asset('images/product-details/similar1.jpg') }}" alt=""></a>
					  <a href=""><img src="{{ asset('images/product-details/similar2.jpg') }}" alt=""></a>
					  <a href=""><img src="{{ asset('images/product-details/similar3.jpg') }}" alt=""></a>
					</div>
					
				</div>

			  <!-- Controls -->
			  <a class="left item-control" href="#similar-product" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			  </a>
			  <a class="right item-control" href="#similar-product" data-slide="next">
				<i class="fa fa-angle-right"></i>
			  </a>
		</div>

	</div>
	<div class="col-sm-7">
		<div class="product-information"><!--/product-information-->
			<img src="{{ asset('images/product-details/new.png') }}" class="newarrival" alt="" />
			<h2>{{ $details_product_value->product_name }}</h2>
			<p>Ma san pham:{{ $details_product_value->product_id }}</p>
			<img src="{{ asset('images/product-details/rating.png') }}" alt="" />
			<form action="{{ URL::to('/save-cart') }}" method="post">
				{{ csrf_field() }}
				<span>
					<span>{{ number_format($details_product_value->product_price).' '.'VND' }}</span>
					<label>So luong</label>
					<input name="qty" type="number" value="1" min="1" />
					<input name="product_id_hidden" type="hidden" value="{{ $details_product_value->product_id }}" />
					<button type="submit" class="btn btn-fefault cart">
						<i class="fa fa-shopping-cart"></i>
						Them gio hang
					</button>
				</span>
			</form>
			<p><b>Tinh trang:</b>Con hang</p>
			<p><b>Thuong hieu:</b>{{ $details_product_value->brand_name }}</p>
			<p><b>Loai san pham:</b>{{ $details_product_value->category_name }}</p>
		</div><!--/product-information-->
	</div>
</div><!--/product-details-->

<div class="category-tab shop-details-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#details" data-toggle="tab">Chi tiet</a></li>
			<li><a href="#reviews" data-toggle="tab">Binh luan</a></li>
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="details" >
			<p>{!! $details_product_value->product_desc !!}</p>
		</div>
		
		<div class="tab-pane fade" id="reviews" >
			<div class="col-sm-12">
				<form action="#">
					<span>
						<input type="text" placeholder="Your Name"/>
						<input type="hidden"/>
					</span>
					<textarea name="" ></textarea>
					<b>Rating: </b> <img src="{{ asset('images/product-details/rating.png') }}" alt="" />
					<button type="button" class="btn btn-default pull-right">
						Submit
					</button>
				</form>
			</div>
		</div>
		
	</div>
</div><!--/category-tab-->
@endforeach

@endsection