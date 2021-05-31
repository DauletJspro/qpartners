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
            background: red;
            letter-spacing: 4px">
            <p style="color: white;font-weight: 600; font-size: 40px; text-align: center; text-transform: uppercase;text-shadow: 1px 1px 1px black;">список представителей</p>

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
        <section class="mt-about-sec" style="padding: 20px 0 0 0">
            <div class="container">
                <nav class="breadcrumbs" style="font-size: 1.5rem;font-family: Montserrat; height: 40px">
                    <ul class="list-unstyled d-flex-row font-weight-lighter text-uppercase">
                        <a href="/" style="font-weight: 600; color: black" class="href-style">главная <i class="fa fa-angle-right ml-1"></i></a>
                        <a style="font-weight: 400; color: black;">представители</a>

                    </ul>
                </nav>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="txt wow fadeInUp" data-wow-delay="0.4s" >
                            <h2 style="color: black">СПИСОК ПРЕДСТАВИТЕЛЕЙ С КОНТАКТАМИ</h2>
                            <p style="color: black !important;">
                                Здесь Вы можете ознакомиться с представителями потребительского кооператива «GAP».
                                <br>
                                Представители кооператива работают в крупных городах, областных и районных центрах.
                                <br>
                                Если у вас есть вопросы, то Вы можете обратиться к представителю в вашем регионе.
                                <br>
                                Контактные данные представителя Вашего региона Вы можете найти в этом списке.
                                <br>
                                <br>
                                Если Вы в списке не нашли представителя своего региона, то Вы можете стать первым представителем кооператива в своем регионе.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Mt About Section of the Page -->
        <div class="container faq-section mt-about-sec">
            <div class="row txt">
                <div class="col-xs-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <?php $counter = 0; ?>
                        @foreach($cities as $city)
                            <?php $counter++; ?>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading{{$city->city_id}}">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion"
                                           href="#collapse{{$city->city_id}}" aria-expanded="false"
                                           aria-controls="collapse{{$city->city_id}}">
                                            {{ sprintf('%s &emsp; %s', $counter,$city->city_name_ru)}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse{{$city->city_id}}" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="heading{{$city->city_id}}">
                                    <div class="panel-body">
                                        <?php
                                        $subCounter = 0;
                                        $representatives = \App\Models\Representative::where(['city_id' => $city->city_id])->get();
                                        ?>
                                        @foreach($representatives as $representative)
                                            <?php $subCounter++; ?>
                                            <div class="container" style="margin-top: 1rem;">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <strong class="representative">{{$subCounter .'&emsp;'.  $representative->full_name}}</strong>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <strong>
                                                            {{$representative->address ?$representative->address : 'Не указано' }}
                                                        </strong>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <ul style="list-style: none;">
                                                            <li>
                                                                <strong class="representative">
                                                                    <i class="fa fa-phone"></i>
                                                                    &emsp; {{$representative->phone_number}}
                                                                </strong>
                                                            </li>
                                                            <li>
                                                                <strong class="representative">
                                                                    <i class="fa fa-whatsapp"></i>
                                                                    &emsp;{{$representative->whatsapp}}
                                                                </strong>
                                                            </li>
                                                            <li>
                                                                <strong class="representative">
                                                                    <i class="fa fa-instagram"></i>
                                                                    &emsp;{{$representative->instagram}}
                                                                </strong>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
<style>

    .href-style:hover {
        color: silver !important;
    }
</style>