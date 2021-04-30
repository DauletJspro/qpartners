<script>
    function rating(value) {
        console.log('rating', value);
    }
    function displayInfo(value) {

        let x = document.getElementById("infos");
        let y = document.getElementById("conditions");
        let z = document.getElementById("example");
        let infos_btn = document.getElementById("infos-btn");
        let conditions_btn = document.getElementById("conditions-btn");
        let example_btn = document.getElementById("example-btn");

        if(value === 'infos') {
            x.style.display = "block";
            y.style.display = "none";
            z.style.display = "none";
            infos_btn.style.color = 'black';
            infos_btn.style.borderBottom = '4px solid black';
            conditions_btn.style.color = '#646464';
            conditions_btn.style.borderBottom = 'none';
            example_btn.style.color = '#646464';
            example_btn.style.borderBottom = 'none';

        }
        else if(value === 'conditions') {
            x.style.display = "none";
            y.style.display = "block";
            conditions_btn.style.color = 'black';
            conditions_btn.style.borderBottom = '4px solid black';
            example_btn.style.color = '#646464';
            example_btn.style.borderBottom = 'none';
            infos_btn.style.color = '#646464';
            infos_btn.style.borderBottom = 'none';

        }
        else if(value === 'example') {
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "block";
            example_btn.style.color = 'black';
            example_btn.style.borderBottom = '4px solid black';
            conditions_btn.style.color = '#646464';
            conditions_btn.style.borderBottom = 'none';
            infos_btn.style.color = '#646464';
            infos_btn.style.borderBottom = 'none';
        }
    }
</script>
@extends('design_index.layout.layout')

@section('meta-tags')
    <title>Qpartners Shop</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@endsection
@section('content')
    <div class="container d-flex-row mb-7 ff">
        <div class="d-flex-column" style="width: 40%;">
            <div class="d-flex-row">
                <img src="/new_design/images/svg/like.svg" style="width: 20px; height: 23px" alt="img not found"/>
                <span style="margin: 0 1.5rem 0 0.5rem">{{$chosen_program["like"]}}</span>
                <img src="/new_design/images/svg/comment.svg" style="width: 20px; height: 23px" alt="img not found"/>
                <span style="margin: 0 1.5rem 0 0.5rem">{{$chosen_program["comment"]}}</span>
            </div>
            <img src="/new_design/images/banners/{{$chosen_program["imgSrc"]}}" class="mt-1" alt="img not found"/>
        </div>
        <div class="d-flex-column" style="width: 50%; margin-left: 10%">
            <!-- Breadcrumbs of the Page -->
            <nav class="breadcrumbs text-center fs-11">
                <ul class="list-unstyled d-flex-row font-weight-lighter text-uppercase">
                    <a href="/programs/the_initial" class="my-text font-weight-400">программы <i class="fa fa-angle-right ml-1"></i></a>
                    @if($chosen_program["category_id"] == 1 )
                        <a href="{{$chosen_program['category_id'] == 1 ? '/programs/the_initial' : '/programs/the_shares'}}" class="my-text font-weight-400 ml-1">C первонач. взносом <i class="fa fa-angle-right ml-1"></i> </a>
                    @endif

                    <a class="my-text font-weight-400 ml-1">{{$chosen_program['name']}}</a>
                </ul>
            </nav>
            <!-- Breadcrumbs of the Page end -->
            <span class="my-text fs-27 text-uppercase">{{$chosen_program['name']}}</span>
            <div class="d-flex-row">
                <div class="rate">
                    <input type="radio" id="star5" name="rate" onclick="rating(5)" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" onclick="rating(4)" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" onclick="rating(3)" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" onclick="rating(2)" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" onclick="rating(1)" value="1" />
                    <label for="star1" title="text">1 star</label>
                </div>
                <span style="margin: 15px 0 0 10px">Отзывы ({{$chosen_program['comment']}})</span>
            </div>
            <div class="d-flex-row mt-1">
                <a href="#" class="d-flex-row a-hover">
                    <img src="/new_design/images/svg/share.svg" style="width: 20px; height: 23px" alt="img not found"/>
                    <span style="margin: 0 2.5rem 0 0.5rem">Поделиться</span>
                </a>
                <a href="#" class="d-flex-row a-hover">
                    <img src="/new_design/images/svg/compare.svg" style="width: 20px; height: 23px" alt="img not found"/>
                    <span style="margin: 0 2.5rem 0 0.5rem">Сравнить</span>
                </a>
                <a href="#" class="d-flex-row a-hover">
                    <img src="/new_design/images/svg/like.svg" style="width: 20px; height: 23px" alt="img not found"/>
                    <span style="margin: 0 2.5rem 0 0.5rem">Добавить в избранное</span>
                </a>
            </div>
            <div style="margin-top:60px; font-weight: 300; width: 90%" class="text-black fs-18">{{$chosen_program['about_program']}}</div>
            <div style="margin-top: 100px; font-weight: 300; width: 90%" class="text-black fs-18">Вступительный взнос {{$chosen_program['entrance_fee']}}</div>
            <div style="margin-top: 37px; height: 30px" class="d-flex-row">
                <span class="text-silver" style="margin: auto 0">кол-во</span>
                <input class="program-quantity ml-3" type="number" value="1">
                <button class="button-hover bg-green border-radius-30 px-15 ml-1 py-05" onclick="" style="border: none;">
                    <a href="/programs/{{$chosen_program['id']}}" class="a-hover d-flex-row color-white">
                        купить
                    </a>
                </button>
                <button class="button-hover bg-red border-radius-30 px-15 ml-1 py-05" onclick="" style="border: none;">
                    <a href="/programs/{{$chosen_program['id']}}" class="a-hover d-flex-row color-white">
                        Подробнее
                        <img style="width: 10px; height: 10px; margin-top: 6px; margin-left: 5px"
                             src="/new_design/images/right-navigation.svg"
                             alt="right navigation img not found"
                        >
                    </a>
                </button>

            </div>
        </div>
    </div>
    <div class="text-center text-uppercase">
        <a class="infos-btn ml-2" id="infos-btn" onclick="displayInfo('infos')">Информация</a>
        <a class="conditions-btn ml-2" id="conditions-btn" onclick="displayInfo('conditions')">Условия</a>
        <a class="example-btn ml-2" id="example-btn" onclick="displayInfo('example')">Пример</a>
    </div>
    <div class="mb-7 fs-18 text-black" style="border-top: 3px solid #C4C4C4; font-weight: 300; padding-left: 5%">
        <div class="infos container mt-2" id="infos">
            <p>Вместе с нами Вы можете приобрести собственное жилье в рассрочку с самыми лучшими условиями.</p>
            <p> - Сумма рассрочки <span class="text-red font-weight-600">до 9 000 000 тенге</span></p>
            <p> - Срок рассрочки <span class="text-red font-weight-600">до 120 месяцев</span></p>
            <p> - Срок получения рассрочки <span class="text-red font-weight-600">от 1 до 6 месяцев</span></p>
            <p> - В программе могут участвовать лица <span class="text-red font-weight-600">старше 18 лет</span></p>
            <p> - Тип жилья в рассрочку: <span class="text-red font-weight-600">квартира или частный дом</span></p>
        </div>
        <div class="conditions container mt-2" id="conditions">
            <p>Для получения жилья в рассрочку Вам необходимо выполнить следующие условия кооператива.</p>
            <p> 1. Внести <span class="text-red font-weight-600">вступительный взнос</span> в размере <span class="text-red font-weight-600">240 000 тенге</span> и стать участником кооператива</p>
            <p> 2. Внести <span class="text-red font-weight-600">30%, 50% или 70%</span> от суммы на которую вы хотите приобрести жилье в виде <span class="text-red font-weight-600">первоначального взноса</span></p>
            <p> 3. После получения жилья в рассрочку <span class="text-red font-weight-600">ежемесячно</span> совершать <span class="text-red font-weight-600">погашение рассрочки</span> согласно Вашему графику</p>
        </div>
        <div class="example container mt-2" id="example">
            <p>Давайте рассмотрим пример для того чтобы все условия программы стали более понятными для Вас. Например, Вы хотите приобрести <span class="text-red font-weight-600">жилье на сумму 9 000 000 тенге</span>
                и готовый внести <span class="text-red font-weight-600">50% первоначального взноса.</span></p>
            <p>1. Вы вносите <span class="text-red font-weight-600">вступительный взнос</span> в размере <span class="text-red font-weight-600">240 000 тенге</span> и становитесь
                полноценным участником кооператива.</p>
            <p>2. Вносите <span class="text-red font-weight-600">4 500 000 тенге (50%)</span> в виде первоначального взноса.</p>
            <p>3. Кооператива добавляет <span class="text-red font-weight-600">недостающую сумму 4 500 000 тенге</span> на
                жилье в виде <span class="text-red font-weight-600">рассрочки.</span></p>
            <p>4. Вы получаете жилье в собственность с оформлением на Ваше имя.</p>
            <p>5. <span class="text-red font-weight-600">Погашаете</span> рассрочку по <span class="text-red font-weight-600">75 000 тенге ежемесячно</span> на протяжении <span class="text-red font-weight-600">60 месяцев.</span>
                (75 000 х 60 = 4 500 000)</p>
        </div>
        <div class="container" style="margin-top: 100px">
            <span class="my-text fs-18 text-uppercase ml-2">другие программы</span>
            <div class="d-flex-row flex-wrap pt-2">

                @foreach($programs as $program)
                    @if($program['id'] !== $chosen_program['id'])
                        <div class="d-flex-column mt-1" style="width: 18%; margin-right: 20px">
                            <img src="/new_design/images/banners/{{$program["imgSrc"]}}" alt="programs img not found"/>
                            <p class="text-black mt-1 fs-11">{{$program["body"]}}</p>
                            <button class="button-hover mr-auto bg-red border-radius-30" onclick="" style="border: none; padding: 0 1rem">
                                <a href="/programs/{{$program['id']}}" class="a-hover d-flex-row color-white">
                                    Подробнее
                                    <img style="width: 10px; height: 10px; margin-top: 6px; margin-left: 5px"
                                         src="/new_design/images/right-navigation.svg"
                                         alt="right navigation img not found"
                                    >
                                </a>
                            </button>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
@endsection

<style>
    @import url('https://css.gg/feed.css');
    @import url('https://css.gg/microsoft.css');


    .conditions, .example {
        display: none;
    }
    .conditions-btn, .example-btn {
        color: #646464
    }
    .infos-btn, .example-btn, .conditions-btn {
        cursor: pointer;
    }

    .infos-btn {
        color: black;
        border-bottom: 4px solid black;
    }
    .ff {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif
    }
    .a-hover:hover {
        color: black !important;

    }
    .program-quantity {
        border-radius: 20px;
        width: 60px;
        border: 1px solid black;
        text-align: center;
    }
    .rate {
        height: 46px;
    }
    .rate:not(:checked) > input {
        position:absolute;
        top:-9999px;
    }
    .rate:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
    }
    .rate:not(:checked) > label:before {
        content: '★ ';
    }
    .rate > input:checked ~ label {
        color: #ffc700;
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #deb217;
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
    }
    .w-31 {
        width: 31%;
    }
    .w-75 {
        width: 75%;
    }
    .color-white {
        color: white;
    }
    .border-radius-50 {
        border-radius: 50%;
        border:1px solid silver;
        padding-top: 16px;
        padding-left: 18px;
        padding-right: 18px;
    }
    .border-radius-60 {
        border-radius: 50%;
        border:1px solid silver;
        padding: 8px;
    }
    .text-red {
        color: red;
    }
    .border-radius-30 {
        border-radius: 30px;
    }
    .border-silver {
        border:1px solid silver;
    }
    .flex-wrap {
        flex-wrap: wrap;
    }
    .pt-2 {
        padding-top: 20px;
    }
    .pt-13 {
        padding-top: 13px
    }
    .pt-5 {
        padding-top: 5px;
    }
    .ml-1 {
        margin-left: 10px;
    }
    .ml-2 {
        margin-left: 20px;
    }
    .ml-3 {
        margin-left: 30px;
    }
    .px-15 {
        padding-left: 15px;
        padding-right: 15px;
    }
    .py-05 {
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .bg-white {
        background: white;
    }
    .bg-red {
        background: red;
    }
    .bg-silver {
        background: #d7d7d7;
    }
    .bg-green {
        background: #00A65A;
    }
    .ml-auto {
        margin-left: auto;
    }
    .mr-auto {
        margin-right: auto;
    }
    a:hover {
        color: #8e8e8e !important;
    }
    .mb-7 {
        margin-bottom: 70px;
    }
    .mt-2 {
        margin-top: 20px;
    }
    .fs-18 {
        font-size: 18px;
    }
    .fs-11 {
        font-size: 11px;
    }
    .mt-1 {
        margin-top: 10px;
    }
    .mt-5 {
        margin-top: 50px;
    }
    .pl-2 {
        padding-left: 20px;
    }
    .pl-1 {
        padding-left: 10px;
    }
    .font-weight-lighter {
        font-weight: lighter
    }
    .font-weight-400 {
        font-weight: 400 !important;
    }
    .font-weight-600 {
        font-weight: 600 !important;
    }
    .programs-image {
        background-image:url('/new_design/images/programs.png');
        height: 172px;
        font-size: 4rem;
        color: white;
        text-align: center;
        background-size: 100%;
        padding-top: 60px;
        font-weight: 600;
        letter-spacing: 4px;
    }
    .programs-image-text {
        text-shadow: 1px 1px 1px black;
    }
    .my-text {
        color: black !important;
        font-weight: 600;
        letter-spacing: 2px;
    }

    .text-silver {
        color: #797979 !important;
        letter-spacing: 2px;
    }
    .text-black {
        color: black !important;
        font-weight: 500;
    }
    .fs-27 {
        font-size: 27px;
    }
    .d-flex-column {
        display: flex;
        flex-direction: column;
    }
    .d-flex-row {
        display: flex;
    }

</style>