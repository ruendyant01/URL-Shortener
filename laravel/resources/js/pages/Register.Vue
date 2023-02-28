<script> 
import axios from 'axios';

import {toast} from 'vue3-toastify';
export default {
    middleware: "guest",
    data() {
        return {
            form : {
                email: "",
                name: "",
                password: "",
                password_confirmation: ""
            }
        }
    },
    methods: {
        submit() {
            axios.post("/api/register", this.form)
            .then(res => {
                toast("Successfull Created");
                this.form = {
                        email: "",
                        name: "",
                        password: "",
                        password_confirmation: ""
                    }
                // window.location = "/login"
            })
            .catch(err => toast("Failed Register"))
        }
    }
}
</script>

<template>
    <div class="flex flex-col items-center space-y-8 mt-2">
        <h1 class="text-4xl">Register</h1>
        <form @submit.prevent="submit" class="flex flex-col space-y-4 [&_input]:py-1 [&_input]:px-3 [&_input]:border-b [&_input]:border-slate-400">
            <input type="text" name="username" placeholder="Username" v-model="form.name">
            <input type="email" name="email" placeholder="Email" v-model="form.email">
            <input type="password" name="password" placeholder="Password" v-model="form.password">
            <input type="password" name="confirmPassword" placeholder="Confirm Password" v-model="form.password_confirmation">
            <button type="submit" class="border-b border-slate-400 py-2 px-4 rounded-lg">Register</button>
        </form>
    </div>
</template>