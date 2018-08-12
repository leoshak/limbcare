<?php $__env->startSection('content'); ?>
    <div class="row">
        
        <div class="row topicbar">
            <?php $__env->startSection('title', "Employee Management"); ?>
            <div class="right-searchbar">
                <!-- Search form -->
                <form class="form-inline active-cyan-3">
                    <input class="form-control form-control-sm ml-3 w-100" type="text" placeholder="Search" aria-label="Search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-3">
                <div class="card">
                    <div class="card-header">
                        <img src="<?php echo e(URL::asset('img/nickfrost.jpg')); ?>" alt="Pic" height="200" width="200">
                        
                        
                        <span class="card-title">Employee Name</span>
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-success">Update</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="card">
                    <div class="card-header">
                        <img src="" alt="Pic" class="card-img">
                        
                        <span class="card-title">Employee Name</span>
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-success">Update</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style('assets/admin/css/my_style.css')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>