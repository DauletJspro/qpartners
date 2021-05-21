<?php

use App\Admin\SocialNetwork;use Illuminate\Support\Arr;use Illuminate\Support\Facades\DB;
/** @var \App\Models\Users $person */
?>
@extends('design_index.layout.layout')
@section('meta-tags')

    <title>Qpartners Shop</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>
    <link href='https://css.gg/chevron-left.css' rel='stylesheet'>
    <link href='https://css.gg/chevron-right.css' rel='stylesheet'>

@endsection
<?php
use App\Models\Slider;

$gallery = Slider::where('is_show', 1)
    ->orderBy('slider_id')
    ->paginate(6);
?>
<script>
    function move(nav, path) {
        path += 10;
        if(nav === 'left') document.getElementById('slider-administration').scrollBy({left: -path, behavior: 'smooth'});
        if(nav === 'right') document.getElementById('slider-administration').scrollBy({left: path, behavior: 'smooth'});

    }
</script>

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
            <p style="color: white; font-weight: 600; font-size: 40px; text-align: center; text-transform: uppercase;text-shadow: 1px 1px 1px black;">Представители</p>

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
                        <a style="font-weight: 400; color: black;">представители</a>

                    </ul>
                </nav>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="rep-txt">
                            <h2 >РЕГИОНАЛЬНЫЕ ПРЕДСТАВИТЕЛИ</h2>
                            <p>Потребительский кооператив GAP предоставляет жилье, автомобиль и потребительскую продукцию в рассрочку по всему Казахстану.</p>
                            <p>На сегодняшний день на территории Казахстана фунционируют более 15 представительских офисов ПК GAP.</p>
                            <p>Здесь Вы можете ознакомиться с лицами которые представляют потребительский кооператив GAP по всему Казахстану.</p>
                        </div>
                        <div style="position: relative">
                            <div id="slider-administration" style="display: flex; width: 100%; overflow:hidden;">
                                @foreach($gallery as $item1)
                                    <div style="width: 400px; margin-right: 10px; display: flex; flex-direction: column; text-align: center; font-size: 2rem">
                                        <a href="{{route('gallery-detail.show', ['id' => $item1->slider_id])}}">
                                            <img src="{{$item1->slider_image}}" style="width: 300px; height: 200px"/>
                                        </a>
                                        <span style="font-weight: 400; color: black">Мухитдинов Шамшитдин</span>
                                        <span style="text-transform: uppercase">Diamond Manager</span>
                                    </div>
                                @endforeach
                            </div>
                            <div id="left-arrow-administration" style="position: absolute; left: -60px; top: 80px; cursor:pointer" onclick="move('left', 300)"><i class="gg-chevron-left" style="width:30px; height:40px"></i></div>
                            <div id="right-arrow-administration" style="position: absolute; right: -60px; top: 80px; cursor:pointer" onclick="move('right', 300)"><i class="gg-chevron-right" style="width:30px; height:40px"></i></div>
                        </div>

                        <div style="margin-top: 50px">
                            <h2>НАША ГАЛЕРЕЯ</h2>
                            <div class="roww">
                                <div class="roww__inner">
                                    @foreach($gallery as $item2)

                                        <div class="tile">
                                            <a href="{{route('gallery-detail.show', ['id' => $item2->slider_id])}}">

                                                <div class="tile__media">
                                                    <img class="tile__img" src="{{$item2->slider_image}}" alt=""  />
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
                        {{--                        <div class="mt-follow-holder">--}}
                        {{--                            <span class="title">Follow Us</span>--}}
                        {{--                            <!-- Social Network of the Page -->--}}
                        {{--                            <ul class="list-unstyled social-network">--}}
                        {{--                                <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>--}}
                        {{--                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
                        {{--                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>--}}
                        {{--                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>--}}
                        {{--                            </ul>--}}
                        {{--                            <!-- Social Network of the Page end -->--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </section>
        <!-- Mt About Section of the Page -->
        <!-- Mt Team Section of the Page -->
        <section class="mt-team-sec">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        {{--                        <h3>Администрация</h3>--}}
                        <div class="holder">
                            @foreach($administration_persons as $person)
                                <?php
                                $socialNetworks = DB::table('ref_social_network_items')
                                    ->where(['item_id' => $person->id])
                                    ->where(['type_id' => \App\Admin\SocialNetwork::ADMINISTRATION_PERSON])
                                    ->get();


                                if ($socialNetworks) {
                                    $socialNetworks = collect($socialNetworks)->all();
                                    $socialNetworks = Arr::pluck($socialNetworks, 'url', 'social_network_id');
                                    $faceBook = isset($socialNetworks[SocialNetwork::FACEBOOK]) ? $socialNetworks[SocialNetwork::FACEBOOK] : '';
                                    $whatsapp = isset($socialNetworks[SocialNetwork::WHATSAPP]) ? $socialNetworks[SocialNetwork::WHATSAPP] : '';
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
                                                    ">

                                            </div>
                                            <ul class="list-unstyled social-icon">
                                                <li><i onclick="location.href='{{$whatsapp}}';" class="fa fa-whatsapp"></i></li>
                                                <li><i onclick="location.href='{{$faceBook}}';" class="fa fa-facebook"></i></li>
                                                <li><i onclick="location.href='{{$instagram}}';" class="fa fa-instagram"></i></li>
                                            </ul>
                                        </a>
                                    </div>
                                    <div class="mt-txt">
                                        <h4><a href="#">{{$person->full_name}}</a></h4>
                                        <span class="sub-title" style="white-space: pre-line;">
                                            {{$person->responsibility}}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Mt About Section of the Page -->
        <!-- Mt Workspace Section of the Page -->
    </main>
@endsection
<style>
    .rep-txt {
        color: black;
        font-size: 1.8rem;
        margin-bottom: 40px
    }
    .rep-txt p {
        font-weight: lighter;
        margin-top: 20px;
    }
    #right-arrow-administration:hover, #left-arrow-administration:hover {
        color: silver;
    }
    .gg-chevron-left::after {
        width: 20px !important;
        height: 20px !important;
        border-bottom: 4px solid !important;
        border-left: 4px solid !important;
    }
    .gg-chevron-right::after {
        width: 20px !important;
        height: 20px !important;
        border-bottom: 4px solid !important;
        border-right: 4px solid !important;
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