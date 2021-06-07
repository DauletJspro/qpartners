<?php
use App\Admin\SocialNetwork;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
?>
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
        <section class="container mt-contact-banner wow fadeInUp" data-wow-delay="0.4s"
                 style="
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background: red"

        >
            <p style="font-family: Montserrat; color: white; font-weight: 600; font-size: 40px; text-align: center; text-transform: uppercase;text-shadow: 1px 1px 1px black;">Председатель Кооператива</p>

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


        <section class="container wow fadeInUp" data-wow-delay="0.4s" style="padding-top: 20px">
            <!-- Breadcrumbs of the Page -->
            <nav class="breadcrumbs" style="font-size: 1.5rem;font-family: Montserrat; height: 40px">
                <ul class="list-unstyled d-flex-row font-weight-lighter text-uppercase">
                    <a href="/" style="font-weight: 600; color: black" class="href-style">главная <i class="fa fa-angle-right ml-1"></i></a>
                    <a style="font-weight: 400; color: black;">председатель кооператива</a>

                </ul>
            </nav>

            <!-- Breadcrumbs of the Page end -->
            <div id="cooperative-chairman" class=""  style="padding: 10px 0; display: flex;color: black; font-size: 18px; flex-wrap: wrap;">
                <div style="width: 30%; position: relative; background: #C4C4C4; height: 569px">
                    {{--                    <img src="" alt="img not found" style="width: 100%;">--}}
                    <span style="position: absolute; left: 150px; top: 284px; font-weight: bold; font-size: 24px">Фото</span>
                </div>
                <div style="width: 53%; margin-left: 5%; padding: 0 2%; font-family: Montserrat; text-align: justify">
                    <strong>РСЫМБЕТОВА Ж.Е</strong>
                    <p style="font-weight: bold; color: #646464; margin-top: 10px">Председатель потребительского кооператива “GAP”</p>
                    <p style="margin-top: 50px">Для получения жилья, автомобиля или потребительского товара в рассрочку Вы можете выбрать программу с первоначальным взносом, который начинается от 30% или ежемесячным паевым взносом от 10 000 тенге в месяц.</p>
                    <p style="margin-top: 20px">Кооператив работает по всему Казахстану, точнее Вы можете приобрести жилье, автомобиль или потребительские товары в рассрочку находясь в любом городе Казахстана.</p>
                    <p style="margin-top: 20px">Для получения полной информации о кооперативе и программах, Вы можете лично посетить головной офис или офис представителей в Вашем городе. Список офисов Вы можете узнать в разделе контакты.</p>
                </div>
            </div>
        </section>
        <!-- Mt About Section of the Page -->
        <!-- Mt Team Section of the Page -->

        <section class="mt-team-sec">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        {{--                        <h3>Лидерский совет</h3>--}}
                        <div class="holder">
                            @foreach($leaders  as $person)
                                <?php
                                /** @var Users $person */
                                $socialNetworks = DB::table('ref_social_network_items')
                                    ->where(['item_id' => $person->id])
                                    ->where(['type_id' => \App\Admin\SocialNetwork::LEADERS_PERSON])
                                    ->get();


                                if ($socialNetworks) {
                                    $socialNetworks = collect($socialNetworks)->all();
                                    $socialNetworks = Arr::pluck($socialNetworks, 'url', 'social_network_id');
                                    $faceBook = isset($socialNetworks[SocialNetwork::FACEBOOK]) ? $socialNetworks[SocialNetwork::FACEBOOK] : '';
                                    $twitter = isset($socialNetworks[SocialNetwork::TWITTER]) ? $socialNetworks[SocialNetwork::TWITTER] : '';
                                    $instagram = isset($socialNetworks[SocialNetwork::INSTAGRAM]) ? $socialNetworks[SocialNetwork::INSTAGRAM] : '';
                                }
                                ?>
                                <div class="col wow fadeInLeft" data-wow-delay="0.4s">
                                    <div class="img-holder">
                                        <a href="#">
                                            <div style="
                                                    background-image: url('{{$person->image}}');
                                                    background-size: cover;
                                                    background-repeat: no-repeat;
                                                    background-position: center;
                                                    width: 280px;
                                                    height: 290px;
                                                    "></div>
                                            <ul class="list-unstyled social-icon">
                                                <li><i onclick="location.href='{{$twitter}}';"
                                                       class="fa fa-twitter"></i></li>
                                                <li><i onclick="location.href='{{$faceBook}}';"
                                                       class="fa fa-facebook"></i></li>
                                                <li><i onclick="location.href='{{$instagram}}';"
                                                       class="fa fa-instagram"></i></li>
                                            </ul>
                                        </a>
                                    </div>
                                    <div class="mt-txt">
                                        <h4 style="white-space: pre-line;"><a href="#">{{$person->full_name}}</a></h4>
                                        <span style="white-space: pre-line;"
                                              class="sub-title">{{$person->address}} </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
<style>
    .href-style:hover {
        color: silver !important;
    }
</style>