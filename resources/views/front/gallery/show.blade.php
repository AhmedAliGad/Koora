@extends('front.layouts.app')
@section('page.title', 'معرض الصور')
<!--hero text--->
@section('hero-text')
@endsection
<!--content-->
@section('content')
<!-----inner header---->
<section class="hero inner-header mt-78">
	<div class="section-padding position-relative club-section">
		<div class="container has-text-centered">
			<a href="{{ route('gallery') }}">
				<h1 class="pr-2 mt-6 is-size-3 has-bottom-border has-text-secondary has-text-centered d-inline-block mx-auto" data-aos="zoom-in" data-aos-delay="300">معرض الصور</h1>
			</a>
		</div>
	</div>
</section>
<!-----Gallery Section-------->
<section class="gallery-page section-padding has-text-centered has-background-grey-lighter">
	<div class="container">
		<div class="card box-shadow p-4">
			<a href="{{ route('gallery') }}">
				<h4 data-aos="zoom-in" data-aos-delay="300" class="has-text-gold mb-5">
					<i class="fa-solid fa-camera-retro has-text-secondary is-size-5 ml-2"></i>
					5 ألقاب.. سيدات سلة الأهلى يحققن "العلامة الكاملة" ويحصدن كل البطولات
				</h4>
			</a>
			<div class="columns is-multiline is-centered" dir="ltr">
				<div class="column is-9">
					<slick class="gallery-slider" ref="slick"  :options="{ slidesToShow: 1, slidesToScroll: 1, dots:false, arrows: true, asNavFor: '.gallery-nav', swipe: true  , loop: true, infinite: true, autoplay: true,
					responsive: [
					{
						breakpoint: 520,
						settings: {
						arrows: false,
					}
				},
				]


			}">
			<div class="item box-shadow radius-15">
				<figure class="w-100 full-height image position-relative">
					<img src="/front/images/1.jpg" class="box-shadow radius-15" ss="image-cover radius-15"alt="">
				</figure>

			</div>
			<div class="item box-shadow radius-15">

				<figure class="box-shadow radius-15 w-100 full-height image position-relative">
					<img src="/front/images/2.jpg" class="image-cover radius-15"alt="">
				</figure>

			</div>
			<div class="item box-shadow radius-15">

				<figure class="box-shadow radius-15 w-100 full-height image position-relative">
					<img src="/front/images/1.jpg" class="image-cover radius-15"alt="">
				</figure>

			</div>
			<div class="item box-shadow radius-15">

				<figure class="box-shadow radius-15 w-100 full-height image position-relative">
					<img src="/front/images/2.jpg" class="image-cover radius-15"alt="">
				</figure>

			</div>
			<div class="item box-shadow radius-15">

				<figure class="box-shadow radius-15 w-100 full-height image position-relative">
					<img src="/front/images/1.jpg" class="image-cover radius-15"alt="">
				</figure>

			</div>
			<div class="item box-shadow radius-15">

				<figure class="box-shadow radius-15 w-100 full-height image position-relative">
					<img src="/front/images/2.jpg" class="image-cover radius-15"alt="">
				</figure>

			</div>
			<div class="item box-shadow radius-15">

				<figure class="box-shadow radius-15 w-100 full-height image position-relative">
					<img src="/front/images/1.jpg" class="image-cover radius-15"alt="">
				</figure>

			</div>
			<div class="item box-shadow radius-15">

				<figure class="box-shadow radius-15 w-100 full-height image position-relative">
					<img src="/front/images/2.jpg" class="image-cover radius-15"alt="">
				</figure>

			</div>
		</slick>
	</div>
	<div class="column is-12" dir="ltr">
		<slick class="gallery-nav" ref="slick"  :options="{ slidesToShow: 9, slidesToScroll: 1, asNavFor: '.gallery-slider', vertical: false, infinite: false , loop: false, dots: false, arrows: false, focusOnSelect: true , swipe: true , autoplay: true,
		responsive: [
		{
			breakpoint: 480,
			settings: {
			slidesToShow: 3
		}
	},
	{
		breakpoint: 375,
		settings: {
		slidesToShow: 2
	}
},
]
}">
<div class="item box-shadow radius-15">
	<figure class="w-100 full-height image position-relative">
		<img src="/front/images/1.jpg" class="box-shadow radius-15" ss="image-cover radius-15"alt="">
	</figure>
</div>
<div class="item box-shadow radius-15">
	
	<figure class="box-shadow radius-15 w-100 full-height image position-relative">
		<img src="/front/images/2.jpg" class="image-cover radius-15"alt="">
	</figure>

</div>
<div class="item box-shadow radius-15">
	<figure class="box-shadow radius-15 w-100 full-height image position-relative">
		<img src="/front/images/1.jpg" class="image-cover radius-15"alt="">
	</figure>
</div>
<div class="item box-shadow radius-15">
	<figure class="box-shadow radius-15 w-100 full-height image position-relative">
		<img src="/front/images/2.jpg" class="image-cover radius-15"alt="">
	</figure>
</div>
<div class="item box-shadow radius-15">
	<figure class="box-shadow radius-15 w-100 full-height image position-relative">
		<img src="/front/images/1.jpg" class="image-cover radius-15"alt="">
	</figure>
</div>
<div class="item box-shadow radius-15">
	<figure class="box-shadow radius-15 w-100 full-height image position-relative">
		<img src="/front/images/2.jpg" class="image-cover radius-15"alt="">
	</figure>
</div>
<div class="item box-shadow radius-15">
	<figure class="box-shadow radius-15 w-100 full-height image position-relative">
		<img src="/front/images/1.jpg" class="image-cover radius-15"alt="">
	</figure>
</div>
<div class="item box-shadow radius-15">
	<figure class="box-shadow radius-15 w-100 full-height image position-relative">
		<img src="/front/images/2.jpg" class="image-cover radius-15"alt="">
	</figure>
</div>
</slick>
</div>
</div>

			{{-- <div dir="ltr" id="lightgallery">
				<div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
					<a href="/front/images/1.jpg" class="lightselect" data-sub-html=".caption">
						<figure class="image">
							<img src="/front/images/1.jpg" class="image-cover"alt="">
						</figure>
						<div class="caption" style="display: none;">
							<h4>عنوان معرض الصور</h4>

						</div>
						<i class="fa-solid show-icon fa-eye fa-beat text-light"></i>
					</a>
				</div>
				<div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
					<a href="/front/images/img4.jpeg" class="lightselect" data-sub-html=".caption">
						<figure class="image">
							<img src="/front/images/img1.jpeg" alt="" class="image-cover">
						</figure>
						<div class="caption" style="display: none;">
							<h4>عنوان معرض الصور</h4>

						</div>
						<i class="fa-solid show-icon fa-eye fa-beat text-light"></i>
					</a>
				</div>
				<div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
					<a href="/front/images/img2.jpeg" class="lightselect" data-sub-html=".caption">
						<figure class="image">
							<img src="/front/images/img2.jpeg" class="image-cover"alt="">
						</figure>
						<div class="caption" style="display: none;">
							<h4>عنوان معرض الصور</h4>

						</div>
						<i class="fa-solid show-icon fa-eye fa-beat text-light"></i>
					</a>
				</div>
				<div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
					<a href="/front/images/img4.jpeg" class="lightselect" data-sub-html=".caption">
						<figure class="image">
							<img src="/front/images/img1.jpeg" alt="" class="image-cover">
						</figure>
						<div class="caption" style="display: none;">
							<h4>عنوان معرض الصور</h4>

						</div>
						<i class="fa-solid show-icon fa-eye fa-beat text-light"></i>
					</a>
				</div>
				<div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
					<a href="/front/images/img2.jpeg" class="lightselect" data-sub-html=".caption">
						<figure class="image">
							<img src="/front/images/img2.jpeg" class="image-cover"alt="">
						</figure>
						<div class="caption" style="display: none;">
							<h4>عنوان معرض الصور</h4>

						</div>
						<i class="fa-solid show-icon fa-eye fa-beat text-light"></i>
					</a>
				</div>
				<div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
					<a href="/front/images/img4.jpeg" class="lightselect" data-sub-html=".caption">
						<figure class="image">
							<img src="/front/images/img1.jpeg" alt="" class="image-cover">
						</figure>
						<div class="caption" style="display: none;">
							<h4>عنوان معرض الصور</h4>

						</div>
						<i class="fa-solid show-icon fa-eye fa-beat text-light"></i>
					</a>
				</div>
				<div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
					<a href="/front/images/1.jpg" class="lightselect" data-sub-html=".caption">
						<figure class="image">
							<img src="/front/images/1.jpg" class="image-cover"alt="">
						</figure>
						<div class="caption" style="display: none;">
							<h4>عنوان معرض الصور</h4>

						</div>
						<i class="fa-solid show-icon fa-eye fa-beat text-light"></i>
					</a>
				</div>
				<div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
					<a href="/front/images/img4.jpeg" class="lightselect" data-sub-html=".caption">
						<figure class="image">
							<img src="/front/images/img1.jpeg" alt="" class="image-cover">
						</figure>
						<div class="caption" style="display: none;">
							<h4>عنوان معرض الصور</h4>

						</div>
						<i class="fa-solid show-icon fa-eye fa-beat text-light"></i>
					</a>
				</div>
				<div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
					<a href="/front/images/img2.jpeg" class="lightselect" data-sub-html=".caption">
						<figure class="image">
							<img src="/front/images/img2.jpeg" class="image-cover"alt="">
						</figure>
						<div class="caption" style="display: none;">
							<h4>عنوان معرض الصور</h4>

						</div>
						<i class="fa-solid show-icon fa-eye fa-beat text-light"></i>
					</a>
				</div>
				<div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
					<a href="/front/images/img4.jpeg" class="lightselect" data-sub-html=".caption">
						<figure class="image">
							<img src="/front/images/img1.jpeg" alt="" class="image-cover">
						</figure>
						<div class="caption" style="display: none;">
							<h4>عنوان معرض الصور</h4>

						</div>
						<i class="fa-solid show-icon fa-eye fa-beat text-light"></i>
					</a>
				</div>
				<div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
					<a href="/front/images/img2.jpeg" class="lightselect" data-sub-html=".caption">
						<figure class="image">
							<img src="/front/images/img2.jpeg" class="image-cover"alt="">
						</figure>
						<div class="caption" style="display: none;">
							<h4>عنوان معرض الصور</h4>

						</div>
						<i class="fa-solid show-icon fa-eye fa-beat text-light"></i>
					</a>
				</div>
				<div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
					<a href="/front/images/img3.jpeg" class="lightselect" data-sub-html=".caption">
						<figure class="image">
							<img src="/front/images/img3.jpeg" class="image-cover"alt="">
						</figure>
						<div class="caption" style="display: none;">
							<h4>عنوان معرض الصور</h4>

						</div>
						<i class="fa-solid show-icon fa-eye fa-beat text-light"></i>
					</a>
				</div>
				<div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
					<a href="/front/images/img4.jpeg" class="lightselect" data-sub-html=".caption">
						<figure class="image">
							<img src="/front/images/img1.jpeg" alt="" class="image-cover">
						</figure>
						<div class="caption" style="display: none;">
							<h4>عنوان معرض الصور</h4>

						</div>
						<i class="fa-solid show-icon fa-eye fa-beat text-light"></i>
					</a>
				</div>
				<div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
					<a href="/front/images/1.jpg" class="lightselect" data-sub-html=".caption">
						<figure class="image">
							<img src="/front/images/1.jpg" class="image-cover"alt="">
						</figure>
						<div class="caption" style="display: none;">
							<h4>عنوان معرض الصور</h4>

						</div>
						<i class="fa-solid show-icon fa-eye fa-beat text-light"></i>
					</a>
				</div>
				<div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
					<a href="/front/images/img4.jpeg" class="lightselect" data-sub-html=".caption">
						<figure class="image">
							<img src="/front/images/img1.jpeg" alt="" class="image-cover">
						</figure>
						<div class="caption" style="display: none;">
							<h4>عنوان معرض الصور</h4>

						</div>
						<i class="fa-solid show-icon fa-eye fa-beat text-light"></i>
					</a>
				</div>
				<div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
					<a href="/front/images/1.jpg" class="lightselect" data-sub-html=".caption">
						<figure class="image">
							<img src="/front/images/1.jpg" class="image-cover"alt="">
						</figure>
						<div class="caption" style="display: none;">
							<h4>عنوان معرض الصور</h4>

						</div>
						<i class="fa-solid show-icon fa-eye fa-beat text-light"></i>
					</a>
				</div>
				<div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
					<a href="/front/images/img4.jpeg" class="lightselect" data-sub-html=".caption">
						<figure class="image">
							<img src="/front/images/img1.jpeg" alt="" class="image-cover">
						</figure>
						<div class="caption" style="display: none;">
							<h4>عنوان معرض الصور</h4>

						</div>
						<i class="fa-solid show-icon fa-eye fa-beat text-light"></i>
					</a>
				</div>
			</div> --}}
		</div>
	</div>
</section>
@endsection