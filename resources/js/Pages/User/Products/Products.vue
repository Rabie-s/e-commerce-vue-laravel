<template>
    <div class="container mx-auto p-4 mt-10">
        <div class="grid justify-items-center grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <Card v-for="(product, index) in products.data" :key="product.id" :id="product.id"
                :image="product.main_image" :name="product.name" :price="product.price" />
        </div>

        <div class="flex justify-center mt-6">
            <Pagination :links="products.links" />
        </div>
    </div>
</template>

<script setup>
import Card from '@/Components/User/Card.vue';
import Pagination from '@/Components/User/Pagination.vue';

defineProps({ products: Object });
</script>