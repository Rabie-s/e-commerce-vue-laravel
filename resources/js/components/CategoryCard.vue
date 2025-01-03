<template>

    <Link :href="route('products.showProductsByCategories', props.categoryId)">
    <div class="relative text-center">
        <h2 class="text-4xl font-bold text-white absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">{{ props.title }}
        </h2>
        <img class="rounded-md w-[250px] h-[150px]" :src="props.image">
    </div>
    </Link>

</template>
<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    title: String,
    image: String,
    categoryId: String,
})
</script>