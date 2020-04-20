<?php $__env->startSection('breadcrump'); ?>

    <section class="content-header">
        <h1>
            Структура
        </h1>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="structure-list">
                <div class="obsdiv" style="padding: 0 10px">
                    <div class="ulist">
                        <?php
                        $user_id = Auth::user()->user_id;
                        if(Auth::user()->role_id == 1)  $user_id = 1;
                        $user_list = \App\Models\Users::where('recommend_user_id',$user_id)->take(20)->get();

                        $user = \App\Models\Users::leftJoin('user_status','user_status.user_status_id','=','users.status_id')
                                                ->where('user_id',$user_id)
                                                ->first();
                        ?>

                        <ul class="level_1">
                            <li class="parent">

                                <?php
                                $lo_profit = \App\Models\UserPacket::where('is_active',1)
                                        ->where('user_id',Auth::user()->user_id)
                                        ->sum('packet_price');
                                ?>


                                <?php if(count($user_list) > 0): ?>
                                    <span onclick="opUl(this)">+</span>
                                    <div class="dval act user-name">
                                        <div class="object-image client-image">
                                            <a <?php if(Auth::user()->role_id == 1): ?> href="/admin/profile/<?php echo e($user->user_id); ?>" target="_blank" <?php endif; ?>>
                                                <img src="<?php echo e($user->avatar); ?>">
                                            </a>
                                        </div>
                                        <div class="left-float client-name">
                                            <?php echo e($user->login); ?>  <?php if(Auth::user()->user_id == 1): ?> (<?php echo e($user->name); ?> <?php echo e($user->last_name); ?>) <?php endif; ?> <?php echo $__env->make('admin.structure.user_packet_list_loop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            <div style="padding-top: 5px; color: rgb(58, 58, 58);">
                                                <p style="color: #009551; margin: 0px">Квалификация: <?php echo e($user->user_status_name); ?></p>
                                                <div>
                                                    <p style="font-weight: 900; margin: 0px">ЛО: <?php echo e($lo_profit); ?> $ (<?php echo e(round($lo_profit * \App\Models\Currency::where('currency_name','тенге')->first()->money,2)); ?>тг)</p>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="clear-float"></div>
                                    </div>
                                    <ul class="level_2">
                                        <?php echo view('admin.structure.structure-list-loop-ajax',['user_id' => $user_id,'level' => '3']); ?>

                                    </ul>
                                <?php else: ?>
                                    <div class="dval act user-name">
                                        <div class="object-image client-image">
                                            <a <?php if(Auth::user()->role_id == 1): ?> href="/admin/profile/<?php echo e($user->user_id); ?>" target="_blank" <?php endif; ?>>
                                                <img src="<?php echo e($user->avatar); ?>">
                                            </a>
                                        </div>
                                        <div class="left-float client-name">
                                            <?php echo e($user->login); ?>  <?php if(Auth::user()->user_id == 1): ?> <?php echo e($user->name); ?> <?php echo e($user->last_name); ?> <?php endif; ?> <?php echo $__env->make('admin.structure.user_packet_list_loop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            <div style="padding-top: 5px; color: rgb(58, 58, 58);">
                                                <p style="color: #009551; margin: 0px">Квалификация: <?php echo e($user->user_status_name); ?></p>
                                                <div>
                                                    <p style="font-weight: 900; margin: 0px">ЛО: <?php echo e($lo_profit); ?> $ (<?php echo e(round($lo_profit * \App\Models\Currency::where('currency_name','тенге')->first()->money,2)); ?>тг)</p>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="clear-float"></div>
                                    </div>
                                <?php endif; ?>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>