@extends('design_index.layout.layout')

@section('meta-tags')

    <title>Qpartners Shop</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>

@endsection

@section('content')
    <main id="mt-main">
        <!-- Mt Contact Banner of the Page -->
        <section class="mt-contact-banner style4 wow fadeInUp" data-wow-delay="0.4s"
                 style="background-color: lightgrey;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h1>{{$news->news_name}}</h1>
                        {{--                        <nav class="breadcrumbs">--}}
                        {{--                            <ul class="list-unstyled">--}}
                        {{--                                <li><a href="index.html">Home <i class="fa fa-angle-right"></i></a></li>--}}
                        {{--                                <li><a href="#">Blog <i class="fa fa-angle-right"></i></a></li>--}}
                        {{--                                <li>Category</li>--}}
                        {{--                            </ul>--}}
                        {{--                        </nav>--}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <a href="#" class="search">Search <i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Mt Contact Banner of the Page end -->

        <!-- Mt Blog Detail of the Page -->
        <div class="mt-blog-detail style1">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 wow fadeInUp" data-wow-delay="0.4s">
                        <!-- Blog Post of the Page -->
                        <article class="blog-post detail">
                            <div class="img-holder">
                                <a href="blog-right-sidebar.html">

                                    <div style="
                                            background-image: url('{{$news->news_image}}') ;
                                            background-size: contain;
                                            background-position: center;
                                            background-repeat: no-repeat;
                                            width: 790px;
                                            min-height: 365px;
                                            "></div>
                                </a>
                            </div>
                            <time class="time" datetime="2016-02-03 20:00">
                                <strong>
                                    {{date('d',strtotime($news->created_at))}}
                                </strong>
                                {{\App\Http\Helpers::getMonthName(date('m', strtotime($news->created_at)))}}</time>
                            <div class="blog-txt">
                                <h2><a href="blog-right-sidebar.html">{{$news->name_ru}}</a></h2>
                                <ul class="list-unstyled blog-nav">
                                    <li><a href="#"><i class="fa fa-clock-o"></i>{{
                                    date('d', strtotime($news->created_at)) . '&nbsp;'.
                                    \App\Http\Helpers::getMonthName(date('m', strtotime($news->created_at))) .'&nbsp;'.
                                    date('Y', strtotime($news->created_at))
                                    }}</a></li>
                                    <li><a href="#"><i class="fa fa-comment"></i>2 Comments</a></li>
                                </ul>
                                <p>
                                    <strong>{{$news->full_description_ru}}</strong>
                                </p>
                                <div id="blog-isotop" class="img-block">
                                    @foreach($images  as $image)
                                        <div class="img">
                                            <a href="{{$image->path}}" class="lightbox">
                                                <div style="
                                                        width: 185px;
                                                        height: 185px;
                                                        background-image: url('{{$image->path}}');
                                                        background-repeat: no-repeat;
                                                        background-position: center;
                                                        background-size: cover;
                                                        ">

                                                </div>
                                                <i class="fa fa-search-plus"></i>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </article>
                        <article class="mt-author-box">
                            <div class="author-img">
                                <a href="#">
                                    <div style="
                                            background-size: contain;
                                            background-position: center;
                                            background-repeat: no-repeat;
                                            width: 150px;
                                            height: 150px;
                                            background-image: url('{{$author ? $author->avatar : '/media/default.png'}}');
                                            "></div>
                                </a>
                            </div>
                            <div class="author-txt">
                                <h3><a href="#">{{$author ? $author->name : 'Не указано'}}</a></h3>
                                <p>{{$author ? \App\Models\UserStatus::getStatusName($author->user_id) : 'Не указано'}}</p>
                                <ul class="list-unstyled social-network">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </article>
                        <!-- Mt Author Box of the Page end -->
                        <!-- Mt Comments Section of the Page -->
                        <div class="mt-comments-section">
                            <div class="mt-comments-heading">
                                <h2>Комментарий</h2>
                            </div>
                            <ul class="list-unstyled">
                                <li>
                                    <div class="img-box">
                                        <img src="http://placehold.it/70x70" alt="image description">
                                    </div>
                                    <div class="txt">
                                        <h3><a href="#">John Wick</a></h3>
                                        <time class="mt-time" datetime="2016-02-03 20:00">May 24, 2015</time>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum</p>
                                    </div>
                                </li>
                                <li class="second-comment">
                                    <div class="img-box">
                                        <img src="http://placehold.it/70x70" alt="image description">
                                    </div>
                                    <div class="txt">
                                        <h3><a href="#">John Wick</a></h3>
                                        <time class="mt-time" datetime="2016-02-03 20:00">May 24, 2015</time>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit i</p>
                                    </div>
                                </li>
                            </ul>
                            <!-- Mt Leave Comments of the Page -->
                            <div class="mt-leave-comment">
                                <h2>Оставить комментарий</h2>
                                <form action="#" class="comment-form">
                                    <fieldset>
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Имя"
                                                   value="{{Auth::user() ? Auth::user()->name : '' }}">
                                            <input type="email" name="email" class="form-control" placeholder="E-mail"
                                                   value="{{Auth::user() ? Auth::user()->email : '' }}">
                                        </div>
                                        <div class="form-group">
                                            <textarea placeholder="Комментарий..." name="message_body">

                                            </textarea>
                                        </div>
                                        <button type="submit" class="btn btn-warning" style="padding:1rem 2rem;">Оставить</button>
                                    </fieldset>
                                </form>
                            </div>
                            <!-- Mt Leave Comments of the Page end -->
                        </div>
                        <!-- Mt Comments Section of the Page end -->
                    </div>
                    <div class="col-xs-12 col-sm-4 text-right wow fadeInUp" data-wow-delay="0.4s">
                        <!-- Category Widget of the Page -->
                        <section class="widget category-widget">
                            <h3>Категория</h3>
                            <ul class="list-unstyled widget-nav">
                                @foreach($categories as $category)
                                    <li><a href="/news?id={{$category->id}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </section>
                        <!-- Category Widget of the Page end -->
                        <!-- Popular Widget of the Page -->
                        <section class="widget popular-widget">
                            <h3>Свежие новости</h3>
                            <ul class="list-unstyled text-right popular-post">
                                @foreach($popular_news as $item)
                                    <li>
                                        <div class="img-post">
                                            <a href="/news/{{$item->news_id}}"><img src="{{$item->news_image}}"
                                                                                    alt="image description"></a>
                                        </div>
                                        <div class="info-dscrp">
                                            <p>{{$item->news_name_ru}}</p>
                                            <time datetime="2016-02-03 20:00">{{date('d.m.y',strtotime($item->created_at))}}</time>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                        <!-- Popular Widget of the Page end -->
                        <!-- Tag Widget of the Page -->
                    {{--                        <section class="widget tag-widget">--}}
                    {{--                            <h3>TAGS</h3>--}}
                    {{--                            <ul class="list-unstyled text-right tags">--}}
                    {{--                                <li><a href="#">Fusce,</a></li>--}}
                    {{--                                <li><a href="#">mattis,</a></li>--}}
                    {{--                                <li><a href="#">nunc,</a></li>--}}
                    {{--                                <li><a href="#">lacus,</a></li>--}}
                    {{--                                <li><a href="#">vulputate,</a></li>--}}
                    {{--                                <li><a href="#">facilisis,</a></li>--}}
                    {{--                                <li><a href="#">dui,</a></li>--}}
                    {{--                                <li><a href="#">efficitur,</a></li>--}}
                    {{--                                <li><a href="#">ut</a></li>--}}
                    {{--                            </ul>--}}
                    {{--                        </section>--}}
                    <!-- Tag Widget of the Page -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Mt Blog Detail of the Page end -->
    </main>
@endsection