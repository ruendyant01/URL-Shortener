<template>
    <nav class="flex justify-between py-3 px-6 bg-green-400 text-black text-xl">
        <router-link to="/">Home</router-link>
        <div v-if="loggedIn" class="flex space-x-4 items-center">
            <h3 class="text-lg">Hi, {{ user.name }}</h3>
            <button @click="logout">Log Out</button>
            <!-- <router-link to="/logout">logout 2</router-link> -->
        </div>
        <div v-else class="flex space-x-4 items-center">
            <router-link to="/login">login</router-link>
            <router-link to="/register">Register</router-link>
        </div>
    </nav>
</template>

<script>
import { toast } from 'vue3-toastify';
export default {
    data() {
        return {
            loggedIn: window.loggedIn,
            user: window.user
        }
    },
    methods: {
        logout() {
            axios.post("/api/logout")
            .then(res => {
                toast("Logout Successfull");
                window.loggedIn = false;
                window.location = "/";
            })
            .catch(err => toast("Log Out Failed"));
        }
    }
}
</script>