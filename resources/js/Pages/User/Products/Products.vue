<template>
    <div class="container mx-auto p-4 mt-10">
        <!-- Loading State -->
        <div v-if="!products || products.loading" class="text-center text-gray-500">
            <p>Loading products...</p>
        </div>

        <!-- Products Grid -->
        <div v-else-if="products.data.length > 0"
            class="grid justify-items-center grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6"
            role="list">
            <Card v-for="(product, index) in products.data" :key="product.id" :id="product.id"
                :image="product.main_image" :name="product.name" :price="product.price" class="animate-fadeIn" />
        </div>

        <!-- No Products Message -->
        <div v-else class="text-center text-gray-500 mt-6">
            <p>No products found. Please check back later.</p>
        </div>

        <!-- Pagination -->
        <div v-if="products.links && products.links.length > 1" class="flex justify-center mt-6">
            <Pagination :links="products.links" />
        </div>
    </div>
</template>

<script setup>
import Card from '@/Components/User/Card.vue';
import Pagination from '@/Components/User/Pagination.vue';

defineProps({ products: Object });
</script>

<style scoped>
/* Smooth fade-in animation for the product cards */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fadeIn {
    animation: fadeIn 0.5s ease-out;
}
</style>
