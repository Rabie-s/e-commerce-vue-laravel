<template>

    <div class="grid justify-center justify-items-center sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-y-4 mt-10">

        <Card v-for="(product,index) in products" :image="product.main_image" :name="product.name" :price="product.price" :productLink="route('products.show',product.id)" />


    </div>



</template>

<script setup>
import Card from '@/components/Card.vue'
defineProps({ products: Object })
</script>