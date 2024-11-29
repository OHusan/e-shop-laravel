<script setup lang="ts">
import { computed } from 'vue';
import InfoCardIcons from './InfoCardIcons.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps<{
    product: any;
    layout: 'horizontal' | 'vertical';
}>();

const checkLayout = computed(() => props.layout === 'horizontal');
console.log(props.product, 'testonja--------')
</script>

<template>
    <Link :href="route('products.detail', product)" :class="`group [box-shadow:rgba(0,0,0,0.05)_0px_1px_2px_0px] ${checkLayout ? 'flex gap-4' : ''}`">
        <div class="relative">
            <img v-if="product.product_images.length > 0" :src="`/${product.product_images[0].image}`"
                :alt="product.description" class="h-full w-full object-cover object-center lg:h-full lg:w-full" />
            <img v-else
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png"
                alt="No image" class="w-full h-[260px] object-cover" />

            <InfoCardIcons v-if="!checkLayout" :class-list="'absolute top-3 left-3 opacity-0 group-hover:opacity-100'"/>

            <button v-if="!checkLayout"
                class="px-3 py-2 text-white bg-green-400 absolute bottom-3 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300">Vidi
                proizvod</button>
        </div>
        <div
            :class="`font-lato py-4 transition-colors duration-300 ${checkLayout ? 'flex-grow flex flex-col justify-center gap-5' : 'text-center group-hover:bg-blue-500 group-hover:text-white'}`">
            <p class="font-bold text-lg">{{ product.title }}</p>
            <p class="text-sm mt-3">${{ product.price }}</p>
            <InfoCardIcons v-if="checkLayout"/>
        </div>
    </Link>
</template>
