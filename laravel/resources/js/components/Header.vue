<template>
    <nav class="flex justify-between py-3 px-6 bg-green-400 text-black text-xl">
        <router-link to="/">Home</router-link>
        <div class="flex space-x-4">
            <router-link to="/login">login</router-link>
            <router-link to="/register">Register</router-link>
        </div>
    </nav>
</template>

<script>
export default {
    
}
</script>