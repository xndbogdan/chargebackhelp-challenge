import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path: '/',
        component: () => import('./views/Welcome'),
        name: 'welcome',
        meta: {
            title: 'Welcome'
        },
    },
    {
        path: '/register',
        component: () => import('./views/Auth/Register'),
        name: 'register',
        meta: {
            title: 'Register'
        },
    },
    {
        path: '/profiles',
        component: () => import('./views/Profiles'),
        name: 'profiles',
        meta: {
            title: 'Profiles'
        },
    },
    {
        path: '/profile/:id/books',
        component: () => import('./views/Profile/Books'),
        name: 'profile-books',
        meta: {
            title: 'Profile Books'
        },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;