@extends('trangchu')
@section('content')

<section id="cart_items">
	<div class="shopper-informations">
		<div class="row">
			<div class="col-sm-12 clearfix">
				<div class="bill-to">
					<p>Thông tin người nhận hàng</p>
					<div class="form-one">
						<form action="{{ URL::to('/save-order') }}" method="post">
							{{ csrf_field() }}
							<input type="text" name="shipping_name" placeholder="Họ và tên">
							<input type="text" name="shipping_address" placeholder="Địa chỉ">
							<input type="text" name="shipping_phone" placeholder="Số điện thoại">
							<input type="text" name="shipping_email" placeholder="Email">
							<input type="submit" name="shipping_send" value="Đặt hàng" class="btn btn-primary btn-sm">
						</form>
					</div>
				</div>
			</div>				
		</div>
	</div>
</section>
@endsection