<template>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <NavBar />
        <!-- Sidebar -->
        <SideBar />

        <slot />
    </div>
</template>

<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import NavBar from './NavBar.vue';
import SideBar from './SideBar.vue';

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})
</script>
