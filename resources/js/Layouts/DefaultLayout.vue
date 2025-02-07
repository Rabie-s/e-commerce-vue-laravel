<template>
    <FlashMessage v-if="$page.props.flash.message" :type="$page.props.flash.message.type"
        :message="$page.props.flash.message.message" />
    <NavBar />
    <slot />
</template>

<script setup>
import NavBar from '@/Components/User/NavBar.vue'
import FlashMessage from '@/Components/User/FlashMessage.vue'
</script>