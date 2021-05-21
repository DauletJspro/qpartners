@extends('design_index.layout.layout')
@section('meta-tags')

    <title>Qpartners Shop</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>

@endsection

<?php
use App\Models\Slider;

$gallery = Slider::where('is_show', 1)
    ->orderBy('slider_id')
    ->paginate(6);
?>
@section('content')
    <main id="mt-main">
        <!-- Mt Content Banner of the Page -->
        <section class="container mt-contact-banner wow fadeInUp" data-wow-delay="0.4s"  style=" background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
             background-image: url('/new_design/images/banners/montazhnaya8.jpg');">
            <p style="color: white;font-weight: 600; font-size: 40px; text-align: center; text-transform: uppercase;text-shadow: 1px 1px 1px black;">о кооперативе</p>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <nav class="breadcrumbs">
                            <ul class="list-unstyled">
                                {{--                                <li><a href="index.html">home <i class="fa fa-angle-right"></i></a></li>--}}
                                {{--                                <li>About Us</li>--}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Mt Content Banner of the Page end -->
        <!-- Mt About Section of the Page -->
        <section class="mt-about-sec wow fadeInUp" data-wow-delay="0.4s" style="padding-top: 20px">
            <div class="container">
                <nav class="breadcrumbs" style="font-size: 1.5rem;font-family: Montserrat; height: 40px">
                    <ul class="list-unstyled d-flex-row font-weight-lighter text-uppercase">
                        <a href="/" style="font-weight: 600; color: black" class="href-style">главная <i class="fa fa-angle-right ml-1"></i></a>
                        <a style="font-weight: 400; color: black;">председатель компании</a>

                    </ul>
                </nav>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="" style="color: black; font-size: 18px; margin-bottom: 50px; font-family: Montserrat;">
                            <p style="font-weight: 600; font-size: 24px">Что такое Потребительский Кооператив?</p>
                            <div class="container">
                                <p>Потребительским кооперативом является добровольное объединение граждан и юридических лиц на основе членства в целях удовлетворения собственных потребностей в товарах и услугах, первоначальное имущество которого складывается из паевых взносов.</p>
                            </div>
                            <p style="font-weight: 600; font-size: 24px">Что такое ПК «GAP»?</p>
                            <div class="container">
                                <p>Потребительский Кооператив «GAP» - это возможность для каждого гражданина нашей страны приобрести жилье, автомобиль и потребительские товары в рассрочку на самых лучших условиях. Другими словами, это:</p>
                                <p>- рассрочка до 9 000 000 тенге</p>
                                <p>- отсутствие переплат</p>
                                <p>- отсутствие процентов</p>
                                <p>- без подтверждения дохода</p>
                                <p>- с минимальным пакетом документов</p>
                                <p>- получение жилья от 1 месяца</p>
                                <p>Для получения жилья, автомобиля или потребительского товара в рассрочку Вы можете выбрать программу с первоначальным взносом, который начинается от 30% или ежемесячным паевым взносом от 10 000 тенге в месяц.</p>
                                <p>Кооператив работает по всему Казахстану, точнее Вы можете приобрести жилье, автомобиль или потребительские товары в рассрочку находясь в любом городе Казахстана.</p>
                                <p>Для получения полной информации о кооперативе и программах, Вы можете лично посетить головной офис или офис представителей в Вашем городе. Список офисов Вы можете узнать в разделе контакты.</p>
                            </div>
                            <div style="margin-top: 50px">
                                <strong>НАША ГАЛЕРЕЯ</strong>
                                <div class="roww">
                                    <div class="roww__inner">
                                        @foreach($gallery as $item)

                                            <div class="tile">
                                                <div class="tile__media">
                                                    <img class="tile__img" src="{{$item->slider_image}}" alt=""  />
                                                </div>
                                                <div class="tile__details">
                                                    <div class="tile__title">
                                                        Top Gear
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mt-follow-holder">
                            <span class="title">Follow Us</span>
                            <!-- Social Network of the Page -->
                            <ul class="list-unstyled social-network">
{{--                                <li>--}}
{{--                                    <a target="_blank" href="/{{$guide_text->author_twitter_link}}"><i--}}
{{--                                                class="fa fa-twitter"></i></a>--}}
{{--                                </li>--}}
                                <li>
                                    <a href="https://www.facebook.com/gap24.kz/"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://goo.su/5GgJ"><i class="fa fa-whatsapp"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/gap24.kz/"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                            <!-- Social Network of the Page end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
<style>

    br {
        display: none;
    }
    .href-style:hover {
        color: silver !important;
    }
    .roww {
        overflow: scroll;
        width: 100%;
    }
    .roww__inner {
        transition: 450ms transform;
        font-size: 0;
        white-space: nowrap;
        margin: 70.3125px 0;
        padding-bottom: 10px;
    }
    .tile {
        position: relative;
        display: inline-block;
        width: 250px;
        height: 200px;
        margin-right: 10px;
        font-size: 20px;
        cursor: pointer;
        transition: 450ms all;
        transform-origin: center left;
    }
    .tile__img {
        width: 250px;
        height: 200px;
        -o-object-fit: cover;
        object-fit: cover;
    }
    .tile__details {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        top: 0;
        font-size: 10px;
        opacity: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0) 100%);
        transition: 450ms opacity;
    }
    .tile__details:after,
    .tile__details:before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        display: #000;
    }
    .tile__details:after {
        margin-top: -25px;
        margin-left: -25px;
        width: 50px;
        height: 50px;
        border: 3px solid #ecf0f1;
        line-height: 50px;
        text-align: center;
        border-radius: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 1;
    }
    .tile__details:before {
        content: '▶';
        left: 0;
        width: 100%;
        font-size: 30px;
        margin-left: 7px;
        margin-top: -18px;
        text-align: center;
        z-index: 2;
    }
    .tile:hover .tile__details {
        opacity: 1;
    }
    .tile__title {
        position: absolute;
        bottom: 0;
        padding: 10px;
    }

    .roww__inner:hover {
        transform: translate3d(-62.5px, 0, 0);
    }
    .roww__inner:hover .tile {
        opacity: 0.3;
    }
    .roww__inner:hover .tile:hover {
        transform: scale(1.5);
        opacity: 1;
    }
    .tile:hover ~ .tile {
        transform: translate3d(125px, 0, 0);
    }


</style>