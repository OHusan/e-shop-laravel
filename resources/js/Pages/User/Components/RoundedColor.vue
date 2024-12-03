<script setup>
defineProps({
    color: String,
    size: Number
})
</script>

<template>
    <div :class="`rounded-full w-${size} h-${size}`" :style="{backgroundColor: color}" />
</template>
