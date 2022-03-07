<template>
	<div>
		<!-- This example requires Tailwind CSS v2.0+ -->
		<nav class="bg-gray-800">
			<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
				<div class="flex items-center justify-between h-16">
					<div class="flex items-center">
						<router-link to="/" class="flex-shrink-0">
							<img class="block lg:hidden h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
							<img class="hidden lg:block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow">
						</router-link>
						<div class="hidden sm:block sm:ml-6">
							<!-- TODO: Remove v-if false after we figure out authentication -->
							<div class="flex space-x-4" v-if="isLoggedIn">
								<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
								<router-link to="/" :class="currentRouteName == 'welcome' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700'" class="px-3 py-2 rounded-md text-sm font-medium">Home</router-link>
								<router-link :to="{name: 'books.index'}" :class="currentRouteName == 'books.index' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700'" class="hover:text-white px-3 py-2 rounded-md text-sm font-medium">Books</router-link>
							</div>
						</div>
					</div>
					<!-- TODO: Remove v-if false after we figure out authentication -->
					<div v-if="isLoggedIn" class="hidden sm:ml-6 sm:block">
						<div class="flex items-center">
							<button type="button" class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
								<span class="sr-only">View notifications</span>
								<!-- Heroicon name: outline/bell -->
								<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
								</svg>
							</button>

							<!-- Profile dropdown -->
							<div class="ml-3 relative">
								<div>
									<button type="button" @click="toggleMenu" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
										<span class="sr-only">Open user menu</span>
										<img class="h-8 w-8 rounded-full" src="https://picsum.photos/200?hash=profile" alt="">
									</button>
								</div>

								<!--
									Dropdown menu, show/hide based on menu state.

									Entering: "transition ease-out duration-100"
										From: "transform opacity-0 scale-95"
										To: "transform opacity-100 scale-100"
									Leaving: "transition ease-in duration-75"
										From: "transform opacity-100 scale-100"
										To: "transform opacity-0 scale-95"
								-->
								<div v-show="menuOpen" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
									<!-- Active: "bg-gray-100", Not Active: "" -->
									<router-link :to="{name: 'profiles.index'}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Change Profile</router-link>
									<a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
									<a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2" @click="handleLogout">Sign out</a>
								</div>
							</div>
						</div>
					</div>
					<div v-else class="hidden sm:ml-6 sm:block">
						<div class="flex space-x-4">
							<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
							<span @click="handleLogin" class="cursor-pointer text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Log In</span>
							<router-link to="register" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</router-link>
						</div>
						
					</div>
					<div class="-mr-2 flex sm:hidden">
						<!-- Mobile menu button -->
						<button @click="toggleMobileMenu" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
							<span class="sr-only">Open main menu</span>
							<!--
								Icon when menu is closed.

								Heroicon name: outline/menu

								Menu open: "hidden", Menu closed: "block"
							-->
							<svg v-if="!mobileMenuOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
							</svg>
							<!--
								Icon when menu is open.

								Heroicon name: outline/x

								Menu open: "block", Menu closed: "hidden"
							-->
							<svg v-else class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
							</svg>
						</button>
					</div>
				</div>
			</div>

			<!-- Mobile menu, show/hide based on menu state. -->
			<div class="sm:hidden" id="mobile-menu" v-show="mobileMenuOpen">
				<!-- TODO: Remove v-if false after we figure out authentication -->
				<div class="px-2 pt-2 pb-3 space-y-1" v-if="isLoggedIn">
					<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
					<router-link to="/" :class="currentRouteName == 'welcome' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700'" class="block px-3 py-2 rounded-md text-base font-medium">Home</router-link>
					<router-link to="books" :class="currentRouteName == 'books.index' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700'" class="hover:text-white block px-3 py-2 rounded-md text-base font-medium">Books</router-link>
				</div>
				<!-- TODO: Remove v-if false after we figure out authentication -->
				<div v-if="isLoggedIn" class="pt-4 pb-3 border-t border-gray-700">
					<div class="flex items-center px-5">
						<div class="flex-shrink-0">
							<img class="h-10 w-10 rounded-full" src="https://picsum.photos/200?hash=profile-mobile" alt="">
						</div>
						<div class="ml-3">
							<div class="text-base font-medium text-white">{{ getUser.name }}</div>
							<div class="text-sm font-medium text-gray-400">{{ getUser.email }}</div>
						</div>
						<button type="button" class="ml-auto flex-shrink-0 bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
							<span class="sr-only">View notifications</span>
							<!-- Heroicon name: outline/bell -->
							<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
							</svg>
						</button>
					</div>
					<div class="mt-3 px-2 space-y-1">
						<router-link :to="{ name: 'profiles.index'}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Change Profile</router-link>
						<a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Settings</a>
						<a @click="handleLogout" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Sign out</a>
					</div>
				</div>
				<div v-else>
					<div class="mt-3 px-2 space-y-1 pb-4">
						<a @click="handleLogin"  class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Log In</a>
						<router-link to="register" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Register</router-link>
					</div>
				</div>
			</div>
		</nav>
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<router-view/>
		</div>
	</div>
</template>

<script>
import { mapGetters, mapActions} from 'vuex';
export default {
	name: 'app',
	data() {
		return {
			menuOpen: false,
			mobileMenuOpen: false,
		}
	},
	mounted() {
		console.log(window.location.host)
	},
	methods: {
		...mapActions(['setUser', 'logout']),
		toggleMenu() {
			this.menuOpen = !this.menuOpen
		},
		toggleMobileMenu() {
			this.mobileMenuOpen = !this.mobileMenuOpen
		},
		handleLogin() {
			this.axios.get('/api/user')
				.then((response) => {
					this.setUser(response.data);
				}).catch((error) => {
					this.$toast.error('Login failed');
				});
		},
		handleLogout() {
			this.axios.get('/api/logout')
				.then((response) => {
					this.logout();
					
					/* Basic auth logout sorcery */
					this.axios.get(window.location.protocol + '//xxxx:xxxx@' + window.location.host + '/api/user')
						.then((response) => {
							this.$toast.success('Logged out');
						}).catch((error) => {
							this.$toast.success('Logged out');
						});
					
				}).catch((error) => {
					this.$toast.error('Logout failed');
				});
		}
	},
	computed: {
		...mapGetters(['getUser', 'isLoggedIn']),
		currentRouteName() {
			return this.$route.name;
    }
	}
};
</script>