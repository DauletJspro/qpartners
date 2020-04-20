<div class="col-md-6">
    <div class="profile-profit">
        <p><b class="title">Доход</b></p>
        <p><b>На сегодня:</b> <?php echo e(round($row->profit_today,2)); ?> $</p>
        <p><b>За последнюю неделю:</b> <?php echo e(round($row->profit_last_week,2)); ?> $</p>
        <p><b>За последний месяц:</b> <?php echo e(round($row->profit_last_month,2)); ?> $</p>
        <p><b>За весь период:</b> <?php echo e(round($row->profit_all,2)); ?> $</p>
        <p><b>Акционерная доля:</b> <?php echo e($row->user_share); ?></p>
    </div>
</div>
<div class="col-md-6">
    <div class="profile-profit">
        <p><b class="title">Долевой фонд</b></p>
        <p><b>Дольщики:</b> <?php echo e($row->shareholder_count); ?></p>
        <p><b>Поступления на сегодня:</b> <?php echo e(round($row->shareholder_profit_today,2)); ?> $</p>
        <p><b>Средний чек:</b> <?php echo e(round($row->shareholder_average_mount,2)); ?> $</p>
        <p><b>Курс:</b> <?php echo e($row->currency->money); ?> тг.</p>
    </div>
</div>