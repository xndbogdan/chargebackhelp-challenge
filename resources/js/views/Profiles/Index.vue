<template>
	<main class="mt-16">
    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      <li @click="updateCurrentProfile(profile)" class="col-span-1 flex flex-col text-center bg-white cursor-pointer rounded-lg transition-all duration-150 shadow hover:shadow-xl divide-y divide-gray-200" :key="profile.id" v-for="profile in getUser.profiles">
        <div class="flex-1 flex flex-col p-8">
          <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full" :src="'https://picsum.photos/200?hash=' + makeId(10) " alt="">
          <h3 class="mt-6 text-gray-900 text-sm font-medium">{{ profile.name }}</h3>
        </div>
      </li>
      <!-- More people... -->
    </ul>
    <div @click="navigateToNewProfile" class="flex justify-center items-center mt-8 cursor-pointer">
      <svg class="h8 w-8 text-gray-600" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512">
        <g>
          <g>
            <path d="M256,11C120.9,11,11,120.9,11,256s109.9,245,245,245s245-109.9,245-245S391.1,11,256,11z M256,460.2    c-112.6,0-204.2-91.6-204.2-204.2S143.4,51.8,256,51.8S460.2,143.4,460.2,256S368.6,460.2,256,460.2z"/>
            <path d="m357.6,235.6h-81.2v-81.2c0-11.3-9.1-20.4-20.4-20.4-11.3,0-20.4,9.1-20.4,20.4v81.2h-81.2c-11.3,0-20.4,9.1-20.4,20.4s9.1,20.4 20.4,20.4h81.2v81.2c0,11.3 9.1,20.4 20.4,20.4 11.3,0 20.4-9.1 20.4-20.4v-81.2h81.2c11.3,0 20.4-9.1 20.4-20.4s-9.1-20.4-20.4-20.4z"/>
          </g>
        </g>
      </svg>
      <span class="ml-2">Add new profile</span>
    </div>
	</main>
</template>

<script>
import { mapGetters, mapActions} from 'vuex';
export default {
	name: 'profilesIndex',
	data () {
		return {
		}
	},
	methods: {
    ...mapActions([
      'setProfile',
    ]),
    navigateToNewProfile() {
      this.$router.push({ name: 'profiles.create' });
    },
    updateCurrentProfile(profile) {
      this.setProfile(profile);
      this.$router.push({ name: 'welcome' });
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
    ...mapGetters(['getUser', 'isLoggedIn'])
  }
};
</script>