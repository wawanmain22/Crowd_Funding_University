<script setup>
import { cn } from "@/lib/utils";

defineProps({
    value: {
        type: String,
        default: "",
    },
    htmlFor: {
        type: String,
        default: "",
    },
    class: {
        type: String,
        default: "",
    },
});
</script>

<template>
    <label
        :for="htmlFor"
        :class="
            cn(
                'block text-sm font-medium text-gray-700 dark:text-gray-300',
                $props.class
            )
        "
    >
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
