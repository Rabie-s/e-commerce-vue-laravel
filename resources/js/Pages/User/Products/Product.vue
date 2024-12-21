<template>
    <div class="grid md:grid-cols-2 mt-5 mx-10">

        <div>

            <swiper :navigation="true" :pagination="true" :mousewheel="true" :keyboard="true" :modules="modules"
                class="max-w-96">
                <swiper-slide>
                    <img class="w-full" :src="product.product.main_image" alt="image description">
                </swiper-slide>
                <swiper-slide v-for="image in product.product.product_images">
                    <img class="w-full" :src="image.image" alt="" srcset="">
                </swiper-slide>
            </swiper>


        </div>

        <div>

            <div>
                <h6 class="text-sm text-gray-400">Phones</h6>
                <h1 class="text-4xl font-bold">{{ product.product.name }}</h1>
                <span class="text-3xl font-bold text-gray-900 dark:text-white">{{ product.product.price }}$</span>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div>

                <div class="mt-2">
                    <label for="number-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                    <input type="number" v-model="formData.quantity" id="number-input"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="1" min="1" max="5" required />
                </div>

                <div class="mt-2">
                    <button @click="addToCart" type="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
                     font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center items-center me-2
                      dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                        <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 21">
                            <path
                                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </svg>
                        Add to cart
                    </button>
                </div>

            </div>

        </div>

    </div>

</template>

<script setup>
const product = defineProps({ product: Object })
import { ref } from 'vue';
import { router } from '@inertiajs/vue3'
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';
// Import Swiper styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
// import required modules
import { Navigation, Pagination, Mousewheel, Keyboard } from 'swiper/modules';
const modules = [Navigation, Pagination, Mousewheel, Keyboard]

let images = []

for (let img in product.product.product_images) {
    images.push(product.product.product_images[img].image)
}


const formData = ref({
    productId: product.product.id,
    price: product.product.price,
    quantity: 1

})

function addToCart() {
    router.post(route('cart.addToCart'), formData.value)
}

</script>