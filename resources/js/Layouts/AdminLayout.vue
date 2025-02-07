<template>
    <FlashMessage v-if="$page.props.flash.message" :type="$page.props.flash.message.type"
        :message="$page.props.flash.message.message" />
    <SideBar />

    <div class="p-4 sm:ml-64">
        <slot></slot>
    </div>

</template>
<script setup>
import SideBar from '@/Components/Admin/SideBar.vue'
import FlashMessage from '@/Components/User/FlashMessage.vue'
import { onMounted } from 'vue';
import { initFlowbite } from 'flowbite';

onMounted(() => {
    initFlowbite();
})

</script>