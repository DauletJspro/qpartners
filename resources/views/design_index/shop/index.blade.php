<?php
use App\Models\Category;
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
        <?php
        /** @var Category $category */
        /** @var Category $category_id */
            $category = Category::where(['id' => $category_id])->first();
        if ($category_id) {
            $image_url = $category->image;
        } else {
            $image_url = '/new_design/images/internet_shop.png';
        }
        ?>
        <section class="mt-contact-banner style4 wow fadeInUp" data-wow-delay="0.4s"
                 style="background-image: url('<?= $image_url ?>'); border-top:1px solid lightgrey;border-bottom: 1px solid lightgrey;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h1><?= isset($category_id) ? (\App\Models\Category::where(['id' => $category_id])->first())->name : 'Магазин' ?> </h1>
                        <!-- Breadcrumbs of the Page -->
                        <nav class="breadcrumbs">
                            <ul class="list-unstyled">
                                <li><a href="index.html">Home <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="product-detail.html">Products <i class="fa fa-angle-right"></i></a></li>
                                <li>Chairs</li>
                            </ul>
                        </nav><!-- Breadcrumbs of the Page end -->
                    </div>
                </div>
            </div>
        </section><!-- Mt Contact Banner of the Page end -->
        <div class="container">
            <div class="row">
                <aside id="sidebar" class="col-xs-12 col-sm-4 col-md-3 wow fadeInLeft" data-wow-delay="0.4s">
                    <section class="shop-widget">
                        <h2>Категории</h2>
                        <!-- category list start here -->
                        <ul class="list-unstyled category-list">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{route('shop.show.category', ['category_id' => $category->id])}}">
                                        <span class="name">{{ $category->name  }}</span>
                                        <span class="num">{{ count(\App\Models\Product::where(['category_id'=>$category->id])->get()) }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </section>
                    <section class="shop-widget filter-widget bg-grey">
                        <h2>FILTER</h2>
                        <span class="sub-title">Filter by Brands</span>
                        <!-- nice-form start here -->
                        <ul class="list-unstyled nice-form">
                            <li>
                                <label for="check-1">
                                    <input id="check-1" type="checkbox">
                                    <span class="fake-input"></span>
                                    <span class="fake-label">Casali</span>
                                </label>
                                <span class="num">2</span>
                            </li>
                            <li>
                                <label for="check-2">
                                    <input id="check-2" type="checkbox">
                                    <span class="fake-input"></span>
                                    <span class="fake-label">Decar</span>
                                </label>
                                <span class="num">12</span>
                            </li>
                            <li>
                                <label for="check-3">
                                    <input id="check-3" checked="checked" type="checkbox">
                                    <span class="fake-input"></span>
                                    <span class="fake-label">Fantini</span>
                                </label>
                                <span class="num">4</span>
                            </li>
                            <li>
                                <label for="check-4">
                                    <input id="check-4" type="checkbox">
                                    <span class="fake-input"></span>
                                    <span class="fake-label">Flamentstyle</span>
                                </label>
                                <span class="num">4</span>
                            </li>
                            <li>
                                <label for="check-5">
                                    <input id="check-5" type="checkbox">
                                    <span class="fake-input"></span>
                                    <span class="fake-label">Heerenhuis</span>
                                </label>
                                <span class="num">6</span>
                            </li>
                            <li>
                                <label for="check-6">
                                    <input id="check-6" type="checkbox">
                                    <span class="fake-input"></span>
                                    <span class="fake-label">Hoffmann</span>
                                </label>
                                <span class="num">10</span>
                            </li>
                            <li>
                                <label for="check-7">
                                    <input id="check-7" type="checkbox">
                                    <span class="fake-input"></span>
                                    <span class="fake-label">Italfloor</span>
                                </label>
                                <span class="num">3</span>
                            </li>
                        </ul><!-- nice-form end here -->
                        <span class="sub-title">Filter by Price</span>
                        <div class="price-range">
                            <div class="range-slider">
                                <span class="dot"></span>
                                <span class="dot dot2"></span>
                            </div>
                            <span class="price">Price &nbsp;   $ 10  &nbsp;  -  &nbsp;   $ 599</span>
                            <a href="#" class="filter-btn">Filter</a>
                        </div>
                    </section>
                </aside>
                <div class="col-xs-12 col-sm-8 col-md-9 wow fadeInRight" data-wow-delay="0.4s">
                    <header class="mt-shoplist-header">
                        <div class="btn-box">
                            <ul class="list-inline">
                                <li>
                                    <a href="#" class="drop-link">
                                        Сортировка <i aria-hidden="true" class="fa fa-angle-down"></i>
                                    </a>
                                    <div class="drop">
                                        <ul class="list-unstyled">
                                            <li><a href="#">По возрастанию цены</a></li>
                                            <li><a href="#">По убыванию цены</a></li>
                                            <li><a href="#">По дате</a></li>
                                            <li><a href="#">По популярности</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a class="mt-viewswitcher" href="#"><i class="fa fa-th-large"
                                                                           aria-hidden="true"></i></a></li>
                                <li><a class="mt-viewswitcher" href="#"><i class="fa fa-th-list" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div><!-- btn-box end here -->
                        <!-- mt-textbox start here -->
                        <div class="mt-textbox">
                            <p>Показано <strong>1–9</strong> из <strong>65</strong></p>
                            </p>
                        </div><!-- mt-textbox end here -->
                    </header><!-- mt shoplist header end here -->
                    <!-- mt productlisthold start here -->
                    <ul class="mt-productlisthold list-inline">
                        @foreach($products as $product)
                            <li>
                                <div class="mt-product1">
                                    <div class="box">
                                        <div class="b1">
                                            <div class="b2">
                                                <a href="{{ route('product.detail', ['id' => $product->product_id])}}">
                                                    <div style="width: 276px; height: 286px; background-image: url('@if (isset($product->product_image)){{$product->product_image}} @else{{'/new_design/images/no-images.jpg'}}  @endif '); background-size: cover; background-position: center;"></div>
                                                </a>
                                                {{--                                                <span class="caption">--}}
                                                {{--														<span class="best-price">Best Price</span>--}}
                                                {{--													</span>--}}
                                                <ul class="links add">
                                                    <li><a href="#"><i class="icon-handbag"></i><span></span></a></li>
                                                    <li><a href="#"><i class="icomoon icon-heart-empty"></i></a></li>
                                                    <li><a href="#"><i class="icomoon icon-exchange"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="txt">
                                        <strong class="title"><a
                                                    href="product-detail.html">{{$product->product_name_ru}}</a></strong>
                                        <span class="price"><i
                                                    class="fa fa-dollar"></i> <span>{{$product->product_price}}</span></span>
                                    </div>
                                    <br>
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
    </main><!-- mt main end here -->
@endsection