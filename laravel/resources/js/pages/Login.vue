<template>
    <div class="flex flex-col items-center space-y-8 mt-2">
        <h1 class="text-4xl">Login</h1>
        <span v-if="error" class="text-red-500">{{ error }}</span>
        <form @submit.prevent="submit" class="flex flex-col space-y-6 [&_input]:py-1 [&_input]:px-3 [&_input]:border-b [&_input]:border-slate-400">
            <input type="email" name="email" placeholder="Email" v-model="form.email">
            <input type="password" name="password" placeholder="Password" v-model="form.password">
            <router-link to="/forgot-password" class="self-end text-sm">Forgot Password</router-link>
            <button type="submit" class="border-b border-slate-400 py-2 px-4 rounded-lg">Log in</button>
        </form>
    </div>
</template>

<script>
import { toast } from 'vue3-toastify';
export default {
    middleware:"guest",
    data() {
        return {
            form: {
                email: "",
                password: ""
            },
            error: ""
        }
    },
    methods: {
        submit() {
            axios.post('/api/login', this.form)
            .then(res => {
                console.log(res);
                toast("Login Successfull");
                this.form = {
                    email: "",
                    password: ""
                };
                window.loggedIn = true;
                window.location = "/";
            })
            .catch(err => {
                this.error = err.response.data.message;
                toast("Login Failed")
            });
        }
    }
    
}
</script>