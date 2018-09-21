<?php $__env->startSection('title',"Add an Appointment", "Appointment"); ?> 

<?php $__env->startSection('content'); ?>
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <?php echo Form::open(array('route' => 'admin.appointments.store')); ?>

             <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            
            <div class="form-group">
                <?php echo Form::label('name', 'Name'); ?>

                <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('date', 'Date'); ?>

                <?php echo Form::date('date', null, ['class' => 'form-control', 'min'=>date('Y-m-d')]); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('time', 'Time'); ?>

                <?php echo Form::time('time', null, ['class' => 'form-control', 'min'=>'08:30', 'max'=>'17:30']); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('type', 'Appointment Type'); ?>

                <?php echo Form::select('type', ['Repair' => 'Repair', 'Checkup' => 'Checkup', 'New'=> 'New'], null, ['placeholder' => 'Choose...', 'class'=> 'form-control']); ?>

            </div>

            <a href="<?php echo e(route('admin.appointments')); ?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Go Back</a>
            <?php echo Form::button('Clear', ['type' => 'reset', 'class' => 'btn btn-danger']); ?>

            <?php echo Form::button('Add', ['type' => 'submit', 'class' => 'btn btn-primary']); ?>

            
        <?php echo Form::close(); ?>

    </div>

    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style(mix('assets/admin/css/users/edit.css'))); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    ##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
    <?php echo e(Html::script(mix('assets/admin/js/users/edit.js'))); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>