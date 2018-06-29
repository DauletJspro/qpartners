@extends('admin.layout.layout')

@section('meta-tags')

    <meta property="og:title" content="Qpartners" />
    <meta property="og:description" content="Qpartners - это Казахстанская компания, которая производит и распространяет серебряные изделия высшей пробы по доступным ценам." />
    <meta property="og:url" content="{{$url}}" />
    <meta property="og:image" content="{{URL('/').'/default.png'}}" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="300" />

    <meta name="title" content="Qpartners" />
    <meta name="description" content="" />
    <link rel="image_src" href="{{URL('/').'/default.png'}}" />

@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="box-header">
                        <h1 class="box-title main-title">
                            Пригласить друга
                        </h1>
                    </div>
                    <div class="nav-tabs-custom">
                        <div class="tab-content" >
                            <h4>Скопируйте ссылку и отправьте другу!</h4>
                            <textarea style="width: 100%; padding: 10px" id="url_link">{{$url}}</textarea>
                            <button class="btn btn-primary box-add-btn" onclick="copyLink()" style="margin-top: 10px">Скопировать</button>
                            <div class="shareSprite">
                                <h4>Или Вы можете поделиться со своими друзьями в социальной сети</h4>
                                <div class="share42init" data-image="{{URL('/').'/default.png'}}" data-url="{{$url}}" data-description="Qpartners - это Казахстанская компания, которая производит и распространяет серебряные изделия высшей пробы по доступным ценам."></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection