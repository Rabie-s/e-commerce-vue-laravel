<template>

</template>

<script setup>
const props = defineProps({
    type:String,
    message:String
})

import { toast } from 'vue3-toastify';
toast(props.message,{'type':props.type,'theme':'colored','autoClose':1000})

//toast.success(props.message, { autoClose: 700, theme: 'colored' });

</script>