<?php $__env->startSection('content'); ?>

        <section class="content-header">
            <h1>
              <?php echo e($title); ?>

            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                   <div class="col-md-8" style="padding-left: 0px">
                       <div class="box box-primary">
                               <?php if(isset($error)): ?>
                                   <div class="alert alert-danger">
                                      <?php echo e($error); ?>

                                   </div>
                               <?php endif; ?>

                               <form action="/admin/profile/edit" method="POST">
                                   <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                   <input id="user_id" type="hidden" name="user_id" value="<?php echo e($row->user_id); ?>">
                                   <input type="hidden" class="image-name" id="avatar" name="avatar" value="<?php echo e($row->avatar); ?>"/>

                                   <div class="box-body">

                                       <?php if(Auth::user()->role_id == 1): ?>
                                           <div class="form-group">
                                               <label>Статус</label>
                                               <select name="status_id" class="form-control" data-live-search="true">
                                                   <option value="0" selected="selected"></option>
                                                   <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                       <option <?php if($row->status_id == $item->user_status_id): ?> <?php echo e('selected'); ?> <?php endif; ?> value="<?php echo e($item->user_status_id); ?>"><?php echo e($item['user_status_name']); ?></option>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                               </select>
                                           </div>
                                        <?php endif; ?>


                                       <div class="form-group">
                                           <label>Имя</label>
                                           <input value="<?php echo e($row->name); ?>" type="text" class="form-control" name="name" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Фамилия</label>
                                           <input value="<?php echo e($row->last_name); ?>" type="text" class="form-control" name="last_name" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Отчество</label>
                                           <input value="<?php echo e($row->middle_name); ?>" type="text" class="form-control" name="middle_name" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                          <label>Email</label>
                                          <input value="<?php echo e($row->email); ?>" type="text" class="form-control" name="email" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Логин</label>
                                           <input value="<?php echo e($row->login); ?>" type="text" class="form-control" name="login" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Инстаграм</label>
                                           <input  type="text" name="instagram" value="<?php echo e($row->instagram); ?>" class="form-control" placeholder="Инстаграм аккаунт"/>
                                       </div>
                                       <div class="form-group">
                                           <label>Телефон</label>
                                           <input value="<?php echo e($row->phone); ?>" type="text" class="form-control" name="phone" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Удостоверение личности</label>
                                           <input value="<?php echo e($row->document_number); ?>" type="text" class="form-control" name="document_number" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>ИИН</label>
                                           <input value="<?php echo e($row->iin); ?>" type="text" class="form-control" name="iin" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>IBAN</label>
                                           <input value="<?php echo e($row->iban); ?>" type="text" class="form-control iban-mask" name="iban" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Номер карточки</label>
                                           <input value="<?php echo e($row->card_number); ?>" type="text" class="form-control card-mask" name="card_number" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Название банка</label>
                                           <input value="<?php echo e($row->bank_name); ?>" type="text" class="form-control" name="bank_name" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Страна</label>
                                           <select onchange="getCityListByCountry(this)"  name="country_id" data-placeholder="Выберите страну" class="form-control" data-live-search="true">
                                               <?php $__currentLoopData = $country_row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                   <option <?php if($row->country_id == $item->country_id): ?> <?php echo e('selected'); ?> <?php endif; ?> value="<?php echo e($item->country_id); ?>"><?php echo e($item['country_name_ru']); ?></option>
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                           </select>
                                       </div>
                                       <div class="form-group">
                                           <select id="city_id" required name="city_id" data-placeholder="Выберите город" class="form-control" data-live-search="true">
                                               <option value="">Выберите город</option>
                                               <?php $__currentLoopData = $city_row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                   <option <?php if($row->city_id == $item->city_id): ?> <?php echo e('selected'); ?> <?php endif; ?> value="<?php echo e($item->city_id); ?>"><?php echo e($item['city_name_ru']); ?></option>
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                           </select>
                                       </div>
                                       <div class="form-group">
                                           <input required type="text" name="address" value="<?php echo e($row->address); ?>" class="form-control" placeholder="Район"/>
                                       </div>
                                       
                                       <div class="form-group">
                                           <label>Пол</label>
                                           <select required name="is_male" data-placeholder="Выберите пол" class="form-control" data-live-search="true">
                                               <option <?php if($row->is_male == 0): ?> <?php echo e('selected'); ?> <?php endif; ?> value="0">Женский</option>
                                               <option <?php if($row->is_male == 1): ?> <?php echo e('selected'); ?> <?php endif; ?> value="1">Мужской</option>
                                           </select>
                                       </div>
                                      
                                       <div class="form-group">
                                           <label>Обучение </label>
                                           <select required name="is_education" data-placeholder="Выберите пол" class="form-control" data-live-search="true">
                                               <option <?php if($row->is_education == 0): ?> <?php echo e('selected'); ?> <?php endif; ?> value="0">Нет</option>
                                               <option <?php if($row->is_education == 1): ?> <?php echo e('selected'); ?> <?php endif; ?> value="1">Да</option>
                                           </select>
                                       </div>
                                    </div>

                                   <div class="box-footer">
                                       <button type="submit" class="btn btn-primary">Сохранить</button>
                                   </div>
                               </form>
                           </div>
                   </div>
                   <div class="col-md-4">
                       <div class="box box-primary" style="padding: 30px; text-align: center">
                           <div style="padding: 20px; border: 1px solid #c2e2f0">
                               <img class="image-src" src="<?php echo e($row->avatar); ?>" style="width: 100%; "/>
                           </div>
                           <div style="background-color: #c2e2f0;height: 40px;margin: 0 auto;width: 2px;"></div>
                           <form id="image_form" enctype="multipart/form-data" method="post" class="image-form">
                               <i class="fa fa-plus"></i>
                               <input id="avatar-file" type="file" onchange="uploadImage()" name="image"/>
                           </form>
                       </div>
                   </div>
                </div>
            </div>
        </section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>