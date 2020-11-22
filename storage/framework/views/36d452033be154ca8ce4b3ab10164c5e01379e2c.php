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
	<body>
<?php echo $__env->yieldSection(); ?>
	<div id="app">
		<?php echo $__env->make("component.navbar", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->yieldContent("body"); ?>
		<div class="hidden" id="dynamic-templates">
			<?php echo $__env->yieldPushContent("dynamic_templates"); ?>
		</div>
	</div>
	<script src='/js/<?php echo "app" ?>.js'></script>
	<?php echo $__env->yieldPushContent("scripts"); ?>
	<?php if(isset($printing) && $printing): ?>
		<script>
			printing();
		</script>
	<?php endif; ?>
</body>
</html>
