<script setup>
import Products from './Layouts/Products.vue';
import UserLayout from './Layouts/UserLayout.vue';

const prop = defineProps({
    products: Array
})
</script>

<template>
    <UserLayout>
        <Products :products="prop.products" />
    </UserLayout>
</template>
