<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">


                <div class="box-body">
                    <div class="box-header">
                        <h1 class="box-title main-title">
                            <?php echo e($title); ?>

                        </h1>
                        <?php if(Auth::user()->role_id == 1): ?>
                            <a href="/admin/shareholder/user" style="float: right">
                                <button class="btn btn-primary box-add-btn">Добавить долю</button>
                            </a>
                        <?php endif; ?>
                        <div class="clear-float"></div>
                        <div>
                              <span style="margin-right: 20px"><b>Общая доля:</b> <?php echo e($row->user_share_sum); ?> доля</span>
                              <span style="margin-right: 20px"><b>Дольщики:</b> <?php echo e($row->user_share_count); ?></span>
                              <span style="margin-right: 20px"><b>Поступления на сегодня:</b> <?php echo e($row->shareholder_profit_today); ?> $ (<?php echo e(round($row->shareholder_profit_today * \App\Models\Currency::where('currency_name','тенге')->first()->money,2)); ?>тг)</span>
                              <span style="margin-right: 20px"><b>Средний счет:</b> <?php echo e($row->shareholder_average_mount); ?> $ (<?php echo e(round($row->shareholder_average_mount * \App\Models\Currency::where('currency_name','тенге')->first()->money,2)); ?>тг)</span>
                        </div>
                    </div>
                    <div class="nav-tabs-custom">

                        <div class="tab-content" >
                            <div>
                                <form>
                                    <table id="news_datatable" class="table table-bordered table-striped table-css">
                                        <thead>
                                        <tr>
                                            <th style="width: 30px">№</th>
                                            <th style="width: 20px">Аватар</th>
                                            <th>Пользователь</th>
                                            <th>Спонсор</th>
                                            <th>Доля</th>
                                            <th>Страна/Город</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input value="<?php echo e($request->user_name); ?>" type="text" class="form-control" name="user_name" placeholder="Поиск"></td>
                                            <td><input value="<?php echo e($request->sponsor_name); ?>" type="text" class="form-control" name="sponsor_name" placeholder="Поиск"></td>
                                            <td></td>
                                            <td><input value="<?php echo e($request->city_name); ?>" type="text" class="form-control" name="city_name" placeholder="Поиск"></td>

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
                                                        <?php echo e($val->user_share); ?> доля
                                                    </div>
                                                </td>
                                                <td class="arial-font">
                                                    <div>
                                                        <?php echo e($val->country_name_ru); ?>

                                                    </div>
                                                    <div>
                                                        <?php echo e($val->city_name_ru); ?>

                                                    </div>
                                                </td>

                                            </tr>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                        <tr>
                                            <td colspan="3"></td>
                                            <td colspan="1" style="text-align: right"><b>Общая доля:</b></td>
                                            <td colspan="1"><?php echo e($row->user_share_sum); ?> доля</td>
                                            <td colspan="2"></td>
                                        </tr>

                                        </tbody>

                                    </table>
                                </form>
                            </div>

                        </div>
                    </div>


                    <div style="text-align: center">
                        <?php echo e($row->row->appends(\Illuminate\Support\Facades\Input::except('page'))->links()); ?>

                    </div>


                    <div class="nav-tabs-custom">

                        <div class="tab-content" >
                            <div>
                                <form class="submit_form">
                                    <table id="news_datatable" class="table table-bordered table-striped table-css">
                                        <thead>
                                        <tr>
                                            <th style="width: 30px">№</th>
                                            <th>Отправитель</th>
                                            <th style="width: 150px">Тип операция</th>
                                            <th style="width: 100px">Операция</th>
                                            <th>Количество</th>
                                            <th>Комментарий</th>
                                            <th>Дата</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <tr style="background-color: #ebebeb">
                                            <td></td>
                                            <td><input value="<?php echo e($request->user_name); ?>" type="text" class="form-control" name="user_name" placeholder="Поиск"></td>
                                            <td></td>
                                            <td></td>
                                            <td colspan="3" style="text-align: center">
                                                от <input style="width: 35%; display: inline-block" value="<?php echo e($request->date_from); ?>" type="text" class="form-control datetimepicker-input date-submit" name="date_from" placeholder="Дата">
                                                - до <input style="width: 35%; display: inline-block" value="<?php echo e($request->date_to); ?>" type="text" class="form-control datetimepicker-input date-submit" name="date_to" placeholder="Дата">
                                                <input type="submit" value="ОК" style="padding: 5px 7px">
                                            </td>
                                        </tr>
                                        <?php $__currentLoopData = $row->user_operation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                            <tr>
                                                <td> <?php echo e($key + 1); ?></td>
                                                <td class="arial-font">
                                                    <a class="main-label" <?php if(Auth::user()->role_id == 1): ?> href="/admin/profile/<?php echo e($val->user_id); ?>" target="_blank" <?php endif; ?>><p class="login"><?php echo e($val->login); ?></p><?php if(Auth::user()->user_id == 1): ?><p class="client-name"><?php echo e($val->name); ?> <?php echo e($val->last_name); ?> <?php echo e($val->middle_name); ?></p><?php endif; ?></a>
                                                </td>
                                                <td class="arial-font">
                                                    <?php echo e($val->operation_type_name_ru); ?> <?php if($val->operation_type_id == 9): ?> "<?php echo e($val->fond_name_ru); ?>" <?php endif; ?>
                                                </td>
                                                <td class="arial-font">
                                                    <?php echo e($val->operation_name_ru); ?>

                                                </td>
                                                <td class="arial-font">
                                                    <?php if($val->operation_type_id == 2): ?>
                                                        <?php echo e($val->money); ?> доля
                                                    <?php else: ?>
                                                        <?php echo e(round($val->money,2)); ?> $ (<?php echo e(round($val->money * \App\Models\Currency::where('currency_name','тенге')->first()->money,2)); ?>тг)
                                                    <?php endif; ?>
                                                </td>
                                                <td class="arial-font">
                                                    <?php echo e($val->operation_comment); ?>

                                                </td>
                                                <td class="arial-font">
                                                    <?php echo e($val->date); ?>

                                                </td>
                                            </tr>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                        <tr>
                                            <td colspan="4" style="text-align: right"><b>Общая сумма:</b> </td>
                                            <td colspan="1"><b><?php echo e($row->user_operation_sum); ?> $ (<?php echo e(round($row->user_operation_sum * \App\Models\Currency::where('currency_name','тенге')->first()->money,2)); ?>тг)</b></td>
                                            <td colspan="3"></td>
                                        </tr>
                                        </tbody>

                                    </table>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div style="text-align: center">
                        <?php echo e($row->user_operation->appends(\Illuminate\Support\Facades\Input::except('other_page'))->links()); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>