<?php $__env->startSection('content'); ?>
    <div class="row title-section">
        <div class="col-12 col-md-8">
        <?php $__env->startSection('title', "Financial Management"); ?>
        </div>
        <div class="col-12 col-md-12">
        <div class="row tile_count">
                <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><font size="+2"><i class="fa fa-money"> </i> Total Profit</font></span>
                    <div>
                        <span class="count green">RS.</span>
                        <span class="count"><?php echo e($profit); ?></span>
                        <span class="count red">.00</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><font size="+2"><i class="fa fa-dollar"></i> Total income</font></span>
                    <div>
                        <span class="count green">RS.</span>
                        <span class="count"><?php echo e($incomes); ?></span>
                        <span class="count red">.00</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><font size="+2"><i class="fa fa-dollar "></i> Total expenses</font></span>
                    <div>
                        <span class="count green">RS.</span>
                        <span class="count"><?php echo e($outcomes); ?></span>
                        <span class="count red">.00</span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="col-12">
            <div class="row">
                        <div class="col-xs-4" style="padding-top: 90px;">
                            <center> <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="\image\finacial\bill.png" alt="Card image cap" height="200" width="200">
                            <center>  <a href="<?php echo e(route('admin.financial.index_bill')); ?>" class="btn btn-primary" >Bill payment </a></center>
                          </div>
                        </div>
                        <div class="col-xs-4" style="padding-top: 90px;">
                            <center> <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="\image\finacial\payement.png" alt="Card image cap" height="200" width="200">
                            <center>  <a href="<?php echo e(route('admin.financial.index_salary')); ?>" class="btn btn-primary" >Salary payment </a></center>
                            </div></center>
                        </div>
                        <div class="col-xs-4" style="padding-top: 90px;">
                            <center> <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="\image\finacial\otherpayment.png" alt="Card image cap" height="200" width="200">
                            <center>  <a href="<?php echo e(route('admin.financial.index_other')); ?>" class="btn btn-primary" >Other payment </a></center>
                            </div></center>
                        </div>
            </div>
    </div>
    
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>