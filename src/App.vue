<template>
    <div id="app">
        <v-header></v-header>
        <router-view></router-view>
    </div>
</template>

<script>
    import VHeader from '~/VHeader'
    export default {
        name: 'app',
        components: {
            VHeader
        }
    }
</script>
