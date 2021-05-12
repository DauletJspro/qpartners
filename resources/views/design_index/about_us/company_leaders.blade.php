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
        <section class="mt-contact-banner wow fadeInUp" data-wow-delay="0.4s"
                 style=" background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
             background: red">
            <p style="color: white; font-weight: 600; font-size: 40px; text-align: center; text-transform: uppercase;text-shadow: 1px 1px 1px black;">Председатель Кооператива</p>

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
            <!-- Breadcrumbs of the Page -->
            <nav class="breadcrumbs black-text-color text-center" >
                <ul class="list-unstyled d-flex-row font-weight-lighter" style="font-size: 1.5rem">
                    <a href="/" class="" style="color: black; font-weight: 400">главная <i class="fa fa-angle-right ml-1" style="margin-left: 5px"></i></a>
                    <span class="" style="font-weight: 400">председатель компании</span>
                </ul>
            </nav>

            <!-- Breadcrumbs of the Page end -->
            <div class="container"  style="color: black; font-size: 18px;">
                <p>В современном мире жилье и автомобиль являются важной составляющей нашей повседневной жизни.</p>

                <p>В списке потребностей жилье и автомобиль стоят на 3 и 4 месте, после еды и одежды. Однако не каждый может позволить себе купить собственный дом или автомобиль. Кто-то арендует жилье у собственников, другие годами выплачивают ипотеку или кредит.</p>

                <p>Исходя из вышесказанных потребностей наших граждан был создан потребительский кооператив «GAP», который предоставляет жилье, автомобиль и потребительские товары в рассрочку сроком до 120 месяцев.</p>

                <p>Аббревиатура «GAP» означает «Global Asar Project». Каждое слово имеет свое значение.</p>

                <p>На основе кооператива «GAP» лежит слово Asar (Асар). Как мы все знаем, Асар – это древний обычай казахского народа. Согласно обычаю, люди, собравшись вместе, искренне и безвозмездно помогают выполнить непосильные для одного человека или для одной семьи работу.</p>
                <p>Cлово Global (Глобал) обозначает масштабность кооператива и его цели на будущее.</p>

                <p>Цель кооператива, обеспечить собственным жильем, автомобилем или потребительским товаром более 100 000 человек.</p>

                <p>Для достижения данной цели мы усердно работаем и стараемся делать удобные и полезные для всех программы по предоставлению рассрочки.</p>

                <p>Вместе построим яркое будущее!</p>

                <div style="font-weight: bold">Рсымбетова Ж.Е.</div>
                <i>Председатель Потребительского Кооператива «GAP»</i>

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