<script setup>
import ImageSwiper from './ImageSwiper.vue';

const props = defineProps({
    product: Object
})

</script>

<template>
    <div class="p-4 mb-10 [box-shadow:rgba(0,0,0,0.35)_0px_5px_15px] grid grid-cols-2 gap-11 justify-between max-w-[1170px] place-self-center">
        <div>
            <!-- <img src="/product_images/test.jpeg" alt="Lion"> -->
             <ImageSwiper />
        </div>

        <div class="flex gap-1.5 flex-col justify-center">
            <p class="text-3xl font-semibold">{{ product.title }}</p>
            <p class="text-pink-600">${{ product.price }}</p>

            <p>Color</p>
            <p class="opacity-50">{{ product.description }}</p>

            <button>Add to cart</button>

            <p>Category</p>
            <p>Tags</p>
            <p>Share</p>
        </div>
    </div>
</template>
