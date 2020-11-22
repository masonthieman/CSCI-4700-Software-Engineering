<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="icon" href="/favicon.ico">
	<title>Renova</title>
	<link rel='stylesheet' href='/css/<?php echo "app" ?>.css'/>
	<?php echo $__env->yieldPushContent("head"); ?>
</head>
<?php $__env->startSection("body_tag"); ?>
	<body class="bg-navy">
<?php echo $__env->yieldSection(); ?>
	<div id="app">
		<div class="no-scroll">
			<?php echo $__env->make("component.navbar", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<div class="no-scroll-container">
				<?php echo $__env->yieldContent("body"); ?>
			</div>
		</div>
	</div>
	<script src='/js/<?php echo "app" ?>.js'></script>
	<?php echo $__env->yieldPushContent("scripts"); ?>
</body>
</html>
