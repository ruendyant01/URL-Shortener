<template>
    <div class="flex flex-col self-center">
        <h1 class="text-3xl font-semibold">Reset Password</h1>
        <span v-if="error" class="text-red-500">{{ error }}</span>
        <form @submit.prevent="submit" class="border border-slate-400 p-3">
            <input type="password" name="password" v-model="form.password" placeholder="New Password">
            <input type="password" name="password_confirmation" v-model="form.password_confirmation" placeholder="Confirm Password">
            <button type="submit">Submit</button>
        </form>
    </div>
</template>

<script>
import { toast } from 'vue3-toastify';
export default {
    middleware: "guest",
    data() {
        return {
            form: {
                password: "",
                token: this.$route.query.token,
                email: this.$route.query.email,
                password_confirmation:""
            },
            error: ""
        }
    },
    methods: {
        submit() {
            axios.post("/password/reset", this.form)
            .then(() => {
                toast("Password reset success");
                window.location = "/";
            })
            .catch((err) => {
                this.error = err.response.data.message;
                toast("Password reset failed")
            })
        }
    }
}
</script>