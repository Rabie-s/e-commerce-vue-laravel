<template>
    <div class="container mx-auto mt-5">
        <!-- Shipping Address Section -->
        <div>
            <h1 class="text-2xl font-bold mb-3">Shipping Address</h1>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <!-- First Name -->
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        First Name
                    </label>
                    <input type="text" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        required />
                </div>
                <!-- Last Name -->
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Last Name
                    </label>
                    <input type="text" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        required />
                </div>
            </div>

            <!-- Country -->
            <div class="mb-4">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Country
                </label>
                <select id="countries"
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    <option selected>Choose a country</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="FR">France</option>
                    <option value="DE">Germany</option>
                </select>
            </div>

            <!-- Address Fields -->
            <div class="mb-4">
                <label for="area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Area
                </label>
                <input type="text" id="area"
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    required />
            </div>

            <div class="mb-4">
                <label for="street_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Street Address
                </label>
                <input type="text" id="street_address"
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    required />
            </div>

            <div class="mb-4">
                <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Phone Number
                </label>
                <input type="text" id="phone_number"
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    required />
            </div>
        </div>

        <!-- Divider -->
        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

        <!-- Payment Method Section -->
        <div>
            <h1 class="text-2xl font-bold mb-3">Payment Method</h1>
            <ul class="grid gap-6">
                <li>
                    <input type="radio" id="cash-on-delivery" name="payment" value="cash-on-delivery" class="hidden peer">
                    <label for="cash-on-delivery"
                        class="flex justify-between items-center w-full p-5 bg-white border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <span class="font-semibold text-sm">Cash on Delivery</span>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 24 24">
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
            </ul>
        </div>

        <!-- Divider -->
        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

        <!-- Order Summary Section -->
        <div>
            <h1 class="text-2xl font-bold mb-3">Order Summary</h1>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="bg-gray-50 dark:bg-gray-700 text-xs uppercase text-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3"></th>
                        <th class="px-6 py-3">Product Name</th>
                        <th class="px-6 py-3">Quantity</th>
                        <th class="px-6 py-3">Price</th>
                    </tr>
                </thead>
                <tbody v-for="(item, index) in cartContent">
                    <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4"></td>
                        <th class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ item.name }}</th>
                        <td class="px-6 py-4">{{ item.qty }}</td>
                        <td class="px-6 py-4">{{ item.price }}$</td>
                    </tr>
                </tbody>
            </table>

            <!-- Order Total -->
            <ul class="p-4 my-3 bg-white border rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <li class="flex justify-between">
                    <span class="font-bold">Shipping</span>
                    <span>10$</span>
                </li>
                <li class="flex justify-between">
                    <span class="font-bold">Total</span>
                    <span>200$</span>
                </li>
            </ul>

            <!-- Place Order Button -->
            <button type="button"
                class="w-full py-2.5 px-5 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Place Order
            </button>
        </div>
    </div>
</template>

<script setup>
defineProps({ cartContent: Object })
</script>
