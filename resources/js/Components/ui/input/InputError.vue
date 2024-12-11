<script setup>
import { cn } from "@/lib/utils";

defineProps({
    message: {
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
    <div v-show="message">
        <p :class="cn('text-sm text-red-600 dark:text-red-400', $props.class)">
            {{ message }}
        </p>
    </div>
</template>
