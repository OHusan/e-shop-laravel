<script setup>
import { Swiper } from 'swiper'
import { onMounted } from 'vue';

onMounted(() => {
    const sliderThumbs = new Swiper('.slider__thumbs .swiper-container', {
        direction: 'vertical',
        slidesPerView: 3,
        spaceBetween: 24,
        navigation: {
            nextEl: '.slider__next',
            prevEl: '.slider__prev'
        },
        freeMode: true,
        breakpoints: {
            0: {
                direction: 'horizontal',
            },
            768: {
                direction: 'vertical',
            }
        }
    });
    const sliderImages = new Swiper('.slider__images .swiper-container', {
        direction: 'vertical',
        slidesPerView: 1,
        spaceBetween: 32,
        mousewheel: true,
        navigation: {
            nextEl: '.slider__next',
            prevEl: '.slider__prev'
        },
        grabCursor: true,
        thumbs: {
            swiper: sliderThumbs
        },
        breakpoints: {
            0: {
                direction: 'horizontal',
            },
            768: {
                direction: 'vertical',
            }
        }
    });
})

</script>

<template>
    <section class="slider">
        <div class="slider__flex">
            <div class="slider__col">
                <div class="slider__thumbs">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="slider__image"><img src="https://picsum.photos/1920/1080" alt="" /></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slider__image"><img src="https://picsum.photos/1920/1081" alt="" /></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slider__image"><img src="https://picsum.photos/1920/1082" alt="" /></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slider__image"><img src="https://picsum.photos/1920/1083" alt="" /></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slider__image"><img src="https://picsum.photos/1920/1084" alt="" /></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider__images">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="slider__image"><img src="https://picsum.photos/1920/1080" alt="" /></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slider__image"><img src="https://picsum.photos/1920/1081" alt="" /></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slider__image"><img src="https://picsum.photos/1920/1082" alt="" /></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slider__image"><img src="https://picsum.photos/1920/1083" alt="" /></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slider__image"><img src="https://picsum.photos/1920/1084" alt="" /></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</template>
