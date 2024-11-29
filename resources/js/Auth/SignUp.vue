<template>
    <div class="space-y-6">
        <DialogHeader className="space-y-1">
            <div class="flex items-center justify-center mb-4">
                <GraduationCap class="h-10 w-10 text-blue-500" />
            </div>
            <DialogTitle class="text-2xl text-center">
                Bergabung dengan CrowdFund University
            </DialogTitle>
            <DialogDescription class="text-center">
                Daftar dan mulai berkontribusi untuk pendidikan Indonesia
            </DialogDescription>
        </DialogHeader>

        <div class="space-y-4">
            <!-- Nama Lengkap -->
            <div class="space-y-2">
                <FormLabel for="name">Nama Lengkap</FormLabel>
                <div class="relative">
                    <User class="absolute left-3 top-3 h-4 w-4 text-gray-500" />
                    <FormInput
                        id="name"
                        v-model="form.name"
                        type="text"
                        placeholder="Masukkan nama lengkap"
                        class="pl-9 w-full border border-input ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
                        :class="{ 'border-red-500 ring-red-500': errors.name }"
                    />
                </div>
                <span v-if="errors.name" class="text-sm text-red-500">{{
                    errors.name
                }}</span>
            </div>

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
                <FormLabel for="password">Password</FormLabel>
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

            <!-- Konfirmasi Password -->
            <div class="space-y-2">
                <FormLabel for="password_confirmation"
                    >Konfirmasi Password</FormLabel
                >
                <div class="relative">
                    <Lock class="absolute left-3 top-3 h-4 w-4 text-gray-500" />
                    <FormInput
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        :type="showConfirmPassword ? 'text' : 'password'"
                        placeholder="Konfirmasi password"
                        class="pl-9 w-full border border-input ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
                    />
                    <button
                        type="button"
                        @click="showConfirmPassword = !showConfirmPassword"
                        class="absolute right-3 top-3"
                    >
                        <Eye
                            v-if="!showConfirmPassword"
                            class="h-4 w-4 text-gray-500"
                        />
                        <EyeOff v-else class="h-4 w-4 text-gray-500" />
                    </button>
                </div>
            </div>

            <!-- Terms & Conditions -->
            <div class="space-y-2">
                <div class="flex items-center space-x-2">
                    <FormCheckbox
                        id="terms"
                        v-model="form.terms"
                        :disabled="!isFormValid"
                        class="data-[state=checked]:bg-blue-500"
                    />
                    <FormLabel
                        for="terms"
                        class="text-sm leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                    >
                        Saya setuju dengan
                        <Link
                            href="/terms"
                            class="text-blue-500 hover:underline"
                        >
                            Syarat & Ketentuan
                        </Link>
                        serta
                        <Link
                            href="/privacy"
                            class="text-blue-500 hover:underline"
                        >
                            Kebijakan Privasi
                        </Link>
                    </FormLabel>
                </div>
                <span v-if="errors.terms" class="text-sm text-red-500">{{
                    errors.terms
                }}</span>
            </div>
        </div>

        <div class="flex flex-col space-y-4">
            <Button
                class="w-full"
                :disabled="!isFormValid || !form.terms || processing"
                @click="submit"
            >
                <Loader2 v-if="processing" class="mr-2 h-4 w-4 animate-spin" />
                <UserPlus v-else class="mr-2 h-4 w-4" />
                Daftar Sekarang
            </Button>
            <p class="text-center text-sm text-gray-600">
                Sudah punya akun?
                <Link href="/login" class="text-blue-500 hover:underline">
                    Masuk di sini
                </Link>
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
    User,
    Mail,
    Lock,
    Eye,
    EyeOff,
    UserPlus,
    Loader2,
} from "lucide-vue-next";

const showPassword = ref(false);
const showConfirmPassword = ref(false);

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const processing = ref(false);
const errors = ref({});

// Validasi form
const isFormValid = computed(() => {
    return (
        form.name &&
        form.email &&
        form.password &&
        form.password_confirmation &&
        form.password === form.password_confirmation &&
        form.email.includes("@") &&
        form.password.length >= 8
    );
});

const emit = defineEmits(["close"]);

const submit = () => {
    if (!isFormValid.value || !form.terms) return;

    processing.value = true;
    form.post("/register", {
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
