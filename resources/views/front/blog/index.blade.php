@extends('front.layouts.app')
@section('page.title', 'الأخبار')
<!--hero text--->
@section('hero-text')
@endsection
<!--content-->
@section('content')
<!-----inner header---->
<section class="hero inner-header">
	<div class="section-padding position-relative club-section">
		<div class="container">
			<h1 class="pr-2 mt-6 is-size-3 has-text-secondary has-text-centered" data-aos="zoom-in" data-aos-delay="300">الأخبار</h1>
		</div>
	</div>
</section>
<section class="section-padding media-section has-text-centered has-background-grey-lighter">
	<div class="container">
		<news url=""></news>
	</div>
</section>
@endsection