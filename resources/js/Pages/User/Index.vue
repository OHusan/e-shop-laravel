<script setup>
import Products from './Layouts/Products.vue';
import UserLayout from './Layouts/UserLayout.vue';
import Hero from './Layouts/Hero.vue'

const prop = defineProps({
    products: Array
})
</script>

<template>
    <UserLayout>
        <Hero />

        <Products :products="prop.products" />
    </UserLayout>
</template>
