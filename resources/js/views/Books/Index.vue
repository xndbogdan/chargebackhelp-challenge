<template>
	<main class="mt-16">
    <!-- This example requires Tailwind CSS v2.0+ -->
		<div class="flex items-center justify-between mb-8">
			<div>
				<!-- This example requires Tailwind CSS v2.0+ -->
				<router-link :to="{name: 'books.create'}" type="button" class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
					<!-- Heroicon name: solid/mail -->
					<svg class="-ml-0.5 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
						<path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
					</svg>
					New book
				</router-link>
			</div>
			<div class="flex items-center">
				<span class="mr-3" id="annual-billing-label">
					<span class="text-sm font-medium text-gray-900">Only yours</span>
				</span>
				<!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
				<button @click="onlyYours = !onlyYours" type="button" :class="onlyYours ? 'bg-indigo-600' : 'bg-gray-200'" class=" relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" role="switch" aria-checked="false" aria-labelledby="annual-billing-label">
					<!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
					<span aria-hidden="true" :class="onlyYours ? 'translate-x-5' : 'translate-x-0'" class="pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
				</button>
			</div>
		</div>

		<!-- This example requires Tailwind CSS v2.0+ -->
		<div>
			<div class="flow-root mt-6" v-if="filteredBooks">
				<ul role="list" class="-my-5 divide-y divide-gray-200">
					<li class="py-4" :key="book.id" v-for="book in filteredBooks">
						<div class="flex items-center space-x-4">
							<div class="flex-shrink-0">
								<img class="h-8 w-8 rounded-full" :src="'https://picsum.photos/200?hash=' + makeId(10)" alt="">
							</div>
							<div class="flex-1 min-w-0">
								<p class="text-sm font-medium text-gray-900 truncate">{{ book.title }}</p>
								<p class="text-sm text-gray-500 truncate">By {{ book.author }}</p>
								<p class="text-sm text-gray-500">Released on {{ formatDate(book.release_date) }}</p>
							</div>
							<div>
								<router-link :to="{ name: 'books.show', params: {id: book.id} }" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50"> View </router-link>
								<span v-if="book.deletable && book.user_profile_id == getProfile.id" @click="removeBook(book)" class="cursor-pointer ml-2 inline-flex items-center shadow-sm px-2.5 py-0.5 border border-red-300 text-sm leading-5 font-medium rounded-full text-red-700 bg-red-100 hover:bg-gray-50"> Delete </span>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</main>
</template>

<script>
import { mapGetters, mapActions} from 'vuex';
export default {
	name: 'booksIndex',
	data () {
		return {
			books: null,
			onlyYours: false,
		}
	},
	methods: {
		formatDate(dateString) {
			const date = new Date(dateString);
			return new Intl.DateTimeFormat('default', {dateStyle: 'long'}).format(date);
    },
		removeBook(book) {
			this.axios.delete('/api/books/' + book.id, {
				params: { profile_id: this.getProfile.id, }
			}).then(response => {
				this.getProfileBooks();
				this.$toast.success('Book deleted');
			}).catch(error => {
				this.$toast.error('Error deleting book');
			});
		},
		getProfileBooks() {
			if(!this.getProfile) {
				this.$router.push({ name: 'profiles.index' });
				return
			}
			this.axios.get('/api/books', { params: {
				profile_id: this.getProfile.id,
			}})
			.then((response) => {
				this.books = response.data;
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
    }
	},
  computed: {
    ...mapGetters(['getProfile']),
		filteredBooks() {
			if(!this.books) {
				return
			}
			if (this.onlyYours) {
				return this.books.filter(book => book.user_profile_id === this.getProfile.id);
			}
			return this.books;
		}
  },
	mounted() {
		this.getProfileBooks()
	},
	created() {
		
	},
};
</script>