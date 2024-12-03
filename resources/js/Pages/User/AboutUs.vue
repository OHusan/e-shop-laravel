<script setup>
import OurFeatures from './Components/OurFeatures.vue';
import UserLayout from './Layouts/UserLayout.vue';

</script>

<template>
    <UserLayout>
        <div class="container flex gap-8 items-center">
            <img src="/about-us.png" alt="About us">

            <div class="text-indigo-900">
                <p class="text-4xl font-bold">Know About Our Ecomerce Business, History</p>
                <p class="text-indigo-900/30">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio ut,
                    possimus fugit consequuntur quos ullam fuga aliquam, unde sequi excepturi incidunt ipsa totam
                    voluptatem vero repellat. Nemo impedit laudantium asperiores.</p>
                <button class="rounded-[3px] bg-pink-500 text-white px-8 py-2.5 w-1/3 border-gray-400/20">Contact
                    us</button>
            </div>
        </div>

        <OurFeatures />
    </UserLayout>
</template>
