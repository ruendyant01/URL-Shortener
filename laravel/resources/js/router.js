import {createRouter, createWebHistory} from 'vue-router';

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
    history: createWebHistory(),
    routes
});

router.beforeEach((to,from,next) => {
    let middleware = to.matched[0].components.default.middleware;
    if(middleware === "auth") {
        if(!window.loggedIn) {
            next("/login");
            return;
        }
    } else {
        if(window.loggedIn) {
            next("/");
            return;
        }
    }
    next();
})

export default router;