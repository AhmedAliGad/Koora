<template>
	<div>
		<div v-infinite-scroll="loadNextPage" infinite-scroll-disabled="busy" infinite-scroll-distance="6">
			<div class="columns is-multiline">
				<div class="p-5 column is-4">
					<div data-aos="fade-up" data-aos-delay="300" class="card shadow-lg">
						<div class="card-image radius-15">
							<a href="#">
								<figure class="image radius-15">
									<lazy-load
									src="/front/images/spinner.svg"
									lazy-src="/front/images/1.jpg"
									lazy-srcset="/front/images/1.jpg"
									background-color="transparent"
									alt="title"
									class="image-cover radius-15"
									/>
								</figure>
								<div class="is-overlay radius-15">
									<i class="fa-solid fa-link fa-beat text-light"></i>
									<h5 class="has-text-light mt-4">عنوان معرض الصور</h5>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="p-5 column is-4">
					<div data-aos="fade-up" data-aos-delay="300" class="card shadow-lg">
						<div class="card-image radius-15">
							<a href="#">
								<figure class="image radius-15">
									<lazy-load
									src="/front/images/spinner.svg"
									lazy-src="/front/images/1.jpg"
									lazy-srcset="/front/images/1.jpg"
									background-color="transparent"
									alt="title"
									class="image-cover radius-15"
									/>
								</figure>
								<div class="is-overlay">
									<i class="fa-solid fa-link fa-beat text-light"></i>
									<h5 class="has-text-light mt-4">عنوان معرض الصور</h5>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="p-5 column is-4">
					<div data-aos="fade-up" data-aos-delay="300" class="card shadow-lg">
						<div class="card-image radius-15">
							<a href="#">
								<figure class="image radius-15">
									<lazy-load
									src="/front/images/spinner.svg"
									lazy-src="/front/images/1.jpg"
									lazy-srcset="/front/images/1.jpg"
									background-color="transparent"
									alt="title"
									class="image-cover radius-15"
									/>
								</figure>
								<div class="is-overlay radius-15">
									<i class="fa-solid fa-link fa-beat text-light"></i>
									<h5 class="has-text-light mt-4">عنوان معرض الصور</h5>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="p-5 column is-4">
					<div data-aos="fade-up" data-aos-delay="300" class="card shadow-lg">
						<div class="card-image radius-15">
							<a href="#">
								<figure class="image radius-15">
									<lazy-load
									src="/front/images/spinner.svg"
									lazy-src="/front/images/1.jpg"
									lazy-srcset="/front/images/1.jpg"
									background-color="transparent"
									alt="title"
									class="image-cover radius-15"
									/>
								</figure>
								<div class="is-overlay radius-15">
									<i class="fa-solid fa-link fa-beat text-light"></i>
									<h5 class="has-text-light mt-4">عنوان معرض الصور</h5>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="p-5 column is-4">
					<div data-aos="fade-up" data-aos-delay="300" class="card shadow-lg">
						<div class="card-image radius-15">
							<a href="#">
								<figure class="image radius-15">
									<lazy-load
									src="/front/images/spinner.svg"
									lazy-src="/front/images/1.jpg"
									lazy-srcset="/front/images/1.jpg"
									background-color="transparent"
									alt="title"
									class="image-cover radius-15"
									/>
								</figure>
								<div class="is-overlay radius-15">
									<i class="fa-solid fa-link fa-beat text-light"></i>
									<h5 class="has-text-light mt-4">عنوان معرض الصور</h5>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="p-5 column is-4">
					<div data-aos="fade-up" data-aos-delay="300" class="card shadow-lg">
						<div class="card-image radius-15">
							<a href="#">
								<figure class="image radius-15">
									<lazy-load
									src="/front/images/spinner.svg"
									lazy-src="/front/images/1.jpg"
									lazy-srcset="/front/images/1.jpg"
									background-color="transparent"
									alt="title"
									class="image-cover radius-15"
									/>
								</figure>
								<div class="is-overlay radius-15">
									<i class="fa-solid fa-link fa-beat text-light"></i>
									<h5 class="has-text-light mt-4">عنوان معرض الصور</h5>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="has-text-centered mt-6" v-show="loadMore">
			<a rel="noreferrer" class="news-loader" href="">
				<img src="/front/images/loader.svg" alt="">
			</a>
		</div>
	</div>

</template>
<script>
	import axios from 'axios';
	import infiniteScroll from 'vue-infinite-scroll';
	import LazyLoad from '../GeneralComponents/LazyLoad';
	export default {
		name: 'Gallery',
		components: {
			LazyLoad ,
		},
		directives: {
			infiniteScroll
		},
		props: {
			data: {
				type: Array,
				default: () => []
			},
			url: String,
		},
		computed: {
			busy() {
				return this.fetching
			}
		},
		mounted() {
		},
		data: () => ({
			items: [],
			order : [],
			currentPage: 0,
			fetching: false,
			nextUrl : String,
			loadMore : true,
			isActive: false
		}),
		methods: {
			loadNextPage() {
				this.currentPage++;
				this.fetching = true;
				if(this.nextUrl != null){
					axios.get(this.nextUrl).then(({ data }) => {
						this.items.push(...data.data);
						if(data.links.next != null) {
							this.nextUrl = data.links.next;
						} else {
							this.nextUrl = data.links.next;
						}
						this.fetching = false;
					});
				}
				else{
					this.loadMore = false;
				}
			}
		},
		created() {
			this.nextUrl = this.url;
			this.items = [];
			this.loadNextPage();
		}
	};
</script>
