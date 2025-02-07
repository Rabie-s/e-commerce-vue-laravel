<template>
    <div class="w-full md:w-4/5 mx-auto">

        <!-- Header Section -->
        <div class="my-10 p-5 bg-white shadow-lg rounded-2xl">
            <h1 class="text-3xl font-semibold text-gray-800 mb-5 text-center">Add New Product</h1>
        </div>

        <!-- Form Section -->
        <div class="bg-white shadow-lg rounded-2xl p-6">
            <form @submit.prevent="store">

                <!-- Name Field -->
                <div class="mb-6">
                    <Input label="Name" type="text" v-model="productData.name" />
                    <p v-if="errors.name" class="mt-1 text-sm text-red-600">{{ errors.name }}</p>
                </div>

                <!-- Price Field -->
                <div class="mb-6">
                    <Input label="Price" type="number" v-model="productData.price" />
                    <p v-if="errors.price" class="mt-1 text-sm text-red-600">{{ errors.price }}</p>
                </div>

                <!-- Quantity Field -->
                <div class="mb-6">
                    <Input label="Quantity" type="number" v-model="productData.quantity" />
                    <p v-if="errors.quantity" class="mt-1 text-sm text-red-600">{{ errors.quantity }}</p>
                </div>

                <!-- Description Field -->
                <div class="mb-6">
                    <Input label="Description" type="text" v-model="productData.description" />
                    <p v-if="errors.description" class="mt-1 text-sm text-red-600">{{ errors.description }}</p>
                </div>

                <!-- Category Dropdown -->
                <div class="mb-6">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900">
                        Category
                    </label>
                    <select v-model="productData.category_id" id="category"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5">
                        <option v-for="(category, index) in categories" :value="category.id" :key="category.id">
                            {{ category.name }}
                        </option>
                    </select>
                    <p v-if="errors.category_id" class="mt-1 text-sm text-red-600">{{ errors.category_id }}</p>
                </div>

                <!-- Main Image Upload -->
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="main_image">
                        Upload Main Image
                    </label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                        @input="productData.main_image = $event.target.files[0]" ref="inputMainImage" type="file"
                        id="main_image">
                    <p v-if="errors.main_image" class="mt-1 text-sm text-red-600">{{ errors.main_image }}</p>
                </div>

                <!-- Divider -->
                <hr class="h-px my-8 bg-gray-200 border-0">

                <!-- Additional Images Upload -->
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="images">
                        Upload Additional Images
                    </label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                        @input="productData.images = $event.target.files" multiple ref="inputImages" type="file"
                        id="images">
                    <p v-if="errors.images" class="mt-1 text-sm text-red-600">{{ errors.images }}</p>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 text-white font-medium rounded-lg text-lg w-full py-2 transition ease-in-out duration-200 transform focus:outline-none">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
defineProps({ errors: Object, categories: Object });
import Input from '@/Components/Form/Input.vue';
import { useForm, router } from '@inertiajs/vue3';
import { ref } from 'vue';

const productData = useForm({
    name: '',
    price: '',
    quantity: '',
    description: '',
    category_id: '',
    admin_id: '',
    main_image: null,
    images: []
});

const inputMainImage = ref(null);
const inputImages = ref(null);

function store() {
    router.post(route('admin.products.store'), productData, {
        forceFormData: true,
    });
    productData.reset();
    inputMainImage.value.value = null;
    inputImages.value.value = null;
}
</script>