<section class="content-header">
    <h1>
        Статистика пользователей
    </h1>
</section>
<section class="content">
    <div class="row statistics-profile">
        @foreach($users_count as $user_count)
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><sup style="font-size: 20px">{{$user_count->roles->role_name_ru}}</sup></h3>
                        <h2 style="margin-top: 0px">{{$user_count->total}}</h2>
                        <p>Пользователей</p>
                    </div>
                    <div class="icon"></div>
                </div>
            </div>
    @endforeach
</div>
<section>