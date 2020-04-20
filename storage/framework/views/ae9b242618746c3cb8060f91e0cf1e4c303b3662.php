<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xs-12">
      <div class="box">
          <div class="box-header">
              <h3 class="box-title box-title-first">
                  <a href="/admin/client" class="menu-tab <?php if((!isset($request->is_ban) && !isset($request->is_active)) ||  $request->is_ban == '0'): ?> active-page <?php endif; ?>">Все пользователи</a>
              </h3>
              <h3 class="box-title box-title-first">
                  <a href="/admin/client?is_active=0" class="menu-tab <?php if(isset($request->is_active)): ?> active-page <?php endif; ?>">Неактивные пользователи</a>
              </h3>
              <h3 class="box-title box-title-second" >
                  <a href="/admin/client?is_ban=1" class="menu-tab <?php if($request->is_ban == '1'): ?> active-page <?php endif; ?>">Заблокированные пользователи</a>
              </h3>
              <div class="clear-float"></div>
          </div>
          <div>
              <div style="text-align: right" class="form-group col-md-6" >
                  <h4 class="box-title box-delete-click">
                      
                  </h4>
              </div>
              <div style="text-align: right" class="form-group col-md-6" >

                  <?php if($request->is_ban == '1'): ?>

                      <h4 class="box-title box-edit-click">
                          <a href="javascript:void(0)" onclick="isShowDisabledAll('user')">Разблокировать отмеченные</a>
                      </h4>

                  <?php else: ?>

                      <h4 class="box-title box-edit-click">
                          <a href="javascript:void(0)" onclick="isShowEnabledAll('user')">Заблокировать отмеченные</a>
                      </h4>

                  <?php endif; ?>

              </div>
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
                                <th>Пакеты</th>
                                <th>Дата регист.</th>
                                <th>Город</th>
                                <th></th>
                                <th class="no-sort" style="width: 0px; text-align: center; padding-right: 16px; padding-left: 14px;" >
                                    <input onclick="selectAllCheckbox(this)" style="font-size: 15px" type="checkbox" value="1"/>
                                </th>
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
                                    <td>
                                        <form>
                                            <input value="<?php echo e($request->packet_name); ?>" type="text" class="form-control" name="packet_name" placeholder="Поиск">
                                        </form>
                                    </td>
                                    <td></td>
                                    <td>
                                        <form>
                                            <input value="<?php echo e($request->city_name); ?>" type="text" class="form-control" name="city_name" placeholder="Поиск">
                                        </form>
                                    </td>
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
                                        <a class="main-label" href="/admin/profile/<?php echo e($val->user_id); ?>" target="_blank"><p class="login"><?php echo e($val->login); ?></p><?php if(Auth::user()->user_id == 1): ?><p class="client-name"><?php echo e($val->name); ?> <?php echo e($val->last_name); ?> <?php echo e($val->middle_name); ?></p> <?php if($val->is_activated == 0): ?> <p style="color: red">Не активирован</p> <?php endif; ?> <?php endif; ?></a>
                                    </td>
                                    <td class="arial-font">
                                        <a class="main-label" href="/admin/profile/<?php echo e($val->recommend_id); ?>" target="_blank"><p class="login"><?php echo e($val->recommend_login); ?></p><?php if(Auth::user()->user_id == 1): ?><p class="client-name"><?php echo e($val->recommend_name); ?> <?php echo e($val->recommend_last_name); ?> <?php echo e($val->recommend_middle_name); ?></p><?php endif; ?></a>
                                    </td>
                                    <td class="arial-font">
                                        <div>
                                            <?php echo e($val->email); ?> </br>
                                            <?php echo e($val->phone); ?>

                                        </div>
                                    </td>
                                    <td class="arial-font" style="text-align: center">
                                        <?php echo $__env->make('admin.client.user_packet_list_loop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </td>
                                    <td class="arial-font">
                                        <div>
                                            <?php echo e($val->date); ?>

                                        </div>
                                    </td>
                                    <td class="arial-font">
                                        <div>
                                            <?php echo e($val->country_name_ru); ?></br>
                                            <?php echo e($val->city_name_ru); ?>

                                        </div>
                                    </td>
                                    <td style="text-align: center">
                                        <a href="javascript:void(0)" onclick="delItem(this,'<?php echo e($val->user_id); ?>','user')">
                                            <li class="fa fa-trash-o" style="font-size: 20px; color: red;"></li>
                                        </a>
                                    </td>
                                    <td style="text-align: center;">
                                        <input class="select-all" style="font-size: 15px" type="checkbox" value="<?php echo e($val->user_id); ?>"/>
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