<template>
    <div class="flex flex-col items-center space-y-8 mt-2">
        <h1 class="text-4xl">Login</h1>
        <form @submit.prevent="submit" class="flex flex-col space-y-8 [&_input]:py-1 [&_input]:px-3 [&_input]:border-b [&_input]:border-slate-400">
            <input type="email" name="email" placeholder="Email" v-model="form.email">
            <span v-if="error" class="text-red-500">{{ error }}</span>
            <button type="submit" class="border-b border-slate-400 py-2 px-4 rounded-lg">Send Email</button>
        </form>
    </div>
</template>

<script>
import { toast } from 'vue3-toastify'
export default {
    data() {
        return {
            form: {
                email: ""
            },
            error: ""
        }
    },
    methods: {
        submit() {
            axios.post("/password/email", this.form)
            .then(res => {
                toast("Success Send Reset Link");
                this.form = {email:""};
            })
            .catch(err => {
                this.error = err.response.data.message;
            })
        }
    }
}
</script>