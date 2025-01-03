<template>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">

        <div class="max-w-screen-xl block md:flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>
            <div class="flex justify-around items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

                <!-- Dropdown menu -->
                <div>
                    <button type="button" class="flex text-base rounded-full md:me-0 hover:text-blue-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        Account
                    </button>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900 dark:text-white">{{ userName }}</span>
                            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ userEmail
                                }}</span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <template v-if="page.props.auth.user">
                                <li>
                                    <Link href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">My Profile</Link>
                                </li>
                                <li>
                                    <a href="#" @click="logout"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                        out</a>
                                </li>
                            </template>

                            <template v-if="!page.props.auth.user">
                                <li>
                                    <Link :href="route('user.auth.showLoginForm')"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Login</Link>
                                </li>
                                <li>
                                    <Link :href="route('user.auth.showRegistrationForm')"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Register</Link>
                                </li>
                            </template>


                        </ul>
                    </div>
                </div>



                <!--Cart button-->
                <div>
                    <Link :href="route('cart.index')">
                    <button type="button" class="relative p-1">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M4 4a1 1 0 0 1 1-1h1.5a1 1 0 0 1 .979.796L7.939 6H19a1 1 0 0 1 .979 1.204l-1.25 6a1 1 0 0 1-.979.796H9.605l.208 1H17a3 3 0 1 1-2.83 2h-2.34a3 3 0 1 1-4.009-1.76L5.686 5H5a1 1 0 0 1-1-1Z"
                                clip-rule="evenodd" />
                        </svg>
                        <div
                            class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
                            {{ cartCount }}</div>
                    </button>
                    </Link>
                </div>

                <div>
                    <button data-collapse-toggle="navbar-user" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-user" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>

            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <Link :href="route('home.index')"  :class="{'text-blue-700':$page.url.startsWith('/')}" 
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Home</Link>
                    </li>
                    <li>
                        <Link :class="{'text-blue-700':$page.url.startsWith('/products')}" :href="route('products.index')"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Store</Link>

                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="bg-gray-50 dark:bg-gray-700">
        <div class="max-w-screen-xl px-4 py-3 mx-auto">
            <div class="flex items-center">
                <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                    <li v-for="(category, index) in $page.props.categories">
                        <Link :href="route('products.showProductsByCategories', category.id)"
                            class="text-gray-900 dark:text-white hover:underline">{{ category.name }}</Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
<script setup>
defineProps({ auth: Object })
import { Link, router, usePage } from '@inertiajs/vue3'
import { computed } from 'vue';
const page = usePage()


const userName = computed(() => {
    if (!page.props.auth.user) {
        return 'Guest'
    }
    return page.props.auth.user.name
})

const userEmail = computed(() => {
    if (!page.props.auth.user) {
        return ''
    }
    return page.props.auth.user.email
})

const cartCount = computed(() => {
    return page.props.cartCount
})


function logout() {
    router.post(route('user.auth.logoutUser'));
}
</script>