

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title box-title-first">
                        <a href="/admin/instagram/partners" class="menu-tab">Партнерские аккаунты</a>
                    </h3>
                    <h3 class="box-title box-title-second" style="margin-right: 15px" >
                        <a href="/admin/instagram/corporative" class="menu-tab active-page">Корпоративные аккаунты</a>
                    </h3>
                    <h3 class="box-title box-title-second" >
                        <a href="/admin/instagram/recommend" class="menu-tab">Рекомендуемые аккаунты</a>
                    </h3>
                    <?php if(Auth::user()->role_id == 1): ?>
                        <a href="/admin/instagram/create" style="float: right">
                            <button class="btn btn-primary box-add-btn">Добавить аккаунт</button>
                        </a>
                    <?php endif; ?>

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
                                        <th>Аккаунт</th>
                                        <th>Аккаунт инстаграм</th>
                                        <th>Действие</th>
                                        <?php if(Auth::user()->role_id == 1): ?>
                                            <th style="width: 20px"></th>
                                            <th style="width: 20px"></th>
                                        <?php endif; ?>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    

                                    <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                        <tr>
                                            <td> <?php echo e($key + 1); ?></td>
                                            <td>
                                                <div class="object-image client-image">
                                                    <a href="https://www.instagram.com/<?php echo e($val->instagram); ?>" target="_blank">
                                                        <img src="<?php echo e($val->avatar); ?>">
                                                    </a>
                                                </div>
                                                <div class="clear-float"></div>
                                            </td>
                                            <td class="arial-font">
                                                <?php echo e($val->name); ?>

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


                                                    <?php $user_subscribe = \App\Models\UserSubscribe::where('sender_id',Auth::user()->user_id)->where('instagram_id',$val->instagram_id)->first(); ?>

                                                    <?php if($user_subscribe == null): ?>

                                                        <button onclick="subscribeInstagramPartner(this,'<?php echo e($val->instagram_id); ?>','https://instagram.com/<?php echo e($val->instagram); ?>')" class="btn btn-block btn-success btn-sm" style="background-color: #3C8DBC !important;">Подписаться</button>

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

                                            <?php if(Auth::user()->role_id == 1): ?>

                                                <td style="text-align: center">
                                                     <a href="/admin/instagram/<?php echo e($val->instagram_id); ?>/edit">
                                                         <li class="fa fa-pencil" style="font-size: 20px;"></li>
                                                     </a>
                                                 </td>
                                                 <td style="text-align: center">
                                                     <a href="javascript:void(0)" onclick="delItem(this,'<?php echo e($val->instagram_id); ?>','instagram')">
                                                         <li class="fa fa-trash-o" style="font-size: 20px; color: red;"></li>
                                                     </a>
                                                 </td>

                                            <?php endif; ?>

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