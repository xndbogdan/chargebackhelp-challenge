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
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;