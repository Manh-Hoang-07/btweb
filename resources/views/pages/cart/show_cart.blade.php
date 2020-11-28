@extends('trangchu')
@section('content')


<section id="cart_items">
		<div class="table-responsive cart_info">
			
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Hinh anh</td>
						<td class="description">Ten san pham</td>
						<td class="price">Gia</td>
						<td class="quantity">So luong</td>
						<td class="total">Tong</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach($content as $key => $v_content)
					<tr>
						<td class="cart_product">
							<a href=""><img src="{{ URL::to('public/images/uploads/product/'.$v_content->options->image) }}" width="50" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{$v_content->name}}</a></h4>
							<p>Ma san pham: {{$v_content->id}}</p>
						</td>
						<td class="cart_price">
							<p>{{number_format($v_content->price).' '.'VND'}}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<a class="cart_quantity_up" href=""> + </a>
								<input class="cart_quantity_input" type="text" name="quantity" value="{{$v_content->qty}}" autocomplete="off" size="2">
								<a class="cart_quantity_down" href=""> - </a>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">
								{{ $subtotal = number_format(($v_content->qty)*($v_content->price)).' '.'VND' }}</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="{{ URL::to('delete-cart/'.$v_content->rowId) }}"><i class="fa fa-times"></i></a>
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
							<li>Tong <span>{{ Cart::subtotal().' '.'VND' }}</span></li>
							<li>Thue <span>0 VND</span></li>
							<li>Phi van chuyen<span>0 VND</span></li>
							<li>Thanh tien <span>{{ (Cart::subtotal()).' '.'VND' }}</span></li>
						</ul>
							<!-- <a class="btn btn-default update" href="">Cap nhat</a> -->
							
							<?php
                                $customor_id = Session::get('customor_id');
                                if($customor_id==NULL) {
                                ?>
                                <a class="btn btn-default check_out" href="{{ URL::to('/login-checkout') }}">Tiếp</a>
                                <?php
                                }else{
                                ?>
                                <a class="btn btn-default check_out" href="{{ URL::to('/checkout') }}">Tiếp</a>
                                <?php }
                                ?>
					</div>
				</div>
			</div>
		
	</section><!--/#do_action-->
@endsection