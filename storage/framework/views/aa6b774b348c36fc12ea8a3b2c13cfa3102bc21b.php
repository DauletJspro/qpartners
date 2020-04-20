

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title box-title-first">
                        <a href="/admin/instagram/partners" class="menu-tab  active-page">Партнерские аккаунты</a>
                    </h3>
                    <h3 class="box-title box-title-second" style="margin-right: 15px" >
                        <a href="/admin/instagram/corporative" class="menu-tab">Корпоративные аккаунты</a>
                    </h3>
                    <h3 class="box-title box-title-second" >
                        <a href="/admin/instagram/recommend" class="menu-tab">Рекомендуемые аккаунты</a>
                    </h3>
                    <div class="clear-float"></div>
                </div>
                <div class="box-body">

                    <div class="nav-tabs-custom">

                        <div class="tab-content" >
                            <div>

                                    <table id="news_datatable" class="table table-bordered table-striped table-css">
                                        <thead>
                                        <tr>
                                            <th style="width: 30px">№</th>
                                            <th style="width: 20px">Аватар</th>
                                            <th>Вышестоящие партнеры</th>
                                            <th>Аккаунт инстаграм</th>
                                            <th>Действие</th>
                                            
                                        </tr>
                                        </thead>

                                        <tbody>

                                        

                                        <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                            <tr>
                                                <td> <?php echo e($key + 1); ?></td>
                                                <td>
                                                    <div class="object-image client-image">
                                                        <a href="/admin/profile/<?php echo e($val->user_id); ?>" target="_blank">
                                                            <img src="<?php echo e($val->avatar); ?>">
                                                        </a>
                                                    </div>
                                                    <div class="clear-float"></div>
                                                </td>
                                                <td class="arial-font">
                                                    <a class="main-label" href="/admin/profile/<?php echo e($val->user_id); ?>" target="_blank"><p class="login"><?php echo e($val->login); ?></p><?php if(Auth::user()->user_id == 1): ?><p class="client-name"><?php echo e($val->name); ?> <?php echo e($val->last_name); ?> <?php echo e($val->middle_name); ?></p><?php endif; ?></a>
                                                </td>
                                                <td class="arial-font">

                                                    <?php $val->instagram = str_replace(['https://instagram.com/','https://instagram.com','instagram.com/','instagram.com'],'',$val->instagram); ?>

                                                    <div>
                                                        <a style="text-decoration: underline" href="https://www.instagram.com/<?php echo e($val->instagram); ?>" target="_blank">
                                                            <?php echo e($val->instagram); ?>

                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="arial-font">
                                                    <div>

                                                            <?php $user_subscribe = \App\Models\UserSubscribe::where('sender_id',Auth::user()->user_id)->where('user_id',$val->user_id)->first(); ?>

                                                            <?php if($user_subscribe == null): ?>

                                                                <button onclick="subscribeInstagram(this,'<?php echo e($val->user_id); ?>','https://instagram.com/<?php echo e($val->instagram); ?>')" class="btn btn-block btn-success btn-sm" style="background-color: #3C8DBC !important;">Подписаться</button>

                                                            <?php elseif($user_subscribe->is_success == 0): ?>
                                                                    <a href="https://www.instagram.com/<?php echo e($val->instagram); ?>" target="_blank">
                                                                        <button class="btn btn-block btn-success btn-sm" style="background-color: #F9BF3B !important;">Отправлено</button>
                                                                    </a>
                                                            <?php else: ?>
                                                                    <a href="https://www.instagram.com/<?php echo e($val->instagram); ?>" target="_blank">
                                                                        <button class="btn btn-block btn-success btn-sm">Подписаны</button>
                                                                    </a>

                                                            <?php endif; ?>


                                                    </div>
                                                </td>
                                               
                                            </tr>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                        </tbody>

                                    </table>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>