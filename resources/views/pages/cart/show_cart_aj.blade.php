@extends('trangchu')
@section('content')


<section id="cart_items">
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Hình ảnh</td>
						<td class="description">Tên sản phẩm</td>
						<td class="price">Giá đơn hàng</td>
						<td class="quantity">Số lượng</td>
						<td class="total">Tổng tiền</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@php
						$total = 0;
					@endphp
					@foreach(Session::get('cart') as $key => $v_cart)
					@php
						$subtotal = $v_cart['product_price']*$v_cart['product_qty'];
						$total+=$subtotal;
					@endphp
					<tr>
						<td class="cart_product">
							<a href=""><img src="{{ asset('public/images/uploads/product/'.$v_cart['product_image']) }}" width="50" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{ $v_cart['product_name'] }}</a></h4>
							<p>Ma san pham: {{ $v_cart['product_id'] }}</p>
						</td>
						<td class="cart_price">
							<p>{{ number_format($v_cart['product_price']).' '.'VND' }}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<input class="cart_quantity_input" type="text" name="quantity" value="{{ $v_cart['product_qty'] }}" autocomplete="off" size="2">
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">
								{{ $subtotal }}
							</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
</section>
<section id="do_action">
			<div class="heading">
				<h3>Thanh toan</h3>
				<p></p>
			</div>
				<div class="col-sm-13">
					<div class="total_area">
						<ul>
							<li>Tong <span>{{$total}}</span></li>
							<li>Thue <span>0 VND</span></li>
							<li>Phi van chuyen<span>0 VND</span></li>
							<li>Thanh tien <span>{{$total}}</span></li>
						</ul>
                        <a class="btn btn-default check_out" href="">Tiếp</a>
					</div>
				</div>
			</div>	
	</section>
@endsection