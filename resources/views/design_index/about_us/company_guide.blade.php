@extends('design_index.layout.layout')
@section('meta-tags')

    <title>Qpartners Shop</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>

@endsection

@section('content')
    <main id="mt-main">
        <!-- Mt Content Banner of the Page -->
        <section class="mt-contact-banner wow fadeInUp" data-wow-delay="0.4s"  style=" background-size: cover;
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
                <nav class="breadcrumbs black-text-color text-center" >
                    <ul class="list-unstyled d-flex-row font-weight-lighter" style="font-size: 1.5rem">
                        <a href="/" class="" style="color: black; font-weight: 400">главная <i class="fa fa-angle-right ml-1" style="margin-left: 5px"></i></a>
                        <span class="" style="font-weight: 400">председатель компании</span>
                    </ul>
                </nav>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="" style="color: black; font-size: 18px; margin-bottom: 50px">
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
</style>