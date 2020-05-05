<?php
use App\Models\Category;

$categories = Category::where(['is_show' => true])->limit(15)->get();
?>
<header id="mt-header" class="style3">
    <div class="mt-top-bar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 hidden-xs">
                    <span class="tel active"> <i class="fa fa-phone" aria-hidden="true"></i> +7(707)-369-17-77</span>
                    <a class="tel" href="#"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        qazaqmarketing@gmail.com</a>
                </div>
                <div class="col-xs-12 col-sm-6 text-right">
                    <ul class="mt-top-list">
                        <li>
                            <div class="dropdown">
                                <a class="icl_lang_sel_current icl_lang_sel_native">{{Lang::get('app.lang')}}</a>
                                <div class="dropdown-content">
                                    <a href="{{\App\Http\Helpers::setSessionLang('kz',$request)}}">
                                        Қазақша
                                    </a>
                                    <a href="{{\App\Http\Helpers::setSessionLang('ru',$request)}}">
                                        Русский
                                    </a>
                                    <a href="{{\App\Http\Helpers::setSessionLang('en',$request)}}">
                                        English
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="">
                            <div class="dropdown">
                                <a class="" href="/login">{{Lang::get('app.cabinet')}}</a>
                                <div class="dropdown-content">
                                    @if(!Auth::check())
                                        <a href="/register">Регистрация</a>
                                        <a href="/login">Войти</a>
                                    @else
                                        <a href="/admin/index">Личный кабинет</a>
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
                    <div class="mt-logo"><a href="/"><img src="/new_design/images/logo/logo.png" alt="schon"
                                                          style="height: 45px; width: 135px;margin-top: -4px;"></a>
                    </div>
                    <div class="mt-sh-cart">
                        <span class="icon-handbag"></span>
                        <strong>Ваша корзина</strong>
                        <span>3 продукта &nbsp;$74.00</span>
                    </div>
                    <ul class="mt-icon-list">
                        <li class="hidden-lg hidden-md">
                            <a href="#" class="bar-opener mobile-toggle">
                                <span class="bar"></span>
                                <span class="bar small"></span>
                                <span class="bar"></span>
                            </a>
                        </li>
                        <li><a href="#" class="icon-magnifier"></a></li>
                    </ul>
                    <nav id="nav">
                        <ul>
                            <li>
                                <a class="drop-link" href="homepage1.html">{{Lang::get('app.about_company')}}<i
                                            class="fa fa-angle-down hidden-lg hidden-md"
                                            aria-hidden="true"></i></a>
                                <div class="s-drop">
                                    <?php $about = \App\Models\About::where('is_show', 1)->orderBy('about_id')->get();?>
                                    <ul>
                                        @foreach($about as $key => $item)
                                            <li class="">
                                                <a href="/{{\App\Http\Helpers::getTranslatedSlugRu($item['about_name_'.$lang])}}-u{{$item->about_id}}">{{$item['about_name_'.$lang]}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li class="drop">
                                <a href="#">ПРОДУКЦИЯ<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <div class="mt-dropmenu text-left">
                                    <div class="mt-frame">
                                        <div class="mt-f-box">
{{--                                            @foreach($categories as $category)--}}
{{--                                                @if(count($category->product))--}}
{{--                                                    <div class="mt-col-3">--}}
{{--                                                        <div class="sub-dropcont">--}}
{{--                                                            <strong class="title"><a href="product-grid-view.html"--}}
{{--                                                                                     class="mt-subopener">Эликсиры</a></strong>--}}
{{--                                                            <div class="sub-drop">--}}
{{--                                                                @foreach($category->product as $product)--}}
{{--                                                                    <ul>--}}
{{--                                                                        <li><a href="product-grid-view.html">--}}
{{--                                                                                {{$product->product_name}}</a></li>--}}
{{--                                                                    </ul>--}}
{{--                                                                @endforeach--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}



                                        <!-- mt col3 end here -->

                                            <!-- mt col3 start here -->
                                        {{--                                            <div class="mt-col-3">--}}
                                        {{--                                                <div class="sub-dropcont">--}}
                                        {{--                                                    <strong class="title"><a href="#"--}}
                                        {{--                                                                             class="mt-subopener">Гели</a></strong>--}}
                                        {{--                                                    <div class="sub-drop">--}}
                                        {{--                                                        <ul>--}}
                                        {{--                                                            <li><a href="about-us.html">Super Gel Fresh face</a></li>--}}
                                        {{--                                                            <li><a href="about-us.html">Super Gel Face&body</a></li>--}}
                                        {{--                                                            <li><a href="about-us.html">Super Gel Regeneration</a></li>--}}
                                        {{--                                                            <li><a href="about-us.html">Super Gel Masto</a></li>--}}
                                        {{--                                                            <li><a href="about-us.html">Super Gel Grippo</a></li>--}}
                                        {{--                                                        </ul>--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="sub-dropcont">--}}
                                        {{--                                                    <strong class="title"><a href="#" class="mt-subopener">Крема--}}
                                        {{--                                                            US</a></strong>--}}
                                        {{--                                                    <div class="sub-drop">--}}
                                        {{--                                                        <ul>--}}
                                        {{--                                                            <li><a href="contact-us.html">Super cream Spasm</a></li>--}}
                                        {{--                                                            <li><a href="contact-us.html">Super cream Anti-cellulite</a>--}}
                                        {{--                                                            </li>--}}
                                        {{--                                                            <li><a href="contact-us.html">Super cream for man</a></li>--}}
                                        {{--                                                            <li><a href="contact-us.html">Super cream for woman</a></li>--}}
                                        {{--                                                        </ul>--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        <!-- mt col3 end here -->

                                            <!-- mt col3 start here -->
                                            <div class="mt-col-3">
                                                <div class="sub-dropcont">
                                                    <strong class="title"><a href="#"
                                                                             class="mt-subopener">Спреи</a></strong>
                                                    <div class="sub-drop">
                                                        <ul>
                                                            <li><a href="#">Super Spray Grippo</a></li>
                                                            <li><a href="#">Super Spray Castro</a></li>
                                                            <li><a href="#">Super Spray Hepato</a></li>
                                                            <li><a href="#">Super Spray Clean</a></li>
                                                            <li><a href="#">Super Spray for man</a></li>
                                                            <li><a href="#">Super Spray for woman</a></li>
                                                            <li><a href="#">Super Spray Bronchi</a></li>
                                                            <li><a href="#">Super Spray Propolis&herb</a></li>
                                                            <li><a href="#">Super Spray Nephro</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- mt col3 end here -->


                                            <ul>
                                                <li><a href="product-grid-view.html">Super Elixir
                                                        Anti-Stress</a></li>
                                                <li><a href="product-grid-view.html">Super Elixir
                                                        Immuno</a>
                                                </li>
                                                <li><a href="product-grid-view.html">Super Elixir
                                                        Energy</a>
                                                </li>
                                                <li><a href="product-grid-view.html">Super Elixir
                                                        Gastro</a>
                                                </li>
                                                <li><a href="product-grid-view.html">Super Elixir
                                                        Hepato</a>
                                                </li>
                                                <li><a href="product-grid-view.html">Super Elixir
                                                        Clean</a>
                                                </li>
                                                <li><a href="product-grid-view.html">Super Elixir for
                                                        man</a></li>
                                                <li><a href="product-grid-view.html">Super Elixir for
                                                        woman</a></li>
                                                <li><a href="product-grid-view.html">Super Elixir
                                                        Bronchi</a></li>
                                                <li><a href="product-grid-view.html">Super Elixir
                                                        Nephro</a>
                                                </li>

                                            </ul>

                                            <!-- mt col3 start here -->
                                            <div class="mt-col-3 promo">
                                                <div class="mt-promobox">
                                                    <a href="#"><img src="http://placehold.it/295x320"
                                                                     alt="promo banner"
                                                                     class="img-responsive"></a>
                                                </div>
                                            </div>
                                            <!-- mt col3 end here -->
                                        </div>
                                        <!-- mt f box end here -->
                                    </div>
                                    <!-- mt frame end here -->
                                </div>
                                <span class="mt-mdropover"></span>
                            </li>
                            <li class="drop">
                                <a href="#">ПРОГРАММЫ <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <div class="mt-dropmenu text-left">
                                    <!-- mt frame start here -->
                                    <div class="mt-frame">
                                        <!-- mt f box start here -->
                                        <div class="mt-f-box">
                                            <!-- mt col3 start here -->
                                            <div class="mt-col-3">
                                                <div class="sub-dropcont">
                                                    <strong class="title"><a href="product-grid-view.html"
                                                                             class="mt-subopener">Жилье</a></strong>
                                                    <div class="sub-drop">
                                                        <ul>
                                                            <li><a href="product-grid-view.html">Стоимость жилья от
                                                                    16000$</a></li>
                                                            <li><a href="product-grid-view.html">Рассрочка до 44
                                                                    месяцев </a></li>
                                                            <li><a href="product-grid-view.html">Без процентов и
                                                                    комиссии</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="sub-dropcont">
                                                    <strong class="title"><a href="#"
                                                                             class="mt-subopener">Автомобиль</a></strong>
                                                    <div class="sub-drop">
                                                        <ul>
                                                            <li><a href="404-page.html">Стоимость автомобиля от
                                                                    6000$</a></li>
                                                            <li><a href="404-page.html">Рассрочка до 15 месяцев</a></li>
                                                            <li><a href="404-page.html">Без процентов и комиссии</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- mt col3 end here -->

                                            <!-- mt col3 start here -->
                                            <div class="mt-col-3">
                                                <div class="sub-dropcont">
                                                    <strong class="title"><a href="#"
                                                                             class="mt-subopener">Ьизнес</a></strong>
                                                    <div class="sub-drop">
                                                        <ul>
                                                            <li><a href="about-us.html">Грант на бизнес от 4000$</a>
                                                            </li>
                                                            <li><a href="about-us.html">Рассрочка до 10 месяцев</a></li>
                                                            <li><a href="about-us.html">Без процентов и комиссии</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="sub-dropcont">
                                                    <strong class="title"><a href="#"
                                                                             class="mt-subopener">Путешествие</a></strong>
                                                    <div class="sub-drop">
                                                        <ul>
                                                            <li><a href="contact-us.html">Путевки на сумму от 1000$</a>
                                                            </li>
                                                            <li><a href="contact-us.html">Рассрочка до 6 месяцев</a>
                                                            </li>
                                                            <li><a href="contact-us.html">Без процентов и комиссии</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- mt col3 end here -->

                                            <!-- mt col3 start here -->
                                            <div class="mt-col-3">
                                                <div class="sub-dropcont">
                                                    <strong class="title"><a href="#"
                                                                             class="mt-subopener">INSTART</a></strong>
                                                    <div class="sub-drop">
                                                        <ul>
                                                            <li><a href="#">Продвижение в Instagram</a></li>
                                                            <li><a href="#">Более 1 млн подписчиков</a></li>
                                                            <li><a href="#">В период от 6 до 15 недель</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="sub-dropcont">
                                                    <strong class="title"><a href="#"
                                                                             class="mt-subopener">Profile</a></strong>
                                                    <div class="sub-drop">
                                                        <ul>
                                                            <li><a href="coming-soon.html">Скидки на товары и услуги</a>
                                                            </li>
                                                            <li><a href="coming-soon.html">Более 100 компании</a></li>
                                                            <li><a href="coming-soon.html">Более 2000 товаров и
                                                                    услуг</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- mt col3 end here -->

                                            <!-- mt col3 start here -->
                                            <div class="mt-col-3 promo">
                                                <div class="mt-promobox">
                                                    <a href="#"><img src="http://placehold.it/295x320"
                                                                     alt="promo banner"
                                                                     class="img-responsive"></a>
                                                </div>
                                            </div>
                                            <!-- mt col3 end here -->
                                        </div>
                                        <!-- mt f box end here -->
                                    </div>
                                    <!-- mt frame end here -->
                                </div>
                                <span class="mt-mdropover"></span>
                            </li>
                            <li>
                                <a class="drop-link" href="blog-right-sidebar.html">НОВОСТИ <i
                                            class="fa fa-angle-down hidden-lg hidden-md"
                                            aria-hidden="true"></i></a>
                                <div class="s-drop">
                                    {{--                                    <ul>--}}
                                    {{--                                        <li><a href="blog-fullwidth-page.html">Blog Fullwidth Page</a></li>--}}
                                    {{--                                        <li><a href="blog-right-sidebar2.html">blog right sidebar2</a></li>--}}
                                    {{--                                        <li><a href="blog-postlist-3-masonry.html">blog postlist masonry</a>--}}
                                    {{--                                        </li>--}}
                                    {{--                                        <li><a href="blog-post-detail-sidebar.html">blog post detail--}}
                                    {{--                                                sidebar</a></li>--}}
                                    {{--                                        <li><a href="blog-post-detail-full-width.html">blog post detail full--}}
                                    {{--                                                width</a></li>--}}
                                    {{--                                    </ul>--}}
                                </div>
                            </li>
                            <li>
                                <a class="drop-link" href="contact-us.html">КОНТАКТЫ <i
                                            class="fa fa-angle-down hidden-lg hidden-md"
                                            aria-hidden="true"></i></a>
                                <div class="s-drop">
                                    {{--                                    <ul>--}}
                                    {{--                                        <li><a href="contact-us.html">Contact</a></li>--}}
                                    {{--                                        <li><a href="contact-us2.html">Contact 2</a></li>--}}
                                    {{--                                    </ul>--}}
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <span class="mt-side-over"></span>
</header>

<style>
    .dropbtn {
        color: white;
        padding: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

</style>