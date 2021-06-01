@extends('design_index.layout.layout')

@section('meta-tags')

    <title>Qpartners Shop</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>

@endsection

@section('content')
    <main id="mt-main">
        <!-- Mt Content Banner of the Page -->
        <section class="container mt-contact-banner wow fadeInUp" data-wow-delay="0.4s"
                 style="
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background: red"

        >
            <p style="color: white; font-family: Montserrat; font-weight: 600; font-size: 40px; text-align: center; text-transform: uppercase;text-shadow: 1px 1px 1px black;">Новости</p>

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
        <div class="mt-blog-detail style1">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 wow fadeInUp" data-wow-delay="0.4s">
                        <article class="blog-post detail" style="border-radius: 0; margin-bottom: 50px; padding: 30px">
                            <div class="img-holder img-post">
                                <a href="{{$news->news_image}}" class="lightbox">
                                    <div style="
                                            background-image: url({{$news->news_image === '' ? $news->news_image : 'https://loopnewslive.blob.core.windows.net/liveimage/sites/default/files/2018-12/CkF8PLI3Ay.jpg'}}) ;
                                            background-size: 100% 100%;
                                            background-position: center;
                                            background-repeat: no-repeat;
                                            width: 100%;
                                            min-height: 365px;
                                            margin-bottom: 10px
                                            ">
                                    </div>
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
                                    <li><a href="#"><i class="fa fa-comment"></i>{{count($comments)}} коментарий</a>
                                    </li>
                                </ul>
                                <p>
                                    <strong>{{$news->full_description_ru}}</strong>
                                </p>
                                <div id="blog-isotop" style="display: none" class="img-block">
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
                        <article class="mt-author-box" style="display: flex; border-radius: 0; margin-bottom: 50px; padding: 5px 15px">
                            <div class="">
                                <a href="#">
                                    <div class="comment-photo" style="
                                            background-position: center;
                                            background-repeat: no-repeat;
                                            background-size: 100% 100%;
                                            width: 150px;
                                            height: 150px;
                                            background-image: url('{{$author ? $author->avatar : '/new_design/images/banners/news-detail.svg'}}');
                                            "></div>
                                </a>
                            </div>
                            <div class="author-txt" style="margin-left: 15px;">
                                <h3><a href="#" style="font-weight: 600">{{$author ? $author->name : 'Автор цитаты'}}</a></h3>
                                <p>{{$author ? \App\Models\UserStatus::getStatusName($author->user_id) : ''}}</p>
                                <p>sh@mail.ru</p>
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
                            <article class="mt-author-box" style="display: flex; font-family: Montserrat; border-radius: 0; margin-bottom: 50px; padding: 5px 15px">
                                <div class="">
                                    <a href="#">
                                        <div class="comment-photo" style="
                                                background-size: contain;
                                                background-position: center;
                                                background-repeat: no-repeat;
                                                width: 150px;
                                                height: 150px;
                                                background-image: url('{{$author ? $author->avatar : '/new_design/images/banners/news-detail.svg'}}');
                                                "></div>
                                    </a>
                                </div>
                                <div class="author-txt" style="margin-left: 15px; display: flex;">
                                    <div>
                                        <h3><a href="#" style="font-weight: 600">{{$author ? $author->name : 'Автор цитаты'}}</a></h3>
                                        <p>{{$author ? \App\Models\UserStatus::getStatusName($author->user_id) : ''}}</p>
                                        <p>sh@mail.ru</p>
                                        <p>22.05.20</p>

                                    </div>
                                    <div style="border-left: 1px solid #C4C4C4; padding-left: 10px;  color: black !important; margin-left: 10px">
                                        <p>Хорошие новости!</p>
                                        <p>Великолепно!</p>
                                        <p>Мы долго ждали этого дня!</p>
                                    </div>
                                </div>
                            </article>
                            <article class="mt-author-box" style="display: flex; font-family: Montserrat; border-radius: 0; margin-bottom: 50px; padding: 5px 15px">
                                <div class="">
                                    <a href="#">
                                        <div class="comment-photo" style="
                                                background-size: contain;
                                                background-position: center;
                                                background-repeat: no-repeat;
                                                width: 150px;
                                                height: 150px;
                                                background-image: url('{{$author ? $author->avatar : '/new_design/images/banners/news-detail.svg'}}');
                                                "></div>
                                    </a>
                                </div>
                                <div class="author-txt" style="margin-left: 15px; display: flex;">
                                    <div>
                                        <h3><a href="#" style="font-weight: 600">{{$author ? $author->name : 'Автор цитаты'}}</a></h3>
                                        <p>{{$author ? \App\Models\UserStatus::getStatusName($author->user_id) : ''}}</p>
                                        <p>sh@mail.ru</p>
                                        <p>22.05.20</p>

                                    </div>
                                    <div style="border-left: 1px solid #C4C4C4; padding-left: 10px;  color: black !important; margin-left: 10px">
                                        <p>Хорошие новости!</p>
                                        <p>Великолепно!</p>
                                        <p>Мы долго ждали этого дня!</p>
                                    </div>
                                </div>
                            </article>

                            @if($comments->user)
                                <ul class="list-unstyled">
                                    @foreach($comments as $comment)
                                        <li>
                                            <div class="img-box">
                                                <strong style="color: black;">{{$comment->user ? $comment->user->name : 'Не указано' }}</strong>
                                                <img src="{{$comment->user ? $comment->user->avatar : '/media/default.png'}}"
                                                     alt="" style="border-radius: 50%;border: 1px solid lightgrey;">
                                            </div>
                                            <div class="txt">
                                                <h3><a href="#"></a></h3>
                                                <time class="mt-time"
                                                      datetime="2016-02-03 20:00">{{$comment->created_at}}</time>
                                                <strong style="color: black;">{{$comment->review_text}}</strong>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="mt-leave-comment">
                                <div class="mt-comments-heading">
                                    <h2>Оставить комментарий</h2>
                                </div>
                                {{ Form::open(['action' => ['Index\ReviewController@store'], 'method' => 'POST', 'class' => 'comment-form']) }}
                                {{ Form::token() }}
                                {{ Form::hidden('item_id', $news->news_id) }}
                                {{ Form::hidden('review_type_id', \App\Models\Review::NEWS_REVIEW) }}
                                <fieldset>
                                    @if ($errors->any())
                                        <div class="alert alert-danger" style="color: red;">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        {{Form::text('user_name', (Auth::user()? Auth::user()->name : ''), ['class'=>  'form-control', 'placeholder' => 'Имя'])}}
                                        {{Form::text('user_email', (Auth::user()? Auth::user()->email : ''), ['class'=>  'form-control','placeholder' => 'E-mail'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::textarea('review_text',null, ['placeholder' => 'Комментарий....'])}}
                                    </div>
                                    {{Form::submit('Оставить',['class' => 'btn', 'style' => 'background: red; color: white; padding:1rem 2rem;'])}}
                                </fieldset>
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 text-right wow fadeInUp" data-wow-delay="0.4s">
                        <section class="widget category-widget">
                            <h3>Категория</h3>
                            <ul class="list-unstyled widget-nav">
                                @foreach($categories as $category)
                                    <li><a href="/news?id={{$category->id}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </section>
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