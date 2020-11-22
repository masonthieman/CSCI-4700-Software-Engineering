
<?php $__env->startSection("body_tag"); ?>
	<body class="bg-image">
<?php $__env->stopSection(); ?>
<?php $__env->startSection("body"); ?>
	<div class="container login-container bg-white ml-auto mr-auto">
		<form action="" method="post">
			<?php echo csrf_field(); ?>
			<div class="row">
				<div class="col-12 text-center">
					<h2 class="page-heading">Sign In</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<?php if(session("failed")): ?>
						Invalid email or password
					<?php endif; ?>
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
					<a href="<?php echo e(route("login.forgot_password")); ?>">Forgot Password</a>
				</div>
			</div>
		</form>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("base.master", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>