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
			<h1 class="pr-2 mt-6 is-size-3 has-bottom-border has-text-secondary has-text-centered d-inline-block mx-auto" data-aos="zoom-in" data-aos-delay="300">المركز الإعلامى</h1>
		</div>
	</div>
</section>
<!-----Gallery Section-------->
<section class="gallery-page has-text-centered has-background-grey-lighter">
	<div class="section-padding gallery position-relative">
		<div class="container">
			<gallery url="#"></gallery>
		</div>
	</div>
</section>
@endsection