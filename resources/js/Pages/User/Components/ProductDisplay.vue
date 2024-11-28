<script setup>
import {router} from '@inertiajs/vue3'
import ProductCard from './ProductCard.vue';
const props = defineProps({
    products: Array,
    layout: String
})

const addToCart = (product) => {
    console.log(product)
    router.post(route('cart.store', product), {
        onSuccess: (page) => {
            if (page.props.flash.success) {
                Swal.fire({
                    toast: true,
                    icon: 'success',
                    position: 'top-end',
                    showConfirmButton: false,
                    title: page.props.flash.success
                });
            }
        }
    })
}
</script>

<template>
    <div :class="`mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2  ${layout === 'horizontal' ? 'lg:grid-cols-1' : 'lg:grid-cols-4'} xl:gap-x-8`">
        <div v-for="product in products" :key="product.id" class="group relative">
            <ProductCard :product="product" :layout="layout"/>
        </div>
    </div>
</template>
