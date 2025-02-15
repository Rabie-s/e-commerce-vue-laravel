<script setup>
import 'vue3-carousel/carousel.css';
import { Carousel, Slide, Navigation, Pagination } from 'vue3-carousel';
import { ref, defineProps, computed } from 'vue';

const props = defineProps({
  images: {
    type: Array,
    required: true,
  },
  height: {
    type: Number,
    default: 400,
  },
  thumbnailHeight: {
    type: Number,
    default: 90,
  },
  thumbnailsToShow: {
    type: Number,
    default: 5,
  },
});

const currentSlide = ref(0);
const slideTo = (nextSlide) => (currentSlide.value = nextSlide);

const galleryConfig = computed(() => ({
  itemsToShow: 1,
  wrapAround: true,
  slideEffect: 'fade',
  mouseDrag: true,
  touchDrag: true,
  autoplay: 5000,
  height: props.height,
}));

const thumbnailsConfig = computed(() => ({
  height: props.thumbnailHeight,
  itemsToShow: props.thumbnailsToShow,
  wrapAround: true,
  touchDrag: true,
  gap: 10,
}));
</script>

<template>
  <div class="carousel-wrapper">
    <Carousel id="gallery" v-bind="galleryConfig" v-model="currentSlide">
      <Slide v-for="image in images" :key="image.id">
        <img :src="image.url" alt="Gallery Image" class="gallery-image" />
      </Slide>
      <template #addons>
        <Pagination />
      </template>
    </Carousel>

    <Carousel id="thumbnails" v-bind="thumbnailsConfig" v-model="currentSlide">
      <Slide v-for="(image, index) in images" :key="image.id">
        <template #default="{ isActive }">
          <div
            :class="['thumbnail', { 'is-active': isActive }]"
            @click="slideTo(index)"
          >
            <img :src="image.url" alt="Thumbnail Image" class="thumbnail-image" />
          </div>
        </template>
      </Slide>
      <template #addons>
        <Navigation />
      </template>
    </Carousel>
  </div>
</template>

<style scoped>
.carousel-wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 16px;
  background: #f9f9f9;
  padding: 16px;
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}
.gallery-image {
  width: 100%;
  height: auto;
  object-fit: cover;
  border-radius: 8px;
  transition: transform 0.3s ease-in-out;
}
.gallery-image:hover {
  transform: scale(1.02);
}
.thumbnail {
  cursor: pointer;
  padding: 4px;
  border-radius: 6px;
  transition: transform 0.3s ease-in-out, border 0.3s;
}
.thumbnail.is-active {
  transform: scale(1.1);
  border: 2px solid #007bff;
}
.thumbnail-image {
  width: 100%;
  height: auto;
  object-fit: cover;
  border-radius: 6px;
}
</style>
