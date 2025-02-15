<template>
  <!-- The Carousel component receives dynamic configuration and updates when the itemsToShow prop changes -->
  <Carousel v-bind="carouselConfig" :key="carouselConfig.itemsToShow">
    <slot />
    <template #addons>
      <!-- Navigation controls for the carousel -->
      <Navigation />
    </template>
  </Carousel>
</template>

<script setup>
import 'vue3-carousel/carousel.css';
import { Carousel, Navigation } from 'vue3-carousel';
import { computed } from 'vue';

// Define props with expected data types
const props = defineProps({
  itemsToShow:{
    type:Number,
    default:4
  }, // Number of items visible in the carousel
});

// Compute carousel settings dynamically based on the itemsToShow prop
const carouselConfig = computed(() => ({
  wrapAround: true, // Enables infinite scrolling
  itemsToShow: props.itemsToShow || 1, // Default to showing one item
  breakpoints: {
    640: { itemsToShow: 2 }, // Adjusts for mobile screens
    1024: { itemsToShow: 3 }, // Adjusts for tablets
    1280: { itemsToShow: props.itemsToShow }, // Adjusts for larger desktop screens
  },
}));
</script>
