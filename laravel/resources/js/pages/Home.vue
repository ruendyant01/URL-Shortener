<template>
    <div class="space-y-4">
        <div class="text-center space-y-6 mt-2">
            <h2 class="text-4xl">Shorten URL</h2>
            <div class="space-x-4">
                <input class="text-xl" type="text" name="url" v-model="originalUrl" placeholder="Enter Your URL">
                <i @click="submit" class="fa-solid fa-paper-plane text-xl text-blue-500 cursor-pointer"></i>
            </div>
        </div>
        <div v-if="error" class="text-center">
            <p class="text-red-500">{{ error }}</p>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import {toast} from 'vue3-toastify';

import 'vue3-toastify/dist/index.css';

export default {
    data()  {
        return {
            originalUrl: "",
            error: ""
        }
    },
    methods: {
        submit() {
            if(this.originalUrl.length === 0) return;
            axios.post("/api/url", {originalUrl: this.originalUrl})
            .then(res => toast("Success created"))
            .catch(err => {
                this.error = err.response.data.errors.originalUrl[0];
            })
        }
    }
}
</script>