<script setup>
import { DropdownMenuTrigger } from "radix-vue";

defineOptions({
    inheritAttrs: false,
});
</script>

<template>
    <DropdownMenuTrigger v-bind="$attrs">
        <slot />
    </DropdownMenuTrigger>
</template>
