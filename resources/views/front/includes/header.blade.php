 <header id="fixed_nav" class="header fixed_nav py-3">
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
@if(Route::current()->getName() == 'landing')
<!-------------Slideshow--------->
<section class="hero is-transparent is-full">
    <div dir="ltr" class="slideshow">
        <slick-animation  ref="slick"  :options="{slidesToShow:1, slidesToScroll: 1 , swipeToSlide: true, infinite: false, accessibility: true, adaptiveHeight: false, arrows: true, dots: true, dotsClass: 'primary-dots white-bg-dots slick-dots', draggable: true, edgeFriction: 0.30, swipe: true  , autoplay: true }" class="height-80vh">
            <div class="item height-80vh position-relative" dir="rtl">
                <figure>
                    <lazy-load
                    src="/front/images/spinner.svg"
                    lazy-src="/front/images/slide1.jpeg"
                    lazy-srcset="/front/images/slide1.jpeg"
                    background-color="transparent"
                    alt=""
                    class="image-cover"
                    />
                </figure>
                <div class="description display-table full-width height-full">
                    <div class="display-table-cell vertical-align">
                        <div class="container">
                            <div class="columns is-vcentered is-mobile">
                                <div class="column is-7-desktop is-7-tablet is-12-mobile hero-caption pr-0">
                                    <h1 class="is-size-2-desktop is-size-4-tablet has-text-weight-bold has-text-white line-height3" data-animation-in="zoomIn" data-delay-in="0.5">
                                        testjhjkhk
                                    </h1>
                                    <p class="has-text-white has-text-justified pl250 is-size-6-desktop is-size-7-mobile has-text-weight-bold mt20" data-animation-in="zoomIn" data-delay-in="0.8">
                                        hjkgjhgg
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </slick-animation>
    </div>
</section>
@endif