<template>

    <div class="container">

        <div class="my-4">
            <Link :href="route('categories.create')"
                class="space-x-1 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-5 h-5  text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                    clip-rule="evenodd" />
            </svg>

            <span>Add New Category</span>
            </Link>

        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Order ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User Name
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                </thead>
                <tbody v-for="(order, index) in orders.data">
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ order.id }}
                        </th>
                        <td class="px-6 py-4">
                            <span :class="['px-2 py-1 rounded text-sm font-medium',statusClass(order.status)]">{{ order.status }}</span>
                            
                        </td>
                        <td class="px-6 py-4">
                            {{ order.user.name }}
                        </td>
                        <td class="px-6 py-4 flex flex-col md:flex-row">

                            <Link :href="route('orders.show', order.id)">
                            <button
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 text-white dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm4.996 2a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 8a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 11a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 14a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Z"
                                        clip-rule="evenodd" />
                                </svg>


                                <span class="sr-only">Icon description</span>
                            </button>
                            </Link>


                        </td>

                    </tr>
                </tbody>
            </table>

        </div>
        <!-- Pagination -->
        <div v-if="orders.links && orders.links.length > 1" class="flex justify-center mt-6">
            <Pagination :links="orders.links" />
        </div>

    </div>




</template>

<script setup>
defineProps({ orders: Object })
import { Link, router } from '@inertiajs/vue3';
import Pagination from '@/Components/User/Pagination.vue';

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

function destroy(id) {
    router.delete(route('categories.destroy', id));
}

</script>