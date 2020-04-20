

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <h1>
            <?php echo e($title); ?>

        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8" style="padding-left: 0px">
                    <div class="box box-primary">
                        <?php if(isset($error)): ?>
                            <div class="alert alert-danger">
                                <?php echo e($error); ?>

                            </div>
                        <?php endif; ?>
                        <?php if($row->group_id > 0): ?>
                            <form action="/admin/group/<?php echo e($row->group_id); ?>" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                <?php else: ?>
                                    <form action="/admin/group" method="POST">
                                        <?php endif; ?>
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <input type="hidden" name="group_id" value="<?php echo e($row->group_id); ?>">
                                        <input type="hidden" value="<?php if(isset($_GET['parent_id'])): ?><?php echo e($_GET['parent_id']); ?><?php endif; ?>" name="parent_id">
                                        <input type="hidden" value="<?php echo e($row->avatar); ?>" name="avatar" class="image-name">

                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>Наименование</label>
                                                <input value="<?php echo e($row->group_name_ru); ?>" type="text" class="form-control" name="group_name_ru" placeholder="Введите">
                                            </div>
                                            <div class="form-group">
                                                <label>Максимальное количество людей</label>
                                                <input value="<?php echo e($row->max_user_count); ?>" type="text" class="form-control" name="max_user_count" placeholder="Введите">
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Сохранить</button>
                                        </div>
                                    </form>
                    </div>
                </div>

            </div>

        </div>
    </section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>