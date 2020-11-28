@extends('trangchu')
@section('content')

<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Dang nhap</h2>
						<form action="{{ URL::to('/login-customor') }}" method="post">
							{{ csrf_field() }}
							<input type="text" name="login_email" placeholder="E-mail đăng nhập" />
							<input type="password" name="login_password" placeholder="Mat khau" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Nho dang nhap
							</span>
							<button type="submit" class="btn btn-default">Dang nhap</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoac</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Dang ky</h2>
						<form action="{{ URL::to('/add-customor') }}" method="post">
							{{ csrf_field() }}
							<input name="customor_name" type="text" placeholder="Ten dang nhap"/>
							<input name="customor_email" type="email" placeholder="E-mail"/>
							<input name="customor_password" type="password" placeholder="Mat khau"/>
							<input name="customor_phone" type="number" placeholder="So dien thoai"/>
							<button type="submit" class="btn btn-default">Dang ky</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection