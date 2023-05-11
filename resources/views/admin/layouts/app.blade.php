<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="locale" content="en">
    <!-- Title -->
    <title>Novo Care | @yield('page.title')</title>
    <!-- SEO Tags -->
    <meta name="description" content="O2H Application Dashboard">
    <meta name="author" content="Novo Care">
    <!-- Type Tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Styles -->
    <link href="{{ asset('admin/css/app.css') }}" rel="stylesheet" type="text/css">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('admin/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('admin/img/favicon/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/img/favicon/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('admin/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('admin/img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
<div class="wrapper" id="app">
    <!--========Admin Loader============-->
    <div class="pageloader is-active"><span class="title">Novo Care</span></div>
    <!--========Admin Login layout============-->
    @if (Route::current()->getName() === 'login_form')
        <main class="login-page">
            @include('admin.includes.alerts')
            <div class="login-page-child">
                <div class="container">
                    <div class="columns-container">
                        <div class="columns is-centered is-vcentered">
                            <div class="column is-6 has-background-white marakez">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @elseif( Route::current()->getName() === 'privacy-policy')
        <main class="login-page">
            @include('admin.includes.alerts')
            <div class="container">
                <div class="columns-container">
                    @yield('content')
                </div>
            </div>
        </main>
        <!--========Admin landing layout (feel free to remove it and change route)============-->
    @elseif(Route::current()->getName() === 'admin_landing')
        @yield('content')
        <!--========Admin Area layout============-->
    @else
        @include('admin.includes.alerts')
        @include('admin.includes.header')
        <main class="main-content">
            <div class="columns is-gapless">
                <div class="column is-2" id="aside-container">
                    @include('admin.includes.side_bar')
                </div>
                <div class="column is-10" id="main-container">
                    <div class="page-container">
                        <div class="page-content">
                            @include('admin.includes.breadcrumb')
                            <div class="min-page-content">
                                @yield('content')
                            </div>
                            @include('admin.includes.footer')
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endif
</div>
<!-- Scripts -->
<script src="{{ asset('admin/js/app.js') }}"></script>
<script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>
@yield('scripts')
</body>

</html>
