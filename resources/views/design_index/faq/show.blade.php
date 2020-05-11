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
        <section class="mt-contact-banner" style="background-image: url(http://placehold.it/1920x205);">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h1>FAQ's</h1>
                        <nav class="breadcrumbs">
                            <ul class="list-unstyled">
                                <li><a href="index.html">home <i class="fa fa-angle-right"></i></a></li>
                                <li>FAQ's</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Mt Content Banner of the Page end -->
        <!-- Mt About Section of the Page -->
        <section class="mt-about-sec" style="padding-bottom: 0;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="txt wow fadeInUp" data-wow-delay="0.4s">
                            <h2>FAQ's</h2>
                            <p>Morbi in erat malesuada, sollicitudin massa at, tristique nisl. Maecenas id eros
                                scelerisque, vulputate tortor quis, efficitur arcu sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Umco laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit sse cillum dolore eu fugiat
                                nulla pariatur. Excepteur sint occaecat cupidatat <strong>Vestibulum sit amet metus
                                    euismod, condimentum lectus id, ultrices sem.</strong></p>
                            <p>Fusce mattis nunc lacus, vulputate facilisis dui efficitur ut. Vestibulum sit amet metus
                                euismod, condimentum lectus id, ultrices sem. Morbi in erat malesuada, sollicitudin
                                massa at, </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Mt About Section of the Page -->
        <div class="container faq-section mt-about-sec">
            <div class="row txt">
                <div class="col-xs-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @foreach($faqs as $faq)
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            {{$faq->question}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <p>{{$faq->answer}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

