<?php $__env->startSection('title', "Employee Management"); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        <table  cellspacing="0" width="100%" border="0">
            <thead>
            <tr>
                
                <th>Actions</th>
                <td>
                    <div class="emptable">
                    <input type="text" placeholder="Search Employee" name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </td>
            </tr>
            </thead>
            <tbody>
            
                <tr>
                        
                    <td><?php echo e('Hello employee'); ?></td>

                </tr>
            
            </tbody>
        </table>
        <div class="pull-right">
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style(mix('assets/admin/css/dashboard.css'))); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>