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
                 style="background-image: url(http://placehold.it/1920x205);">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h1>BLOG DETAIL SIDEBAR</h1>
                        <nav class="breadcrumbs">
                            <ul class="list-unstyled">
                                <li><a href="index.html">Home <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="#">Blog <i class="fa fa-angle-right"></i></a></li>
                                <li>Category</li>
                            </ul>
                        </nav>
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
                                    <div class="img">
                                        <a href="http://placehold.it/185x185" class="lightbox">
                                            <img src="http://placehold.it/185x185" alt="image description">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <div class="img">
                                        <a href="http://placehold.it/185x135" class="lightbox">
                                            <img src="http://placehold.it/185x135" alt="image description">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <div class="img">
                                        <a href="http://placehold.it/1852x2452" class="lightbox">
                                            <img src="http://placehold.it/185x245" alt="image description">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <div class="img">
                                        <a href="http://placehold.it/185x120" class="lightbox">
                                            <img src="http://placehold.it/185x120" alt="image description">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <div class="img">
                                        <a href="http://placehold.it/185x135" class="lightbox">
                                            <img src="http://placehold.it/185x135" alt="image description">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <p>Fusce mattis nunc lacus, vulputate facilisis dui efficitur ut. Vestibulum sit amet
                                    metus euismod, condimentum lectus id, ultrices sem. Morbi in erat malesuada,
                                    sollicitudin massa at, tristique nisl. Maecenas id eros scelerisque, vulputate
                                    tortor quis, efficitur arcu.</p>
                                <p>Aenean lacus mi, porttitor quis dapibus a, tincidunt vitae arcu. Etiam dolor sem,
                                    luctus id risus vel, ultricies dignissim lacus. t cupidatat non proident, sunt in
                                    culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </article>
                        <!-- Blog Post of the Page end -->
                        <!-- Mt Author Box of the Page -->
                        <article class="mt-author-box">
                            <div class="author-img">
                                <a href="#"><img src="http://placehold.it/150x150" alt="image description"></a>
                            </div>
                            <div class="author-txt">
                                <h3><a href="#">Clara Wooden</a></h3>
                                <p>Commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
                                <h2>COMMENTS</h2>
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
                                <h2>LEAVE A COMMENT</h2>
                                <form action="#" class="comment-form">
                                    <fieldset>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name">
                                            <input type="email" class="form-control" placeholder="Email">
                                            <input type="text" class="form-control" placeholder="Website">
                                        </div>
                                        <div class="form-group">
                                            <textarea placeholder="Message"></textarea>
                                        </div>
                                        <button type="submit" class="form-btn">Submit</button>
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
                                        <a href="#"><img src="http://placehold.it/65x65" alt="image description"></a>
                                    </div>
                                    <div class="info-dscrp">
                                        <p>Vestibulum sit amet metus euismod amet metus euismod</p>
                                        <time datetime="2016-02-03 20:00">24.09.2015</time>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-post">
                                        <a href="#"><img src="http://placehold.it/65x65" alt="image description"></a>
                                    </div>
                                    <div class="info-dscrp">
                                        <p>Luctus id risus vel, ultricies dignissim lacus etiam dolor sem</p>
                                        <time datetime="2016-02-03 20:00">24.09.2015</time>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-post">
                                        <a href="#"><img src="http://placehold.it/65x65" alt="image description"></a>
                                    </div>
                                    <div class="info-dscrp">
                                        <p>Aenean lacus mi, porttitor quis <br>dapibustincidunt</p>
                                        <time datetime="2016-02-03 20:00">24.09.2015</time>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-post">
                                        <a href="#"><img src="http://placehold.it/65x65" alt="image description"></a>
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
                        <!-- Tag Widget of the Page -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Mt Blog Detail of the Page end -->
    </main>
@endsection