@extends('front.layouts.app')
@section('page.title', 'من نحن')
<!--hero text--->
@section('hero-text')
@endsection
<!--content-->
@section('content')
<!-----inner header---->
<section class="hero inner-header mt-78">
	<div class="section-padding position-relative club-section">
		<div class="container has-text-centered">
			<h1 class="pr-2 mt-6 is-size-3 has-bottom-border has-text-secondary has-text-centered d-inline-block mx-auto" data-aos="zoom-in" data-aos-delay="300">من نحن</h1>
		</div>
	</div>
</section>
<section class="section-padding about-page has-background-grey-lighter">
	<div class="container">
		<div class="card box-shadow p-6">
			<div class="columns is-multiline">
				<div class="column is-6">
					<div class="card-image position-relative radius-15 box-shadow">
						<figure class="image radius-15">
							<lazy-load
							src="/front/images/spinner.svg"
							lazy-src="/front/images/slide1.jpeg"
							lazy-srcset="/front/images/slide1.jpeg"
							background-color="transparent"
							alt="title"
							class="image-cover radius-15"
							/>
						</figure>
					</div>
				</div>
				<div class="column is-6">
					<div class="description has-text-primary has-text-justified pr-4">
						<p>نجح فريق سيدات سلة الأهلى في تحقيق العلامة الكاملة في البطولات التي تم خوضها خلال الموسم، حيث لم يخسر أى مباراة فى أى بطولة، بجانب التتويج بكل الألقاب ببطولات السيدات.

							واستحقت لاعبات سلة الأهلى لقب "نينجا" في البطولات، بعد أن توجن بلقب البطولات الخمسة التي تم خوضهن خلال الموسم، ليكون موسما استثنائيا لسيدات المارد الأحمر.

							وحققت لاعبات سلة الأهلى سيدات 5 بطولات خلال الموسم كالتالى:

							بطولة دورى المرتبط ، كأس مصر ، كأس السوبر ، بالإضافة إلى لقب دورى السوبر بجانب بطولة منطقة القاهرة.

							توج فريق كرة سلة الأهلى سيدات ببطولة دورى مرتبط كرة السلة بعد التغلب على سبورتنج بنتيجة 77/45 فى نهائى البطولة.

						وتوج بدوري السوبر، بعد الفوز على الجزيرة بنتيجة 81-53، في المباراة التي جمعت الفريقين على صالة الشباب والرياضة بمدينة 6 أكتوبر طولة دورى المرتبط ، كأس مصر ، كأس السوبر ، بالإضافة إلى لقب دورى السوبر بجانب بطولة منطقة القاهرة.

							توج فريق كرة سلة الأهلى سيدات ببطولة دورى مرتبط كرة السلة بعد التغلب على سبورتنج بنتيجة 77/45 فى نهائى البطولة.

						وتوج بدوري السوبر، بعد الفوز على الجزيرة بنتيجة 81-53، في المباراة التي جمعت الفريقين على صالة الشباب والرياضة بمدينة 6 أكتوبر..</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection