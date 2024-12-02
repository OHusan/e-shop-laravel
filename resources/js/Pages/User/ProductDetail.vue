<script setup>
import UserLayout from './Layouts/UserLayout.vue';
import DetailCard from './Components/Products/DetailCard.vue'
import ProductDescription from './Components/Products/ProductDescription.vue';

const props = defineProps({
    product: Object,
})
</script>

<template>
    <UserLayout>
        <div class="container mb-32">
            <DetailCard :product="product" />
        </div>

        <ProductDescription :product="product"/>
    </UserLayout>
</template>
