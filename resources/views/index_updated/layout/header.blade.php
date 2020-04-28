<header id="mt-header" class="style7">
    <!-- mt-top-bar start here -->
    <div class="mt-top-bar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 hidden-xs">
                            <span class="tel active"> <i class="fa fa-phone"
                                                         aria-hidden="true"></i> +7(771)674-25-55</span>
                    <a class="tel" href="#"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        6742555@gmail.com</a>
                </div>
                <div class="col-xs-12 col-sm-6 text-right">
                    <ul class="mt-top-list">
                        <li class="">
                            <div class="dropdown" style="margin-top: 0;">
                                <a class="" data-toggle="dropdown">
                                    <img src="/wp-content/plugins/sitepress-multilingual-cms/res/flags/{{$lang}}.png"
                                         style="display:inline-block;width: 20px; height: 15px;" alt="">
                                    <span style="display: inline-block; margin-left: 10px;">{{Lang::get('app.lang')}}</span>
                                </a>
                                <div class="dropdown-menu" style="width: 165px;">
                                    <a href="{{\App\Http\Helpers::setSessionLang('ru',$request)}}">
                                        <img src="/wp-content/plugins/sitepress-multilingual-cms/res/flags/ru.png"
                                             style="display:inline-block;width: 20px; height: 20px;" alt="">
                                        <span style="display: inline-block; margin-left: 5px; color: black;">Русcкий</span>
                                    </a>
                                    <a href="{{\App\Http\Helpers::setSessionLang('kz',$request)}}">
                                        <img src="/wp-content/plugins/sitepress-multilingual-cms/res/flags/kz.png"
                                             style="display:inline-block;width: 20px; height: 15px;" alt="">
                                        <span style="display: inline-block; margin-left: 5px; color: black;">Қазақша</span>
                                    </a>
                                    <a href="{{\App\Http\Helpers::setSessionLang('en',$request)}}">
                                        <img src="/wp-content/plugins/sitepress-multilingual-cms/res/flags/en.png"
                                             style="display:inline-block;width: 20px; height: 15px;" alt="">
                                        <span style="display: inline-block; margin-left: 5px; color: black;">English</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown" style="margin-top: 0;">
                                <a class="" data-toggle="dropdown">
                                    <span>Личный кабинет</span>
                                </a>
                                <div class="dropdown-menu">
                                    @if(!Auth::check())
                                        <a href="/register" style="color: black;font-size: 130%; ">Регистрация</a>
                                        <a href="/login" style="color: black;font-size: 130%; ">Войти</a>
                                    @else
                                        <a href="/admin/index" style="color: black;font-size: 130%; ">Личный кабинет</a>
                                    @endif
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-bottom-bar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="mt-logo"><a href="/"><img src="/update_design/images/qyran_logo.png" alt="schon"
                                                          style="width:130px; height:33px; margin-top:2px;"></a>
                    </div>
                    <ul class="mt-icon-list">
                        <li class="drop">
                            <i class="fa fa-heart"><a href="#" class="icon-heart cart-opener"><span
                                            style="margin-bottom: -3px;"
                                            class="num">3</span></a></i>
                        </li>
                        <li class="drop">
                            <i class="fa fa-shopping-basket"><a href="#" class="cart-opener">
                                    <span class="icon-handbag"></span>
                                    <span class="num">3</span>
                                </a></i>
                            <!-- mt drop start here -->
                            <span class="mt-mdropover"></span>
                        </li>
                        <li class="hidden-lg hidden-md">
                            <a class="bar-opener mobile-toggle" href="#">
                                <span class="bar"></span>
                                <span class="bar small"></span>
                                <span class="bar"></span>
                            </a>
                        </li>
                    </ul>
                    <nav id="nav">
                        <ul>
                            <li>
                                <a href="/" class="active">{{Lang::get('app.home')}}</a>
                            </li>
                            <li>
                                <div class="dropdown" style="margin-top: 0;">
                                    <a class="drop-link" href="#" data-toggle="dropdown">
                                        {{Lang::get('app.about_company')}}
                                    </a>
                                    <div class="dropdown-menu">
                                        <?php $about = \App\Models\About::where('is_show', 1)->orderBy('about_id')->get();?>
                                        @foreach($about as $key => $item)
                                            <a class="dropdown-item dropdown-a"
                                               href="/{{\App\Http\Helpers::getTranslatedSlugRu($item['about_name_'.$lang])}}-u{{$item->about_id}}">{{$item['about_name_'.$lang]}}</a>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown" style="margin-top: 0;">
                                    <a href="#" class="drop-link">{{Lang::get('app.gallery')}}</a>
                                    <div class="dropdown-menu">
                                        <?php $about = \App\Models\About::where('is_show', 1)->orderBy('about_id')->get();?>
                                        <a href="/gallery"
                                           class="dropdown-a dropdown-item">{{Lang::get('app.photo')}}</a>
                                        <a href="/video" class="dropdown-item dropdown-a">{{Lang::get('app.video')}}</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="/news" class="">{{Lang::get('app.news')}}</a>
                            </li>
                            <li>
                                <div class="dropdown" style="margin-top: 0;">
                                    <a href="#" class="drop-link">{{Lang::get('app.business_education')}}</a>
                                    <div class="dropdown-menu">
                                        <?php $education = \App\Models\Education::where('is_show', 1)->orderBy('education_id')->get();?>
                                        @foreach($education as $key => $item)
                                            <a class="dropdown-a dropdown-item" href="/education/{{\App\Http\Helpers::getTranslatedSlugRu($item['education_name_'.$lang])}}-u{{$item->education_id}}">{{$item['education_name_'.$lang]}}</a>
                                        @endforeach

                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="/contact" class="">{{Lang::get('app.contact')}}</a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
    .dropdown {
        position: relative;
        display: inline-block;
        margin-top: 0.9rem;
        cursor: pointer;
    }

    .dropdown:hover > .dropdown-menu {
        display: block;
    }


    .dropdown-a {
        font-size: 130%;
        margin: 0;
        padding: 1rem 1rem;
    }

    .dropdown-a:hover {
        background-color: grey;
    }

</style>