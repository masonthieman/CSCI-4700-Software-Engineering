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
					<h2 class="page-heading">Set Your New Password</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-12 form-group">
					<i class="fa fa-lock input-icon"></i>
					<input type="password" class="form-control{{ $errors->has("password") ? " is-invalid" : "" }}" id="password" name="password" placeholder="New Password">
				</div>
			</div>
			<div class="row">
				<div class="col-12 form-group">
					<button type="submit" class="btn btn-secondary btn-block">Change Password</button>
				</div>
			</div>
		</form>
	</div>
@endsection
