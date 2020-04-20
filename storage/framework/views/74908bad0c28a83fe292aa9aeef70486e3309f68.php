<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title box-title-first">
            <a class="menu-tab active-page">Активные товары</a>
          </h3>
          <a href="/admin/product/create" style="float: right">
             <button class="btn btn-primary box-add-btn">Добавить товар</button>
          </a>
          <div class="clear-float"></div>
        </div>
        <div class="box-body">
          <table id="packet_datatable" class="table table-bordered table-striped">
            <thead>
              <tr style="border: 1px">
                <th style="width: 30px">№</th>
                <th></th>
                <th>Название</th>
                <th>Цена</th>
                <th>Cash (%)</th>
                <th>Краткое описание</th>
                <th style="width: 15px"></th>
                <th style="width: 15px"></th>
              </tr>
            </thead>

            <tbody>

                  <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

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
                            <?php echo e($val['product_cash']); ?>

                        </td>
                         <td>
                            <?php echo e($val['product_desc_ru']); ?>

                        </td>
                        <td style="text-align: center">
                            <a href="/admin/product/<?php echo e($val->product_id); ?>/edit">
                                <li class="fa fa-pencil" style="font-size: 20px;"></li>
                            </a>
                        </td>
                         <td style="text-align: center">
                             <a href="javascript:void(0)" onclick="delItem(this,'<?php echo e($val->product_id); ?>','product')">
                                 <li class="fa fa-trash-o" style="font-size: 20px; color: red;"></li>
                             </a>
                         </td>
                     </tr>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

            </tbody>

          </table>

            <div style="text-align: center">
                <?php echo e($row->appends(\Illuminate\Support\Facades\Input::except('page'))->links()); ?>

            </div>

        </div>
      </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    <script>
        $('a.fancybox').fancybox({
            padding: 10
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>