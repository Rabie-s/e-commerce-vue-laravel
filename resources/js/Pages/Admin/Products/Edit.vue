<template>
    <div class="w-full md:w-4/5 mx-auto">
        <div class="my-10 p-5 bg-white shadow-lg rounded-2xl">
            <h1 class="text-3xl font-semibold text-gray-800 mb-5 text-center">Edit Product</h1>
        </div>

        <div class="bg-white shadow-lg rounded-2xl p-6">
            <form @submit.prevent="update">

                <div class="mb-6">
                    <Input label="Name" type="text" v-model="productData.name" />
                    <p v-if="errors.name" class="mt-1 text-sm text-red-600">{{ errors.name }}</p>
                </div>

                <div class="mb-6">
                    <Input label="Price" type="number" v-model="productData.price" />
                    <p v-if="errors.price" class="mt-1 text-sm text-red-600">{{ errors.price }}</p>
                </div>

                <div class="mb-6">
                    <Input label="Quantity" type="number" v-model="productData.quantity" />
                    <p v-if="errors.quantity" class="mt-1 text-sm text-red-600">{{ errors.quantity }}</p>
                </div>


                <div class="mb-6">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                    <select v-model="productData.category_id" id="category"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5">
                        <option v-for="category in categories" :value="category.id" :key="category.id">
                            {{ category.name }}
                        </option>
                    </select>
                    <p v-if="errors.category_id" class="mt-1 text-sm text-red-600">{{ errors.category_id }}</p>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="main_image">Upload Main
                        Image</label>
                    <input class="block w-full text-sm text-gray-900 border rounded-lg cursor-pointer bg-gray-50"
                        @input="productData.main_image = $event.target.files[0]" ref="inputMainImage" type="file"
                        id="main_image">
                    <p v-if="errors.main_image" class="mt-1 text-sm text-red-600">{{ errors.main_image }}</p>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="images">Upload Additional
                        Images</label>
                    <input class="block w-full text-sm text-gray-900 border rounded-lg cursor-pointer bg-gray-50"
                        @input="productData.images = $event.target.files" multiple ref="inputImages" type="file"
                        id="images">
                    <p v-if="errors.images" class="mt-1 text-sm text-red-600">{{ errors.images }}</p>
                </div>

                <!-- Description Field -->
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <QuillEditor v-model:content="productData.description" contentType="html" theme="snow" />
                    <p v-if="errors.description" class="mt-1 text-sm text-red-600">{{ errors.description }}</p>
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 text-white font-medium rounded-lg text-lg w-full py-2">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({ errors: Object, categories: Object, product: Object });
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import Input from '@/Components/Form/Input.vue';
import { useForm, router } from '@inertiajs/vue3';
import { ref } from 'vue';

const productData = useForm({
    name: props.product.name,
    price: props.product.price,
    quantity: props.product.quantity,
    description: props.product.description,
    category_id: props.product.category_id,
    main_image: null,
    images: []
});

const inputMainImage = ref(null);
const inputImages = ref(null);

function update() {
    router.post(route('admin.products.update', props.product.id), {
        _method: 'put',
        forceFormData: true,
        name: productData.name,
        price: productData.price,
        quantity: productData.quantity,
        description: productData.description,
        category_id: productData.category_id,
        main_image: productData.main_image,
        images: productData.images,
    });
}
</script>
