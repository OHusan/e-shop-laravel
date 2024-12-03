<script setup>
const props = defineProps({
    products: Array
})
import { onMounted } from 'vue';
import ProductCard from './ProductCard.vue';

onMounted(() => {
    const swiperEl = document.querySelector('swiper-container');

    if (swiperEl) {
        const swiperParams = {
            slidesPerView: 4,
            spaceBetween: 30,
        };

        Object.assign(swiperEl, swiperParams);
        swiperEl.initialize();
    } else {
        console.error('swiper-container not found');
    }
});
</script>

<template>
    <swiper-container>
        <swiper-slide v-for="product in products">
            <ProductCard :product="product" />
        </swiper-slide>
    </swiper-container>
</template>
