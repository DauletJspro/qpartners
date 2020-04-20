
<ul class="sidebar-menu">
    <?php if(Auth::user()->status_id > 0): ?>
        <li class="header"
            style="text-align: center; padding:5px 25px 0px"> <?php $status_name = \App\Models\UserStatus::where('user_status_id', Auth::user()->status_id)->first(); ?>
            <p style="color:#009551;margin:0px;font-weight: bold">

                <?php if(isset($status_name->user_status_name)): ?>
                    
                <?php echo e($status_name->user_status_name); ?>


                <?php endif; ?>

            </p>
        </li>
    <?php endif; ?>

        <li class="header" style="text-align: center; padding:5px 25px 0px">
            <p style="color:red;margin:0px;font-weight: bold">Ваш баланс: <?php echo e(Auth::user()->user_money); ?>$ ( <?php echo e(Auth::user()->user_money * \App\Models\Currency::where('currency_name','тенге')->first()->money); ?>тг)</p>
        </li>




    <li class="header" style="text-align: center; padding:5px 25px 0px"><?php if(Auth::user()->is_activated == 1): ?> <p
                style="color:#009551;margin:0px;">Ваш аккаунт успешно активирован</p> <?php else: ?> <p
                style="color:red;margin:0px;">Ваш аккаунт не активирован</p> <?php endif; ?></li>
    <li class="header" style="text-align: center; padding:5px 25px 0px"><?php if(Auth::user()->is_valid_document == 1): ?> <p
                style="color:#009551;margin:0px;">Верификация успешно пройдено</p> <?php else: ?> <a
                style="color:red;margin:0px;text-decoration: underline; padding: 0px" href="/admin/document">Верификация
            не пройдено</a> <?php endif; ?></li>


    <li class="treeview">
        <a href="/admin/index">
            <i class="fa fa-user"></i>
            <span>Главная</span>
        </a>
    </li>


        <li class="treeview" style="background-color: #F9BF3B;">
            <a href="/admin/call-friend" style="color: black" class="balance-btn">
                <i class="fa fa-reply-all"></i>
                <span style="color: black">Пригласить друга</span>
            </a>
        </li>

    <li class="treeview">
        <a href="/admin/profile">
            <i class="fa fa-user"></i>
            <span>Профиль</span>
        </a>
    </li>
   
    <li class="treeview">
        <a href="/admin/document">
            <i class="fa fa-user"></i>
            <span>Мои документы</span>
        </a>
    </li>
    <li class="treeview">
        <a href="/admin/instagram">
            <i class="fa fa-user"></i>
            <span>Мои подписки</span>
        </a>
    </li>
    <li class="treeview">
        <a href="/admin/instagram/partners/request">
            <i class="fa fa-user"></i>
            <span>Мои подписчики</span>
        </a>
    </li>
        
    <?php if(Auth::user()->role_id == 1): ?>

        <li class="treeview">
            <a href="/admin/instagram/corporative/request">
                <i class="fa fa-user"></i>
                <span>Подписчики корпор. аккаунтов</span>
            </a>
        </li>
        <li class="treeview">
            <a href="/admin/instagram/recommend/request">
                <i class="fa fa-user"></i>
                <span>Подписчики рекомменд. аккаунтов</span>
            </a>
        </li>

    <?php endif; ?>

    <li class="treeview">
        <a href="/admin/online/history">
            <i class="fa fa-user"></i>
            <span>Мои покупки</span>
        </a>
    </li>
    <li class="treeview">
        <a href="/admin/our-document">
            <i class="fa fa-user"></i>
            <span>Договор</span>
        </a>
    </li>
    <?php if(Auth::user()->role_id == 1): ?>
        <li class="treeview">
            <a href="/admin/packet/user/active">
                <i class="fa fa-list-ul"></i>
                <span>Статистика</span>
            </a>
        </li>
        <li class="treeview">
            <a href="/admin/document/confirm">
                <i class="fa fa-list-ul"></i>
                <span>Подтверж. документа</span>
                <?php $user_packet_notice = \App\Models\UserConfirmDocument::where('is_active', 1)->leftJoin('users', 'users.user_id', '=', 'user_confirm_document.user_id')->where('users.is_valid_document', 0)->count();?>
                <span class="label label-primary pull-right"
                      style="<?php if($user_packet_notice == 0): ?> display: none; <?php endif; ?> background-color: rgb(253, 58, 53) ! important;"><?php echo e($user_packet_notice); ?></span>
            </a>
        </li>
        <li class="treeview">
            <a href="/admin/packet/user/inactive">
                <i class="fa fa-list-ul"></i>
                <span>Запросы на пакет</span>
                <?php $user_packet_notice = \App\Models\UserPacket::where('is_active', '0')->count();?>
                <span class="label label-primary pull-right" id="inactive_user_packet_count"
                      style="<?php if($user_packet_notice == 0): ?> display: none; <?php endif; ?> background-color: rgb(253, 58, 53) ! important;"><?php echo e($user_packet_notice); ?></span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i>
                <?php $user_packet_notice = \App\Models\UserRequest::where('is_accept', '0')->count();?>
                <span>Запросы на снятие</span> <i class="fa fa-angle-left pull-right"></i>
                <span class="label label-primary pull-right" id="inactive_user_request_count"
                      style="<?php if($user_packet_notice == 0): ?> display: none; <?php endif; ?> background-color: rgb(253, 58, 53) ! important;"><?php echo e($user_packet_notice); ?></span>
            </a>
            <ul class="treeview-menu">
                <li class="treeview">
                    <a href="/admin/request">
                        <i class="fa fa-list-ul"></i>
                        <span>Входяшие запросы</span>
                        <span class="label label-primary pull-right" id="inactive_user_request_count"
                              style="<?php if($user_packet_notice == 0): ?> display: none; <?php endif; ?> background-color: rgb(253, 58, 53) ! important;"><?php echo e($user_packet_notice); ?></span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="/admin/request/accept">
                        <i class="fa fa-list-ul"></i>
                        <span>Принятые запросы</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="/admin/request/delete">
                        <i class="fa fa-list-ul"></i>
                        <span>Удаленные запросы</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="treeview">
            <a href="/admin/client">
                <i class="fa fa-users"></i>
                <span>Пользователи</span>
            </a>
        </li>
        
        <li class="treeview">
            <a href="/admin/office">
                <i class="fa fa-building"></i>
                <span>Офис</span>
            </a>
        </li>
        <li class="treeview">
            <a href="/admin/packet-item">
                <i class="fa fa-list"></i>
                <span>Пакеты</span>
            </a>
        </li>
            <li class="treeview">
                <a href="/admin/product">
                    <i class="fa fa-list"></i>
                    <span>Товары</span>
                </a>
            </li>
        <li class="treeview">
            <a href="/admin/accounting">
                <i class="fa fa-money"></i>
                <span>Учет</span>
            </a>
        </li>
    <?php endif; ?>
    <li class="treeview">
        <a href="/admin/operation">
            <i class="fa fa-list-ul"></i>
            <span>Счет</span>
        </a>
    </li>
    <li class="treeview">
        <a href="/admin/structure">
            <i class="fa fa-sitemap"></i>
            <span>Структура</span>
        </a>
    </li>
   
    <li class="treeview">
        <a href="/admin/shop">
            <i class="fa fa-shopping-cart"></i>
            <span>Магазин (пакеты)</span>
        </a>
    </li>
    <li class="treeview">
        <a href="/admin/online">
            <i class="fa fa-shopping-cart"></i>
            <span>Магазин (товары)</span>
        </a>
    </li>
    <li class="treeview">
        <a href="/admin/presentation">
            <i class="fa fa-shopping-cart"></i>
            <span>Презентация</span>
        </a>
    </li>
    
    <li class="treeview">
        <a href="/admin/request/send">
            <i class="fa fa-money"></i>
            <span>Снятие денег</span>
        </a>
    </li>
    <li class="treeview">
        <a href="/admin/request/send-account">
            <i class="fa fa-money"></i>
            <span>Отправить деньги</span>
        </a>
    </li>

    <li class="treeview">
        <a href="/admin/password">
            <i class="fa fa-key"></i>
            <span>Сменить пароль</span>
        </a>
    </li>
    <li class="treeview">
        <a href="/logout">
            <i class="fa fa-sign-out"></i>
            <span>Выйти</span>
        </a>
    </li>
</ul>