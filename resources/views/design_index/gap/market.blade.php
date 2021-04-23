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
    <main id="mt-main" style="margin-top: -50px !important;">
        <div class="row" style="margin-right: 0 !important; margin-left: 0 !important;">
            <div class="mt-bestseller bg-grey text-center wow fadeInUp" data-wow-delay="0.4s">
                <div class="row" style="height: 260px;">
                    <div class="col-xs-12">
                        <div class="bestseller-slider">
                            <div class="slide">
                                <div style="
                                        width: 100%;
                                        height: 100%;
                                        background-image: url('{{asset('/new_design/images/products/running_shoes_banner.jpg')}}');
                                        background-size: contain;
                                        background-position: center;
                                        background-repeat: no-repeat;
                                        ">

                                </div>
                            </div>
                            <div class="slide">
                                <div style="
                                        width: 100%;
                                        height: 100%;
                                        background-image: url('{{asset('/new_design/images/products/fashion_sale_banner.jpg')}}');
                                        background-size: contain;
                                        background-position: center;
                                        background-repeat: no-repeat;
                                        ">

                                </div>
                            </div>
                            <div class="slide">
                                <div style="
                                        width: 100%;
                                        height: 100%;
                                        background-image: url('{{asset('/new_design/images/products/pizza_banner.jpg')}}');
                                        background-size: contain;
                                        background-position: center;
                                        background-repeat: no-repeat;
                                        ">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <aside id="sidebar" class="col-xs-12 col-sm-4 col-md-3 wow fadeInLeft" data-wow-delay="0.4s">
                    <section class="shop-widget">
                        <h2>Категорий</h2>

                        <ul class="list-unstyled category-list">
                            @foreach($categories as $category)
                                <li>
                                    <a role="button" data-toggle="collapse" href="#collapse{{$category->id}}"
                                       aria-expanded="false"
                                       aria-controls="collapseExample">
                                        <span class="name">{{$category->name}}</span>
                                        <span class="num">{{isset($category->sub_categories) ? count($category->sub_categories) : 0}}</span>
                                    </a>
                                    <ul style="font-size:90%; font-weight:bolder;margin-top: 1rem;margin-left: 10px;"
                                        class="collapse col-sm-10 list-unstyled category-list"
                                        id="collapse{{$category->id}}">
                                        @foreach($category->sub_categories as $sub_category)
                                            <li>
                                                <a href="" style="color:black;">
                                                    <span><a href="/gap/market/show/?sub_category_id={{$sub_category->id}}">{{$sub_category->title_ru}}</a></span>
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
                                            <li><a href="#" >По возрастанию</a></li>
                                            <li><a href="#">По убыванию</a></li>
                                            <li><a href="{{route('sort.price')}}" class="price_sorting_btn" id="sort-price">По цене</a></li>
                                            <li><a href="#">По популярности</a></li>
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
                    <ul class="mt-productlisthold list-inline">
                        @foreach($products as $item)
                            <li>
                                <div class="mt-product1 large"
                                     style="border: 1px solid lightgrey; padding: 0 2px 20px 2px">
                                    <div class="box">
                                        <div class="b1">
                                            <div class="b2">
                                                <div style="
                                                        background-image: url({{asset($item->product_image)}});
                                                        background-repeat: no-repeat;
                                                        background-size: contain;
                                                        background-position: center;
                                                        width: 275px;
                                                        height: 290px;
                                                        "></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="txt">
                                        <strong class="title"><a href="">{{$item->product_name_ru}}</a></strong>
                                        <p style=" width: 30ch;   overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                                            {{$item->product_desc_ru}}
                                        </p>
                                        <span class=" price
                                                "> <span>{{$item->product_price}}</span> тг.</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <nav class="mt-pagination">
                        {{ $products->links() }}
                    </nav><!-- mt pagination end here -->
                </div>
            </div>
        </div>
    </main>
@endsection
<style>
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

<script type="text/javascript">
    function sortPrice()
    {
        var sortPrice = document.getElementById('sort-price');
        $( ".price_sorting_btn" ).click( function() {
            console.log(sortPrice)
        } );
    }

</script>