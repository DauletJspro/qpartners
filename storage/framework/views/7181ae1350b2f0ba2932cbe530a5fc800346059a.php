

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title box-title-first">
                        <a href="/admin/group" class="menu-tab">Фонды</a>
                    </h3>
                    <?php if(Auth::user()->role_id == 1): ?>
                        <a href="/admin/group/create" style="float: right">
                            <button class="btn btn-primary box-add-btn">Добавить фонд</button>
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
                                        <th>Наименование</th>
                                        <th>Максимальное количество людей</th>
                                        <th>Участники</th>

                                        <?php if(Auth::user()->role_id == 1): ?>
                                            <th style="width: 20px"></th>
                                            <th style="width: 20px"></th>
                                        <?php endif; ?>
                                    </tr>
                                    </thead>

                                    <tbody>


                                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                        <tr>
                                            <td> <?php echo e($key + 1); ?></td>
                                            <td class="arial-font">
                                                <?php echo e($val->group_name_ru); ?>

                                            </td>
                                            <td class="arial-font">
                                                <?php echo e($val->max_user_count); ?>

                                            </td>
                                            <td class="arial-font">
                                                <a href="/admin/user-group?group_id=<?php echo e($val->group_id); ?>" target="_blank">
                                                    Посмотреть список
                                                </a>
                                            </td>

                                            <?php if(Auth::user()->role_id == 1): ?>

                                                <td style="text-align: center">
                                                    <a href="/admin/group/<?php echo e($val->group_id); ?>/edit">
                                                        <li class="fa fa-pencil" style="font-size: 20px;"></li>
                                                    </a>
                                                </td>
                                                <td style="text-align: center">
                                                    <a href="javascript:void(0)" onclick="delItem(this,'<?php echo e($val->group_id); ?>','group')">
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