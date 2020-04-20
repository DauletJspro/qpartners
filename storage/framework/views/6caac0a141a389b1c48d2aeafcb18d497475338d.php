<?php $__env->startSection('breadcrump'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.index.profit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('admin.index.home-profit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    

    

    <?php echo $__env->make('admin.index.money', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php if(Auth::user()->role_id == 1): ?>
        <?php echo $__env->make('admin.index.statistics', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if(\App\Models\UserPacket::where('packet_id','>',2)
                                  ->where('is_active','1')
                                  ->where('user_id',Auth::user()->user_id)
                                  ->count() > 0 || Auth::user()->role_id == 1): ?>



    <?php endif; ?>

    <?php echo $__env->make('admin.index.packet', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>