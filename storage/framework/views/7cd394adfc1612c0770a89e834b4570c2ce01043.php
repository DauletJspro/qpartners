<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">


                <div class="box-body">
                    <div class="box-header">
                        <h1 class="box-title main-title">
                            <?php echo e($title); ?>

                        </h1>
                        <a href="/admin/office/user" style="float: right">
                            <button class="btn btn-primary box-add-btn">Добавить офис</button>
                        </a>
                        <div class="clear-float"></div>
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
                                            <th>Директор</th>
                                            <th>Спонсор</th>
                                            <th>Офис</th>
                                            <th>Лимит</th>
                                            <th>Страна/Город</th>
                                            <th style="width: 20px"></th>
                                            <th style="width: 20px"></th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <tr>
                                            <td></td>
                                            <td><input type="hidden" value="1" name="level"></td>
                                            <td><input value="<?php echo e($request->user_name); ?>" type="text" class="form-control" name="user_name" placeholder="Поиск"></td>
                                            <td><input value="<?php echo e($request->sponsor_name); ?>" type="text" class="form-control" name="sponsor_name" placeholder="Поиск"></td>
                                            <td></td>
                                            <td></td>
                                            <td><input value="<?php echo e($request->city_name); ?>" type="text" class="form-control" name="city_name" placeholder="Поиск"></td>
                                            <td></td>
                                            <td></td>
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
                                                    <a class="main-label" href="/admin/profile/<?php echo e($val->user_id); ?>" target="_blank"><p class="login"><?php echo e($val->login); ?></p><?php if(Auth::user()->user_id == 1): ?><p class="client-name"><?php echo e($val->name); ?> <?php echo e($val->last_name); ?> <?php echo e($val->middle_name); ?></p><?php endif; ?></a>
                                                </td>
                                                <td class="arial-font">
                                                    <a class="main-label" href="/admin/profile/<?php echo e($val->recommend_id); ?>" target="_blank"><p class="login"><?php echo e($val->recommend_login); ?></p><?php if(Auth::user()->user_id == 1): ?><p class="client-name"><?php echo e($val->recommend_name); ?> <?php echo e($val->recommend_last_name); ?> <?php echo e($val->recommend_middle_name); ?></p><?php endif; ?></a>
                                                </td>
                                                <td class="arial-font">
                                                    <div>
                                                        <?php echo e($val->office_name); ?>

                                                    </div>
                                                </td>
                                                <td class="arial-font">
                                                    <div>
                                                        <?php echo e($val->office_limit); ?>

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
                                                <td style="text-align: center">
                                                    <a href="/admin/office/user/<?php echo e($val->user_id); ?>">
                                                        <li class="fa fa-pencil" style="font-size: 20px;"></li>
                                                    </a>
                                                </td>
                                                <td style="text-align: center">
                                                    <a href="javascript:void(0)" onclick="delItem(this,'<?php echo e($val->user_id); ?>','office')">
                                                        <li class="fa fa-trash-o" style="font-size: 20px; color: red;"></li>
                                                    </a>
                                                </td>
                                            </tr>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                        </tbody>

                                    </table>
                                </form>
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