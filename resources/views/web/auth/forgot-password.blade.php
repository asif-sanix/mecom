@extends('web.layouts.master')

@section('main')

<div class="page-content pt-150 pb-150">
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-10 col-md-12 m-auto">
				<div class="row">
					<div class="col-lg-6 pr-30 d-none d-lg-block">
						<img class="border-radius-15" src="assets/imgs/page/login-1.png" alt="" />
					</div>
					<div class="col-lg-6 col-md-8">
						<div class="login_wrap widget-taber-content background-white">
							<div class="padding_eight_all bg-white">
								<div class="heading_s1">
									<h1 class="mb-5">Reset Password</h1>
									<p class="mb-30">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
								</div>
								<form method="POST" action="{{ route('password.email') }}">
									@csrf
									
									<div class="form-group">
										<input required="" type="email" name="email" placeholder="Enter Your Email" />
										<small class="text-danger">{{ $errors->first('email') }}</small>
									</div>
									
								
									<div class="form-group">
										<button type="submit" class="btn btn-heading btn-block hover-up" name="login">Email Password Reset Link</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection