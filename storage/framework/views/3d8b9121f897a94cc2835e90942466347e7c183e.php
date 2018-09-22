<?php $__env->startSection('content'); ?>
    <div class="row title-section">
        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
            <?php $__env->startSection('title', "Appointments"); ?>
        </div>
        <div class=".col-xs-6 .col-lg-4 searchbar-addbt">
            <div class="topicbar">
                
                <?php echo e(link_to_route('admin.appointments.add', 'Add Appointment', null, ['class' => 'btn btn-primary'])); ?>

            </div>
            <div class="right-searchbar">
                <!-- Search form -->
                <form class="form-inline active-cyan-3">
                    <input class="form-control form-control-sm ml-3 w-100" type="text" placeholder="Search" aria-label="Search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <?php if(Session::has('message')): ?>
            <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                width="100%">
            <thead> 
            <tr>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('id', "ID",['page' => '']));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('date', "Date",['page' => '']));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('time', "Time",['page' => '']));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name', "Name",['page' => '']));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('type', "Type",['page' => '']));?></th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($appointment->id); ?></td>
                        <td><?php echo e($appointment->date); ?></td>
                        <td><?php echo e($appointment->time); ?></td>
                        <td><?php echo e($appointment->name); ?></td>
                        <td><?php echo e($appointment->type); ?></td>
                        <td>
                            
                                <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.appointments.show', [$appointment->id])); ?>">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.appointments.edit', [$appointment->id])); ?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-xs btn-danger" onclick="return confirm('Will be permanently deleted?')" href="<?php echo e(route('admin.appointments.delete', $appointment->id)); ?>">
                                    <i class="fa fa-trash"></i>
                                </a>
                                
                            
                                
                                        
                                    
                                
                            
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="pull-right">
            
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style('assets/admin/css/my_style.css')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>