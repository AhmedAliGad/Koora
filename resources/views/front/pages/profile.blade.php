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
			<div class="columns">
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
					<h1 class="is-size-2 has-text-white mt-3" data-aos="slide-up" data-aos-delay="300">الأهلي</h1>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection