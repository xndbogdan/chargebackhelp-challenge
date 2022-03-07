<template>
	<main class="mt-16">
    <form class="mt-8 space-y-6" action="#" @submit.prevent="handleBookCreation">
        <div>
          <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
          <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Add a book</h2>
        </div>
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="name" class="sr-only">Title</label>
            <input v-model="bookData.title" id="title" name="name" type="text" required :class="errors && errors['title'] ? 'rounded-md' : 'rounded-none'" class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Title">
            <p class="my-2 text-red-600 text-sm" v-if="errors && errors['title']">{{ errors['title'][0] }}</p>
          </div>
          <div>
            <label for="name" class="sr-only">Author</label>
            <input v-model="bookData.author" id="author" name="author" type="text" required :class="errors && errors['author'] ? 'rounded-md' : 'rounded-none'" class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Author">
            <p class="my-2 text-red-600 text-sm" v-if="errors && errors['author']">{{ errors['author'][0] }}</p>
          </div>
          <div>
            <Datepicker v-model="bookData.release_date" :enableTimePicker="false" placeholder="Release date"></Datepicker>
            <p class="my-2 text-red-600 text-sm" v-if="errors && errors['release_date']">{{ errors['release_date'][0] }}</p>
          </div>
        </div>

        <div>
          <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <!-- Heroicon name: solid/lock-closed -->
              <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
              </svg>
            </span>
            Create
          </button>
        </div>
      </form>
	</main>
</template>

<script>
import { mapGetters, mapActions} from 'vuex';
import Datepicker from 'vue3-date-time-picker';
import 'vue3-date-time-picker/dist/main.css'
export default {
	name: 'booksCreate',
	data () {
		return {
      bookData: {
        title: '',
        author: '',
        release_date: '',
        profile_id: null,
      },
      errors: null,
		}
	},
  components: {
    Datepicker
  },
	methods: {
    ...mapActions([
      'setProfile', 'setUser'
    ]),
    handleBookCreation() {
      this.axios.post('/api/books', this.bookData)
        .then(response => {
          this.$router.push({name: 'books.show', params: {id: response.data.id}});
        }).catch(error => {
          this.errors = error.response.data.errors;
        });
    },
	},
  computed: {
    ...mapGetters(['getUser', 'getProfile'])
  },
  created() {
    this.bookData.profile_id = this.getProfile.id;
  },
};
</script>