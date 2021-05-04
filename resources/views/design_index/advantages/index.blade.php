@extends('design_index.layout.layout')
@section('meta-tags')

    <title>Qpartners Shop</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>

@endsection
<?php $myarray= collect([
    [
        'imgSrc'=> "pair-of-bills1.png",
        'body'=> "Рассрочка без процентов"
    ],
    [
        'imgSrc'=> "give-money1.png",
        'body'=> "Отсутствие переплат и комиссии"
    ],
    [
        'imgSrc'=> "dollar-symbol1.png",
        'body'=> "Без подтверждения дохода"
    ],
    [
        'imgSrc'=> "sand-clock1.png",
        'body'=> "Без срока ожидания"
    ],
    [
        'imgSrc'=> "payment-method1.png",
        'body'=> "Вступительный взнос от 60 000 тенге"
    ],
    [
        'imgSrc'=> "coin1.png",
        'body'=> "Возможность выбора первоначальный или накопительно-паевый взнос"
    ],
    [
        'imgSrc'=> "piggy-bank1.png",
        'body'=> "Накопительно-паевый взнос от 10 000 тенге в месяц"
    ],
    [
        'imgSrc'=> "discount1.png",
        'body'=> "Первоначальный взнос от 30%"
    ],
    [
        'imgSrc'=> "monthly-calendar1.png",
        'body'=> "Срок получения рассрочки от 1 месяца"
    ],
    [
        'imgSrc'=> "tag1.png",
        'body'=> "Бонус для участников=> комплекс натуральной продукции в подарок"
    ],
    [
        'imgSrc'=> "badge1.png",
        'body'=> "Срок рассрочки до 120 месяцев"
    ],
    [
        'imgSrc'=> "shopping-online1.png",
        'body'=> "Возможность оплаты онлайн, через приложения и терминалы"
    ],
    [
        'imgSrc'=> "secure1.png",
        'body'=> "Сохранность ваших взносов"
    ],
    [
        'imgSrc'=> "contract1.png",
        'body'=> "Гарантия возврата накопительно-паевых или первоначального взноса в полном объеме при расторжении договора"
    ],
    [
        'imgSrc' => "mallet1.png",
        'body'=> "Открытость и прозрачная деятельность кооператива в рамках закона"
    ],
    ]
)
?>

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

</style>
