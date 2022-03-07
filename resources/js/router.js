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
        component: () => import('./views/Profiles/Index'),
        name: 'profiles.index',
        meta: {
            title: 'Profiles'
        },
    },
    {
        path: '/profiles/create',
        component: () => import('./views/Profiles/Create'),
        name: 'profiles.create',
        meta: {
            title: 'Profiles'
        },
    },
    {
        path: '/books',
        component: () => import('./views/Books/Index'),
        name: 'books.index',
        meta: {
            title: 'View Books'
        },
    },
    {
        path: '/books/create',
        component: () => import('./views/Books/Create'),
        name: 'books.create',
        meta: {
            title: 'Create Book'
        },
    },
    {
        path: '/books/:id',
        component: () => import('./views/Books/Show'),
        name: 'books.show',
        meta: {
            title: 'View Book'
        },
        props: true
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;