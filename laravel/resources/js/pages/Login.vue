<template>
    <div class="flex flex-col items-center space-y-8 mt-2">
        <h1 class="text-4xl">Login</h1>
        <form @submit.prevent="submit" class="flex flex-col space-y-4 [&_input]:py-1 [&_input]:px-3 [&_input]:border-b [&_input]:border-slate-400">
            <input type="email" name="email" placeholder="Email" v-model="form.email">
            <input type="password" name="password" placeholder="Password" v-model="form.password">
            <button type="submit" class="border-b border-slate-400 py-2 px-4 rounded-lg">Log in</button>
        </form>
    </div>
</template>

<script>
import { toast } from 'vue3-toastify';
export default {
    data() {
        return {
            form: {
                email: "",
                password: ""
            }
        }
    },
    methods: {
        submit() {
            axios.post('/login', this.form)
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
            .catch(err => toast("Login Failed"));
        }
    }
    
}
</script>