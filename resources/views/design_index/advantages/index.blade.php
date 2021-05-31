@extends('design_index.layout.layout')
@section('meta-tags')

    <title>Qpartners Shop</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>

@endsection

@section('content')
    <main id="mt-main" class="mb-100">
            <div class="">
                <section class="mt-contact-banner wow fadeInUp" data-wow-delay="0.4s"  style=" background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-image: url('/new_design/images/banners/montazhnaya5.png');">
                    <p style="color: white;font-weight: 600; font-size: 40px; text-align: center; text-transform: uppercase;text-shadow: 1px 1px 1px black; ">преимущества</p>

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
                <!-- Breadcrumbs of the Page -->
                <nav class="breadcrumbs container" style="font-size: 1.5rem;font-family: Montserrat; height: 40px; margin-top: 20px">
                    <ul class="list-unstyled d-flex-row font-weight-lighter text-uppercase">
                        <a href="/" style="font-weight: 600; color: black" class="href-style">главная <i class="fa fa-angle-right ml-1"></i></a>
                        <a style="font-weight: 400; color: black;">преимущества</a>

                    </ul>
                </nav>
                <!-- Breadcrumbs of the Page end -->
            </div>
            <div class="container fs-18">
                <div class="black-text-color font-weight-bold">
                    <h3 class="font-weight-bold" style="text-transform:uppercase; font-family: Montserrat;">возможности от пк «GAP»</h3>
                </div>
                <p class="black-text-color font-weight-lighter pt-2">Потребительский кооператив «GAP» предлагает Вам приобрести жилье или автомобиль на самых лучших условиях.</p>
                <div class="advantages-block">
                    @foreach ($myarray as $m)

                    <div class="centralize-elements">
                        <div class="img-width margin-img"><img class="color-red w-100" src="/new_design/images/banners/{{$m["imgSrc"]}}" alt="img not found"/></div>
                        <div class="black-text-color font-weight-lighter p-3">{{$m["body"]}}</div>
                    </div>
                    @endforeach

                </div>
            </div>
    </main>

@endsection


<style>
    .fs-18 {
        font-size: 18px
    }
    .p-3 {
        padding: 3rem;
    }
    .black-text-color {
        color: black;
    }
    .silvered-text-color {
        color: #4d4d4d;
    }
    .font-weight-lighter {
        font-weight: lighter
    }
    .centralize-elements {
        text-align: center;
    }
    .margin-img {
        margin-left: 43%;
        margin-top: 50px;
        margin-bottom: 20px;
    }
    .advantages-block {
        display: grid;
        grid-template-columns: repeat(3, 1fr);

    }
    .font-weight-bold {
        font-weight: 600;
    }
    .border-bottom {
        border-bottom: 1px solid #f1f1f1;
    }
    .pt-2 {
        padding-top: 2rem;
    }
    .pb-2 {
        padding-bottom: 2rem;
    }
    .w-100 {
        width: 100%;
    }
    .color-red {
//       background: linear-gradient(green, lime);
    }

    .img-width {
        width: 60px;
    }
    .mb-100 {
        margin-bottom: 100px;
    }

    .href-style:hover {
        color: silver !important;
    }


</style>
