<?php $__env->startSection('title',"Edit Patient", "Patient"); ?>

<?php $__env->startSection('content'); ?>
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <form action="editpat" method="post">

            <?php echo e(csrf_field()); ?>

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
                <label for="inputAddress">Patient Name</label>
                <input type="text" name="name" class="form-control" id="inputAddress" value="<?php echo e($patient->name); ?>">
            </div>
            <div class="form-group">
                <label for="inputAddress">NIC</label>
                <input type="text" name="nic" class="form-control" id="inputAddress" value="<?php echo e($patient->nic); ?>">
            </div>
            <div class="form-group">
                <label for="inputAddress">E-mail</label>
                <input type="text" name="email" class="form-control" id="inputAddress" value="<?php echo e($patient->email); ?>">
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <textarea name="address" class="form-control" id="inputAddress" >
                    <?php echo e($patient->address); ?>

                </textarea>
            </div>
            <div class="form-group">
                <label for="inputAddress">Mobile Number</label>
                <input type="text" name="mobile" class="form-control" id="inputAddress" value="<?php echo e($patient->mobile); ?>">
            </div>





            <button type="reset" class="btn btn-primary">Clear</button>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
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