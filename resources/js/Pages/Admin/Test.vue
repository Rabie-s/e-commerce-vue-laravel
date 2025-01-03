<template>
    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="#" class="text-2xl font-bold text-blue-600">
                        ShopLogo
                    </a>
                </div>
                <!-- Links -->
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-800 hover:text-blue-600">Home</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600">Shop</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600">Deals</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600">Contact</a>
                </div>
                <!-- Search and Cart -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text"
                            class="border border-gray-300 rounded-lg py-2 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search">
                        <div class="absolute left-3 top-2.5 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 16l-4-4m0 0l4-4m-4 4h16" />
                            </svg>
                        </div>
                    </div>
                    <a href="#" class="relative text-gray-800 hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3z" />
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full px-1">3</span>
                    </a>
                </div>
                <!-- Mobile Menu Button -->
                <div class="-mr-2 flex md:hidden">
                    <button type="button"
                        class="bg-gray-100 p-2 rounded-md inline-flex items-center justify-center text-gray-500 hover:text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</template>
<script setup>

</script>