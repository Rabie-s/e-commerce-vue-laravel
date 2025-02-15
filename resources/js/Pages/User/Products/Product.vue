<template>
    <div class="grid md:grid-cols-2 gap-8 mt-5 mx-10">
        <!-- Image Carousel Section -->
        <div class="flex justify-center">
            <GalleryCarousel 
                :images="product.product_images.map(img => ({ id: img.id, url: img.image_url }))" 
                :thumbnailsToShow="4" 
                :height="300" 
                :thumbnailHeight="80" 
                class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-4 max-h-[500px]"
            />
        </div>

        <!-- Product Details Section -->
        <div class="space-y-6">
            <!-- Product Title, Category, and Price -->
            <div>
                <h6 class="text-sm text-gray-500 uppercase tracking-wider">
                    {{ product.category.name }}
                </h6>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mt-2">
                    {{ product.name }}
                </h1>
                <span class="text-3xl font-bold text-blue-600 dark:text-blue-400 mt-3 block">
                    {{ product.price }}$
                </span>
            </div>

            <hr class="border-gray-200 dark:border-gray-700">

            <!-- Quantity Input -->
            <div class="mt-4">
                <label for="quantity-input" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Quantity
                </label>
                <input 
                    type="number" 
                    v-model="formData.quantity" 
                    id="quantity-input"
                    aria-describedby="quantity-help"
                    class="w-24 p-2 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 shadow-sm"
                    min="1" 
                    max="5" 
                    required
                />
                <p id="quantity-help" class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Select a quantity between 1 and 5.
                </p>
            </div>

            <!-- Add to Cart Button -->
            <div class="mt-6">
                <button 
                    @click="addToCart" 
                    type="button" 
                    class="w-full flex items-center justify-center px-5 py-3 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg transition duration-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-md hover:shadow-lg"
                >
                    <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                        <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                    </svg>
                    Add to Cart
                </button>
            </div>

            <!-- Product Description -->
            <div class="mt-8">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                    Description
                </h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    <span v-html="product.description"></span>
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({ product: Object });
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

import GalleryCarousel from '@/Components/Form/GalleryCarousel.vue'

const formData = ref({
    productId: props.product.id,
    price: props.product.price,
    quantity: 1
});

function addToCart() {
    router.post(route('cart.addToCart'), formData.value);
}
</script>
