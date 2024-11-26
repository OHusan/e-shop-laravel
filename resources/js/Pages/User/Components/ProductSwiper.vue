<script setup>
const props = defineProps({
    products: Array
})
console.log(props.products)
import { onMounted } from 'vue';

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
        <swiper-slide v-for="product in products" class="group">
            <div class="relative">
                <img v-if="product.product_images.length > 0" :src="`/${product.product_images[0].image}`"
                    :alt="product.description" class="h-full w-full object-cover object-center lg:h-full lg:w-full" />
                <img v-else
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png"
                    alt="No image" class="w-full h-[260px] object-cover" />

                <div class="gap-3 opacity-0 group-hover:opacity-100 flex absolute top-3 left-3 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </div>

                <button class="px-3 py-2 text-white bg-green-400 absolute bottom-3 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300">Vidi proizvod</button>
            </div>
            <div class="text-center font-lato py-4 group-hover:bg-blue-500 group-hover:text-white transition-colors duration-300">
                <p class="font-bold text-lg">{{ product.title }}</p>
                <p class="text-sm mt-3">${{ product.price }}</p>
            </div>
        </swiper-slide>
    </swiper-container>
</template>
