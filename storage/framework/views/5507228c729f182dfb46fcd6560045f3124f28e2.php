<?php $__env->startSection("body"); ?>
<div class="container login-container bg-white ml-auto mr-auto">
    <form action="<?php echo e(route("audit-search")); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="page-heading">Search for an audit</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 form-group">
                <label>Select Table Name</label>
                <?php
                $params     = ["table"];
                $name       = $params[0];
                $attributes = defaultParameter($params, 1, []);
                $selected   = defaultParameter($params, 2, "");
                $options    = ["" => "None"];
                $tables = array_map("reset", \DB::select("SHOW TABLES"));
                foreach ($tables as $key => $value) {
                    $options[$value] = $value;
                }
                echo App\Support\Form::selectSearchable("Table", $name, $options, $attributes, $selected);
            ?>
                <small class="audit-form-errors"><?php echo e($errors->first('table')); ?></small>
            </div>
        </div>
        <div class="row">
            <div class="col-6 form-group">
                <label>Select Table Operation</label>
				<?php echo App\Support\Form::select("Operation", "operation", [
					"C" => "Create",
					"R" => "Read",
					"U" => "Update",
					"D" => "Delete",
                ]); ?>
                <small class="audit-form-errors"><?php echo e($errors->first('operation')); ?></small>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6 form-group">
				<label>Start Date</label>
                <?php echo \App\Support\Form::input('date', "start_date"); ?>
                <small class="audit-form-errors" ><?php echo e($errors->first('start_date')); ?></small>
            </div>
            <div class="col-6 form-group">
				<label>End Date</label>
                <?php echo \App\Support\Form::input('date', "end_date"); ?>
                <small class="audit-form-errors"><?php echo e($errors->first('end_date')); ?></small>
            </div>
        </div>

        <div class="row">
            <div class="col-12 form-group">
                <button type="submit" class="btn btn-secondary btn-block">Search</button>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush("scripts"); ?>
    <script>
     $(document).ready(function() {
         registration.init();
     });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make("base.master", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>