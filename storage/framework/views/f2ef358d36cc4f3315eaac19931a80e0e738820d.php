<?php $__env->startSection("body"); ?>
    <div class="container bg-white">
        <form action="" method="post" autocomplete="off" name="registration_form">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-heading">Patient Registration</h2>
                </div>
            </div>
            <?php echo $__env->make('form.patient-information', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class='row'><div class='col-12'><hr></div></div>
            <?php echo $__env->make('component.power-of-attorney', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="row">
                <div class="col-md-12 form-group">
                    <div class="form-check text-right custom-control custom-checkbox">
                        <input class="form-check-input" type="checkbox" value="1" id="enroll-ccm" name="enroll_iccm">
                        <label class="form-check-label" for="enroll-ccm">Enroll in CCM</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <div class="form-check text-right">
                        <input class="form-check-input" type="checkbox" value="1" id="enroll-awv" name="enroll_awv">
                        <label class="form-check-label" for="enroll-awv">Enroll in AWV</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <div class="form-check text-right">
                        <input class="form-check-input" type="checkbox" value="1" id="enroll-tcm" name="enroll_tcm">
                        <label class="form-check-label" for="enroll-tcm">Enroll in TCM</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <div class="form-check text-right">
                        <input class="form-check-input" type="checkbox" value="1" id="enroll-other" name="enroll_other">
                        <label class="form-check-label" for="enroll-other">Enroll Other</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-left form-group">
                    <a class="btn btn-primary" href="<?php echo e(route('home')); ?>">Cancel</a>
                </div>
                <div class="col-6 text-right form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
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