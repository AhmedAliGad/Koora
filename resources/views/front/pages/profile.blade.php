@extends('front.layouts.app')
@section('page.title', 'البروفايل')
<!--hero text--->
@section('hero-text')
@endsection
<!--content-->
@section('content')
<!-----inner header---->
<section class="hero inner-header mt-78">
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
						<h1 class="pr-2 is-size-3 has-text-secondary mt-1" data-aos="zoom-in" data-aos-delay="300">الأهلي</h1>
						<ul class="socials mb-5 justify-content-start has-text-right d-block mt-3" data-aos="zoom-in" data-aos-delay="300">
							<li class="d-inline-block">
								<a class="hvr-rectangle-out" href="#">
									<i class="fa-fade fa-brands fa-facebook-f"></i>
								</a>
							</li>
							<li class="d-inline-block">
								<a class="hvr-rectangle-out" href="#">
									<i class="fa-fade fa-brands fa-twitter"></i>
								</a>
							</li>
							<li class="d-inline-block">
								<a class="hvr-rectangle-out" href="#">
									<i class="fa-fade fa-brands fa-youtube"></i>
								</a>
							</li>
							<li class="d-inline-block">
								<a class="hvr-rectangle-out" href="#">
									<i class="fa-fade fa-brands fa-instagram"></i>
								</a>
							</li>
						</ul>
						<a href="#" class="club-link" data-aos="zoom-in" data-aos-delay="300">
							<i class="has-text-gold fa-solid fa-up-right-from-square ml-1"></i>
							<span>https://alahli.qa/</span>
						</a>
					</div>
					<div class="column is-6">
						<div class="club-contact p-3 py-5 mt-6 radius-15">
							<div class="columns is-multiline">
								<div class="column is-6">
									<a href="#" class="has-text-light" data-aos="zoom-in" data-aos-delay="300">
										<i class="fa-shake has-text-gold fa-brands fa-whatsapp ml-1"></i>
										<span>010898738</span>
									</a>
								</div>
								<div class="column is-6">
									<a href="#" class="has-text-light" data-aos="zoom-in" data-aos-delay="300">
										<i class="fa-shake has-text-gold fa-solid fa-phone-volume ml-1"></i>
										<span>0986765</span>
									</a>
								</div>
								<div class="column is-6">
									<a href="#" class="has-text-light" data-aos="zoom-in" data-aos-delay="300">
										<i class="fa-shake has-text-gold fa-solid fa-location-dot ml-1"></i>
										<span>استاد القاهرة - نادى  الأهلى الرياضى</span>
									</a>
								</div>
								<div class="column is-6">
									<a href="#" class="has-text-light" data-aos="zoom-in" data-aos-delay="300">
										<i class="fa-shake has-text-gold fa-solid fa-envelope-open-text ml-1"></i>
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

<!-----Tabs----->
<section class="section-padding media-section has-text-centered has-background-grey-lighter">
	<div class="container">
		<tabs animation="slide" :only-fade="false">
			<!----News tab ---->
			<tab-pane label="الأخبار">
				<div class="show_all">
					<a href="#" class="has-text-gold has-text-weight-bold">
						المزيد من  الأخبار
						<i class="fa-solid fa-circle-arrow-left has-text-secondary mr-1"></i>
					</a>
				</div>
				<div class="columns is-multiline">
					<div class="column is-3">
						<div class="card shadow-lg">
							<div class="card-image">
								<a href="#">
									<figure class="image">
										<lazy-load
										src="/front/images/spinner.svg"
										lazy-src="/front/images/1.jpg"
										lazy-srcset="/front/images/1.jpg"
										background-color="transparent"
										alt="title"
										class="image-cover"
										/>
									</figure>
								</a>
							</div>
							<div class="card-content">
								<div class="content has-text-grey-light">
									<a href="#">
										<h5>Dummy Text</h5>
									</a>
									<p class="has-text-grey-dark">Lorem ipsum leo risus, porta ac consectetur ac, vestibulum at eros. Donec id elit non miy</p>
									<a href="#" class="has-text-secondary has-text-left has-text-weight-bold">إقرأ المزيد  <i class="fa-regular fa-arrow-left has-text-gold mr-1"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="column is-3">
						<div class="card shadow-lg">
							<div class="card-image">
								<a href="#">
									<figure class="image">
										<lazy-load
										src="/front/images/spinner.svg"
										lazy-src="/front/images/2.jpg"
										lazy-srcset="/front/images/2.jpg"
										background-color="transparent"
										alt="title"
										class="image-cover"
										/>
									</figure>
								</a>
							</div>
							<div class="card-content">
								<div class="content has-text-grey-light">
									<a href="#">
										<h5>Dummy Text</h5>
									</a>
									<p class="has-text-grey-dark">Lorem ipsum leo risus, porta ac consectetur ac, vestibulum at eros. Donec id elit non miy</p>
									<a href="#" class="has-text-secondary has-text-left has-text-weight-bold">إقرأ المزيد  <i class="fa-regular fa-arrow-left has-text-gold mr-1"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="column is-3">
						<div class="card shadow-lg">
							<div class="card-image">
								<a href="#">
									<figure class="image">
										<lazy-load
										src="/front/images/spinner.svg"
										lazy-src="/front/images/1.jpg"
										lazy-srcset="/front/images/1.jpg"
										background-color="transparent"
										alt="title"
										class="image-cover"
										/>
									</figure>
								</a>
							</div>
							<div class="card-content">
								<div class="content has-text-grey-light">
									<a href="#">
										<h5>Dummy Text</h5>
									</a>
									<p class="has-text-grey-dark">Lorem ipsum leo risus, porta ac consectetur ac, vestibulum at eros. Donec id elit non miy</p>
									<a href="#" class="has-text-secondary has-text-left has-text-weight-bold">إقرأ المزيد  <i class="fa-regular fa-arrow-left has-text-gold mr-1"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="column is-3">
						<div class="card shadow-lg">
							<div class="card-image">
								<a href="#">
									<figure class="image">
										<lazy-load
										src="/front/images/spinner.svg"
										lazy-src="/front/images/2.jpg"
										lazy-srcset="/front/images/2.jpg"
										background-color="transparent"
										alt="title"
										class="image-cover"
										/>
									</figure>
								</a>
							</div>
							<div class="card-content">
								<div class="content has-text-grey-light">
									<a href="#">
										<h5>Dummy Text</h5>
									</a>
									<p class="has-text-grey-dark">Lorem ipsum leo risus, porta ac consectetur ac, vestibulum at eros. Donec id elit non miy</p>
									<a href="#" class="has-text-secondary has-text-left has-text-weight-bold">إقرأ المزيد  <i class="fa-regular fa-arrow-left has-text-gold mr-1"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="column is-3">
						<div class="card shadow-lg">
							<div class="card-image">
								<a href="#">
									<figure class="image">
										<lazy-load
										src="/front/images/spinner.svg"
										lazy-src="/front/images/1.jpg"
										lazy-srcset="/front/images/1.jpg"
										background-color="transparent"
										alt="title"
										class="image-cover"
										/>
									</figure>
								</a>
							</div>
							<div class="card-content">
								<div class="content has-text-grey-light">
									<a href="#">
										<h5>Dummy Text</h5>
									</a>
									<p class="has-text-grey-dark">Lorem ipsum leo risus, porta ac consectetur ac, vestibulum at eros. Donec id elit non miy</p>
									<a href="#" class="has-text-secondary has-text-left has-text-weight-bold">إقرأ المزيد  <i class="fa-regular fa-arrow-left has-text-gold mr-1"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="column is-3">
						<div class="card shadow-lg">
							<div class="card-image">
								<a href="#">
									<figure class="image">
										<lazy-load
										src="/front/images/spinner.svg"
										lazy-src="/front/images/2.jpg"
										lazy-srcset="/front/images/2.jpg"
										background-color="transparent"
										alt="title"
										class="image-cover"
										/>
									</figure>
								</a>
							</div>
							<div class="card-content">
								<div class="content has-text-grey-light">
									<a href="#">
										<h5>Dummy Text</h5>
									</a>
									<p class="has-text-grey-dark">Lorem ipsum leo risus, porta ac consectetur ac, vestibulum at eros. Donec id elit non miy</p>
									<a href="#" class="has-text-secondary has-text-left has-text-weight-bold">إقرأ المزيد  <i class="fa-regular fa-arrow-left has-text-gold mr-1"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="column is-3">
						<div class="card shadow-lg">
							<div class="card-image">
								<a href="#">
									<figure class="image">
										<lazy-load
										src="/front/images/spinner.svg"
										lazy-src="/front/images/1.jpg"
										lazy-srcset="/front/images/1.jpg"
										background-color="transparent"
										alt="title"
										class="image-cover"
										/>
									</figure>
								</a>
							</div>
							<div class="card-content">
								<div class="content has-text-grey-light">
									<a href="#">
										<h5>Dummy Text</h5>
									</a>
									<p class="has-text-grey-dark">Lorem ipsum leo risus, porta ac consectetur ac, vestibulum at eros. Donec id elit non miy</p>
									<a href="#" class="has-text-secondary has-text-left has-text-weight-bold">إقرأ المزيد  <i class="fa-regular fa-arrow-left has-text-gold mr-1"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="column is-3">
						<div class="card shadow-lg">
							<div class="card-image">
								<a href="#">
									<figure class="image">
										<lazy-load
										src="/front/images/spinner.svg"
										lazy-src="/front/images/2.jpg"
										lazy-srcset="/front/images/2.jpg"
										background-color="transparent"
										alt="title"
										class="image-cover"
										/>
									</figure>
								</a>
							</div>
							<div class="card-content">
								<div class="content has-text-grey-light">
									<a href="#">
										<h5>Dummy Text</h5>
									</a>
									<p class="has-text-grey-dark">Lorem ipsum leo risus, porta ac consectetur ac, vestibulum at eros. Donec id elit non miy</p>
									<a href="#" class="has-text-secondary has-text-left has-text-weight-bold">إقرأ المزيد  <i class="fa-regular fa-arrow-left has-text-gold mr-1"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</tab-pane>
			<!----Gallery tab ---->
			<tab-pane label="النادى">
				<div class="columns is-multiline">
					<div class="column is-3">
						<figure class="image card club-img has-text-centered p-4">
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
					<div class="column is-9 has-text-right">
						<div class="p-4">
							<p class="mb-3">
								<i class="fa-beat fa-regular fa-flag ml-2 has-text-gold"></i>
								<span class="has-text-primary has-text-weight-bold">سنة التأسيس: 1950</span>
							</p>
							<p class="mb-3">

								<i class="fa-beat fa-regular fa-user ml-2 has-text-gold"></i>
								<span class="has-text-primary has-text-weight-bold">الرئيس: السيد/ عبد الله يوسف الملا</span>
							</p>
							<p class="mb-3">
								<i class="fa-beat fa-solid fa-monument ml-2 has-text-gold"></i>

								<span class="has-text-primary has-text-weight-bold">اللقب: العميد</span>
							</p>
							<div class="columns is-multiline mt-3">
								<div class="column is-11">
									<h4 class="has-text-secondary mt-2">التاريخ</h4>
								</div>
							</div>
							<div class="mt-4 has-text-primary has-text-justified">
								<p>يعتبر النادي الأهلي واحداً من أعرق الأندية القطرية وأقدمها على الإطلاق، حيث تأسس في العام 1950 تحت مسمى نادي النجاح الرياضي.</p>
								<p>في عام 1964 تم الترخيص لأعضاء الهيئة التأسيسية رسميا بتأسيس ناد باسم (نادي النجاح الرياضي) وفي عام 1972م أصدرت إدارة رعاية الشباب قرارا بدمج الأندية، فاتفقت إداراتي نادي النجاح والنادي الأهلي أو ما كان يسمى قديما بـ "فريق الناشئين" التابع لوزارة التربية والتعليم في تلك الآونة قبل الدمج، وتم اختيار شعار نادي النجاح وهو اللونين الأخضر والأبيض واسم النادي الأهلي الرياضي.</p>
							</div>
						</div>
					</div>

				</div>
			</tab-pane>
		</tabs>
	</div>
</section>
@endsection
