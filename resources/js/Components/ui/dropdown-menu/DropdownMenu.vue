<script setup>
import { DropdownMenuRoot } from "radix-vue";

defineOptions({
    inheritAttrs: false,
});
</script>

<template>
    <DropdownMenuRoot v-bind="$attrs">
        <slot />
    </DropdownMenuRoot>
</template>
