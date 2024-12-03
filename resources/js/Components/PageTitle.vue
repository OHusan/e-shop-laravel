<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const updateSlash = (text) => {
    return text.replace(/\//g, '.');

}

const route = computed(() => usePage().url);
</script>

<template>
    <div class="bg-pink-300/20 mb-28">
        <h1 class="text-3xl  container capitalize py-24">Home.Pages<span class="text-pink-500">{{ updateSlash(route) }}</span></h1>
    </div>
</template>
