<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h1 class="box-title main-title">
                        <?php echo e($title); ?>

                    </h1>
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
                                        <th style="width: 15px">Аватар</th>
                                        <th>Пользователь</th>
                                        <th>Спонсор</th>
                                        <th>Email / Телефон</th>
                                        <th>Объем</th>
                                        <th>Баланс</th>
                                        <th>Подробнее</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <tr>
                                        <td></td>
                                        <td>

                                        </td>
                                        <td>
                                            <form>
                                                <input value="<?php echo e($request->user_name); ?>" type="text" class="form-control" name="user_name" placeholder="Поиск">
                                            </form>
                                        </td>
                                        <td>
                                            <form>
                                                <input value="<?php echo e($request->sponsor_name); ?>" type="text" class="form-control" name="sponsor_name" placeholder="Поиск">
                                            </form>
                                        </td>
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td>

                                        </td>

                                    </tr>

                                    <?php $__currentLoopData = $row->row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

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
                                                <a class="main-label" href="/admin/profile/<?php echo e($val->user_id); ?>" target="_blank"><p class="login"><?php echo e($val->login); ?></p><p class="client-name"><?php echo e($val->name); ?> <?php echo e($val->last_name); ?> <?php echo e($val->middle_name); ?></p><?php if($val->is_activated == 0): ?> <p style="color: red">Не активирован</p> <?php endif; ?></a>
                                            </td>
                                            <td class="arial-font">
                                                <a class="main-label" href="/admin/profile/<?php echo e($val->recommend_id); ?>" target="_blank"><p class="login"><?php echo e($val->recommend_login); ?></p><p class="client-name"><?php echo e($val->recommend_name); ?> <?php echo e($val->recommend_last_name); ?> <?php echo e($val->recommend_middle_name); ?></p></a>
                                            </td>
                                            <td class="arial-font">
                                                <div>
                                                    <?php echo e($val->email); ?> </br>
                                                    <?php echo e($val->phone); ?>

                                                </div>
                                            </td>
                                            <td class="arial-font">
                                                <?php
                                                $lo_profit = \App\Models\UserPacket::where('is_active',1)
                                                        ->where('user_id',$val->user_id)
                                                        ->sum('packet_price');
                                                ?>
                                                <div>
                                                    <span style="font-weight: 900">ЛО: <?php echo e($lo_profit); ?> $ (<?php echo e(round($lo_profit * \App\Models\Currency::where('currency_name','тенге')->first()->money,2)); ?>тг)</span>
                                                </div>
                                                <div>
                                                    <span style="font-weight: 900">ЛКО: <?php echo e($val->left_child_profit); ?> PV </span>
                                                    <span style="font-weight: 900">ПКО: <?php echo e($val->right_child_profit); ?> PV</span>
                                                </div>
                                            </td>
                                            <td class="arial-font">
                                                <div>
                                                    <span style="font-weight: 900"><?php echo e($val->user_money); ?> $ (<?php echo e(round($val->user_money * \App\Models\Currency::where('currency_name','тенге')->first()->money,2)); ?>тг)</span>
                                                </div>
                                            </td>
                                            <td class="arial-font">
                                                <a href="/admin/operation?user_id=<?php echo e($val->user_id); ?>" target="_blank" style="text-decoration: underline">Подробнее</a>
                                            </td>
                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>


                    <div style="text-align: center">
                        <?php echo e($row->row->appends(\Illuminate\Support\Facades\Input::except('page'))->links()); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>