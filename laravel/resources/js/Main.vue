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
    }
</script>