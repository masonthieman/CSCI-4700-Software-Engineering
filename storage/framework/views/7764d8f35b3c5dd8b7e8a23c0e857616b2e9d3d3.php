<?php if(isset($form)): ?>
	<div class="row">
		<div class="col-12 printing-col">
			
                <?php $params = [$form->poa, "Has power of attorney"] ?>
                <label>
                    <input type="checkbox" <?php echo $params[0] ? "checked" : ""; ?>>
                    <?php echo $params[1]; ?>
                </label>
		</div>
	</div>
	<div class="row">
		<div class="col-3 printing-col">
			<span class="printing-span"><?php echo e($form->poa_name); ?></span>
		</div>
		<div class="col-3 printing-col">
			<span class="printing-span"><?php echo e($form->poa_relationship); ?></span>
		</div>
		<div class="col-2 printing-col">
			<span class="printing-span"><?php echo e($form->poa_phone); ?></span>
		</div>
		<div class="col-4 printing-col">
			<span class="printing-span"><?php echo e($form->poa_email); ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-3 form-group">Name</div>
		<div class="col-3 form-group">Relationship</div>
		<div class="col-2 form-group">Phone</div>
		<div class="col-4 form-group">Email</div>
	</div>
<?php else: ?>
	<div class="row">
		<div class="col-12 form-group">
			<?php
                $params     = ["Has power of attorney", "poa", "poa"];
                $label      = $params[0];
                $name       = $params[1];
                $id         = $params[2];
                $value      = defaultParameter($params, 3, 1);
                $attributes = defaultParameter($params, 4, []);
                $checked    = defaultParameter($params, 5, False);
                echo \App\Support\Form::checkBox($name, $id, $label, $value, $attributes, $checked);
            ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 form-group">
			<label>Name</label>
			<?php echo \App\Support\Form::input('text', "poa_name"); ?>
		</div>
		<div class="col-md-3 form-group">
			<label>Relationship</label>
			<?php echo \App\Support\Form::input('text', "poa_relationship"); ?>
		</div>
		<div class="col-md-3 form-group">
			<label>Phone Number</label>
			<input data-inputmask="'mask': '(999) 999-9999'" class="form-control" name="poa_phone" type="text" value="" autocomplete="off"><div class="invalid-feedback"></div>
		</div>
		<div class="col-md-3 form-group">
			<label>Email</label>
			<?php echo \App\Support\Form::input('email', "poa_email"); ?>
		</div>
	</div>
<?php endif; ?>
