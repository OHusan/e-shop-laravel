<script setup lang="ts">
import { ref } from 'vue';
import { Squares2X2Icon, ListBulletIcon } from '@heroicons/vue/20/solid';

const emit = defineEmits<{
    (event: 'grid-layout', layout: 'vertical' | 'horizontal'): void;
}>();

const gridLayout = ref<'vertical' | 'horizontal'>('vertical');

const switchGridLayout = () => {
    gridLayout.value = gridLayout.value === 'vertical' ? 'horizontal' : 'vertical'
    emit('grid-layout', gridLayout.value);
}
</script>

<template>
    <button type="button" class="-m-2 ml-5 p-2 text-gray-400 hover:text-gray-500 sm:ml-7 flex"
        @click="switchGridLayout">
        <span class="sr-only">Toggle view</span>
        <!-- Show icon based on gridLayout value -->
        <Squares2X2Icon v-if="gridLayout === 'vertical'" class="h-5 w-5" aria-hidden="true" />
        <ListBulletIcon v-else class="h-5 w-5" aria-hidden="true" />
    </button>
</template>
