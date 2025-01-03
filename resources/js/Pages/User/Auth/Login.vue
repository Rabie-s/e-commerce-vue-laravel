<template>
    <div class="flex items-center justify-center h-screen">

        <div class="bg-gray-200 p-5 rounded-lg w-96">

            <h1 class="text-3xl text-center font-bold">Login</h1>

            <form @submit.prevent="login">

                <Alert class="my-3" v-if="$page.props.flash.message" :message="$page.props.flash.message"
                    type="danger" />

                <div class="mb-2">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                        address</label>
                    <input type="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model="formData.email" required />
                    <p v-if="errors.email" class="mt-1 text-sm text-red-600 dark:text-red-500">{{ errors.email }}</p>
                </div>

                <div class="mb-2">
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model="formData.password" required />
                    <p v-if="errors.password" class="mt-1 text-sm text-red-600 dark:text-red-500">{{ errors.password }}</p>
                </div>


                <div class="mb-2 flex flex-col items-center gap-y-1">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>

                    <div>
                        <span class="text-gray-500 text-sm dark:text-gray-400">You don't have an account. Please </span>
                        <Link class="text-blue-600 hover:text-blue-500 text-sm"
                            :href="route('user.auth.showRegistrationForm')">Register
                        </Link>
                    </div>

                </div>

            </form>

        </div>


    </div>

</template>

<script setup>
defineProps({ errors: Object })
import { ref } from 'vue';
import { router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'
import Alert from '@/components/Alert.vue'

const formData = ref({
    email: '',
    password: '',

})

function login() {
    router.post(route('user.auth.loginUser'), formData.value)
}

</script>