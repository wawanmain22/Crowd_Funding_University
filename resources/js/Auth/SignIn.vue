<template>
    <div class="min-h-screen bg-background">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="flex items-center justify-center mb-4">
                <GraduationCap
                    class="h-12 w-12 text-blue-500 dark:text-blue-400"
                />
            </div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                Masuk ke CrowdFund University
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                Masuk dan lanjutkan berkontribusi untuk pendidikan Indonesia
            </p>
        </div>

        <!-- Form Container -->
        <div
            class="max-w-md mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-sm p-8 border border-gray-200 dark:border-gray-700"
        >
            <div class="space-y-6">
                <!-- Email -->
                <div class="space-y-2">
                    <FormLabel
                        for="email"
                        class="text-gray-700 dark:text-gray-200"
                        >Email</FormLabel
                    >
                    <div class="relative">
                        <Mail
                            class="absolute left-3 top-3 h-4 w-4 text-gray-500 dark:text-gray-400"
                        />
                        <FormInput
                            id="email"
                            v-model="form.email"
                            type="email"
                            placeholder="nama@email.com"
                            class="pl-9 w-full bg-white dark:bg-gray-900 border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100"
                            :class="{
                                'border-red-500 dark:border-red-500':
                                    errors.email,
                            }"
                        />
                    </div>
                    <span v-if="errors.email" class="text-sm text-red-500">{{
                        errors.email
                    }}</span>
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <div class="flex justify-between items-center">
                        <FormLabel
                            for="password"
                            class="text-gray-700 dark:text-gray-200"
                            >Password</FormLabel
                        >
                        <Link
                            href="/forgot-password"
                            class="text-sm text-blue-500 dark:text-blue-400 hover:underline"
                        >
                            Lupa password?
                        </Link>
                    </div>
                    <div class="relative">
                        <Lock
                            class="absolute left-3 top-3 h-4 w-4 text-gray-500 dark:text-gray-400"
                        />
                        <FormInput
                            id="password"
                            v-model="form.password"
                            :type="showPassword ? 'text' : 'password'"
                            placeholder="Masukkan password"
                            class="pl-9 w-full bg-white dark:bg-gray-900 border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100"
                            :class="{
                                'border-red-500 dark:border-red-500':
                                    errors.password,
                            }"
                        />
                        <button
                            type="button"
                            @click="showPassword = !showPassword"
                            class="absolute right-3 top-3"
                        >
                            <Eye
                                v-if="!showPassword"
                                class="h-4 w-4 text-gray-500 dark:text-gray-400"
                            />
                            <EyeOff
                                v-else
                                class="h-4 w-4 text-gray-500 dark:text-gray-400"
                            />
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
                        class="data-[state=checked]:bg-blue-500 dark:data-[state=checked]:bg-blue-400"
                    />
                    <FormLabel
                        for="remember"
                        class="text-sm leading-none text-gray-700 dark:text-gray-200"
                    >
                        Ingat saya
                    </FormLabel>
                </div>

                <!-- Submit Button -->
                <div class="flex flex-col space-y-4 pt-4">
                    <Button
                        class="w-full bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white"
                        :disabled="!isFormValid || processing"
                        @click="submit"
                    >
                        <Loader2
                            v-if="processing"
                            class="mr-2 h-4 w-4 animate-spin"
                        />
                        <LogIn v-else class="mr-2 h-4 w-4" />
                        Masuk
                    </Button>
                    <p
                        class="text-center text-sm text-gray-600 dark:text-gray-400"
                    >
                        Belum punya akun?
                        <Link
                            href="/register"
                            class="text-blue-500 dark:text-blue-400 hover:underline"
                        >
                            Daftar di sini
                        </Link>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed } from "vue";
import { Link, useForm } from "@inertiajs/vue3";
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

const isFormValid = computed(() => {
    return (
        form.email &&
        form.password &&
        form.email.includes("@") &&
        form.password.length >= 8
    );
});

const submit = () => {
    if (!isFormValid.value) return;

    processing.value = true;
    form.post("/login", {
        onSuccess: () => {
            processing.value = false;
        },
        onError: (err) => {
            errors.value = err;
            processing.value = false;
        },
    });
};
</script>
