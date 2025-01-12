<template>
  <h1 class="text-4xl text-center font-bold my-4">My Shopping Cart</h1>

  <div class="container mx-auto space-y-6">
    <!-- Empty Cart Message -->
    <div v-if="cartContent.length === 0" class="text-center py-10">
      <p class="text-lg text-gray-500 dark:text-gray-400">Your cart is currently empty.</p>
      <Link :href="route('products.index')"
        class="mt-4 inline-block px-5 py-2.5 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
      Browse Products
      </Link>
    </div>

    <!-- Cart Table -->
    <div v-else>
      <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-16 py-3">
                <span class="sr-only">Image</span>
              </th>
              <th scope="col" class="px-6 py-3">Product</th>
              <th scope="col" class="px-6 py-3">Qty</th>
              <th scope="col" class="px-6 py-3">Price</th>
              <th scope="col" class="px-6 py-3">Action</th>
            </tr>
          </thead>
          <tbody v-for="(item, index) in $page.props.cartContent" :key="item.rowId">
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <td class="p-4">
                <img :src="item.options.main_image" class="w-16 md:w-20 max-w-full max-h-full" :alt="item.name" />
              </td>
              <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ item.name }}</td>
              <td class="px-6 py-4">
                <div class="flex items-center">
                  <input @change="updateItem(item.rowId, item.qty)" type="number" v-model="item.qty" min="1"
                    class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="1" required aria-label="Quantity for {{ item.name }}" />
                </div>
              </td>
              <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">${{ item.subtotal }}</td>
              <td class="px-6 py-4">
                <button @click="removeItem(item.rowId)"
                  class="flex items-center text-red-600 dark:text-red-500 hover:underline"
                  aria-label="Remove {{ item.name }}">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                  Remove
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Cart Summary -->
      <div
        class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-4">
        <ul class="space-y-2 text-lg">
          <li class="flex justify-between">
            <span class="font-bold">Subtotal:</span>
            <span>{{ cartTotal }}$</span>
          </li>
        </ul>

        <Link :href="route('checkout.index')">
        <button type="button"
          class="mt-4 w-full px-5 py-2.5 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Checkout
        </button>
        </Link>

        
        <button @click="destroyCart" type="button"
          class="mt-4 w-full px-5 py-2.5 text-sm font-medium text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
          Empty cart
        </button>
        

      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({ cartContent: Object, cartTotal: String });
import { router, Link } from "@inertiajs/vue3";

function updateItem(rowId, qty) {
  const data = { rowId, qty };
  router.put(route("cart.updateItem", data));
}

function removeItem(rowId) {
  const data = { rowId };
  router.delete(route("cart.removeItem", data));
}

function destroyCart(){
  router.delete(route('cart.destroyCart'))
}
</script>