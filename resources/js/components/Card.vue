<template>
    <div 
      v-bind="$attrs" 
      class="w-[250px] bg-white border border-gray-200 rounded-lg shadow-lg transition-transform hover:scale-105 dark:bg-gray-800 dark:border-gray-700"
    >
      <!-- Image Section -->
      <img 
        class="p-4 rounded-t-lg h-[280px] w-full object-cover" 
        :src="image" 
        alt="product image" 
      />
  
      <!-- Content Section -->
      <div class="px-5 pb-5">
        <!-- Product Name -->
        <Link :href="productLink">
          <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white mb-3 line-clamp-2 hover:underline">
            {{ name }}
          </h5>
        </Link>
  
        <!-- Price and Add to Cart -->
        <div class="flex items-center justify-between">
          <span class="text-2xl font-bold text-gray-900 dark:text-white">${{ price }}</span>
          <button
            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800"
          >
            Add to cart
          </button>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { Link } from "@inertiajs/vue3";
  
  const props = defineProps({
    image: String,
    name: String,
    price: String,
    productLink: String,
  });
  </script>
  
  <style scoped>
  /* Limit text to two lines with ellipsis for long product names */
  .line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  </style>
  