<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <div class="clear-float"></div>
        </div>

        <div class="box-body">

            <div class="col-md-12">
                <h3 class="box-title box-title-first">
                    <a class="menu-tab ">Пополнить баланс</a>
                </h3>
                <div class="form-group">
                    <label style="font-weight: 400; font-size: 18px">Ваша текущая сумма: <b><?php echo e(Auth::user()->user_money); ?> $</b> (<?php echo e(Auth::user()->user_money * 300); ?> тг) </label></br>
                </div>
                <div class="form-group">
                    <label>Укажите сумму ($)</label>
                    <input id="balance" min="0" required value="" type="numeric" class="form-control" name="money" placeholder="Введите">
                </div>
                <div class="box-footer">
                    <button type="button" class="btn btn-primary" onclick="addBalance()">Пополнить баланс</button>
                </div>
            </div>

        </div>
      </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>