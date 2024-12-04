<script setup>
import RoundedColor from './Components/RoundedColor.vue';
import UserLayout from './Layouts/UserLayout.vue';
import { router } from '@inertiajs/vue3';
import { ref } from 'vue'

const name = ref('');
const email = ref('');
const subject = ref('');
const message = ref('');


const contactUs = async () => {
    const formData = new FormData();

    formData.append('name', name.value);
    formData.append('email', email.value);
    formData.append('subject', subject.value);
    formData.append('message', message.value);

    try {
        await router.post('send-mail', formData);
    } catch (err) {
        console.log(err)
    }
}
</script>

<template>
    <UserLayout>
        <div class="text-indigo-900 grid grid-cols-12 gap-8 container">
            <div class="col-span-6">
                <p class="font-bold text-4xl">About us</p>
                <p class="text-opacity-80 mt-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic itaque,
                    harum, voluptatibus ex ratione ad in, necessitatibus voluptates obcaecati quaerat labore unde qui
                    porro id velit provident. Dolores, sit nam.</p>

                <div class="flex gap-3.5 mt-12">
                    <RoundedColor color="purple" :size=6 />
                    <RoundedColor color="red" :size=6  />
                    <RoundedColor color="blue" :size=6  />
                </div>
            </div>
            <div class="col-span-6">
                <p class="font-bold text-4xl">Ways to contact us</p>
                <div class="grid grid-cols-2 gap-x-8 gap-y-12 mt-6 text-indigo-700/80 font-semibold">
                    <div class="flex gap-4">
                        <RoundedColor :size=11 color="darkblue" />

                        <div>
                            <p>Tel:988 9888 888</p>
                            <p>E-Mail:test@test.com</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <RoundedColor :size=11 color="orange" />

                        <div>
                            <p>Tel:988 9888 888</p>
                            <p>E-Mail:test@test.com</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <RoundedColor :size=11 color="pink" />

                        <div>
                            <p>Tel:988 9888 888</p>
                            <p>E-Mail:test@test.com</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <RoundedColor :size=11 color="green" />

                        <div>
                            <p>Tel:988 9888 888</p>
                            <p>E-Mail:test@test.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-36 text-indigo-900 grid grid-cols-12 gap-8 container">
            <div class="col-span-6">
                <p class="font-bold text-4xl">Contact Us</p>
                <p class="text-indigo-500 mt-4">Voluptate non non fugiat veniam elit do enim veniam quis.</p>

                <form @submit.prevent="contactUs" class="flex flex-col gap-9 mt-11">
                    <div class="flex gap-6">
                        <input class="py-3 px-2.5 rounded-[3px] w-full border-gray-400/20" type="text" id="name"
                            v-model="name" placeholder="Name*" required />
                        <input class="py-3 px-2.5 rounded-[3px] w-full border-gray-400/20" type="email" id="email"
                            v-model="email" placeholder="Email*" required />
                    </div>

                    <input class="py-3 px-2.5 rounded-[3px] w-full border-gray-400/20" type="text" id="subject"
                        v-model="subject" placeholder="Subject*" required />

                    <textarea class="rounded-[3px] w-full border-gray-400/20" name="message" id="message"
                        v-model="message" placeholder="Leave message" required rows="6" />
                    <button
                        class="rounded-[3px] bg-pink-500 text-white px-8 py-2.5 w-1/3 border-gray-400/20"
                        type="submit">Send mail</button>
                </form>
            </div>

            <img src="/contact-us.svg" alt="Contact us" class="col-span-6" />
        </div>
    </UserLayout>
</template>
