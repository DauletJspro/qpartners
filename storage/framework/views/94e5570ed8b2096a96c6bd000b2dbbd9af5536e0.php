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
                                    <form action="/admin/office/user" method="POST">

                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <input type="hidden" name="edit_user_id" value="<?php echo e($user_id); ?>">

                                        <div class="box-body">

                                            <?php if($user_id == null): ?>

                                                <div class="form-group"  >
                                                    <label>Директор</label>
                                                    <select name="user_id" data-placeholder="Выберите" class="form-control selectpicker" data-live-search="true">

                                                        <?php $__currentLoopData = $users_row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                            <option <?php if($row->user_id == $item->user_id) echo 'selected '; ?> value="<?php echo e($item->user_id); ?>"><?php echo e($item['name']); ?> <?php echo e($item['last_name']); ?> <?php echo e($item['middle_name']); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                                    </select>
                                                </div>

                                           <?php else: ?>

                                                <input type="hidden" name="user_id" value="<?php echo e($user_id); ?>">

                                            <?php endif; ?>




                                            <div class="form-group">
                                                <label>Офис</label>
                                                <input value="<?php echo e($row->office_name); ?>" type="text" class="form-control" name="office_name" placeholder="Введите">
                                            </div>

                                            <div class="form-group">
                                                <label>Лимит дохода</label>
                                                <input value="<?php echo e($row->office_limit); ?>" type="text" class="form-control" name="office_limit" placeholder="Введите">
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