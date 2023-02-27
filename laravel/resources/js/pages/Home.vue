<template>
    <div class="space-y-8 flex flex-col items-center">
        <div class="text-center space-y-6 mt-2">
            <h2 class="text-4xl">Shorten URL</h2>
            <div class="space-x-4">
                <input class="text-xl" type="text" name="url" v-model="originalUrl" placeholder="Enter Your URL">
                <i @click="submit" class="fa-solid fa-paper-plane text-xl text-blue-500 cursor-pointer"></i>
            </div>
        </div>
        <div v-if="error">
            <p class="text-red-500">{{ error }}</p>
        </div>
        <table class="border-collapse mt-8">
            <thead>
                <tr>
                    <th>Original Url</th>
                    <th>Shorten Url</th>
                    <th>Visits</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody v-for="item in items" :key="item.id">
                <tr class="[&_*]:p-3">
                    <td class="w-12">{{ item.originalUrl }}</td>
                    <td><a :href="item.path" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square"></i>{{ item.shortUrl }}</a></td>
                    <td>{{ item.visits }}</td>
                    <td><i @click="destroy(item)" class="fa-solid fa-xmark text-lg text-red-400 hover:cursor-pointer hover:text-red-600"></i></td>
                </tr>
            </tbody>
        </table>
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
            error: "",
            items: []
        }
    },
    methods: {
        submit() {
            if(this.originalUrl.length === 0) return;
            axios.post("/api/url", {originalUrl: this.originalUrl})
            .then(res => {
                console.log(res);
                toast("Success created")
                this.originalUrl = "";
                this.items.push(res.data);
            })
            .catch(err => {
                this.error = err.response.data.errors.originalUrl[0];
            })
        },
        destroy(item) {
            axios.delete("/api/url/"+item.shortUrl)
            .then(res => {
                this.items = this.items.filter(val => val.id !== item.id);
                toast("Delete Successfull");
            })
            .catch(err => toast("Delete Failed"))
        }
    },
    created() {
        axios.get("/api/url")
        .then(res => this.items = res.data)
        .catch(err => toast("error fetching"))
    }
}
</script>