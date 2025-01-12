<template>

    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ props.label
        }}</label>
    <input v-bind="$attrs" :value="props.modelValue" @input="emit('update:modelValue', $event.target.value)"
        :type="props.type"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        :required="props.required" :disabled="props.disabled" :placeholder="props.placeholder" />

</template>
<script setup>
const props = defineProps({
    label: String,
    type: String,
    placeholder:String,
    required:{
        type:Boolean,
        default:true
    },
    disabled:{
        type:Boolean,
        default:false
    },
    modelValue: [String,Number,null]
})
const emit = defineEmits(['update:modelValue'])

</script>