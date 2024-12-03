<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import HeaderV2 from './Header-v2.vue';
import Footer from './Footer.vue'
import PageTitle from '@/Components/PageTitle.vue';

onMounted(() => {
    initFlowbite();
})
</script>

<template>
    <HeaderV2 />
    <PageTitle />

    <slot />

    <div class="mb-20"/>
    <Footer />
</template>
