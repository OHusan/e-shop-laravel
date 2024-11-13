<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import Header from './Header.vue'
import Hero from './Hero.vue'
import Footer from './Footer.vue'
import Products from './Products.vue'

onMounted(() => {
    initFlowbite();
})
</script>

<template>
    <Header />

    <Hero />

    <slot />

    <Footer />
</template>
