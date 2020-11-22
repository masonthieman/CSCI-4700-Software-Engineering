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
					<h2 class="page-heading">Forgot Password</h2>
				</div>
			</div>
			@if(session("sent"))
				<div class="row">
					<div class="col-12 text-center form-group">
						An email has been sent with further instructions.
					</div>
				</div>
			@else
				<div class="row">
					<div class="col-12 form-group">
						<i class="fa fa-user input-icon"></i>
						<input type="text" class="form-control{{ $errors->has("email") ? " is-invalid" : "" }}" id="email" name="email" placeholder="Email">
					</div>
				</div>
				<div class="row">
					<div class="col-12 form-group">
						<button type="submit" class="btn btn-secondary btn-block">Continue</button>
					</div>
				</div>
			@endif
		</form>
	</div>
@endsection
