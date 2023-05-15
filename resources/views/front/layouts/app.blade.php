<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Required Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>رابطة الأندية  | @yield('page.title')</title>
    {{-- Meta description tag --}}
    @yield('head.metaTags')
    @yield('head.ogTags')
    @yield('head.twitterTags')
    {{-- Open graph tags --}}
    <meta name="robots" content="index,follow">
    <meta property="og:locale" content="ar">
    <!-- @if(Route::currentRouteName() == 'product')
        <meta property="og:type" content="product" />
    @else
        <meta property="og:type" content="website" />
    @endif -->
    <meta property="og:site_name" content="{{ config('settings.site_name') }}" />
    <meta property="og:url" content="{{ Request::fullUrl() }}" />
    @yield('head.ogTags')

    {{-- Twitter card tags --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="">
    <meta name="twitter:creator" content="">
    @yield('head.twitterTags')
    <link rel="icon" type="image/png" href="/front/img/favicon.ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--<meta name="locale" content="{{ config('app.locale') }}">-->
   {{--  @yield('head.metaTags')
    @yield('head.ogTags')
    @yield('head.twitterTags') --}}
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
    <link href="/front/css/app.css" rel="stylesheet" type="text/css">
</head>
<body class="loading-body">

    <div id="app">
        {{-- @include('front.includes.alerts')
        @include('front.includes.loader') --}}
        @include('front.includes.header')
        <div class="main-wrapper {{Route::currentRouteName() == 'landing' ?  'home-page' : 'inner-pages' }}">
            @yield('content')
        </div>
        <!--Footer-->
        @include('front.includes.footer')
    </div>
    <!--Modals-->
    @yield("modals")
    <!-- Concatenated jQuery and plugins -->
    <script src="/front/js/app.js"></script>
    @yield('scripts')
</body>
</html>
