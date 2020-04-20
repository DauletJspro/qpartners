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
                    <a class="menu-tab ">Отправить запрос на снятии средств</a>
                </h3>
                <div class="form-group">
                    <label style="font-weight: 400; font-size: 18px">Ваша текущая сумма: <b><?php echo e(Auth::user()->user_money); ?> $</b> (<?php echo e(Auth::user()->user_money * 400); ?> тг) </label></br>
                    
                    
                </div>
                <div class="form-group">
                    <label>Укажите сумму ($)</label>
                    <input id="money" min="0" onchange="changeMoney('<?php if(Auth::user()->is_individual == 1): ?><?php echo e(0.21); ?><?php else: ?><?php echo e(0); ?><?php endif; ?>')" required value="" type="numeric" class="form-control" name="money" placeholder="Введите">
                    <p style="font-family: Tahoma; font-weight: 700; margin-top: 9px; font-size: 13px; color: rgb(253, 58, 53);"> <?php if(Auth::user()->is_individual == 1): ?> Комиссия 21%: <?php else: ?> Индивидуальный предприниматель 0% <?php endif; ?> <span id="money_label" style="color: black"></span></p>
                </div>
                <div class="form-group">
                    <label>Комментарии</label>
                    <textarea class="form-control" id="comment"></textarea>
                </div>
                <div class="box-footer">
                    <button type="button" class="btn btn-primary" onclick="addResponseAddRequest()">Отправить запрос</button>
                </div>
            </div>

        </div>
      </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>