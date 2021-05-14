<script>

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
            z.style.display = 'none';
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.rating').click(function (){

                var rating = $(this).data('rating');
                var gcid = $(this).attr('gcid');
                var uid = $(this).attr('uid');

                $.ajax({
                    url: "{{ route('rating') }}",
                    type:"POST",
                    cache:false,
                    data: {
                        'rating' : rating,
                        'gap_card_id' : gcid,
                        'user_id':uid,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: (data) => {
                        console.log('Success', data);
                    },
                });
            });
        });
    </script>
@endsection
@section('content')
    @include('design_index.gap.includes.modal')
    <div class="container d-flex-row mb-7 ff flex-wrap">
        <div class="program-detail-img d-flex-column">
            <div class="d-flex-row">
                <img src="/new_design/images/svg/like.svg" style="width: 20px; height: 23px" alt="img not found"/>
                <span style="margin: 0 1.5rem 0 0.5rem">{{$chosen_program["like"]}}</span>
                <img src="/new_design/images/svg/comment.svg" style="width: 20px; height: 23px" alt="img not found"/>
                <span style="margin: 0 1.5rem 0 0.5rem">{{$chosen_program["comment"]}}</span>
            </div>
            <img src="/admin/image/gap_item/{{$gap_card->image}}" class="mt-1" alt="img not found"/>
        </div>
        <div class="program-detail-about d-flex-column mt-2" >
            <!-- Breadcrumbs of the Page -->
            <nav class="breadcrumbs text-center fs-11">
                <ul class="list-unstyled d-flex-row font-weight-lighter text-uppercase">
                    <a href="/programs/the_initial" class="my-text font-weight-400">CARD <i class="fa fa-angle-right ml-1"></i></a>
                    @if($chosen_program["category_id"] == 1 )
                        <a href="{{$chosen_program['category_id'] == 1 ? '/programs/the_initial' : '/programs/the_shares'}}" class="my-text font-weight-400 ml-1">C первонач. взносом <i class="fa fa-angle-right ml-1"></i> </a>
                    @endif

                    <a class="my-text font-weight-400 ml-1">{{$gap_card->title_ru}}</a>
                </ul>
            </nav>
            <!-- Breadcrumbs of the Page end -->
            <span class="my-text fs-27 text-uppercase">{{$gap_card->title_ru}}</span>
            @if(\Illuminate\Support\Facades\Auth::check())
                <div class="d-flex-row">
                    <div class="rate">
                        @for($i = 5; $i > 0; $i--)
                            @if($rating->rating == $i)
                                <input type="radio" id="star{{$i}}" name="rate" class="rating"  checked disabled data-rating="{{$i}}" value="{{$i}}"  gcid="{{$gap_card->id}}" />
                                <label for="star{{$i}}" title="text">{{$i}} stars</label>
                            @else
                                @if(isset($rating->rating))
                                    <input type="radio" id="star{{$i}}" name="rate" class="rating"  disabled  data-rating="{{$i}}" value="{{$i}}"  gcid="{{$gap_card->id}}" />
                                    <label for="star{{$i}}" title="text">{{$i}} stars</label>
                                @else
                                    <input type="radio" id="star{{$i}}" name="rate" class="rating" uid="{{\Illuminate\Support\Facades\Auth::user()->user_id}}" data-rating="{{$i}}" value="{{$i}}"  gcid="{{$gap_card->id}}" />
                                    <label for="star{{$i}}" title="text">{{$i}} stars</label>
                                @endif
                            @endif
                        @endfor
                    </div>
                    <span style="margin: 15px 0 0 10px">Отзывы (4)</span>
                </div>
            @else
                <p>Вы должны пройти регистрация чтобы поставить оценку.</p>
                <div class="d-flex-row">
                    <div class="rate">
                        @for($i = 5; $i > 0; $i--)
                            <input type="radio" id="star{{$i}}" name="rate" class="rating" disabled  data-rating="{{$i}}" value="{{$i}}"  gcid="{{$gap_card->id}}" />
                            <label for="star{{$i}}" title="text">{{$i}} stars</label>
                        @endfor
                    </div>
                    <span style="margin: 15px 0 0 10px">Отзывы (4)</span>
                </div>
            @endif
            <div class="d-flex-row mt-1 flex-wrap">
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
            <div style="margin-top:60px; font-weight: 300; width: 90%" class="text-black fs-18">{{ $gap_card->description_ru }}</div>
            <div style="margin-top: 100px; font-weight: 300; width: 90%" class="text-black fs-18">Цена: {{$gap_card->price}} тг</div>
            <div style="margin-top: 37px; height: 30px" class="d-flex-row flex-wrap">
                <span class="text-silver" style="margin: auto 0">кол-во</span>
                <input class="program-quantity ml-3" type="number" value="1">
                <a href="#" data-toggle="modal"
                   @if(!isset($rating->rating) && \Illuminate\Support\Facades\Auth::check())
                        data-target="#ratingModal"
                   @endif
                   class="bg-green border-radius-30 px-15 ml-1 py-05 a-hover color-white">
                    Добавить в корзину
                </a>
{{--                <a href="/programs/{{$chosen_program['id']}}" class="more-btn bg-red border-radius-30 px-15 ml-1 py-05 a-hover d-flex-row color-white">--}}
{{--                    Подробнее--}}
{{--                    <img style="width: 10px; height: 10px; margin-top: 6px; margin-left: 5px"--}}
{{--                         src="/new_design/images/right-navigation.svg"--}}
{{--                         alt="right navigation img not found"--}}
{{--                    >--}}
{{--                </a>--}}

            </div>
        </div>
    </div>
    @include('design_index.gap.includes.blocks')
@endsection

<style>
    @import url('https://css.gg/feed.css');
    @import url('https://css.gg/microsoft.css');
    .program-detail-block-width{
        width: 18%;
        margin-right: 20px;
    }
    .program-detail-img {
        width: 40%;
    }
    .program-detail-about {
        width: 50%;
        margin-left: 10%
    }
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
        color: yellow !important;

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