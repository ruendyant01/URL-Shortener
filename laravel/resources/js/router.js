import {createRouter, createWebHistory} from 'vue-router';

import Login from './pages/Login.vue';
import Register from './pages/Register.vue';
import Home from './pages/Home.vue';
import ForgotPassword from './pages/ForgotPassword.vue';
import ResetPassword from './pages/ResetPassword.vue';

const routes = [
    {
        path: "/login",
        component: Login
    },
    {
        path: "/forgot-password",
        component: ForgotPassword
    },
    {
        path: "/password/reset",
        component: ResetPassword
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