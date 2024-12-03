<script setup>
import ProductCard from '../ProductCard.vue';

defineProps({
    products: Array
})
</script>

<template>
    <div v-for="product in products">
      <ProductCard :product="product" layout="vertical" />
    </div>
</template>
