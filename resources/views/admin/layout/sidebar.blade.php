<ul class="sidebar-menu">
  @if(Auth::user()->status_id > 0) <li class="header" style="text-align: center; padding:5px 25px 0px"> <?php $status_name = \App\Models\UserStatus::where('user_status_id',Auth::user()->status_id)->first(); ?><p style="color:#009551;margin:0px;font-weight: bold">{{ $status_name->user_status_name }}</p> </li> @endif

  <li class="header" style="text-align: center; padding:5px 25px 0px">@if(Auth::user()->is_activated == 1) <p style="color:#009551;margin:0px;">Ваш аккаунт успешно активирован</p> @else <p style="color:red;margin:0px;">Ваш аккаунт не активирован</p> @endif</li>
  <li class="header" style="text-align: center; padding:5px 25px 0px">@if(Auth::user()->is_valid_document == 1) <p style="color:#009551;margin:0px;">Верификация успешно пройдено</p> @else <a style="color:red;margin:0px;text-decoration: underline; padding: 0px" href="/admin/document">Верификация не пройдено</a> @endif</li>

  <?php
    $lo_profit = \App\Models\UserPacket::where('is_active',1)
            ->where('user_id',Auth::user()->user_id)
            ->sum('packet_price');
  ?>
  <li class="header" style="text-align: center; padding:5px 25px 5px">
      <p style="color:#009551;margin:0px;">ЛО: <span style="font-weight: bold">{{$lo_profit}}$</span>  ЛКО: <span style="font-weight: bold">{{Auth::user()->left_child_profit}}$</span> ПКО: <span style="font-weight: bold">{{Auth::user()->right_child_profit}}$</span></p>
      <p style="color:#009551;margin:0px;">КВО: <span style="font-weight: bold">{{Auth::user()->qualification_profit}}$</span></p>
  </li>

    <li class="treeview">
        <a href="/admin/index">
            <i class="fa fa-user"></i>
            <span>Главная</span>
        </a>
    </li>
{{--    <li class="treeview">
        <a href="/admin/balance">
           <i class="fa fa-money"></i>
           <span>Пополнить баланс</span>
        </a>
    </li>--}}
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
          <a href="/admin/our-document">
              <i class="fa fa-user"></i>
              <span>Договор</span>
          </a>
      </li>
  @if(Auth::user()->role_id == 1)
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
          <?php $user_packet_notice = \App\Models\UserConfirmDocument::where('is_active',1)->leftJoin('users','users.user_id','=','user_confirm_document.user_id')->where('users.is_valid_document',0)->count();?>
          <span class="label label-primary pull-right" style="@if($user_packet_notice == 0) display: none; @endif background-color: rgb(253, 58, 53) ! important;">{{$user_packet_notice}}</span>
      </a>
  </li>
  <li class="treeview">
    <a href="/admin/packet/user/inactive">
        <i class="fa fa-list-ul"></i>
        <span>Запросы на пакет</span>
        <?php $user_packet_notice = \App\Models\UserPacket::where('is_active','0')->count();?>
        <span class="label label-primary pull-right" id="inactive_user_packet_count" style="@if($user_packet_notice == 0) display: none; @endif background-color: rgb(253, 58, 53) ! important;">{{$user_packet_notice}}</span>
    </a>
   </li>
   <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i>
            <?php $user_packet_notice = \App\Models\UserRequest::where('is_accept','0')->count();?>
            <span>Запросы на снятие</span> <i class="fa fa-angle-left pull-right"></i>
            <span class="label label-primary pull-right" id="inactive_user_request_count" style="@if($user_packet_notice == 0) display: none; @endif background-color: rgb(253, 58, 53) ! important;">{{$user_packet_notice}}</span>
        </a>
        <ul class="treeview-menu">
            <li class="treeview">
                <a href="/admin/request">
                    <i class="fa fa-list-ul"></i>
                    <span>Входяшие запросы</span>
                    <span class="label label-primary pull-right" id="inactive_user_request_count" style="@if($user_packet_notice == 0) display: none; @endif background-color: rgb(253, 58, 53) ! important;">{{$user_packet_notice}}</span>
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
    <a href="/admin/speaker">
        <i class="fa fa-comments"></i>
        <span>Спикеры</span>
    </a>
  </li>
  <li class="treeview">
    <a href="/admin/office">
        <i class="fa fa-building"></i>
        <span>Офис</span>
    </a>
  </li>
    <li class="treeview">
        <a href="/admin/accounting">
            <i class="fa fa-money"></i>
            <span>Учет</span>
        </a>
    </li>
  @endif
  <li class="treeview">
      <a href="/admin/operation">
            <i class="fa fa-list-ul"></i>
            <span>Счет</span>
      </a>
  </li>
  <li class="treeview">
      <a href="/admin/binar">
            <i class="fa fa-sitemap"></i>
            <span>Бинарная структура</span>
      </a>
  </li>
  <li class="treeview">
      <a href="/admin/structure">
          <i class="fa fa-sitemap"></i>
          <span>Структура</span>
      </a>
  </li>
  <li class="treeview">
      <a href="/admin/binar/config">
          <i class="fa fa-sitemap"></i>
          <span>Настройка авторегистрации</span>
      </a>
  </li>
  <li class="treeview">
    <a href="/admin/shop">
        <i class="fa fa-shopping-cart"></i>
        <span>Магазин</span>
    </a>
  </li>
      <li class="treeview">
          <a href="/admin/presentation">
              <i class="fa fa-shopping-cart"></i>
              <span>Презентация</span>
          </a>
      </li>
    @if(Auth::user()->role_id == 1)
        <li class="treeview">
            <a href="/admin/shareholder">
                <i class="fa fa-users"></i>
                <span>Дольщики</span>
            </a>
        </li>
    @endif
    <li class="treeview">
        <a href="/admin/request/send">
            <i class="fa fa-money"></i>
            <span>Снятие денег</span>
        </a>
    </li>
    <li class="treeview">
        <a href="/admin/call-friend">
            <i class="fa fa-reply-all"></i>
            <span>Пригласить друга</span>
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