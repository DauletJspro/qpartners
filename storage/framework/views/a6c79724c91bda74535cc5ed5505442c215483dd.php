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
                           <?php if($row->video_id > 0): ?>
                               <form action="/admin/video/<?php echo e($row->video_id); ?>" method="POST">
                                   <input type="hidden" name="_method" value="PUT">
                           <?php else: ?>
                               <form action="/admin/video" method="POST">
                           <?php endif; ?>
                                   <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                   <input type="hidden" name="video_id" value="<?php echo e($row->video_id); ?>">
                                   <input type="hidden" value="<?php if(isset($_GET['parent_id'])): ?><?php echo e($_GET['parent_id']); ?><?php endif; ?>" name="parent_id">
                                   <input type="hidden" value="<?php echo e($row->video_image); ?>" name="video_image" class="image-name">

                                   <div class="box-body">
                                       <div class="form-group">
                                           <label>Название (Рус)</label>
                                           <input value="<?php echo e($row->video_name_ru); ?>" type="text" class="form-control" name="video_name_ru" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Название (Каз)</label>
                                           <input value="<?php echo e($row->video_name_kz); ?>" type="text" class="form-control" name="video_name_kz" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Название (Анг)</label>
                                           <input value="<?php echo e($row->video_name_en); ?>" type="text" class="form-control" name="video_name_en" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Cсылка на видео (Рус)</label>
                                           <input value="<?php echo e($row->video_text_ru); ?>" type="text" class="form-control" name="video_text_ru" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Cсылка на видео (Каз)</label>
                                           <input value="<?php echo e($row->video_text_kz); ?>" type="text" class="form-control" name="video_text_kz" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Cсылка на видео (Анг)</label>
                                           <input value="<?php echo e($row->video_text_en); ?>" type="text" class="form-control" name="video_text_en" placeholder="Введите">
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