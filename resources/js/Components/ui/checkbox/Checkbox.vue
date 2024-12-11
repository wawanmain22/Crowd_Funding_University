<script setup>
import { ref } from "vue";
import { cn } from "@/lib/utils";
import { Check } from "lucide-vue-next";

const props = defineProps({
    modelValue: {
        type: Boolean,
        default: false,
    },
    id: {
        type: String,
        default: undefined,
    },
    class: {
        type: String,
        default: "",
    },
});

const emit = defineEmits(["update:modelValue"]);

const isChecked = ref(props.modelValue);

const toggleCheckbox = () => {
    isChecked.value = !isChecked.value;
    emit("update:modelValue", isChecked.value);
};
</script>

<template>
    <div class="flex items-center space-x-2">
        <button
            type="button"
            role="checkbox"
            :aria-checked="isChecked"
            :id="id"
            @click="toggleCheckbox"
            :class="
                cn(
                    'peer h-4 w-4 shrink-0 rounded-sm border border-primary ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 data-[state=checked]:bg-primary data-[state=checked]:text-primary-foreground',
                    isChecked
                        ? 'bg-primary text-primary-foreground'
                        : 'bg-background',
                    props.class
                )
            "
        >
            <Check v-if="isChecked" class="h-4 w-4 text-current" />
        </button>
        <slot />
    </div>
</template>
