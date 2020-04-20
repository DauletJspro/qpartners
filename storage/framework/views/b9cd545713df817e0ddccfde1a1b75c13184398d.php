<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title box-title-first">
            <a class="menu-tab active-page">Статистика покупок</a>
          </h3>
          <div class="clear-float"></div>
        </div>

        <div class="box-body">
            <form class="submit_form">
                <table id="news_datatable" class="table table-bordered table-striped table-css">
            <thead>
              <tr style="border: 1px">
                <th style="width: 30px">№</th>
                <th style="width: 100px">Аватар</th>
                <th>Партнер</th>
                <th>Спонсор</th>
                <th>Пакет</th>
                <th>Подарок</th>
                <th style="width: 120px">Дата</th>
                 <th style="width: 120px">Онлайн оплата</th>
              </tr>
            </thead>

            <tbody>

            <tr>
                <td></td>
                <td></td>
                <td><form><input value="<?php echo e($request->user_name); ?>" type="text" class="form-control" name="user_name" placeholder="Поиск">  </form></td>
                <td><form><input value="<?php echo e($request->sponsor_name); ?>" type="text" class="form-control" name="sponsor_name" placeholder="Поиск"> </form></td>
                <td><form><input value="<?php echo e($request->packet_name); ?>" type="text" class="form-control" name="packet_name" placeholder="Поиск"> </form></td>
                <td></td>
                <td colspan="2">
                    от <input style="width: 35%; display: inline-block" value="<?php echo e($request->date_from); ?>" type="text" class="form-control datetimepicker-input date-submit" name="date_from" placeholder="Дата">
                    - до <input style="width: 35%; display: inline-block" value="<?php echo e($request->date_to); ?>" type="text" class="form-control datetimepicker-input date-submit" name="date_to" placeholder="Дата">
                    <input type="submit" value="ОК" style="padding: 5px 7px">
                </td>
            </tr>

                  <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

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
                             <b style="color: #00A0D1"><?php echo e($val->country_name_ru); ?>,<?php echo e($val->city_name_ru); ?></b>
                         </td>
                         <td class="arial-font">
                             <a class="main-label" href="/admin/profile/<?php echo e($val->recommend_id); ?>" target="_blank"><p class="login"><?php echo e($val->recommend_login); ?></p><?php if(Auth::user()->user_id == 1): ?><p class="client-name"><?php echo e($val->recommend_name); ?> <?php echo e($val->recommend_last_name); ?> <?php echo e($val->recommend_middle_name); ?></p><?php endif; ?></a>
                         </td>
                         <td>
                             <span class="label" style="font-size:15px; padding:2px 10px; background-color: #<?php echo e($val['packet_css_color']); ?>"><?php echo e($val['packet_name_ru']); ?></span>
                         </td>
                         <td>
                             <?php if($val->user_packet_type == 'share'): ?>
                                 Доля
                             <?php elseif($val->user_packet_type == 'item'): ?>
                                 <?php echo e($val->packet_item); ?>

                             <?php elseif($val->user_packet_type == 'service'): ?>
                                 <?php echo e($val->packet_service); ?>

                             <?php endif; ?>
                         </td>
                        <td>
                            <?php echo e($val->date); ?>

                        </td>
                         <td style="text-align: center">
                             <?php if($val->is_epay == 1): ?>
                                 Онлайн оплата
                             <?php endif; ?>
                         </td>
                     </tr>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

            </tbody>

          </table>
            </form>
            <div style="text-align: center">
                <?php echo e($row->appends(\Illuminate\Support\Facades\Input::except('page'))->links()); ?>

            </div>

        </div>
      </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>