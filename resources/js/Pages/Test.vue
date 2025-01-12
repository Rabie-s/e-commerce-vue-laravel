<template>
<Input v-model="UserName" label="User Name" type="number"/>
{{ UserName }}
</template>
<script setup>
import Input from '../Components/Form/Input.vue';
import { ref } from 'vue';

const UserName = ref('')

</script>