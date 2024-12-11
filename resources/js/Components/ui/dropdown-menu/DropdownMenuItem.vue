<script setup>
import { DropdownMenuItem } from "radix-vue";
import { cn } from "@/lib/utils";

const props = defineProps({
    class: {
        type: String,
        default: "",
    },
    inset: {
        type: Boolean,
        default: false,
    },
});
</script>

<template>
    <DropdownMenuItem
        :class="
            cn(
                'relative flex w-full cursor-default select-none items-center rounded-sm px-2 py-2.5 text-sm outline-none transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50',
                'hover:bg-gray-100 dark:hover:bg-gray-800',
                inset && 'pl-8',
                props.class
            )
        "
    >
        <slot />
    </DropdownMenuItem>
</template>
