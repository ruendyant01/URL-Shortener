<template>
    <div>
        <app-header />
        <router-view></router-view>
        <app-footer />
    </div>
</template>

<script>
import AppFooter from './components/Footer.vue'
import AppHeader from './components/Header.vue'
    export default {
        components: {AppFooter,AppHeader},
        // created() {
        //     if(document.cookie.indexOf("XSRF-TOKEN") !== -1) {
        //         window.loggedIn = true;
        //         this.loggedIn = window.loggedIn
        //     };
        // }
    }
</script>