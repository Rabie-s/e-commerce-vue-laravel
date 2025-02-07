<template>

    <div class="w-full md:w-4/5 mx-auto">

        <div class="my-10 p-5 bg-white shadow-lg rounded-2xl">
            <h1 class="text-3xl font-semibold text-gray-800 mb-5 text-center">Add New User</h1>
        </div>

        <div class="bg-white shadow-lg rounded-2xl p-6">
            <form @submit.prevent="store">
                <div class="mb-6">
                    <Input label="Name" type="text" v-model="formData.name" />
                    <p v-if="errors.name" class="mt-1 text-sm text-red-600 dark:text-red-500">{{ errors.name }}</p>
                </div>
                <div class="mb-6">
                    <Input label="Email" type="email" v-model="formData.email" />
                    <p v-if="errors.email" class="mt-1 text-sm text-red-600 dark:text-red-500">{{ errors.email }}</p>
                </div>
                <div class="mb-6">
                    <Input label="Password" type="text" v-model="formData.password" />
                    <p v-if="errors.password" class="mt-1 text-sm text-red-600 dark:text-red-500">{{ errors.password }}
                    </p>
                </div>
                <div class="mb-6">
                    <Input label="Phone Number" type="text" v-model="formData.phone_number" />
                    <p v-if="errors.phone_number" class="mt-1 text-sm text-red-600 dark:text-red-500">{{
                        errors.phone_number }}</p>
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

const formData = useForm({
    name: '',
    email: '',
    password: '',
    phone_number: ''
})

function store() {
    router.post(route('users.store'), formData);
    formData.reset()
}

</script>
