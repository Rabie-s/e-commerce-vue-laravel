<template>

    <div class="container mx-auto">



        <Swiper>
            <swiper-slide v-for="image in images">
                <img :src="image" class="h-[450px] w-full" alt="...">
            </swiper-slide>
        </Swiper>

        <!-- categories section -->
        <div class="my-10 space-y-4">
            <h1 class="text-3xl font-bold">Categories</h1>
            <Swiper>
                <swiper-slide v-for="category in categories" class="w-fit">
                    <CategoryCard :categoryId="category.id" :image="category.main_image" :title="category.name" />
                </swiper-slide>
            </Swiper>
        </div>

        <!-- last products section -->
        <div class="my-10 space-y-4">
            <h1 class="text-3xl font-bold">Last Products</h1>
            <Swiper>
                <swiper-slide v-for="product in lastProducts" class="w-fit">
                    <Card :id="product.id" :name="product.name" :image="product.main_image" :price="product.price" />
                </swiper-slide>
            </Swiper>
        </div>






    </div>


</template>
<script setup>
defineProps({ categories: Object, lastProducts: Object })
import { SwiperSlide } from 'swiper/vue';
import CategoryCard from '@/Components/User/CategoryCard.vue'
import Card from '@/Components/User/Card.vue'
import Swiper from '@/Components/User/Swiper.vue'




let images = [
    'https://www.cgdirector.com/wp-content/uploads/media/2023/05/Types-of-GPUs-Graphics-Cards-List-Explanation-Twitter-1.jpg',
    'https://www.cgdirector.com/wp-content/uploads/media/2024/02/Are-Intel-ARC-GPUs-Any-Good-Twitter-1200x675.jpg',
    'https://i.pcmag.com/imagery/articles/04trttIBoGycqJOn4psKI7y-1..v1639145217.jpg'
];

</script>