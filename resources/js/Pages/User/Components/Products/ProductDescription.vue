<script setup>
import { ref } from 'vue';

const openParagraph = ref('description');
defineProps({
    product: Object
})
</script>

<template>
    <div class="bg-purple-50 py-28 mb-20 text-indigo-900">
        <div class="container">
            <ul class="text-2xl font-semibold flex gap-16 mb-16">
                <li>
                    <a href="#" :class="`product-link ${openParagraph === 'description' ? 'product-link-active' : ''}`"
                        @click.prevent="openParagraph = 'description'">
                        Description
                    </a>
                </li>
                <li>
                    <a href="#" :class="`product-link ${openParagraph === 'information' ? 'product-link-active' : ''}`"
                        @click.prevent="openParagraph = 'information'">
                        Additional information
                    </a>
                </li>
                <li>
                    <a href="#" :class="`product-link ${openParagraph === 'reviews' ? 'product-link-active' : ''}`"
                        @click.prevent="openParagraph = 'reviews'">
                        Reviews
                    </a>
                </li>
            </ul>

            <div v-if="openParagraph === 'description'">
                <p>{{ product.title }}</p>
                <p>{{ product.description }}</p>
            </div>

            <div v-else class="flex flex-col gap-4">
                <p>In stock: {{ product.quantity }}</p>
                <p>Category: {{ product.category.name }}</p>
                <p>Device name: <span class="capitalize">{{ product.category.slug }}</span></p>
            </div>
        </div>
    </div>
</template>
