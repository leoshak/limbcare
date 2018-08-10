<?php $__env->startSection('title', __('views.membership.title')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>ID</th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('email', __('views.membership.table_header_0'),['page' => $users->currentPage()]));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name',  __('views.membership.table_header_1'),['page' => $users->currentPage()]));?></th>
                <th><?php echo e(__('views.membership.table_header_2')); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td>
                        <?php if($user->hasRoles(config('protection.except_roles'))): ?>
                            <div class="line_30 h5">
                                &nbsp;
                            </div>
                        <?php else: ?>
                            <a title="Repeat validation" class="btn btn-default pull-right" href="<?php echo e(route('admin.permissions.repeat',$user)); ?>">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                            </a>
                            <?php if($user->protectionValidation): ?>
                                <table class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th><?php echo e(__('views.membership.table_header_3')); ?></th>
                                        <th><?php echo e(__('views.membership.table_header_4')); ?></th>
                                        <th><?php echo e(__('views.membership.table_header_5')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $__currentLoopData = $user->protectionValidation->validation_result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td style="width: 30%"><?php echo e($result['productModuleNumber']); ?></td>
                                            <td style="width: 10%">
                                                <?php if($result['valid']): ?>
                                                    <span class="label label-primary"><?php echo e(__('views.membership.valid')); ?></span>
                                                <?php else: ?>
                                                    <span class="label label-danger"><?php echo e(__('views.membership.not_valid')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php echo e(isset($result['expires'])?$result['expires']:''); ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div class="line_30 h4">
                                    Not validated
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="pull-right">
            Powered by <a href="http://netlicensing.io/?utm_source=Laravel_Boilerplate&utm_medium=github&utm_campaign=laravel_boilerplate&utm_content=poweredby" target="_blank"/>Labs64 NetLicensing</a>
        </div>
        <div class="pull-right">
            <?php echo e($users->links()); ?>

        </div>
        <div>
            <h4>How To</h4>
            <ul>
              <li>Manage available membership plans - <a href="https://go.netlicensing.io/console/v2/content/vendor/licensetemplate.xhtml?filterkey=productModuleNumber&filtervalue=<?php echo e(config('protection.membership.product_module_number')); ?>" target="_blank"/>NetLicensing Management Console » License Templates</a></li>
              <li>View and manage registered users - <a href="https://go.netlicensing.io/console/v2/content/vendor/licensee.xhtml?filterkey=productNumber&filtervalue=<?php echo e(config('protection.product_number')); ?>" target="_blank"/>NetLicensing Management Console » Licensees</a></li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>