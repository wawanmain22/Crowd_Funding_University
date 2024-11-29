<template>
    <div class="space-y-6">
        <DialogHeader className="space-y-1">
            <div class="flex items-center justify-center mb-4">
                <GraduationCap class="h-10 w-10 text-blue-500" />
            </div>
            <DialogTitle class="text-2xl text-center">
                Masuk ke CrowdFund University
            </DialogTitle>
            <DialogDescription class="text-center">
                Masuk dan lanjutkan berkontribusi untuk pendidikan Indonesia
            </DialogDescription>
        </DialogHeader>

        <div class="space-y-4">
            <!-- Email -->
            <div class="space-y-2">
                <FormLabel for="email">Email</FormLabel>
                <div class="relative">
                    <Mail class="absolute left-3 top-3 h-4 w-4 text-gray-500" />
                    <FormInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        placeholder="nama@email.com"
                        class="pl-9 w-full border border-input ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
                        :class="{ 'border-red-500 ring-red-500': errors.email }"
                    />
                </div>
                <span v-if="errors.email" class="text-sm text-red-500">{{
                    errors.email
                }}</span>
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <div class="flex justify-between items-center">
                    <FormLabel for="password">Password</FormLabel>
                    <Link
                        href="/forgot-password"
                        class="text-sm text-blue-500 hover:underline"
                    >
                        Lupa password?
                    </Link>
                </div>
                <div class="relative">
                    <Lock class="absolute left-3 top-3 h-4 w-4 text-gray-500" />
                    <FormInput
                        id="password"
                        v-model="form.password"
                        :type="showPassword ? 'text' : 'password'"
                        placeholder="Masukkan password"
                        class="pl-9 w-full border border-input ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
                        :class="{
                            'border-red-500 ring-red-500': errors.password,
                        }"
                    />
                    <button
                        type="button"
                        @click="showPassword = !showPassword"
                        class="absolute right-3 top-3"
                    >
                        <Eye
                            v-if="!showPassword"
                            class="h-4 w-4 text-gray-500"
                        />
                        <EyeOff v-else class="h-4 w-4 text-gray-500" />
                    </button>
                </div>
                <span v-if="errors.password" class="text-sm text-red-500">{{
                    errors.password
                }}</span>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center space-x-2">
                <FormCheckbox
                    id="remember"
                    v-model="form.remember"
                    class="data-[state=checked]:bg-blue-500"
                />
                <FormLabel
                    for="remember"
                    class="text-sm leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                >
                    Ingat saya
                </FormLabel>
            </div>
        </div>

        <div class="flex flex-col space-y-4">
            <Button
                class="w-full"
                :disabled="!isFormValid || processing"
                @click="submit"
            >
                <Loader2 v-if="processing" class="mr-2 h-4 w-4 animate-spin" />
                <LogIn v-else class="mr-2 h-4 w-4" />
                Masuk
            </Button>
            <p class="text-center text-sm text-gray-600">
                Belum punya akun?
                <Button
                    variant="link"
                    class="text-blue-500 hover:underline p-0"
                    @click="openSignUp"
                >
                    Daftar di sini
                </Button>
            </p>
        </div>
    </div>
</template>

<script setup>
import { ref, computed } from "vue";
import { Link, useForm } from "@inertiajs/vue3";
import {
    DialogHeader,
    DialogTitle,
    DialogDescription,
} from "@/Components/ui/dialog";
import { Button } from "@/Components/ui/button";
import { Input as FormInput } from "@/Components/ui/input";
import { Label as FormLabel } from "@/Components/ui/label";
import { Checkbox as FormCheckbox } from "@/Components/ui/checkbox";
import {
    GraduationCap,
    Mail,
    Lock,
    Eye,
    EyeOff,
    LogIn,
    Loader2,
} from "lucide-vue-next";

const showPassword = ref(false);

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const processing = ref(false);
const errors = ref({});

// Validasi form
const isFormValid = computed(() => {
    return (
        form.email &&
        form.password &&
        form.email.includes("@") &&
        form.password.length >= 8
    );
});

const emit = defineEmits(["close", "openSignUp"]);

const openSignUp = () => {
    emit("close");
    emit("openSignUp");
};

const submit = () => {
    if (!isFormValid.value) return;

    processing.value = true;
    form.post("/login", {
        onSuccess: () => {
            processing.value = false;
            emit("close");
        },
        onError: (err) => {
            errors.value = err;
            processing.value = false;
        },
    });
};
</script>
