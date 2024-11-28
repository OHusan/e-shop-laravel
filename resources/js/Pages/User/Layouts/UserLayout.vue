<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import Header from './Header.vue'
import Footer from './Footer.vue'
import PageTitle from '@/Components/PageTitle.vue';

onMounted(() => {
    initFlowbite();
})
</script>

<template>
    <Header />
    <PageTitle />

    <slot />

    <Footer />
</template>
