<template>

    <div class="container mx-auto mt-5 p-5">
        <!-- Shipping Address Section -->
        <div>
            <h1 class="text-2xl font-bold mb-3">Shipping Address</h1>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <!-- First Name -->
                <div>
                    <Input label="First Name" type="text" v-model="formData.shippingAddress.first_name" />
                    <p v-if="errors['shippingAddress.first_name']" class="mt-1 text-sm text-red-600 dark:text-red-500">
                        {{ errors['shippingAddress.first_name'] }}</p>
                </div>
                <!-- Last Name -->
                <div>
                    <Input label="Last Name" type="text" v-model="formData.shippingAddress.last_name" />
                    <p v-if="errors['shippingAddress.last_name']" class="mt-1 text-sm text-red-600 dark:text-red-500">{{
                        errors['shippingAddress.last_name'] }}</p>
                </div>
            </div>

            <!-- Country -->
            <div class="mb-4">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Country
                </label>
                <select v-model="formData.shippingAddress.country" id="countries"
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    <option selected>Choose a country</option>
                    <option value="jordan">Jordan</option>
                </select>
                <p v-if="errors['shippingAddress.country']" class="mt-1 text-sm text-red-600 dark:text-red-500">{{
                    errors['shippingAddress.country'] }}</p>

            </div>

            <!-- Address Fields -->
            <div class="mb-4">
                <label for="area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Area
                </label>
                <input v-model="formData.shippingAddress.area" type="text" id="area"
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    required />
                <p v-if="errors['shippingAddress.area']" class="mt-1 text-sm text-red-600 dark:text-red-500">{{
                    errors['shippingAddress.area'] }}</p>

            </div>

            <div class="mb-4">
                    <Input label="Street Address" type="text" v-model="formData.shippingAddress.street_address" />
                <p v-if="errors['shippingAddress.street_address']" class="mt-1 text-sm text-red-600 dark:text-red-500">
                    {{ errors['shippingAddress.street_address'] }}</p>

            </div>

            <div class="mb-4">
                    <Input label="Phone Number" type="text" v-model="formData.shippingAddress.phone_number" />
                <p v-if="errors['shippingAddress.phone_number']" class="mt-1 text-sm text-red-600 dark:text-red-500">{{
                    errors['shippingAddress.phone_number'] }}</p>

            </div>
        </div>

        <!-- Divider -->
        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

        <!-- Payment Method Section -->
        <div>
            <h1 class="text-2xl font-bold mb-3">Payment Method</h1>
            <ul class="grid gap-6">
                <li>
                    <input v-model="formData.orderPayment.payment_method" type="radio" id="cash-on-delivery"
                        name="payment" value="cash_on_delivery" class="hidden peer">
                    <label for="cash-on-delivery"
                        class="flex justify-between items-center w-full p-5 bg-white border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <span class="font-semibold text-sm">Cash on Delivery</span>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M7 6a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2h-2v-4a3 3 0 0 0-3-3H7V6Z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M2 11a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-7Zm7.5 1a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5Z"
                                clip-rule="evenodd" />
                            <path d="M10.5 14.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" />
                        </svg>
                    </label>
                </li>
                <!--                 <li>
                    <input v-model="formData.orderPayment.payment_method" type="radio" id="visa" name="payment"
                        value="visa" class="hidden peer">
                    <label for="visa"
                        class="flex justify-between items-center w-full p-5 bg-white border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <span class="font-semibold text-sm">Cash on Delivery</span>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M7 6a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2h-2v-4a3 3 0 0 0-3-3H7V6Z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M2 11a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-7Zm7.5 1a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5Z"
                                clip-rule="evenodd" />
                            <path d="M10.5 14.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" />
                        </svg>
                    </label>
                </li> -->
            </ul>
            <p v-if="errors['orderPayment.payment_method']" class="mt-1 text-sm text-red-600 dark:text-red-500">{{
                errors['orderPayment.payment_method'] }}</p>
        </div>

        <!-- Divider -->
        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

        <!-- Order Summary Section -->
        <div>
            <h1 class="text-2xl font-bold mb-3">Order Summary</h1>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="bg-gray-50 dark:bg-gray-700 text-xs uppercase text-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3"></th>
                            <th class="px-6 py-3">Product Name</th>
                            <th class="px-6 py-3">Quantity</th>
                            <th class="px-6 py-3">Price</th>
                        </tr>
                    </thead>
                    <tbody v-for="(item, index) in $page.props.cartContent">
                        <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="px-6 py-4"></td>
                            <th class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ item.name }}</th>
                            <td class="px-6 py-4">{{ item.qty }}</td>
                            <td class="px-6 py-4">{{ item.price }}$</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Order Total -->
            <ul class="p-4 my-3 bg-white border rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <li class="flex justify-between">
                    <span class="font-bold">Shipping</span>
                    <span>10$</span>
                </li>
                <li class="flex justify-between">
                    <span class="font-bold">Total</span>
                    <span>{{ cartTotal }}$</span>
                </li>
            </ul>

            <!-- Place Order Button -->
            <button @click="placeOrder" type="button"
                class="w-full py-2.5 px-5 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Place Order
            </button>
        </div>
    </div>




</template>

<script setup>
const props = defineProps({ userShippingAddress: Object, cartContent: Object, cartTotal: String, errors: Object })
import { router, useForm } from '@inertiajs/vue3'
import Input from '@/Components/Form/Input.vue'

const formData = useForm({

    shippingAddress: {
        first_name: props.userShippingAddress?.first_name || '',
        last_name: props.userShippingAddress?.last_name || '',
        country: props.userShippingAddress?.country || '',
        area: props.userShippingAddress?.area || '',
        street_address: props.userShippingAddress?.street_address || '',
        phone_number: props.userShippingAddress?.phone_number || '',
    },
    orderPayment: {
        payment_method: '',
    }
}

)



function placeOrder() {
    router.post(route('checkout.placeOrder'), formData)
    //formData.reset()
}

</script>
