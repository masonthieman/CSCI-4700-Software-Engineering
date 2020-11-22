<div class="row">
	<div class="col-12">
		<ul class="nav mb-3 nav-tabs nav-fill" id="<?php echo e("$name-tab-bar"); ?>" role="tablist">
			<?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li class="nav-item">
					<?php if($loop->first): ?>
						<a class="nav-link nav-page-btn active" id="<?php echo e("tabs-$name-$tab-tab"); ?>" data-toggle="tab" href="<?php echo e("#tabs-$name-$tab"); ?>" role="tab" aria-controls="<?php echo e("tabs-$name-$tab"); ?>" area-selected="true" data-change-tab="<?php echo e("$tab"); ?>">
					<?php else: ?>
						<a class="nav-link nav-page-btn" id="<?php echo e("tabs-$name-$tab-tab"); ?>" data-toggle="tab" href="<?php echo e("#tabs-$name-$tab"); ?>" role="tab" aria-controls="<?php echo e("tabs-$name-$tab"); ?>" area-selected="false" data-change-tab="<?php echo e("$tab"); ?>">
					<?php endif; ?>
						<?php echo e(__("tabs.$name.$tab")); ?>

					</a>
				</li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-12 tab-content" id="<?php echo e("$name-tab-content"); ?>">
		<?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($loop->first): ?>
				<div class="tab-pane fade show active" id="<?php echo e("tabs-$name-$tab"); ?>" role="tabpanel" aria-labelledby="<?php echo e("tabs-$name-$tab-tab"); ?>">
			<?php else: ?>
				<div class="tab-pane fade" id="<?php echo e("tabs-$name-$tab"); ?>" role="tabpanel" aria-labelledby="<?php echo e("tabs-$name-$tab-tab"); ?>">
			<?php endif; ?>
				<?php echo $$tab; ?> 
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</div>
