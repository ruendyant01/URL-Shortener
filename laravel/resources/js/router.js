import {createRouter,createWebHashHistory} from 'vue-router';

import Login from './pages/Login.vue';
import Register from './pages/Register.vue';
import Home from './pages/Home.vue';

const routes = [
    {
        path: "/login",
        component: Login
    },
    {
        path: "/register",
        component: Register
    },
    {
        path:"/",
        component: Home
    }
]

const router = createRouter({
    history: createWebHashHistory(),
    routes
});

export default router;