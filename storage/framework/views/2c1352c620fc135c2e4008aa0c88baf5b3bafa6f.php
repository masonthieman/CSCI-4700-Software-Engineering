<?php
    $tableClasses  = ["table", "table-striped", "bg-white"];
    $booleanFields = isset($booleanFields) ? $booleanFields : [];
    $clickable     = isset($clickable) ? $clickable : False;
    $data          = isset($data) ? $data : [];
    $loading       = isset($loading) ? $loading : False;
    $pagination    = isset($pagination) ? $pagination : True;
    $perPage       = isset($perPage) ? max($perPage, 1) : 15;
    $page          = isset($page) ? min($page, (int) floor(count($data)/$perPage)) : 0;
    if ($pagination) {
        $rows = array_slice($data, $page*$perPage, $perPage);
    } else {
        $rows = $data;
    }
    if (isset($bordered) && $bordered) {
        $tableClasses[] = "table-bordered";
    }
    if ($clickable) {
        $tableClasses[] = "table-hover table-cursor-pointer";
    }
    if (isset($small) && $small) {
        $tableClasses[] = "table-sm";
    }
    $tableSettings = [
        "booleanFields"  => $booleanFields,
        "clickable"      => $clickable,
        "columns"        => $columns,                                               
        "dateIndex"      => isset($dateIndex) ? $dateIndex : Null,
        "keywordIndices" => isset($keywordIndices) ? $keywordIndices : [],
        "page"           => isset($page) ? $page : 0,
        "pagination"     => isset($pagination) ? $pagination : True,
        "perPage"        => isset($perPage) ? $perPage : 15
    ];
?>
<div data-table="<?php echo e($name); ?>">
    <div class="table-responsive-xl">
        <table class="<?php echo e(implode(' ', $tableClasses)); ?>">
            <thead>
                <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th scope="col"><?php echo e(__("tables.$name.$col")); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </thead>
            <tbody>
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr data-index="<?php echo e($loop->index + ($pagination ? $page*$perPage : 0)); ?>">
                        <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->first): ?>
                                <th scope="row"><?php echo e($row[$col]); ?></th>
                            <?php else: ?>
                                <td>
                                    <?php echo $row[$col]; ?>

                                </td>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <div class="table-loading lds-dual-ring m-auto" <?php echo !$loading ? 'style="display: none;"' : ""; ?>><div></div><div></div></div>
    </div>
    <?php if($pagination): ?>
        <nav>
            <ul class="pagination">
                <li class="page-item<?php echo e($page == 0 ? " disabled" : ""); ?>">
                    <button class="page-link" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </button>
                </li>
                <li class="page-item<?php echo e($page == floor(count($data)/$perPage) ? " disabled" : ""); ?>">
                    <button class="page-link" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </button>
                </li>
            </ul>
        </nav>
    <?php endif; ?>
</div>
<?php $__env->startPush("scripts"); ?>
    <script>
        $(document).ready(function() {
            //e.preventDefault();
            //return false;
            //return true;
            table("<?php echo e($name); ?>").setup(<?php echo json_encode($tableSettings); ?>).setData(<?php echo json_encode($data); ?>);
        });
    </script>
<?php $__env->stopPush(); ?>
