<!DOCTYPE html>
<html lang="en-US">

@include('index_updated.layout.app')

<body>

<div class="themesflat-boxed">
    <!-- Preloader -->
    <div id="wrapper">
        <!-- Page Loader -->
        <div id="pre-loader" class="loader-container">
            <div class="loader">
                <img src="/update_design/images/svg/rings.svg" alt="loader">
            </div>
        </div>
        <!-- W1 start here -->
        <div class="w1">
            @include('index_updated.layout.header')

            @yield('content')

            @include('index_updated.layout.footer')

        </div>
    </div>

</div>

<!-- include jQuery -->
<script src="/update_design/js/jquery.js"></script>
<!-- include jQuery -->
<script src="/update_design/js/plugins.js"></script>
<!-- include jQuery -->
<script src="/update_design/js/jquery.main.js"></script>

@yield('js')

</body>
</html>