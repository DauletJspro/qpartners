@extends('design_index.layout.layout')

@section('meta-tags')

    <title>Qpartners Shop</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="css/icon-fonts.css">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="css/main.css">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <!-- 可选的Bootstrap主题文件（一般不用引入） -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

@endsection
@section('content')

<main id="mt-main">
    <!-- Mt Contact Banner of the Page -->
    <section class="mt-contact-banner style4" style="height: 210px;">
        <div class="container">
            <div class="gallery js-flickity"
                 data-flickity-options='{ "wrapAround": true }' style="left: 0;
						  top: 78px;
						  position: absolute;
						  width: 1520px;">
                <div class="gallery-cell">
                    <a href="product-detail.html"><img src="new_design/images/products/1.jpg" alt="image description"></a>
                </div>
                <div class="gallery-cell">
                    <a href="product-detail.html"><img src="new_design/images/products/2.jpg" alt="image description"></a>
                </div>
                <div class="gallery-cell">
                    <a href="product-detail.html"><img src="new_design/images/products/3.jpg" alt="image description"></a>
                </div>
            </div>
        </div>
    </section><!-- Mt Contact Banner of the Page end -->
    <div class="container">
        <div class="row">
            <!-- sidebar of the Page start here -->
            <aside id="sidebar" class="col-xs-12 col-sm-4 col-md-3 wow fadeInLeft" data-wow-delay="0.4s">

                <!-- shop-widget of the Page start here -->
                <section class="shop-widget">
                    <h2>Категория</h2>
                    <nav id="column_left">
                        <ul class="nav nav-list">
                            <li><a style="font-weight: bold;">НОВЫЕ</a></li>
                            <li>
                                <a class="accordion-heading" data-toggle="collapse" data-target="#submenu1" style="font-weight: bold;">
                                    <span class="nav-header-primary">РАЗВЛЕЧЕНИЯ <span class="pull-right"><b class="caret"></b></span></span>
                                </a>

                                <ul class="nav nav-list collapse" id="submenu1">
                                    <li>
                                        <a class="accordion-heading active" data-filter="activeweeknd" data-toggle="collapse" data-target="#submenu1">Активный отдых
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-filter="park" data-toggle="collapse" data-target="#submenu1">Парки развлечений
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-filter="practice" data-toggle="collapse" data-target="#submenu1">
                                            Развлечения для детей
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-filter="pown" data-toggle="collapse" data-target="#submenu1">Сауны и бани
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-filter="quest" data-toggle="collapse" data-target="#submenu1">Квесты, игровые клубы
                                            <span class="pull-right"></span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="accordion-heading" data-toggle="collapse" data-target="#submenu2" style="font-weight: bold;">
                                    <span class="nav-header-primary">ЕДА <span class="pull-right"><b class="caret"></b></span></span>
                                </a>

                                <ul class="nav nav-list collapse" id="submenu2">
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu2">Рестораны, кафе и бары
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu2">Доставка
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu2">
                                            Сеты
                                            <span class="pull-right"></span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="accordion-heading" data-toggle="collapse" data-target="#submenu3" style="font-weight: bold;">
                                    <span class="nav-header-primary">ЗДОРОВЬЕ <span class="pull-right"><b class="caret"></b></span></span>
                                </a>

                                <ul class="nav nav-list collapse" id="submenu3">
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu3">МРТ и КТ
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu3">УЗИ
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu3">
                                            Анализы
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu3">Обследования
                                            <span class="pull-right"></span></a>
                                    </li><li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu3">Стоматологии
                                            <span class="pull-right"></span></a>
                                    </li><li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu3">Прием к врачу
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu3">Хирургия, пластика
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu3">Соляные пещеры
                                            <span class="pull-right"></span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="accordion-heading" data-toggle="collapse" data-target="#submenu4" style="font-weight: bold;">
                                    <span class="nav-header-primary">КРАСОТА <span class="pull-right"><b class="caret"></b></span></span>
                                </a>

                                <ul class="nav nav-list collapse" id="submenu4">
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu4">SPA-программы
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu4">Уход за ногтями
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu4">
                                            Уход за волосами<span class="pull-right"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu4">
                                            Барбершоп<span class="pull-right"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu4">
                                            Создание образа<span class="pull-right"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu4">
                                            Макияж<span class="pull-right"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu4">
                                            Депиляция и эпиляция<span class="pull-right"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu4">
                                            Массаж <span class="pull-right"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="accordion-heading" data-toggle="collapse" data-target="#submenu5" style="font-weight: bold;">
                                    <span class="nav-header-primary">СПОРТ <span class="pull-right"><b class="caret"></b></span></span>
                                </a>

                                <ul class="nav nav-list collapse" id="submenu5">
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu5">Прокат и аренда
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu5">Тренажерный зал
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu5">Бассейны
                                            <span class="pull-right"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu5">Спортивные секции
                                            <span class="pull-right"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu5">Фитнес
                                            <span class="pull-right"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu5">Танцы
                                            <span class="pull-right"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="accordion-heading" data-toggle="collapse" data-target="#submenu6" style="font-weight: bold;">
                                    <span class="nav-header-primary">ТУРИЗМ, ОТЕЛИ <span class="pull-right"><b class="caret"></b></span></span>
                                </a>

                                <ul class="nav nav-list collapse" id="submenu6">
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu6">Гостиницы, отели
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu6">Санаторий
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu6">Зоны отдыха
                                            <span class="pull-right"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu6">Боровое
                                            <span class="pull-right"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu6">Сарыагаш
                                            <span class="pull-right"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="accordion-heading" data-toggle="collapse" data-target="#submenu7" style="font-weight: bold;">
                                    <span class="nav-header-primary">УСЛУГИ<span class="pull-right"><b class="caret"></b></span></span>
                                </a>

                                <ul class="nav nav-list collapse" id="submenu7">
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu7">Для взрослых
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu7">Мастер-классы
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu7">Обучающие курсы
                                            <span class="pull-right"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu7">Развивающие курсы для детей
                                            <span class="pull-right"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu7">Языковые курсы
                                            <span class="pull-right"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu7">Фото и видео
                                            <span class="pull-right"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="accordion-heading" data-toggle="collapse" data-target="#submenu8" style="font-weight: bold;">
                                    <span class="nav-header-primary">ТОВАРЫ<span class="pull-right"><b class="caret"></b></span></span>
                                </a>

                                <ul class="nav nav-list collapse" id="submenu8">
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu8">Цветы и подарки
                                            <span class="pull-right"></span></a>
                                    </li>
                                    <li>
                                        <a class="accordion-heading" data-toggle="collapse" data-target="#submenu8">Одежда и аксессуары
                                            <span class="pull-right"></span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </nav>

                    <h2 style="margin-top: 40px;">Компания</h2>
                    <nav id="column_left">
                        <ul class="nav nav-list">
                            <li><a>О нас</a></li>
                            <li><a>Контакты</a></li>
                        </ul>
                    </nav>

                    <h2 style="margin-top: 40px;">Поддержка</h2>
                    <nav id="column_left">
                        <ul class="nav nav-list">
                            <li><a>Часто задаваемые вопросы</a></li>
                            <li><a>Написать нам</a></li>
                            <li><a>Правила сервиса</a></li>
                            <li><a>Купить карту</a></li>
                        </ul>
                    </nav>

                    <h2 style="margin-top: 40px;">Предпринимателям</h2>
                    <nav id="column_left">
                        <ul class="nav nav-list">
                            <li><a>Для Вашего бизнеса</a></li>
                            <li><a>Содрудничество</a></li>
                        </ul>
                    </nav>
                    <!-- category list start here
                    <ul class="list-unstyled category-list">
                        <li>
                            <a href="/shop/1">
                                <span class="name">НОВЫЕ</span>
                                <span class="num">12</span>
                            </a>
                        </li>
                        <li>
                            <a href="/shop/2">
                                <span class="name">РАЗВЛЕЧЕНИЯ</span>
                                <span class="num">24</span>
                            </a>
                        </li>
                        <li>
                            <a href="/shop/3">
                                <span class="name">ЕДА</span>
                                <span class="num">9</span>
                            </a>
                        </li>
                        <li>
                            <a href="/shop/4">
                                <span class="name">ЗДОРОВЬЕ</span>
                                <span class="num">2</span>
                            </a>
                        </li>
                        <li>
                            <a href="/shop/5">
                                <span class="name">КРАСОТА</span>
                                <span class="num">17</span>
                            </a>
                        </li>
                        <li>
                            <a href="/shop/6">
                                <span class="name">СПОРТ</span>
                                <span class="num">10</span>
                            </a>
                        </li>
                        <li>
                            <a href="/shop/7">
                                <span class="name">ТУРИЗМ, ОТЕЛИ</span>
                                <span class="num">23</span>
                            </a>
                        </li>
                    </ul> category list end here -->
                </section><!-- shop-widget of the Page end here -->
                <!-- shop-widget of the Page start here -->

            </aside><!-- sidebar of the Page end here -->
            <div class="col-xs-12 col-sm-8 col-md-9 wow fadeInRight" data-wow-delay="0.4s">
                <!-- mt shoplist header start here -->
                <ul class="list-unstyled breadcrumbs" style="margin-top: 30px;">
                    <li><a href="#">GAPCARD <i class="fa fa-angle-right"></i></a></li>
                </ul>
                <!-- mt productlisthold start here -->
                <ul class="mt-productlisthold list-inline" style="margin-top: 30px;">
                    <li>
                        <!-- mt product1 large start here -->
                        <div class="mt-product1 portfolio__col" data-cat="activeweeknd" style="position: relative;">
                            <div class="box">
                                <div class="b1">
                                    <div class="b2">
                                        <a href="product-detail.html"><img src="new_design/images/products/img11.jpg" alt="image description"></a>
                                        <span class="caption">
														<span class="best-price">Скидка 40%</span>
													</span>
                                        <ul class="links add">
                                            <li><a href="#"><span>Продано: 46</span></a></li>
                                            <li><a href="#"><span>Оценки: 4.0</span></a></li>
                                            <li><a href="#"><span>Отзывы: 2</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="txt">
                                <strong class="title"><a href="product-detail.html">Шымбулак</a></strong>
                                <span style="float: right;"> <i class="fa fa-eye" aria-hidden="true"> </i> 244 </span>
                                <span class="description">Чимбула́к — популярный горнолыжный курорт в Казахстане, близ Алма-Аты.</span>
                                <span class="price"><span>от 5900 тг.</span></span>
                                <a class="d-flex align-items-end v-pod" href="product-detail.html"><span>Подробнее</span></a>
                            </div>
                            <br>
                        </div><!-- mt product1 center end here -->
                    </li>
                    <li>
                        <!-- mt product1 large start here -->
                        <div class="mt-product1 portfolio__col" data-cat="park">
                            <div class="box">
                                <div class="b1">
                                    <div class="b2">
                                        <a href="product-detail.html"><img src="new_design/images/products/img12.jpg" alt="image description"></a>
                                        <span class="caption">
														<span class="best-price">Скидка 30%</span>
													</span>
                                        <ul class="links add">
                                            <li><a href="#"><span>Продано: 46</span></a></li>
                                            <li><a href="#"><span>Оценки: 4.0</span></a></li>
                                            <li><a href="#"><span>Отзывы: 2</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="txt">
                                <strong class="title"><a href="product-detail.html">Парк развлечений Evrikum</a></strong>
                                <span style="float: right;"> <i class="fa fa-eye" aria-hidden="true"> </i> 244 </span>
                                <span class="description">Удивительный мир! Иллюзии, эксперименты, интерактивное химическое шоу и многое другое </span>
                                <span class="price"> <span>от 3 800 тг.</span></span>
                                <a class="v-pod" href="product-detail.html"><span>Подробнее</span></a>
                            </div>
                            <br>
                        </div><!-- mt product1 center end here -->
                    </li>
                    <li>
                        <!-- mt product1 large start here -->
                        <div class="mt-product1 portfolio__col" data-cat="practice">
                            <div class="box">
                                <div class="b1">
                                    <div class="b2">
                                        <a href="product-detail.html"><img src="new_design/images/products/img13.jpg" alt="image description"></a>
                                        <span class="caption">
														<span class="best-price">Скидка 40%</span>
													</span>
                                        <ul class="links add">
                                            <li><a href="#"><span>Продано: 46</span></a></li>
                                            <li><a href="#"><span>Оценки: 4.0</span></a></li>
                                            <li><a href="#"><span>Отзывы: 2</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="txt">
                                <strong class="title"><a href="product-detail.html">Аквапарк Hawaii и Miami</a></strong>
                                <span style="float: right;"> <i class="fa fa-eye" aria-hidden="true"> </i> 244 </span>
                                <span class="description">Детские праздники в аквапарке Hawaii и Miami! Квесты, мастер-классы, Battle Dance, пицца и многое другое!</span>
                                <span class="price"><span>от 500 тг.</span></span>
                                <a href="product-detail.html"><span class="v-pod">Подробнее</span></a>
                            </div>
                            <br>
                        </div><!-- mt product1 center end here -->
                    </li>
                    <li>
                        <!-- mt product1 large start here -->
                        <div class="mt-product1 portfolio__col" data-cat="pown">
                            <div class="box">
                                <div class="b1">
                                    <div class="b2">
                                        <a href="product-detail.html"><img src="new_design/images/products/img14.jpg" alt="image description"></a>
                                        <span class="caption">
														<span class="best-price">Скидка 25%</span>
													</span>
                                        <ul class="links add">
                                            <li><a href="#"><span>Продано: 46</span></a></li>
                                            <li><a href="#"><span>Оценки: 4.0</span></a></li>
                                            <li><a href="#"><span>Отзывы: 2</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="txt">
                                <strong class="title"><a href="product-detail.html">Горный комплекс «Сункар»</a></strong>
                                <span style="float: right;"> <i class="fa fa-eye" aria-hidden="true"> </i> 244 </span>
                                <span class="description">Насладитесь отдыхом в горах! Сауна, бильярд и караоке.</span>
                                <span class="price"><span>от 9 000 тг.</span></span>
                                <a class="d-flex align-items-end v-pod" href="product-detail.html"><span>Подробнее</span></a>
                            </div>
                            <br>
                        </div><!-- mt product1 center end here -->
                    </li>
                    <li>
                        <!-- mt product1 large start here -->
                        <div class="mt-product1 portfolio__col" data-cat="quest">
                            <div class="box">
                                <div class="b1">
                                    <div class="b2">
                                        <a href="product-detail.html"><img src="new_design/images/products/img15.jpg" alt="image description"></a>
                                        <span class="caption">
														<span class="best-price">Скидка 50%</span>
													</span>
                                        <ul class="links add">
                                            <li><a href="#"><span>Продано: 46</span></a></li>
                                            <li><a href="#"><span>Оценки: 4.0</span></a></li>
                                            <li><a href="#"><span>Отзывы: 2</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="txt">
                                <strong class="title"><a href="product-detail.html">KILLHOUSE</a></strong>
                                <span style="float: right;"> <i class="fa fa-eye" aria-hidden="true"> </i> 244 </span>
                                <span class="description">Для настоящих фанатов! Игра в страйкбол на модульной игровой площадке.</span>
                                <span class="price"><span>от 12 000 тг.</span></span>
                                <a href="product-detail.html"><span class="v-pod">Подробнее</span></a>
                            </div>
                            <br>
                        </div><!-- mt product1 center end here -->
                    </li>
                    <li>
                        <!-- mt product1 large start here -->
                        <div class="mt-product1 portfolio__col" data-cat="practice">
                            <div class="box">
                                <div class="b1">
                                    <div class="b2">
                                        <a href="product-detail.html"><img src="new_design/images/products/img11.jpg" alt="image description"></a>
                                        <span class="caption">
														<span class="best-price">Скидка 40%</span>
													</span>
                                        <ul class="links add">
                                            <li><a href="#"><span>Продано: 46</span></a></li>
                                            <li><a href="#"><span>Оценки: 4.0</span></a></li>
                                            <li><a href="#"><span>Отзывы: 2</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="txt">
                                <strong class="title"><a href="product-detail.html">Bombi Chair</a></strong>
                                <span style="float: right;"> <i class="fa fa-eye" aria-hidden="true"> </i> 244 </span>
                                <span class="description">Чимбула́к — популярный горнолыжный курорт в Казахстане, близ Алма-Аты.</span>
                                <span class="price"><span>от 399,00</span></span>
                                <a href="product-detail.html"><span class="v-pod">Подробнее</span></a>
                            </div>
                            <br>
                        </div><!-- mt product1 center end here -->
                    </li>
                    <li>
                        <!-- mt product1 large start here -->
                        <div class="mt-product1 portfolio__col" data-cat="pown">
                            <div class="box">
                                <div class="b1">
                                    <div class="b2">
                                        <a href="product-detail.html"><img src="new_design/images/products/img13.jpg" alt="image description"></a>
                                        <span class="caption">
														<span class="best-price">Скидка 40%</span>
													</span>
                                        <ul class="links add">
                                            <li><a href="#"><span>Продано: 46</span></a></li>
                                            <li><a href="#"><span>Оценки: 4.0</span></a></li>
                                            <li><a href="#"><span>Отзывы: 2</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="txt">
                                <strong class="title"><a href="product-detail.html">Chair with armrests</a></strong>
                                <span style="float: right;"> <i class="fa fa-eye" aria-hidden="true"> </i> 244 </span>
                                <span class="description">Чимбула́к — популярный горнолыжный курорт в Казахстане, близ Алма-Аты.</span>
                                <span class="price"> <span>от 200,00</span></span>
                                <a href="product-detail.html"><span class="v-pod">Подробнее</span></a>
                            </div>
                            <br>
                        </div><!-- mt product1 center end here -->
                    </li>
                    <li>
                        <!-- mt product1 large start here -->
                        <div class="mt-product1 portfolio__col" data-cat="activeweeknd" style="position: relative;">
                            <div class="box">
                                <div class="b1">
                                    <div class="b2">
                                        <a href="product-detail.html"><img src="new_design/images/products/img11.jpg" alt="image description"></a>
                                        <span class="caption">
														<span class="best-price">Скидка 40%</span>
													</span>
                                        <ul class="links add">
                                            <li><a href="#"><span>Продано: 46</span></a></li>
                                            <li><a href="#"><span>Оценки: 4.0</span></a></li>
                                            <li><a href="#"><span>Отзывы: 2</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="txt">
                                <strong class="title"><a href="product-detail.html">Шымбулак</a></strong>
                                <span style="float: right;"> <i class="fa fa-eye" aria-hidden="true"> </i> 244 </span>
                                <span class="description">Чимбула́к — популярный горнолыжный курорт в Казахстане, близ Алма-Аты.</span>
                                <span class="price"><span>от 5900 тг.</span></span>
                                <a class="d-flex align-items-end v-pod" href="product-detail.html"><span>Подробнее</span></a>
                            </div>
                            <br>
                        </div><!-- mt product1 center end here -->
                    </li>
                    <li>
                        <!-- mt product1 large start here -->
                        <div class="mt-product1 portfolio__col" data-cat="activeweeknd">
                            <div class="box">
                                <div class="b1">
                                    <div class="b2">
                                        <a href="product-detail.html"><img src="new_design/images/products/img12.jpg" alt="image description"></a>
                                        <span class="caption">
														<span class="best-price">Скидка 40%</span>
													</span>
                                        <ul class="links add">
                                            <li><a href="#"><span>Продано: 46</span></a></li>
                                            <li><a href="#"><span>Оценки: 4.0</span></a></li>
                                            <li><a href="#"><span>Отзывы: 2</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="txt">
                                <strong class="title"><a href="product-detail.html">Marvelous Modern 3 Seater</a></strong>
                                <span style="float: right;"> <i class="fa fa-eye" aria-hidden="true"> </i> 244 </span>
                                <span class="description">Чимбула́к — популярный горнолыжный курорт в Казахстане, близ Алма-Аты.</span>
                                <span class="price"><span> от 599,00</span></span>
                                <a href="product-detail.html"><span class="v-pod">Подробнее</span></a>
                            </div>
                            <br>
                        </div><!-- mt product1 center end here -->
                    </li>
                </ul><!-- mt productlisthold end here -->
                <!-- mt pagination start here -->
                <nav class="mt-pagination">
                    <ul class="list-inline">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                    </ul>
                </nav><!-- mt pagination end here -->
            </div>
        </div>
    </div>
</main><!-- mt main end here -->
</div><!-- W1 end here -->
<span id="back-top" class="fa fa-arrow-up"></span>
</div>
@endsection
<!-- include jQuery -->
<script src="js/jquery.js"></script>
<script src="js/jssor.slider-28.1.0.min.js" type="text/javascript"></script>
<script>
    $('.accordion-toggle').on('click',function(e){
        if($(this).parents('.accordion-group').children('.accordion-body').hasClass('in')){
            e.stopPropagation();
        }
    });
</script>
<script type="text/javascript">
    window.jssor_1_slider_init = function() {

        var jssor_1_options = {
            $AutoPlay: 1,
            $SlideWidth: 720,
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 16,
                $SpacingY: 16
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*#region responsive code begin*/

        var MAX_WIDTH = 980;

        function ScaleSlider() {
            var containerElement = jssor_1_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_1_slider.$ScaleWidth(expectedWidth);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();

        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        /*#endregion responsive code end*/
    };
</script>
<script>
    let filters = document.querySelectorAll('a[data-filter]');

    for (let filter of filters) {
        filter.addEventListener('click', function(e) {
            e.preventDefault();

            let catId = filter.getAttribute('data-filter');
            let workCat = document.querySelectorAll('.portfolio__col');

            workCat.forEach(function(c) {

                if (catId === 'all') {
                    c.classList.remove('hide');
                } else {
                    if (c.getAttribute('data-cat') !== catId) {
                        c.classList.add('hide');
                    } else {
                        c.classList.remove('hide');
                    }
                }

            })

        }); /* end listener*/
    }
</script>
<script>
    $( '#shop-widget .nav a' ).on( 'click', function () {
        $( '#shop-widget .nav' ).find( 'li.active' ).removeClass( 'active' );
        $( this ).parent( 'li' ).addClass( 'active' );
    });
</script>
<script type="text/javascript">jssor_1_slider_init();</script>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="https://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<!-- include jQuery -->
<script src="js/plugins.js"></script>
<!-- include jQuery -->
<script src="js/jquery.main.js"></script>

<style>

    .icon-location:before {
        content: "\f3c5";
    }
    .gallery {
        background: #EEE;
    }
    .gallery-cell {
        width: 66%;
        height: 200px;
        margin-right: 10px;
    }
    /* cell number */
    .gallery-cell:before {
        display: block;
        text-align: center;
        line-height: 200px;
        font-size: 80px;
    }
    #column_left {
    }
    .nav-list li a {
        text-decoration: none;
        display: block;
        padding: 10px;
        cursor: pointer;
        border-bottom: 1px solid #515151 !important;
        color: #9d9d9d;
    }
    .nav-list > li > a {
        color: #000;
        font-size: 14px;
        padding-left: 13px !important;
        border-bottom: 1px solid #585858;
    }
    .nav-list > li > a > ul > li > a {
        color: #000;
        font-size: 14px;
        padding-left: 13px !important;
        border-bottom: 1px solid #585858;
    }
    .nav-header-primary > li > a {
    }
    .nav-list > li > a:hover {
        background-color: #444444;
        color:#FFF;
    }
    #main-menu {
        background-color: #2E3039;
    }
    .list-group-item {
        background-color: #2E3039;
        border: none;
    }
    a.list-group-item {
        color: #FFF;
    }
    a.list-group-item:hover,
    a.list-group-item:focus {
        background-color: #43D5B1;
    }
    a.list-group-item.active,
    a.list-group-item.active:hover,
    a.list-group-item.active:focus {
        color: #FFF;
        background-color: #43D5B1;
        border: none;
    }
    .list-group-item:first-child,
    .list-group-item:last-child {
        border-radius: 0;
    }
    .list-group-level1 .list-group-item {
        padding-left:30px;
    }
    .list-group-level2 .list-group-item {
        padding-left:60px;
    }
    .mt-product1 .caption .best-price {
        color: #fff;
        padding: 3px 6px;
        background: #f00;
        font: 700 16px/18px "Montserrat", sans-serif;
    }
    #shop-widget .nav li.active > a {
        background-color: #f00;
        color: #fff;
    }
    /*maincss*/
    .mt-product1 .links.add {
        -webkit-box-shadow: 0 0 9px rgb(172 172 172 / 35%);
        box-shadow: 0 0 9px rgb(172 172 172 / 35%);
        padding: 0px 0;
        width: 100%;
        bottom: 30px;
        margin: 0 auto;
        max-width: 277px;
    }
    .mt-product1 .links.add a {
        padding: 8px 8px;
    }
    .mt-product1 .links a span {
        font-size: 14px;
        margin: 0 0px 0 0px;
    }
    .v-pod{
        float: left;
        margin-top: 6px;
        background-color: #f00;
        color: #FFF;
        padding:6px 12px;
        border-radius: 20px;
        justify-content: end;
        align-items: flex-end;
    }
    .v-pod:hover{
        float: left;
        margin-top: 6px;
        background-color: #fff;
        text-decoration: none;
        color: #f00;
        padding:5px 11px;
        border: 1px solid #f00;
        border-radius: 20px;
        justify-content: end;
        align-items: flex-end;
    }
</style>