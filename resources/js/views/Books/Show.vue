<template>
	<main class="mt-16">
    <div class="bg-white">
			<div class="max-w-2xl mx-auto py-16 sm:py-24 lg:max-w-7xl lg:grid lg:grid-cols-2 lg:gap-x-8">
				<!-- Product details -->
				<div class="lg:max-w-lg lg:self-end" v-if="book">
					<h1 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{ book.title }}</h1>
					<h5 class="text-base text-gray-600 font-bold">By {{ book.author }} </h5>
					<p class="text-sm text-gray-500">Released on {{ book.release_date }}</p>
					<section aria-labelledby="information-heading" class="mt-4">
						<h2 id="information-heading" class="sr-only">Product information</h2>

						<div class="flex items-center">

							<div class="pl-4border-gray-300">
								<h2 class="sr-only">Reviews</h2>
								<div class="flex items-center">
									<div>
										<div class="flex items-center">
											<!--
												Heroicon name: solid/star

												Active: "text-yellow-400", Default: "text-gray-300"
											-->
											<svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
												<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
											</svg>

											<!-- Heroicon name: solid/star -->
											<svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
												<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
											</svg>

											<!-- Heroicon name: solid/star -->
											<svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
												<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
											</svg>

											<!-- Heroicon name: solid/star -->
											<svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
												<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
											</svg>

											<!-- Heroicon name: solid/star -->
											<svg class="text-gray-300 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
												<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
											</svg>
										</div>
										<p class="sr-only">4 out of 5 stars</p>
									</div>
									<p class="ml-2 text-sm text-gray-500">1624 reviews</p>
								</div>
							</div>
						</div>

						<div class="mt-4 space-y-6">
							<p class="text-base text-gray-500">{{ makeBacon(100) }}</p>
						</div>

						<div class="mt-6 flex items-center">
							<!-- Heroicon name: solid/check -->
							<svg class="flex-shrink-0 w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
								<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
							</svg>
							<p class="ml-2 text-sm text-gray-500">Ready to download</p>
						</div>
					</section>
				</div>

				<!-- Product image -->
				<div class="mt-10 lg:mt-0 lg:col-start-2 lg:row-span-2 lg:self-center">
					<div class="aspect-w-1 aspect-h-1 rounded-lg overflow-hidden">
						<img src="https://picsum.photos/600" alt="Model wearing light green backpack with black canvas straps and front zipper pouch." class="w-full h-full object-center object-cover">
					</div>
				</div>

				<!-- Product form -->
				<div class="mt-10 lg:max-w-lg lg:col-start-1 lg:row-start-2 lg:self-start">
					<section aria-labelledby="options-heading">
						<h2 id="options-heading" class="sr-only">Product options</h2>
						<form>
							<div class="mt-10">
								<button @click="rickroll" type="button" class="w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Download</button>
							</div>
							<div class="mt-6 text-center">
								<a href="#" class="group inline-flex text-base font-medium">
									<!-- Heroicon name: outline/shield-check -->
									<svg class="flex-shrink-0 mr-2 h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
									</svg>
									<span class="text-gray-500 hover:text-gray-700">Lifetime Guarantee</span>
								</a>
							</div>
						</form>
					</section>
				</div>
			</div>
		</div>
	</main>
</template>

<script>
import { mapGetters, mapActions} from 'vuex';
import bacon from 'baconipsum'
export default {
	name: 'booksShow',
	data () {
		return {
			book: null,
		}
	},
	props: {
		id: {
			type: String,
			required: true,
		},
	},
	methods: {
		rickroll() {
			window.open("https://www.youtube.com/watch?v=dQw4w9WgXcQ");
		},
		getBook() {
			this.axios.get('/api/books/' + this.id , { params: {
			}})
			.then((response) => {
				this.book = response.data;
			}).catch((error) => {
				this.$toast.error('Login failed');
			});
		},
		makeId(length) {
      let result = '';
      const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
      let charactersLength = characters.length;
      for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
      }
      return result;
    },
		makeBacon(size) {
			return bacon(size);
		},
	},
  computed: {
    ...mapGetters(['getProfile']),
  },
	mounted() {
		this.getBook()
	},
	created() {
	},
};
</script>