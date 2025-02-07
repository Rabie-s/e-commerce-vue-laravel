<template>

    <div class="w-full md:w-4/5 mx-auto">

        <div class="my-10 p-5 bg-white shadow-lg rounded-2xl">
            <h1 class="text-3xl font-semibold text-gray-800 mb-5 text-center">Add New Category</h1>
        </div>

        <div class="bg-white shadow-lg rounded-2xl p-6">
            <form @submit.prevent="store">
                <div class="mb-6">
                    <Input label="Name" type="text" v-model="formData.name" />
                    <p v-if="errors.name" class="mt-1 text-sm text-red-600 dark:text-red-500">{{ errors.name }}</p>
                </div>
                <div class="mb-6">

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                        Image</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        @input="formData.main_image = $event.target.files[0]" ref="inputMainImage" type="file">
                    <p v-if="errors.main_image" class="mt-1 text-sm text-red-600 dark:text-red-500">{{ errors.main_image
                        }}</p>

                </div>
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
defineProps({ errors: Object })
import Input from '@/Components/Form/Input.vue'
import { useForm, router } from '@inertiajs/vue3';
import { ref } from 'vue';

const formData = useForm({
    name: '',
    main_image: '',
})
const inputMainImage = ref('');

function store() {
    router.post(route('categories.store'), formData, {
        forceFormData: true,
    });
    formData.reset()
    inputMainImage.value.value = null
}

</script>
