@extends('design_index.layout.layout')

@section('meta-tags')

    <title>Qpartners Shop</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>

@endsection

@section('content')
    <main id="mt-main">
        <section class="mt-contact-banner style4 wow fadeInUp" data-wow-delay="0.4s"
                 style="background-image: url(http://placehold.it/1920x205);">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h1>BLOG LIST SIDEBAR</h1>
                        <!-- Breadcrumbs of the Page -->
                        <nav class="breadcrumbs">
                            <ul class="list-unstyled">
                                <li><a href="index.html">Home <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="#">Blog <i class="fa fa-angle-right"></i></a></li>
                                <li>Category</li>
                            </ul>
                        </nav>
                        <!-- Breadcrumbs of the Page end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <a href="#" class="search">Search <i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <div class="mt-blog-detail style1">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 wow fadeInLeft" data-wow-delay="0.4s">
                        @foreach($news as $item)
                            <article class="blog-post style2">
                                <div class="img-holder">
                                    <a href="/news/{{$item->news_id}}">
                                    <div style="
                                            background-image: url('{{$item->news_image}}');
                                            background-position: center;
                                            background-size: cover;
                                            width: 280px;
                                            height: 170px;
                                            "></div>
                                    <ul class="list-unstyled comment-nav">
                                        <li><a href="#"><i class="fa fa-comments"></i>12</a></li>
                                        <li><a href="#"><i class="fa fa-share-alt"></i>14</a></li>
                                    </ul>
                                </div>
                                <div class="blog-txt">
                                    <h2><a href="/news/{{$item->news_id}}">{{$item->news_name_ru}}</a></h2>
                                    <ul class="list-unstyled blog-nav">
                                        <li><a href="#"><i class="fa fa-clock-o"></i>{{date('Y:m:d', strtotime($item->created_at))}}</a></li>
                                        <li><a href="#"><i class="fa fa-comment"></i>Комментарий</a></li>
                                    </ul>
                                    <p>{{$item->news_desc_ru}}</p>
                                    <a href="/news/{{$item->news_id}}" class="btn-more">Читать больше</a>
                                </div>
                            </article>
                        @endforeach
                        <div class="btn-holder">
                            <ul class="list-unstyled pagination">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">6</a></li>
                                <li><a href="#">7</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 text-right sidebar wow fadeInRight" data-wow-delay="0.4s">
                        <!-- Category Widget of the Page -->
                        <section class="widget category-widget">
                            <h3>CATEGORIES</h3>
                            <ul class="list-unstyled widget-nav">
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Future</a></li>
                                <li><a href="#">Kitchen</a></li>
                                <li><a href="#">Photography</a></li>
                            </ul>
                        </section>
                        <!-- Category Widget of the Page end -->
                        <!-- Popular Widget of the Page -->
                        <section class="widget popular-widget">
                            <h3>POPULAR POST</h3>
                            <ul class="list-unstyled text-right popular-post">
                                <li>
                                    <div class="img-post">
                                        <a href="#"><img src="http://placehold.it/60x60" alt="image description"></a>
                                    </div>
                                    <div class="info-dscrp">
                                        <p>Vestibulum sit amet metus euismod amet metus euismod</p>
                                        <time datetime="2016-02-03 20:00">24.09.2015</time>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-post">
                                        <a href="#"><img src="http://placehold.it/60x60" alt="image description"></a>
                                    </div>
                                    <div class="info-dscrp">
                                        <p>Luctus id risus vel, ultricies dignissim lacus etiam dolor sem</p>
                                        <time datetime="2016-02-03 20:00">24.09.2015</time>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-post">
                                        <a href="#"><img src="http://placehold.it/60x60" alt="image description"></a>
                                    </div>
                                    <div class="info-dscrp">
                                        <p>Aenean lacus mi, porttitor quis <br>dapibustincidunt</p>
                                        <time datetime="2016-02-03 20:00">24.09.2015</time>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-post">
                                        <a href="#"><img src="http://placehold.it/60x60" alt="image description"></a>
                                    </div>
                                    <div class="info-dscrp">
                                        <p>Fusce mattis nunc lacus, vulputate facilisis dui efficitur ut</p>
                                        <time datetime="2016-02-03 20:00">24.09.2015</time>
                                    </div>
                                </li>
                            </ul>
                        </section>
                        <!-- Popular Widget of the Page end -->
                        <!-- Tag Widget of the Page -->
                        <section class="widget tag-widget">
                            <h3>TAGS</h3>
                            <ul class="list-unstyled text-right tags">
                                <li><a href="#">Fusce,</a></li>
                                <li><a href="#">mattis,</a></li>
                                <li><a href="#">nunc,</a></li>
                                <li><a href="#">lacus,</a></li>
                                <li><a href="#">vulputate,</a></li>
                                <li><a href="#">facilisis,</a></li>
                                <li><a href="#">dui,</a></li>
                                <li><a href="#">efficitur,</a></li>
                                <li><a href="#">ut</a></li>
                            </ul>
                        </section>
                        <!-- Tag Widget of the Page end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Mt Blog Detail of the Page end -->
    </main>
@endsection