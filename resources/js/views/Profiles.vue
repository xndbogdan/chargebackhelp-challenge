<template>
	<main class="mt-16">
    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      <li @click="updateCurrentProfile(profile)" class="col-span-1 flex flex-col text-center bg-white cursor-pointer rounded-lg transition-all duration-150 shadow hover:shadow-xl divide-y divide-gray-200" :key="profile.id" v-for="profile in getUser.profiles">
        <div class="flex-1 flex flex-col p-8">
          <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
          <h3 class="mt-6 text-gray-900 text-sm font-medium">{{ profile.name }}</h3>
        </div>
      </li>

      <!-- More people... -->
    </ul>
	</main>
</template>

<script>
import { mapGetters, mapActions} from 'vuex';
export default {
	name: 'profiles',
	data () {
		return {
		}
	},
	methods: {
    ...mapActions([
      'setProfile',
    ]),
    updateCurrentProfile(profile) {
      this.setProfile(profile);
      this.$router.push({ name: 'welcome' });
    }
	},
  computed: {
    ...mapGetters(['getUser', 'isLoggedIn'])
  }
};
</script>