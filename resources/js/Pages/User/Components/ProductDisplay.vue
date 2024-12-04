<script setup>
import ProductCard from './ProductCard.vue';
const props = defineProps({
    products: Array,
    layout: String
})
</script>

<template>
    <div :class="`mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2  ${layout === 'horizontal' ? 'lg:grid-cols-1' : 'lg:grid-cols-4'} xl:gap-x-8`">
        <div v-for="product in products" :key="product.id" class="group relative z-10">
            <ProductCard :product="product" :layout="layout"/>
        </div>
    </div>
</template>
