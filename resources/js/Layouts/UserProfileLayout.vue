<template>

    <SideNavProfile />

    <div class="p-4 sm:ml-64">
        <div class="p-4 ">
            <slot></slot>
        </div>
    </div>


</template>
<script setup>
import  SideNavProfile  from '@/Components/User/SideNavProfile.vue'


</script>