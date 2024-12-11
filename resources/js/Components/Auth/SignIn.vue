<template>
    <form @submit.prevent="submit" class="min-h-screen bg-background">
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
                <!-- Username -->
                <div class="space-y-2">
                    <InputLabel
                        htmlFor="username"
                        class="text-gray-700 dark:text-gray-200"
                    >
                        Username
                    </InputLabel>
                    <div class="relative">
                        <User
                            class="absolute left-3 top-3 h-4 w-4 text-gray-500 dark:text-gray-400"
                        />
                        <TextInput
                            id="username"
                            v-model="form.username"
                            type="text"
                            placeholder="Masukkan username"
                            class="pl-9 w-full bg-white dark:bg-gray-900 border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100"
                            required
                            autofocus
                        />
                    </div>
                    <InputError :message="form.errors.username" />
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <InputLabel
                        htmlFor="password"
                        class="text-gray-700 dark:text-gray-200"
                    >
                        Password
                    </InputLabel>
                    <div class="relative">
                        <Lock
                            class="absolute left-3 top-3 h-4 w-4 text-gray-500 dark:text-gray-400"
                        />
                        <TextInput
                            id="password"
                            v-model="form.password"
                            :type="showPassword ? 'text' : 'password'"
                            placeholder="Masukkan password"
                            class="pl-9 w-full bg-white dark:bg-gray-900 border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100"
                            required
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
                    <InputError :message="form.errors.password" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center space-x-2">
                    <Checkbox v-model="form.remember" id="remember" />
                    <label
                        for="remember"
                        class="text-sm text-gray-600 dark:text-gray-300 cursor-pointer"
                    >
                        Ingat saya
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="flex flex-col space-y-4 pt-4">
                    <Button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white"
                        :class="{
                            'opacity-50 cursor-not-allowed': form.processing,
                        }"
                        :disabled="form.processing"
                    >
                        <LogIn class="w-4 h-4 mr-2" v-if="!form.processing" />
                        <Loader2 class="w-4 h-4 mr-2 animate-spin" v-else />
                        {{ form.processing ? "Memproses..." : "Masuk" }}
                    </Button>

                    <p
                        class="text-center text-sm text-gray-600 dark:text-gray-400"
                    >
                        Belum punya akun?
                        <Link
                            :href="route('register')"
                            class="text-blue-500 dark:text-blue-400 hover:underline"
                        >
                            Daftar di sini
                        </Link>
                    </p>
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import { ref } from "vue";
import { useForm, Link } from "@inertiajs/vue3";
import { Button } from "@/Components/ui/button";
import { Checkbox } from "@/Components/ui/checkbox";
import { InputError, InputLabel, TextInput } from "@/Components/ui/input";
import {
    GraduationCap,
    User,
    Lock,
    Eye,
    EyeOff,
    LogIn,
    Loader2,
} from "lucide-vue-next";

const showPassword = ref(false);

const form = useForm({
    username: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login.store"), {
        onFinish: () => {
            form.reset("password");
        },
    });
};
</script>
