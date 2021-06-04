@php($categories = \App\Models\GapCardCategory::all())
<?php
$sub_category_id = request()->input('sub_category_id');
if (isset($sub_category_id)) {
    $gapItems = \App\Models\GapCardItem::where(['gap_card_sub_category_id' => $sub_category_id])->get();
} else {
    $gapItems = \App\Models\GapCardItem::all();
}
?>
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
            $('.card_sorting_btn').click(function (){
                var orderBy = $(this).data('order');
                $.ajax({
                    url: "{{route('filter.cards')}}",
                    type:"GET",
                    data:{
                        orderBy: orderBy
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $(".mt-productlisthold").html(data);
                    },
                });
            });
        });

    </script>
@endsection
<script>
    function showSubcategories(index) {
        console.log('subid', index)
        let length = document.getElementsByClassName('subcategories-body').length;
        for(let i = 0; i < length; i++) {
            document.getElementById(`collapse_${i}`).classList.remove('show');
            document.getElementById(`collapse_${i}`).classList.remove('in');
            document.getElementById(`category_${i}`).style.color = '#494949';

        }
        document.getElementById(`category_${index}`).style.color = 'red';

    }
</script>
@section('content')
    <main id="mt-main" style="margin-top: -50px !important;">
{{--        <div class="row" style="margin-right: 0 !important; margin-left: 0 !important;">--}}
{{--            <div class="mt-bestseller text-center wow fadeInUp" data-wow-delay="0.4s">--}}
{{--                <div class="row" style="height: 260px;">--}}
{{--                    <div class="col-xs-12">--}}
{{--                        <div class="bestseller-slider">--}}
{{--                            <div class="slide">--}}
{{--                                <div style="--}}
{{--                                        width: 84%;--}}
{{--                                        height: 100%;--}}
{{--                                        margin-left: 8%;--}}
{{--                                        background-image: url('{{asset('/new_design/images/products/running_shoes_banner.jpg')}}');--}}
{{--                                        background-size: contain;--}}
{{--                                        background-position: center;--}}
{{--                                        background-repeat: no-repeat;--}}
{{--                                        ">--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="slide">--}}
{{--                                <div style="--}}
{{--                                        width: 84%;--}}
{{--                                        height: 100%;--}}
{{--                                        margin-left: 8%;--}}
{{--                                        background-image: url('{{asset('/new_design/images/products/fashion_sale_banner.jpg')}}');--}}
{{--                                        background-size: contain;--}}
{{--                                        background-position: center;--}}
{{--                                        background-repeat: no-repeat;--}}
{{--                                        ">--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="slide">--}}
{{--                                <div style="--}}
{{--                                        width: 84%;--}}
{{--                                        height: 100%;--}}
{{--                                        margin-left: 8%;--}}
{{--                                        background-image: url('{{asset('/new_design/images/products/pizza_banner.jpg')}}');--}}
{{--                                        background-size: contain;--}}
{{--                                        background-position: center;--}}
{{--                                        background-repeat: no-repeat;--}}
{{--                                        ">--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div id="vip-container" class="container" style="flex-wrap:wrap; height: 275px; display: flex; min-height: 280px; margin-top: 50px; font-family: Montserrat; color: black">
            <div class="block" style="width: 49.5%; border: 1px solid #C4C4C4; display: flex; height: 100%; flex-wrap: wrap">
                <div id="first-block-info" style="width: 52%; display: flex; flex-direction: column; height: 100%; padding: 25px 20px; font-weight: 600; background: #F6F6F6;">
                    <p style="text-transform: uppercase;">наименование компании</p>
                    <p style="font-weight: 400">краткая информация, краткая информация,краткая информация</p>
                    <p style="margin-top: 20px">Скидка %</p>
                    <p style="margin-top: 12px">Cashback %</p>
                    <div style="display: flex">
                        <button style="display: flex;margin-left:auto; background: red; color: white; border-radius: 30px; border: none; padding: 5px 20px">
                            <span style="font-weight: lighter">Подробнее</span>
                            <img style="width: 10px; height: 10px; margin-top: 6px; margin-left: 5px" src="/new_design/images/right-navigation.svg" alt="right navigation img not found">
                        </button>
                    </div>
                </div>
                <div id="first-block-img" style="width: 48%;height: 100%; display: flex; position: relative;">
                    <img class="" src="/new_design/images/banners/company-photo1.jpeg" style="height: 100%" alt="img not found">
                    <div style=" position: absolute; right: 0px; bottom: 10%">
                        <span style="background-color: #FFE200; padding: 5px 25px 5px 15px; margin-bottom: 15px; font-weight: 600; letter-spacing: 2px">VIP</span>
                    </div>
                </div>
            </div>
            <div class="block" style="width: 49.5%; margin-left: 1%; border: 1px solid #C4C4C4; display: flex; height: 100%; flex-wrap: wrap">
                <div id="second-block-info" style="width: 52%; display: flex; flex-direction: column; height: 100%; padding: 25px 20px; font-weight: 600; background: #F6F6F6">
                    <p style="text-transform: uppercase;">наименование компании</p>
                    <p style="font-weight: 400">краткая информация, краткая информация,краткая информация</p>
                    <p style="margin-top: 20px">Скидка %</p>
                    <p style="margin-top: 12px">Cashback %</p>
                    <div style="display: flex">
                        <button style="display: flex;margin-left:auto; background: red; color: white; border-radius: 30px; border: none; padding: 5px 20px">
                            <span style="font-weight: lighter">Подробнее</span>
                            <img style="width: 10px; height: 10px; margin-top: 6px; margin-left: 5px" src="/new_design/images/right-navigation.svg" alt="right navigation img not found">
                        </button>
                    </div>
                </div>
                <div id="second-block-img" style="width: 48%;display: flex; position: relative;">
                    <img class="" src="/new_design/images/banners/company-photo2.jpeg" alt="img not found">
                    <div style=" position: absolute; right: 0px; bottom: 10%">
                        <span style="background-color: #FFE200; padding: 5px 25px 5px 15px; margin-bottom: 15px; font-weight: 600; letter-spacing: 2px">VIP</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="">
            <div class="row">
                <aside id="sidebar" class="col-xs-12 col-sm-4 col-md-3 wow fadeInLeft" data-wow-delay="0.4s">
                    <section class="shop-widget">
                        <h2>Категорий</h2>

                        <ul class="list-unstyled category-list">
                            @foreach($categories as $index => $category)
                                <li>
                                    <a id="category_{{$index}}" style="color: #494949" role="button" onclick="showSubcategories({{$index}})" data-toggle="collapse" href="#collapse_{{$index}}"
                                       aria-expanded="false"
                                       aria-controls="collapseExample">
                                        <span class="name">{{$category->title_ru}}</span>
                                        <span class="num">{{isset($category->sub_categories) ? count($category->sub_categories) : 0}}</span>
                                    </a>
                                    <ul style="font-size:90%; font-weight:bolder;margin-top: 1rem;margin-left: 10px;"
                                        class="subcategories-body collapse col-sm-10 list-unstyled category-list"
                                        id="collapse_{{$index}}">
                                        @foreach($category->sub_categories as $sub_category)
                                            <li>
                                                <a href="" style="color:black;">
                                                    <span><a href="/gap/card/show/?sub_category_id={{$sub_category->id}}">{{$sub_category->title_ru}}</a></span>
                                                    <span class="num">{{isset($sub_category->items) ? count($sub_category->items) : 0}}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                        <div style="margin-top: 5rem;">
                            <h2>Компания</h2>
                            <div class="right_slide_items" style="margin-top: 3rem;">
                                <h2 class="right_slide_item">О нас</h2>
                                <h2 class="right_slide_item">Контакты</h2>
                            </div>
                        </div>


                        <div style="margin-top: 6rem;">
                            <h2>Поддержка</h2>
                            <div class="right_slide_items" style="margin-top: 3rem;">
                                <h2 class="right_slide_item">Часто задаваемые вопросы</h2>
                                <h2 class="right_slide_item">Написать нам</h2>
                                <h2 class="right_slide_item">Правила сервиса</h2>
                                <h2 class="right_slide_item">Купить карту</h2>
                            </div>
                        </div>

                        <div style="margin-top: 6rem;">
                            <h2>Предпринимателям</h2>
                            <div class="right_slide_items" style="margin-top: 3rem;">
                                <h2 class="right_slide_item">Для вашего бизнеса</h2>
                                <h2 class="right_slide_item">Сотрудничество</h2>
                            </div>
                        </div>
                    </section>
                </aside>
                <div class="col-xs-12 col-sm-8 col-md-9 wow fadeInRight" data-wow-delay="0.4s">
                    <header class="mt-shoplist-header">
                        <div class="btn-box">
                            <ul class="list-inline">
                                <li>
                                    <a href="#" class="drop-link">
                                        Сортировать <i aria-hidden="true" class="fa fa-angle-down"></i>
                                    </a>
                                    <div class="drop">
                                        <ul class="list-unstyled">
                                            <li><a href="#" class="card_sorting_btn" id="sort-price"
                                                   data-order="price-low-high">По цене возрастанию</a></li>
                                            <li><a href="#" class="card_sorting_btn" id="sort-price"
                                                   data-order="price-high-low">По цене убыванию</a></li>
                                            <li><a href="#" class="card_sorting_btn" data-order="popular">По популярности</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a class="mt-viewswitcher" href="#"><i class="fa fa-th-large"
                                                                           aria-hidden="true"></i></a></li>
                                <li><a class="mt-viewswitcher" href="#"><i class="fa fa-th-list"
                                                                           aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div><!-- btn-box end here -->
                        <!-- mt-textbox start here -->
                        <div class="mt-textbox">
                            <p>Showing <strong>1–9</strong> of <strong>65</strong> results</p>
                            <p>View <a href="#">9</a> / <a href="#">18</a> / <a href="#">27</a> / <a
                                        href="#">All</a>
                            </p>
                        </div>
                    </header>
                    <ul class="mt-productlisthold list-inline" id="gap-cards">
                        @foreach($gapItems as $item)
                            <li>
                                <div id="gap-card" class="mt-product1 large"
                                     style="padding: 0 0 20px 0">
                                    <div class="box">
                                        <div class="b1">
                                            <div class="b2">
                                                <div
                                                        id="gap-card-photo"
                                                        style="
                                                        background-image: url({{asset('/admin/image/gap_item/' . $item->image)}});
                                                        background-repeat: no-repeat;
                                                        background-size: 100% 100%;
                                                        background-position: center;
                                                        border: 4px solid red;
                                                        width: 275px;
                                                        height: 275px;
                                                        position: relative;
                                                        ">
                                                    <span style="font-family: Montserrat;position: absolute; left: 0; background: red; color: white; padding: 2px 10px; top: 18px">
                                                        Скидка 50%
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <strong class="title"><a href="{{ route('gap_card.detail', $item->id) }}" style="color: black">Super Elixir For Woman</a></strong>
                                        <span class="cut-text" style="">Крем обладает рассасывающим, выравнивающим эффектом и также убирает складки и морщины на коже. Очень полезен как средство профилактики целлюлита.</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <nav class="mt-pagination">
                        <ul class="list-inline">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                        </ul>
                    </nav><!-- mt pagination end here -->
                </div>
            </div>
        </div>
    </main>
@endsection
<style>
    .cut-text {
        display: -webkit-box;
        max-width: 250px;
        height: 40px;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.625;
    }
    .mt-bestseller {
        padding: 0 0 0 0 !important;
    }

    .shop-widget .category-list li {
        padding: 0 0 5px !important;
        margin: 0 0 8px !important;
    }

    .right_slide_item {
        font-weight: bold !important;
        color: black !important;
        font-size: 100% !important;
        margin: 0 0 4px !important;
    }
</style>