@extends('design_index.layout.layout')
@section('meta-tags')

    <title>Qpartners Shop</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>

@endsection

@section('content')
    <main id="mt-main" class="mb-100">
            <div class="border-bottom pb-2">
                <div class="container black-text-color text-center font-weight-bold">
                    <h1 class="font-weight-bold" style="text-transform:uppercase">преимущества</h1>
                </div>
                <!-- Breadcrumbs of the Page -->
                <nav class="breadcrumbs black-text-color text-center">
                    <ul class="list-unstyled d-flex font-weight-lighter black-text-color">
                        <a href="/">Главная <i class="fa fa-angle-right"></i></a>
                        Преимущества
                    </ul>
                </nav>
                <!-- Breadcrumbs of the Page end -->
            </div>
            <div class="container pt-2 fs-18">
                <div class="black-text-color font-weight-bold">
                    <h3 class="font-weight-bold" style="text-transform:uppercase">возможности от пк «GAP»</h3>
                </div>
                <p class="black-text-color font-weight-lighter pt-2">Потребительский кооператив «GAP» предлагает Вам приобрести жилье или автомобиль на самых лучших условиях.</p>
                <div class="d-grid">
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
    .d-grid {
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

</style>
