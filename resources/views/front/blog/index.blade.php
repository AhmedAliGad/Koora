@extends('front.layouts.app')
@section('page.title', 'الأخبار')
<!--hero text--->
@section('hero-text')
@endsection
<!--content-->
@section('content')
<!-----inner header---->
<section class="hero inner-header mt-78">
	<div class="section-padding position-relative club-section">
		<div class="container has-text-centered">
			<a href="{{ route('blog') }}">
				<h1 class="pr-2 mt-6 is-size-3 has-bottom-border has-text-secondary has-text-centered d-inline-block mx-auto" data-aos="zoom-in" data-aos-delay="300">الأخبار</h1>
			</a>
		</div>
	</div>
</section>
<section class="section-padding media-section has-text-centered has-background-grey-lighter">
	<div class="container">
		<news url=""></news>
	</div>
</section>
@endsection