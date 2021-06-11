<div class="user-panel">
    <div class="pull-left image">
        <img src="{{Auth::user()->avatar}}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
        <p>{{Auth::user()->brand_name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Онлайн</a>
    </div>
</div>
<ul class="sidebar-menu">
{{--    <li class="header" style="padding:5px 25px 0px">--}}
{{--        <p style="color:#009551;margin:0px;font-weight: bold; font-size: 14px;">--}}
{{--                Баланс:  0{{Auth::user()->balance->user_balance}} ₸--}}
{{--        </p>--}}
{{--    </li>--}}
{{--    <li class="header" style="padding:5px 25px 0px">--}}
{{--        <p style="color:#009551;margin:0px;font-weight: bold; font-size: 14px;">--}}
{{--            Проверка:  0{{Auth::user()->balance->user_balance}} ₸--}}
{{--        </p>--}}
{{--    </li>--}}
    <li class="treeview">
        <a href="/admin/banner/create">
            <i class="fa fa-creative-commons"></i>
            <span>Создать баннер</span>
        </a>
    </li>
    <li class="treeview">
        <a href="/logout">
            <i class="fa fa-sign-out"></i>
            <span>Выйти</span>
        </a>
    </li>
</ul>