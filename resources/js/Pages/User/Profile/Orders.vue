<template>




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
                        Ordered at
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Order Details
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(order,index) in orders.data" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{order.id}}
                    </th>
                    <td class="px-6 py-4">
                        <span :class="['px-2 py-1 rounded text-sm font-medium', statusClass(order.status)]">
                            {{order.status}}
                        </span>
                        
                    </td>
                    <td class="px-6 py-4">
                        {{order.created_at}}
                    </td>
                    <td class="px-6 py-4">
                        <Link :href="route('user.profile.orderDetails',order.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Preview</Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="flex justify-center mt-6">
            <Pagination :links="orders.links" />
        </div>


</template>
<script setup>
const props = defineProps({orders:Object})
import { Link } from '@inertiajs/vue3';
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

</script>