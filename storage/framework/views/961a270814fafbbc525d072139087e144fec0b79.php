

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
                        <?php if($row->user_group_id > 0): ?>
                            <form action="/admin/user-group/<?php echo e($row->user_group_id); ?>" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                <?php else: ?>
                                    <form action="/admin/user-group" method="POST">
                                        <?php endif; ?>
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <input type="hidden" name="user_group_id" value="<?php echo e($row->user_group_id); ?>">
                                        <input type="hidden" value="<?php if(isset($_GET['group_id'])): ?><?php echo e($_GET['group_id']); ?><?php endif; ?>" name="group_id">
                                        <input type="hidden" value="<?php echo e($row->avatar); ?>" name="avatar" class="image-name">

                                        <div class="box-body">
                                            <div class="form-group"  >
                                                <label>Пользователи</label>
                                                <select name="user_id" data-placeholder="Выберите" class="form-control selectpicker" data-live-search="true">

                                                    <?php $__currentLoopData = $users_row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <option <?php if($row->user_id == $item->user_id) echo 'selected '; ?> value="<?php echo e($item->user_id); ?>"><?php echo e($item['name']); ?> <?php echo e($item['last_name']); ?> <?php echo e($item['middle_name']); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                                </select>
                                            </div>
                                            <div class="form-group"  >
                                                <label>Фонд</label>
                                                <select name="group_id" data-placeholder="Выберите" class="form-control selectpicker" data-live-search="true">

                                                    <?php $__currentLoopData = $group_row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <option <?php if($row->group_id == $item->group_id) echo 'selected '; ?> value="<?php echo e($item->group_id); ?>"><?php echo e($item['group_name_ru']); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Активный</label>
                                                <select name="is_active" data-placeholder="Выберите" class="form-control" data-live-search="true">

                                                    <option <?php if($row->is_active == 0): ?> selected="selected" <?php endif; ?> value="0">Нет</option>
                                                    <option <?php if($row->is_active == 1): ?> selected="selected" <?php endif; ?> value="1">Да</option>

                                                </select>
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