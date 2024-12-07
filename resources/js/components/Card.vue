<template>

    <div v-bind="$attrs"
        class=" w-[250px] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

        <img class="p-8 rounded-t-lg max-h-[280px]" :src="image" alt="product image" />

        <div class="px-5 pb-5">
            <Link :href="productLink">
            <h5 class="text-l font-semibold tracking-tight text-gray-900 dark:text-white">{{ name }}</h5>

            </Link>
            <div class="flex items-center justify-between">
                <span class="text-2xl font-bold text-gray-900 dark:text-white">${{ price }}</span>
                <a href="#"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                    to cart</a>
            </div>
        </div>
    </div>

</template>

<script setup>
const props = defineProps({
    image: String,
    name: String,
    price: String,
    productLink: String,
})
import { Link } from '@inertiajs/vue3';
</script>