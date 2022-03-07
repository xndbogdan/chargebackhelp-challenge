<template>
	<main class="mt-16">
    
	</main>
</template>

<script>
import { mapGetters, mapActions} from 'vuex';
export default {
	name: 'books',
	data () {
		return {
		}
	},
	methods: {
	},
  computed: {
    ...mapGetters(['getUser', 'isLoggedIn'])
  }
};
</script>