 <header id="fixed_nav" class="header fixed_nav py-2">
    <div class="hero-head">
        <div class="container">
            <nav class="navbar">
                <div class="navbar-brand">
                    <a href="{{ route('landing') }}">
                        <figure class="image image-contain logo">
                            <img src="/front/images/logo.png" alt="Logo">
                        </figure>
                    </a>
                    <span class="navbar-burger burger" data-target="navbarMenuHeroA">
                     <span></span>
                     <span></span>
                     <span></span>
                 </span>
             </div>
             <div id="navbarMenuHeroA" class="navbar-menu">
                <div class="mx-auto">
                    <a href="{{ route('landing') }}" class="navbar-item has-text-white has-text-weight-bold {{-- {{ activateRouteClass('landing') }} --}}">
                        {{-- <div class="icon is-block full-width is-size-2 has-text-centered">
                            <i class="fas fa-home"></i>
                        </div> --}}
                        <p class="is-block mt35 full-width">
                            الرئيسية
                        </p>
                    </a>
                    <a href="{{ route('landing') }}" class="navbar-item has-text-white has-text-weight-bold {{-- {{ activateRouteClass('landing') }} --}}">
                        {{-- <div class="icon is-block full-width is-size-2 has-text-centered">
                            <i class="fas fa-home"></i>
                        </div> --}}
                        <p class="is-block mt35 full-width">
                            كأس نجوم  QNQB
                        </p>
                    </a>
                     <a href="{{ route('landing') }}" class="navbar-item has-text-white has-text-weight-bold {{-- {{ activateRouteClass('landing') }} --}}">
                        {{-- <div class="icon is-block full-width is-size-2 has-text-centered">
                            <i class="fas fa-home"></i>
                        </div> --}}
                        <p class="is-block mt35 full-width">
                            الإعلام
                        </p>
                    </a>
                   {{--  @foreach($categories as $category)
                    <a href="{{ route('category_products', $category->slug) }}" class="navbar-item has-text-primary has-text-weight-bold {{ request()->is('category/'.$category->slug) ? 'is-active' : '' }}">
                        <div class="icon is-block full-width is-size-2 has-text-centered">
                            <i class="{{ $category->icon }}"></i>
                        </div>
                        <p class="is-block mt35 full-width">
                            {{ $category->name  }}
                        </p>
                    </a>
                    @endforeach
                    <a href="{{ route('brands.index') }}" class="navbar-item has-text-primary has-text-weight-bold {{ activateRouteClass('brands.*') }}">
                        <div class="icon is-block full-width is-size-2 has-text-centered">
                            <i class="icon_brand"></i>
                        </div>
                        <p class="is-block mt35 full-width">
                            الماركات
                        </p>
                    </a>
                    <a href="{{ route('about') }}" class="navbar-item has-text-primary has-text-weight-bold {{ activateRouteClass('about') }}">
                        <div class="icon is-block full-width is-size-2 has-text-centered">
                            <i class="icon_mechanic"></i>
                        </div>
                        <p class="is-block mt35 full-width">
                            من نحن
                        </p>
                    </a>
                    <a href="{{ route('contact') }}" class="navbar-item has-text-primary has-text-weight-bold {{ activateRouteClass('contact') }}">
                        <div class="icon is-block full-width is-size-2 has-text-centered">
                            <i class="icon_contact"></i>
                        </div>
                        <p class="is-block mt35 full-width">
                            اتصل بنا
                        </p>
                    </a>
                </div>
                <div class="navbar-start mr-auto">
                    @if(auth()->check())
                    <div class="dropdown">
                        <a class="dropdown-trigger">
                            <span class="pr20 pl20 has-text-weight-bold has-text-primary is-size-6" aria-haspopup="true" aria-controls="dropdown-menu">
                                حسابك
                                <span class="icon is-small mt10">
                                    <i class="fas fa-angle-down" aria-hidden="true"></i>
                                </span>
                            </span>
                        </a>
                        <div class="dropdown-menu white-block" role="menu">
                            <div class="dropdown-content has-text-centered">
                                @if(auth()->user()->role == 'admin')
                                <div class="dropdown-item">
                                    <a href="{{ route('admin.dashboard') }}" class="has-text-primary hvr-orange">
                                        لوحة التحكم
                                    </a>
                                </div><!--end dropdown-item-->
                                @else
                                <div class="dropdown-item">
                                    <a class="has-text-primary hvr-orange">
                                        بياناتك
                                    </a>
                                </div><!--end dropdown-item-->
                                <div class="dropdown-item">
                                    <a class="has-text-primary hvr-orange">
                                        المفضلة
                                    </a>
                                </div><!--end dropdown-item-->
                                @endif
                                <div class="dropdown-item">
                                    <a class="has-text-primary hvr-orange" onclick="document.getElementById('logoutForm').submit()">
                                        تسجيل الخروج
                                    </a>
                                </div><!--end dropdown-item-->
                                <form style="display: none;" id="logoutForm" action="{{ route('logout') }}" method="post">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>

                    @else
                    <a href="{{ route('login') }}" class="button is-primary pr20 pl20 has-text-weight-bold hvr-radial-out is-size-7">تسجيل الدخول</a>
                    @endif --}}
                </div>
            </div>
            <div class="navbar-end">
                sssssssss
            </div>
        </nav>
    </div>
</div>
</header>
</section>

<div class="columns is-centered">
  <div class="column is-5">
    nmgjg
</div>
</div>
