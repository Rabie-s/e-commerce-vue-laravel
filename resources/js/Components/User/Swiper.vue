<template>
    <swiper v-bind="$attrs" :navigation="true" :slidesPerView="3" slides-per-view="auto" :spaceBetween="15" :pagination="{
        clickable: true,
    }" :modules="modules" class="mySwiper">

    <slot/>

    </swiper>
</template>
<script setup>

// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Pagination, Navigation } from 'swiper/modules';
// Import Swiper styles
import 'swiper/css';
import 'swiper/css/pagination';
const modules = [Pagination, Navigation]
</script>