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
                 <ul>
                    <li class="nav-item">
                        <a href="{{ route('landing') }}" class="navbar-item has-text-white has-text-weight-bold {{-- {{ activateRouteClass('landing') }} --}}">
                            الرئيسية
                        </a>
                    </li>
                    <li class="nav-item dropdown_menu drodown is-mobile">
                      <a class="navbar-item dropdown_head has-text-white has-text-weight-bold" href="">
                        الإعلام
                        <i class="fas fa-chevron-down mr-2"></i>
                    </a>
                    <ul class="dropdown_body">
                        <li class="nav-item">
                          <a class="navbar-item" href="">
                            <i class="has-text-gold fa-solid fa-caret-right ml-2"></i>
                            الأخبار
                        </a>
                    </li>
                    <li class="nav-item">
                      <a class="navbar-item" href="">
                        <i class="has-text-gold fa-solid fa-caret-right ml-2"></i>
                        معرض  الصور
                    </a>
                </li>
                <li class="nav-item">
                  <a class="navbar-item" href="">
                    <i class="has-text-gold fa-solid fa-caret-right ml-2"></i>
                    المركز الإعلامى
                </a>
            </li>


        </ul>
    </li>
</ul>
</div>
</div>
<div class="navbar-end">
    <ul class="socials">
        <li>
            <a class="hvr-rectangle-out" href="#">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
        </li>
        <li>
            <a class="hvr-rectangle-out" href="#">
                <i class="fa-brands fa-twitter"></i>
            </a>
        </li>
        <li>
            <a class="hvr-rectangle-out" href="#">
                <i class="fa-brands fa-youtube"></i>
            </a>
        </li>
        <li>
            <a class="hvr-rectangle-out" href="#">
                <i class="fa-brands fa-instagram"></i>
            </a>
        </li>
    </ul>
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
                <div class="description display-table w-100 full-height">
                    <div class="display-table-cell vertical-align">
                        <div class="container">
                            <div class="columns is-vcentered is-mobile">
                                <div class="column is-7-desktop is-7-tablet is-12-mobile hero-caption pr-0">
                                    <h1 class="is-size-3-desktop is-size-4-tablet has-text-weight-bold has-text-white line-height3" data-animation-in="zoomIn" data-delay-in="0.5">
                                        النادى الأهلى الرياضى
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item height-80vh position-relative" dir="rtl">
                <figure>
                    <lazy-load
                    src="/front/images/spinner.svg"
                    lazy-src="/front/images/slide2.jpg"
                    lazy-srcset="/front/images/slide2.jpg"
                    background-color="transparent"
                    alt=""
                    class="image-cover"
                    />
                </figure>
                <div class="description display-table w-100 full-height">
                    <div class="display-table-cell vertical-align">
                        <div class="container">
                            <div class="columns is-vcentered is-mobile">
                                <div class="column is-7-desktop is-7-tablet is-12-mobile hero-caption pr-0">
                                    <h1 class="is-size-3-desktop is-size-4-tablet has-text-weight-bold has-text-white line-height3" data-animation-in="zoomIn" data-delay-in="0.5">
                                        النادى الأهلى الرياضى
                                    </h1>
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