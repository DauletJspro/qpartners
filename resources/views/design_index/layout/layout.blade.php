<!DOCTYPE html>
<html lang="en-US">

@include('design_index.layout.app')

<body class="home page-template page-template-tpl page-template-front-page page-template-tplfront-page-php page page-id-262  has-topbar header_sticky wide sidebar-left bottom-center wpb-js-composer js-comp-ver-5.1.1 vc_responsive">

<div class="themesflat-boxed">
    <!-- Preloader -->
    <div class="preloader">
        <div class="clear-loading loading-effect-2">
            <span></span>
        </div>
    </div>

    <div id="wrapper">
        <div id="pre-loader" class="loader-container text-center">
            <div class="loader text-center" style="width: 15%;">
                <img src="/new_design/images/logo/logo.png" style="width: 100%;" alt="loader">
            </div>
        </div>
        <div class="w1">
            @include('design_index.layout.header')
            <div class="mt-search-popup">
                <div class="mt-holder">
                    <a href="#" class="search-close"><span></span><span></span></a>
                    <div class="mt-frame">
                        <form action="#">
                            <fieldset>
                                <input type="text" placeholder="Search...">
                                <span class="icon-microphone"></span>
                                <button class="icon-magnifier" type="submit"></button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            @yield('content')
            @include('design_index.layout.footer')
        </div>
        <span id="back-top" class="fa fa-arrow-up"></span>
    </div>
</div>


<script src="/new_design/js/jquery.js"></script>
<script src="/new_design/js/plugins.js"></script>
<script src="/new_design/js/jquery.main.js"></script>
<script src="/notify/notify.js"></script>
<script src="/notify/notify.min.js"></script>
@yield('js')
{{--<script src="/new_design/js/main.js"></script>--}}
<script>
    function addItemToBasket(tag_object) {
        var method = $(tag_object).data('method');
        var item_id = $(tag_object).data('item-id');
        var user_id = $(tag_object).data('user-id');
        var route = $(tag_object).data('route');
        if (user_id) {
            ajax(route, method, item_id, user_id);
        } else {
            window.location.href = 'http://local.qpartners.club/kz/login';
        }
    }

    function addItemToFavorites(tag_object) {
        var method = $(tag_object).data('method');
        var item_id = $(tag_object).data('item-id');
        var user_id = $(tag_object).data('user-id');
        var route = $(tag_object).data('route');
        var session_id = $(tag_object).data('session-id');
        ajax(route, method, item_id, user_id, session_id);
    }


    function ajax(route, method, item_id, user_id, session_id = null) {
        var controllerName = route.split('/')[3];
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: route,
            type: "POST",
            data: {
                _token: CSRF_TOKEN,
                method_name: method,
                item_id: item_id,
                user_id: user_id,
                session_id: session_id
            },
            success: function (data) {
                if (controllerName == 'basket') {
                    if (method == 'delete') {
                        $("#product-section").load(location.href + " #product-section");
                        $("#total-price-div").load(location.href + " #total-price-div");
                    } else if (data.method == 'add') {
                        if (data.success == 1) {
                            $.notify(data.message, "success");
                        } else if (data.success == -1) {
                            $.notify(data.message, "error");
                        } else if (data.success == 0) {
                            $.notify(data.message, "error");
                        }
                        $("#basket-box").load(location.href + " #basket-box");
                    }
                } else if (controllerName == 'favorite') {
                    if (data.success == 1) {
                        $.notify(data.message, "success");
                    } else if (data.success == 2) {
                        $.notify(data.message, "warning");
                    } else if (data.success == 0) {
                        $.notify(data.message, "danger");
                    }
                }
            }
        });
    }
</script>

</body>
</html>

