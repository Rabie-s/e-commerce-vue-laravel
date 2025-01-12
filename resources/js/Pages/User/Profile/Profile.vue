<template>
    <div class="bg-gray-100 p-6 rounded-lg shadow-md">

        <!-- Full Name -->
        <div class="mb-4">
            <Input label="Full Name" type="text" v-model="formData.name" :disabled="true" />
            <p id="full-name-help" class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                Your full name as registered.
            </p>
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <Input label="Email" type="email" v-model="formData.email" :disabled="true" />
            <p id="email-help" class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                Your registered email address.
            </p>
        </div>

        <!-- Phone Number -->
        <div class="mb-4">
            <Input label="Phone Number" type="text" v-model="formData.phone_number" :disabled="true" />
            <p id="phone-number-help" class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                Your registered phone number.
            </p>
        </div>

        <form @submit.prevent="changePassword">
            <!-- Password Change Section -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Change Password</h3>
                <!-- Current Password -->
                <div class="mb-4">
                    <Input label="Current Password" type="password" placeholder="Enter Current Password"
                        v-model="newPassword.currentPassword" />
                    <p v-if="errors.currentPassword" class="mt-1 text-sm text-red-600 dark:text-red-500">{{
                        errors.currentPassword }}</p>
                </div>
                <!-- New Password -->
                <div class="mb-4">
                    <Input label="New Password" type="password" placeholder="Enter New Password"
                        v-model="newPassword.newPassword" />
                    <p v-if="errors.newPassword" class="mt-1 text-sm text-red-600 dark:text-red-500">{{
                        errors.newPassword }}</p>
                </div>
                <!-- Confirm New Password -->
                <div class="mb-4">
                    <Input label="Confirm New Password" type="password" placeholder="Confirm New Password"
                        v-model="newPassword.confirmNewPassword" />
                    <p v-if="errors.confirmNewPassword" class="mt-1 text-sm text-red-600 dark:text-red-500">{{
                        errors.confirmNewPassword }}</p>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Change Password
                </button>
            </div>
        </form>
    </div>




</template>

<script setup>
defineProps({ errors: Object })
import { Link, usePage, useForm, router } from '@inertiajs/vue3';
import Input from '@/Components/Form/Input.vue'
const page = usePage()

const formData = useForm({
    name: page.props.auth.user.name,
    email: page.props.auth.user.email,
    phone_number: page.props.auth.user.phone_number,

})

const newPassword = useForm({
    currentPassword: '',
    newPassword: '',
    confirmNewPassword: ''
})

function changePassword() {
    router.post(route('user.auth.changePassword'), newPassword)
    newPassword.reset()
}
</script>