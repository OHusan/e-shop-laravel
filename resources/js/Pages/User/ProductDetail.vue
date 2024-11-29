<script setup>
import UserLayout from './Layouts/UserLayout.vue';
import DetailCard from './Components/DetailCard.vue'

const props = defineProps({
    product: Object
})
console.log(props.products)
</script>

<template>
    <UserLayout>
        <div class="container min-h-screen">
            <DetailCard :product="product"/>
        </div>
    </UserLayout>
</template>
