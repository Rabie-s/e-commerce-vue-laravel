<template>
    <!-- Shipping Address Section -->
    <div class="bg-gray-100 p-5 rounded-lg">
        <h1 class="text-2xl font-bold mb-3">Shipping Address</h1>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <!-- First Name -->
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    First Name
                </label>
                <input v-model="formData.first_name" type="text" id="first_name"
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    required />
            </div>
            <!-- Last Name -->
            <div>
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Last Name
                </label>
                <input v-model="formData.last_name" type="text" id="last_name"
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    required />

            </div>
        </div>

        <!-- Country -->
        <div class="mb-4">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Country
            </label>
            <select v-model="formData.country" id="countries"
                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                <option selected>Choose a country</option>
                <option value="jordan">Jordan</option>
            </select>

        </div>

        <!-- Address Fields -->
        <div class="mb-4">
            <label for="area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Area
            </label>
            <input v-model="formData.area" type="text" id="area"
                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                required />

        </div>

        <div class="mb-4">
            <label for="street_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Street Address
            </label>
            <input v-model="formData.street_address" type="text" id="street_address"
                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                required />

        </div>

        <div class="mb-4">
            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Phone Number
            </label>
            <input v-model="formData.phone_number" type="text" id="phone_number"
                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                required />

        </div>
        <div class="mb-2 flex flex-col items-center gap-y-1">
            <button @click="insertShippingAddress" type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>

        </div>
    </div>

</template>
<script setup>
const props = defineProps({ userShippingAddress: Object, errors: Object })
import { Link, usePage, useForm, router } from '@inertiajs/vue3';


const formData = useForm({
    first_name: props.userShippingAddress?.first_name || '',
    last_name: props.userShippingAddress?.last_name || '',
    country: props.userShippingAddress?.country || '',
    area: props.userShippingAddress?.area || '',
    street_address: props.userShippingAddress?.street_address || '',
    phone_number: props.userShippingAddress?.phone_number || '',
})

function insertShippingAddress() {
    router.post(route('user.profile.insertShippingAddress'), formData)
}
</script>