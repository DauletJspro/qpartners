<?php $__env->startSection('breadcrump'); ?>

    <section class="content-header">
        <h1>
            История покупок
        </h1>

        <div style="text-align: right">
            <a style="font-size: 20px;text-decoration: underline;" href="/admin/online">Перейти в магазин<span id="basket_count" class="label label-primary pull-right" style=" background-color: rgb(253, 58, 53) ! important; font-size: 15px; border-radius: 50%"><?php echo e($row->basket_count); ?></span></a>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <h2 class="page-header">История покупок</h2>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="packet_datatable" class="table table-bordered table-striped">
                        <thead>
                        <tr style="border: 1px">
                            <th style="width: 30px">№</th>
                            <th></th>
                            <th>Название</th>
                            <th>Цена</th>
                            <th>Количество</th>
                            <th>Дата</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php $sum = 0; ?>

                        <?php $__currentLoopData = $row->basket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                            <tr>
                                <td> <?php echo e($key + 1); ?></td>
                                <td>
                                    <div class="object-image">
                                        <a class="fancybox" href="<?php echo e($val->product_image); ?>">
                                            <img src="<?php echo e($val->product_image); ?>">
                                        </a>
                                    </div>
                                    <div class="clear-float"></div>
                                </td>
                                <td>
                                    <?php echo e($val['product_name_ru']); ?>

                                </td>
                                <td>
                                    <?php echo e($val['product_price']); ?>$ (<?php echo e(round($val->product_price * \App\Models\Currency::where('currency_name','тенге')->first()->money,2)); ?>тг)
                                </td>
                                <td>
                                    <?php echo e($val['unit']); ?>

                                </td>
                                <td style="text-align: center">
                                    <?php echo e($val['date']); ?>

                                </td>
                            </tr>

                            <?php $sum += $val->product_price; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                        <tr>
                            <td colspan="5" style="text-align: right"><b>Общая сумма:</b> </td>
                            <td colspan="1"><b id="sum"><?php echo e($sum); ?>$ (<?php echo e(round($sum * \App\Models\Currency::where('currency_name','тенге')->first()->money,2)); ?>тг)</b></td>
                        </tr>


                        </tbody>

                    </table>



                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>