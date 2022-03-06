import { createRouter, createWebHistory } from 'vue-router';
import Welcome from './views/Welcome';

const routes = [
    {
        path: '/',
        component: Welcome,
        name: 'welcome',
        meta: {
            title: 'Welcome'
        },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;