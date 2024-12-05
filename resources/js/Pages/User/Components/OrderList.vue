<script setup>
import { ref } from 'vue';

const props = defineProps({
    order: Array
})
console.log(props.order)
const expandedRowId = ref(null);

const toggleShowMore = (id) => {
    expandedRowId.value = expandedRowId.value === id ? null : id;
};
</script>

<template>
    <section class="container">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Order id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total price
                    </th>
                    <th scope="col" class="px-6 py3">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <template v-for="ord in order" :key="ord.id">
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-3">
                            {{ ord.id }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ ord.status }}
                        </td>
                        <td class="px-6 py-4">
                            ${{ ord.total_price }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ ord.user_address.address1 }}
                        </td>
                        <td class="px-6 py-4">
                            <button class="text-blue-600" @click="toggleShowMore(ord.id)">
                                {{ expandedRowId === ord.id ? "Show less" : "Show more" }}
                            </button>
                        </td>
                    </tr>

                    <!-- table needs fixing-->
                    <tr v-if="expandedRowId === ord.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td colspan="6">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-16 py-3">
                                            <span class="sr-only">Image</span>
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Product name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Qty
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Price
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Order date
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="p-4">
                                            <!-- <img v-if="product.product_images.length"
                                                :src="`/${product.product_images[0].image}`" :alt="product.title"
                                                class="w-16 md:w-32 max-w-full max-h-full"> -->
                                            <img src="/product_images/images.png" alt="No image"
                                                class="w-8 md:w-16 max-w-full max-h-full">
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                            title
                                        </td>
                                        <td class="px-6 py-4">
                                            $200
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                            2
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </section>
</template>
