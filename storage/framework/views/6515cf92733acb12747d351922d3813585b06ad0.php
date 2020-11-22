<nav class="navbar navbar-expand-xl navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo e(route("home")); ?>">
            <img src="/img/navbar_brand.png" alt="Renova">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-responsive" aria-controls="navbar-responsive"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-responsive">
            <ul class="navbar-nav ml-auto">
                
                <?php if(Auth::check()): ?>
                    <?php $__currentLoopData = config("navbar"); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!isset($options["is_manager"]) && !isset($options["is_admin"])
                            || isset($options["is_manager"]) && $options["is_manager"] == Auth::user()->is_manager
                            || isset($options["is_admin"]) && $options["is_admin"] == Auth::user()->is_admin): ?>
                            <?php
                                // For convenience sake, let's just store the class name here if it's required.
                                $classes  = isset($options["dropdown"]) ? " dropdown" : "";
                                $classes .= isNavLinkActive($key) ? " active" : "";
                            ?>
                            <li class="nav-item<?php echo e($classes); ?>">
                                <?php if(isset($options["dropdown"])): ?>
                                    <a class="nav-link dropdown-toggle" href="#" id="navbar-dropdown-iccm" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo e(__("navbar.$key")); ?>

                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbar-dropdown-iccm">
                                        <?php $__currentLoopData = $options["dropdown"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dkey => $doptions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a class="dropdown-item" href="<?php echo e(route($doptions["route"])); ?>">
                                                <?php echo e(__("navbar.$key.$dkey")); ?>

                                            </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                
                                <?php else: ?>
                                    <a class="nav-link" href="<?php echo e(route($options["route"])); ?>">
                                        <?php echo e(__("navbar.$key")); ?>

                                    </a>
                                <?php endif; ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if(auth()->guard()->check()): ?>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle btn btn-nav" id="logout-dropdown" roles="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo e(Auth::user()->email); ?>

                        </a>
                        <div class="dropdown-menu" aria-labelledby="logout-dropdown">
                            <a href="<?php echo e(route("logout")); ?>" class="dropdown-item">Sign Out</a>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-nav" href="<?php echo e(route("login")); ?>" >Sign In</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
