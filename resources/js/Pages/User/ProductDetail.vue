<script setup>
import UserLayout from './Layouts/UserLayout.vue';
import DetailCard from './Components/Products/DetailCard.vue'
import ProductDescription from './Components/Products/ProductDescription.vue';
import SimilarProducts from './Components/Products/SimilarProducts.vue';
import { computed } from 'vue';

const props = defineProps({
    product: Object,
    similarProducts: Array
})

const checkLength = computed(() => props.similarProducts.length > 2);
</script>

<template>
    <UserLayout>
        <div class="container mb-32">
            <DetailCard :product="product" />
        </div>

        <ProductDescription :product="product"/>

        <div :class="`container flex ${checkLength ? 'justify-between' : 'gap-8'}`">

            <SimilarProducts :products="similarProducts"/>
        </div>
    </UserLayout>
</template>
