<!DOCTYPE html>
<html lang="en-US">

@include('index.layout.app')

<body class="home page-template page-template-tpl page-template-front-page page-template-tplfront-page-php page page-id-262  has-topbar header_sticky wide sidebar-left bottom-center wpb-js-composer js-comp-ver-5.1.1 vc_responsive">

<div class="themesflat-boxed">
  <!-- Preloader -->
  <div class="preloader">
    <div class="clear-loading loading-effect-2">
      <span></span>
    </div>
  </div>

  @include('index.layout.header')

  @yield('content')

  @include('index.layout.footer')

</div>


<script type='text/javascript' src='/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.8'></script>
<script type='text/javascript' src='/wp-content/themes/fo/js/all.js'></script>
<script type='text/javascript' src='/wp-content/plugins/themesflat/assets/3rd/owl.carousel.js?ver=1.0'></script>
<script type='text/javascript' src='/wp-includes/js/wp-embed.min.js?ver=4.8'></script>

<script src="/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script type='text/javascript' src='/custom/js/main-page.js?ver=3'></script>

@yield('js')

</body>
</html>