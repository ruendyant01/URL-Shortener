<template>
    <div class="flex flex-col items-center space-y-8 mt-2">
        <h1 class="text-4xl">Login</h1>
        <form class="flex flex-col space-y-4 [&_input]:py-1 [&_input]:px-3 [&_input]:border-b [&_input]:border-slate-400">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" class="border-b border-slate-400 py-2 px-4 rounded-lg">Log in</button>
        </form>
    </div>
</template>

<script>
export default {
    
}
</script>