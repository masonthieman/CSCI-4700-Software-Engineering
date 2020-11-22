@extends("base.master")
@section("body_tag")
	<body class="bg-image">
@endsection
@section("body")
	<div class="container login-container bg-white ml-auto mr-auto">
		<form action="" method="post">
			@csrf
			<div class="row">
				<div class="col-12 text-center">
					<h2 class="page-heading">Sign In</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					@if (session("failed"))
						Invalid email or password
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-12 form-group">
					<i class="fa fa-user input-icon"></i>
					<input type="text" class="form-control" id="email" name="email" placeholder="Email">
				</div>
			</div>
			<div class="row">
				<div class="col-12 form-group">
					<i class="fa fa-lock input-icon"></i>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
				</div>
			</div>
			<div class="row">
				<div class="col-12 form-group">
					<button type="submit" class="btn btn-secondary btn-block">Login</button>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-12 form-group text-center">
					<a href="{{ route("login.forgot_password") }}">Forgot Password</a>
				</div>
			</div>
		</form>
	</div>
@endsection
