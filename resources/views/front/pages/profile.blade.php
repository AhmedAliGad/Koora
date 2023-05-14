@extends('front.layouts.app')
@section('page.title', 'البروفايل')
<!--hero text--->
@section('hero-text')
<p data-aos="zoom-in" data-aos-delay="200" class="has-text-white has-text-weight-bold has-text-centered is-size-4">من نحن</p>
@endsection
<!--content-->
@section('content')
<section class="hero inner-header">
	<div class="section-padding position-relative club-section">
		<div class="container">
			<div class="columns is-multiline d-block">
				<div class="column is-2 pl-6">
					<figure class="image card has-text-centered" data-aos="zoom-in" data-aos-delay="300">
						<lazy-load
						src="/front/images/spinner.svg"
						lazy-src="/front/images/1.png"
						lazy-srcset="/front/images/1.png"
						background-color="transparent"
						alt="title"
						class="image-contain"
						/>
					</figure>
				</div>
				<div class="columns is-multiline">
					<div class="column is-3">
						<h1 class="pr-2 is-size-3 has-text-white mt-1" data-aos="slide-up" data-aos-delay="300">الأهلي</h1>
						<ul class="socials mb-5 justify-content-start has-text-right d-block mt-3" data-aos="slide-up" data-aos-delay="300">
							<li class="d-inline-block">
								<a class="hvr-rectangle-out" href="#">
									<i class="fa-brands fa-facebook-f"></i>
								</a>
							</li>
							<li class="d-inline-block">
								<a class="hvr-rectangle-out" href="#">
									<i class="fa-brands fa-twitter"></i>
								</a>
							</li>
							<li class="d-inline-block">
								<a class="hvr-rectangle-out" href="#">
									<i class="fa-brands fa-youtube"></i>
								</a>
							</li>
							<li class="d-inline-block">
								<a class="hvr-rectangle-out" href="#">
									<i class="fa-brands fa-instagram"></i>
								</a>
							</li>
						</ul>
						<a href="#" class="club-link" data-aos="slide-up" data-aos-delay="300">
							<i class="has-text-gold fa-solid fa-up-right-from-square ml-1"></i>
							<span>https://alahli.qa/</span>
						</a>
					</div>
					<div class="column is-6">
						<div class="club-contact p-3 py-5 mt-6">
							<div class="columns is-multiline">
								<div class="column is-6">
									<a href="#" class="has-text-primary" data-aos="slide-up" data-aos-delay="300">
										<i class="has-text-gold fa-brands fa-whatsapp ml-1"></i>
										<span>010898738</span>
									</a>
								</div>
								<div class="column is-6">
									<a href="#" class="has-text-primary" data-aos="slide-up" data-aos-delay="300">
										<i class="has-text-gold fa-solid fa-phone-volume ml-1"></i>
										<span>0986765</span>
									</a>
								</div>
								<div class="column is-6">
									<a href="#" class="has-text-primary" data-aos="slide-up" data-aos-delay="300">
										<i class="has-text-gold fa-solid fa-location-dot ml-1"></i>
										<span>استاد القاهرة - نادى  الأهلى الرياضى</span>
									</a>
								</div>
								<div class="column is-6">
									<a href="#" class="has-text-primary" data-aos="slide-up" data-aos-delay="300">
										<i class="has-text-gold fa-solid fa-envelope-open-text ml-1"></i>
										<span>test@gmail.com</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection