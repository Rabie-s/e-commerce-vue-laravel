<template>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
        <!-- User Info Card -->
        <div
            class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 transition-transform transform hover:scale-105">
            <div class="flex items-center gap-3 mb-4">
                <svg class="w-6 h-6 text-gray-700 dark:text-gray-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <h5 class="text-2xl font-semibold text-gray-900 dark:text-white">User Info</h5>
            </div>
            <ul class="space-y-2">
                <li><span class="font-medium text-gray-700 dark:text-gray-300">Name: </span>{{ auth.user.name }}</li>
                <li><span class="font-medium text-gray-700 dark:text-gray-300">Email: </span>{{ auth.user.email }}</li>
                <li><span class="font-medium text-gray-700 dark:text-gray-300">Phone Number: </span>{{
                    auth.user.phone_number }}</li>
            </ul>
        </div>

        <!-- Order Info Card -->
        <div
            class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 transition-transform transform hover:scale-105">
            <div class="flex items-center gap-3 mb-4">
                <svg class="w-6 h-6 text-gray-700 dark:text-gray-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                    </path>
                </svg>
                <h5 class="text-2xl font-semibold text-gray-900 dark:text-white">Order Info</h5>
            </div>
            <ul class="space-y-2">
                <li>
                    <span class="font-medium text-gray-700 dark:text-gray-300">Status: </span>
                    <span :class="['px-2 py-1 rounded text-sm font-medium', statusClass(orderDetails.status)]">
                        {{ orderDetails.status }}
                    </span>
                </li>
                <li><span class="font-medium text-gray-700 dark:text-gray-300">Ordered at: </span>{{
                    orderDetails.created_at }}</li>
            </ul>
        </div>

        <!-- Payment Info Card -->
        <div
            class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 transition-transform transform hover:scale-105">
            <div class="flex items-center gap-3 mb-4">
                <svg class="w-6 h-6 text-gray-700 dark:text-gray-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                <h5 class="text-2xl font-semibold text-gray-900 dark:text-white">Payment Info</h5>
            </div>
            <ul class="space-y-2">
                <li><span class="font-medium text-gray-700 dark:text-gray-300">Payment Method: </span>{{
                    paymentDetails.payment_method }}</li>
                <li><span class="font-medium text-gray-700 dark:text-gray-300">Amount: </span>{{ paymentDetails.amount
                    }}</li>
                <li>
                    <span class="font-medium text-gray-700 dark:text-gray-300">Status: </span>
                    <span :class="['px-2 py-1 rounded text-sm font-medium', statusClass(paymentDetails.status)]">
                        {{ paymentDetails.status }}
                    </span>
                </li>
            </ul>
        </div>

        <!-- Shipping Address Card -->
        <div
            class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 transition-transform transform hover:scale-105">
            <div class="flex items-center gap-3 mb-4">
                <svg class="w-6 h-6 text-gray-700 dark:text-gray-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <h5 class="text-2xl font-semibold text-gray-900 dark:text-white">Shipping Address</h5>
            </div>
            <ul class="space-y-2">
                <li class="flex gap-4">
                    <span class="font-medium text-gray-700 dark:text-gray-300">First Name: </span>{{
                        shippingAddress.first_name }}
                    <span class="font-medium text-gray-700 dark:text-gray-300">Last Name: </span>{{
                        shippingAddress.last_name }}
                </li>
                <li><span class="font-medium text-gray-700 dark:text-gray-300">Country: </span>{{
                    shippingAddress.country }}</li>
                <li><span class="font-medium text-gray-700 dark:text-gray-300">Area: </span>{{ shippingAddress.area }}
                </li>
                <li><span class="font-medium text-gray-700 dark:text-gray-300">Street Address: </span>{{
                    shippingAddress.street_address }}</li>
                <li><span class="font-medium text-gray-700 dark:text-gray-300">Phone Number: </span>{{
                    shippingAddress.phone_number }}</li>
            </ul>
        </div>
    </div>

    <!-- Order Items Table -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-6">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Unit Price</th>
                    <th scope="col" class="px-6 py-3">Quantity</th>
                    <th scope="col" class="px-6 py-3">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(orderItem, index) in orderItems" :key="index"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <span class="flex items-center gap-x-2">
                            <img class="w-10 h-10 rounded-full" :src="orderItem.product.main_image_url" alt="Product image">
                            {{ orderItem.product.name }}
                        </span>
                    </th>
                    <td class="px-6 py-4">{{ orderItem.product.price }}</td>
                    <td class="px-6 py-4">{{ orderItem.quantity }}</td>
                    <td class="px-6 py-4">{{ orderItem.product.price * orderItem.quantity }}</td>
                </tr>
                <!-- Total Price Row -->
                <tr class="bg-gray-50 dark:bg-gray-700">
                    <td colspan="3" class="px-6 py-4 text-right font-medium text-gray-900 dark:text-white">Total Price:
                    </td>
                    <td class="px-6 py-4 font-bold text-gray-900 dark:text-white">
                        {{ orderItems.reduce((total, item) => total + (item.product.price * item.quantity), 0) }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Action Button -->
    <div class="flex justify-end p-6">
        <button class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            Contact Support
        </button>
    </div>
</template>
<script setup>
const props = defineProps({ auth: Object, orderDetails: Object, paymentDetails: Object, shippingAddress: Object, orderItems: Object })


const statusClass = (status) => {
    const statusClasses = {
        pending: 'bg-orange-100 text-orange-800',
        processing: 'bg-blue-100 text-blue-800',
        shipped: 'bg-blue-100 text-blue-800',
        paid: 'bg-green-100 text-green-800',
        delivered: 'bg-green-100 text-green-800',
        failed: 'bg-red-100 text-red-800',
        cancelled: 'bg-black text-white',
        refunded: 'bg-gray-100 text-gray-800',

    };
    // Return the corresponding class or a default class
    return statusClasses[status] || 'bg-gray-100 text-gray-800';
}

</script>