@extends('design_index.layout.layout')

@section('meta-tags')

    <title>Наши контакты. Qpartners.kz</title>
    <meta name="description"
          content="Наши контакты. Qpartners.kz - это группа единомышленников, которые уже имеют богатый опыт работы в МЛМ - индустрии, интернет-коммерции и обладают всеми необходимыми качествами для достижения поставленных целей"/>
    <meta name="keywords" content="Наши контакты, Qpartners.kz"/>

@endsection

@section('content')
    <main id="mt-main">
        <!-- Mt Contact Banner of the Page -->
        <section class="container mt-contact-banner wow fadeInUp" data-wow-delay="0.4s"  style=" background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background: red;
            letter-spacing: 4px">
            <p style="color: white;font-weight: 600; font-size: 40px; text-align: center; text-transform: uppercase;text-shadow: 1px 1px 1px black;">контакты</p>

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
        <!-- Mt Contact Detail of the Page -->
        <section class="mt-contact-detail content-info wow fadeInUp" style="padding-top: 20px" data-wow-delay="0.4s">
            <div class="container-fluid">
                <!-- Breadcrumbs of the Page -->
                <nav class="breadcrumbs" style="font-size: 1.5rem;font-family: Montserrat; height: 40px">
                    <ul class="list-unstyled d-flex-row font-weight-lighter text-uppercase">
                        <a href="/" style="font-weight: 600; color: black" class="href-style">главная <i class="fa fa-angle-right ml-1"></i></a>
                        <a style="font-weight: 400; color: black;">контакты</a>

                    </ul>
                </nav>
                <!-- Breadcrumbs of the Page end -->
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
                        <div class="txt-wrap">
                            <h1 style="font-weight: 600; color: black;">Мы всегда на связи</h1>
                            <p style="font-size: 2rem;margin-top: 20px">Свяжитесь с нами удобным для Вас способом. Или приходите к нам в офис по указанному адресу, с радостью будем ждать Вас.</p>
                        </div>
                        <ul class="list-unstyled ">
                            <li style="width: 100%; display:flex;">
                                <img src="/new_design/images/banners/geo.svg" style="width: 15px" alt="img not found">
                                <span style="margin-left: 5px; color: black; font-weight: 400">г. Шымкент, ул Кабанбай батыра, 28 б</span>
                            </li>
                            <li style="width: 100%; display: flex; margin-top: 10px">
                                <img src="/new_design/images/banners/phone.svg" style="width: 15px" alt="img not found">
                                <a href="+7 707 369 17 77" style="color: black; line-height: 2.5rem; font-weight: 400; margin-left: 5px">+7 707 369 17 77</a>
                            </li>
                            <li style="width: 100%; display: flex; margin-top: 10px">
                                <img src="/new_design/images/banners/mail.svg" style="width: 15px" alt="img not found">
                                <a href="#" style="color: black; line-height: 2.5rem; font-weight: 400; margin-left: 5px">globalasarproject@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <h2>Остались вопросы?</h2>
                        <!-- Contact Form of the Page -->
                        <form action="#" class="contact-form">
                            <fieldset style="color: silver">
                                <input type="text" class="form-control" placeholder="Имя">
                                <input type="email" class="form-control" placeholder="E-Mail">
                                <input type="text" class="form-control" placeholder="Тема">
                                <textarea class="form-control" placeholder="Текст"></textarea>
                                <button class="btn-type3" type="submit">отправить</button>
                            </fieldset>
                        </form>
                        <!-- Contact Form of the Page end -->
                    </div>
                </div>
            </div>
        </section><!-- Mt Contact Detail of the Page end -->
        <!-- Mt Map Holder of the Page -->
        <div class="container" id="map" style=" min-height: 500px"></div>
    </main>
@endsection
@section('js')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<ваш API-ключ>" type="text/javascript"></script>
    <script>
        ymaps.ready(init);

        function init() {
            var myMap = new ymaps.Map("map", {
                    center: [42.308933, 69.601383],
                    zoom: 17,
                }, {
                    searchControlProvider: 'yandex#search'
                }),
                myGeoObject = new ymaps.GeoObject({
                    geometry: {
                        type: "Point",
                        coordinates: [42.308313, 69.600471]
                    },
                    properties: {
                        iconContent: 'GAP',
                    }
                }, {
                    preset: 'islands#redStretchyIcon',
                    draggable: true
                });

            myMap.geoObjects
                .add(myGeoObject);
        }

    </script>
@endsection
<style>
    .href-style:hover {
        color: silver !important;
    }
</style>


