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
                Bergabung dengan CrowdFund University
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                Daftar dan mulai berkontribusi untuk pendidikan Indonesia
            </p>
        </div>

        <!-- Form Container -->
        <div
            class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-sm p-8 border border-gray-200 dark:border-gray-700"
        >
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Username -->
                <div class="space-y-2">
                    <FormLabel
                        for="username"
                        class="text-gray-700 dark:text-gray-200"
                        >Username</FormLabel
                    >
                    <div class="relative">
                        <User
                            class="absolute left-3 top-3 h-4 w-4 text-gray-500 dark:text-gray-400"
                        />
                        <FormInput
                            id="username"
                            v-model="form.username"
                            type="text"
                            placeholder="Masukkan username"
                            class="pl-9 w-full bg-white dark:bg-gray-900 border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100"
                            :class="{
                                'border-red-500 dark:border-red-500':
                                    errors.username,
                            }"
                        />
                    </div>
                    <span v-if="errors.username" class="text-sm text-red-500">{{
                        errors.username
                    }}</span>
                </div>

                <!-- Nama Lengkap -->
                <div class="space-y-2">
                    <FormLabel
                        for="name"
                        class="text-gray-700 dark:text-gray-200"
                        >Nama Lengkap</FormLabel
                    >
                    <div class="relative">
                        <User
                            class="absolute left-3 top-3 h-4 w-4 text-gray-500 dark:text-gray-400"
                        />
                        <FormInput
                            id="name"
                            v-model="form.name"
                            type="text"
                            placeholder="Masukkan nama lengkap"
                            class="pl-9 w-full bg-white dark:bg-gray-900 border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100"
                            :class="{
                                'border-red-500 dark:border-red-500':
                                    errors.name,
                            }"
                        />
                    </div>
                    <span v-if="errors.name" class="text-sm text-red-500">{{
                        errors.name
                    }}</span>
                </div>

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

                <!-- Nomor Telepon -->
                <div class="space-y-2">
                    <FormLabel
                        for="phone_number"
                        class="text-gray-700 dark:text-gray-200"
                        >Nomor Telepon</FormLabel
                    >
                    <div class="relative">
                        <Phone
                            class="absolute left-3 top-3 h-4 w-4 text-gray-500 dark:text-gray-400"
                        />
                        <FormInput
                            id="phone_number"
                            v-model="form.phone_number"
                            type="tel"
                            placeholder="Contoh: 08123456789"
                            class="pl-9 w-full bg-white dark:bg-gray-900 border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100"
                            :class="{
                                'border-red-500 dark:border-red-500':
                                    errors.phone_number,
                            }"
                        />
                    </div>
                    <span
                        v-if="errors.phone_number"
                        class="text-sm text-red-500"
                        >{{ errors.phone_number }}</span
                    >
                </div>

                <!-- Universitas -->
                <div class="space-y-2">
                    <FormLabel
                        for="university_name"
                        class="text-gray-700 dark:text-gray-200"
                        >Nama Universitas</FormLabel
                    >
                    <div class="relative">
                        <Building2
                            class="absolute left-3 top-3 h-4 w-4 text-gray-500 dark:text-gray-400"
                        />
                        <FormInput
                            id="university_name"
                            v-model="form.university_name"
                            type="text"
                            placeholder="Masukkan nama universitas"
                            class="pl-9 w-full bg-white dark:bg-gray-900 border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100"
                            :class="{
                                'border-red-500 dark:border-red-500':
                                    errors.university_name,
                            }"
                        />
                    </div>
                    <span
                        v-if="errors.university_name"
                        class="text-sm text-red-500"
                        >{{ errors.university_name }}</span
                    >
                </div>

                <!-- Fakultas -->
                <div class="space-y-2">
                    <FormLabel
                        for="faculty"
                        class="text-gray-700 dark:text-gray-200"
                    >
                        Fakultas
                    </FormLabel>
                    <div class="relative">
                        <Briefcase
                            class="absolute left-3 top-3 h-4 w-4 text-gray-500 dark:text-gray-400"
                        />
                        <Select
                            v-model="form.faculty"
                            @update:modelValue="form.major = ''"
                        >
                            <SelectTrigger
                                class="w-full pl-9 bg-transparent dark:bg-gray-900 dark:text-white dark:border-gray-700"
                            >
                                <SelectValue placeholder="Pilih Fakultas" />
                            </SelectTrigger>
                            <SelectContent class="dark:bg-gray-800">
                                <SelectItem
                                    v-for="fakultas in fakultasOptions"
                                    :key="fakultas.name"
                                    :value="fakultas.name"
                                    class="dark:text-white dark:hover:bg-gray-700"
                                >
                                    {{ fakultas.name }}
                                </SelectItem>
                            </SelectContent>
                        </Select>
                    </div>
                    <span v-if="errors.faculty" class="text-sm text-red-500">
                        {{ errors.faculty }}
                    </span>
                </div>

                <!-- Jurusan -->
                <div class="space-y-2">
                    <FormLabel
                        for="major"
                        class="text-gray-700 dark:text-gray-200"
                    >
                        Jurusan
                    </FormLabel>
                    <div class="relative">
                        <School
                            class="absolute left-3 top-3 h-4 w-4 text-gray-500 dark:text-gray-400"
                        />
                        <Select v-model="form.major" :disabled="!form.faculty">
                            <SelectTrigger
                                class="w-full pl-9 bg-transparent dark:bg-gray-900 dark:text-white dark:border-gray-700"
                            >
                                <SelectValue
                                    :placeholder="
                                        form.faculty
                                            ? 'Pilih Jurusan'
                                            : 'Pilih Fakultas terlebih dahulu'
                                    "
                                    class="dark:text-white"
                                />
                            </SelectTrigger>
                            <SelectContent class="dark:bg-gray-800">
                                <SelectItem
                                    v-for="major in availableMajors"
                                    :key="major"
                                    :value="major"
                                    class="dark:text-white dark:hover:bg-gray-700"
                                >
                                    {{ major }}
                                </SelectItem>
                            </SelectContent>
                        </Select>
                    </div>
                    <span v-if="errors.major" class="text-sm text-red-500">
                        {{ errors.major }}
                    </span>
                </div>

                <!-- Nomor Mahasiswa -->
                <div class="space-y-2">
                    <FormLabel
                        for="student_number"
                        class="text-gray-700 dark:text-gray-200"
                        >Nomor Mahasiswa</FormLabel
                    >
                    <div class="relative">
                        <Hash
                            class="absolute left-3 top-3 h-4 w-4 text-gray-500 dark:text-gray-400"
                        />
                        <FormInput
                            id="student_number"
                            v-model="form.student_number"
                            type="text"
                            placeholder="Masukkan nomor mahasiswa"
                            class="pl-9 w-full bg-white dark:bg-gray-900 border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100"
                            :class="{
                                'border-red-500 dark:border-red-500':
                                    errors.student_number,
                            }"
                        />
                    </div>
                    <span
                        v-if="errors.student_number"
                        class="text-sm text-red-500"
                        >{{ errors.student_number }}</span
                    >
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <FormLabel
                        for="password"
                        class="text-gray-700 dark:text-gray-200"
                        >Password</FormLabel
                    >
                    <div class="relative">
                        <Lock
                            class="absolute left-3 top-3 h-4 w-4 text-gray-500 dark:text-gray-400"
                        />
                        <FormInput
                            id="password"
                            v-model="form.password"
                            :type="showPassword ? 'text' : 'password'"
                            placeholder="Enter your password"
                            class="pl-9 w-full bg-white dark:bg-gray-900 border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100"
                            :class="{
                                'border-red-500 dark:border-red-500':
                                    errors.password ||
                                    passwordMismatch ||
                                    passwordTooShort,
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
                    <span v-if="passwordTooShort" class="text-sm text-red-500">
                        Hey! Your password needs to be at least 8 characters
                        long
                    </span>
                    <span v-if="passwordMismatch" class="text-sm text-red-500">
                        Oops! The passwords don't match. Please try again
                    </span>
                </div>

                <!-- Konfirmasi Password -->
                <div class="space-y-2">
                    <FormLabel
                        for="password_confirmation"
                        class="text-gray-700 dark:text-gray-200"
                        >Confirm Password</FormLabel
                    >
                    <div class="relative">
                        <Lock
                            class="absolute left-3 top-3 h-4 w-4 text-gray-500 dark:text-gray-400"
                        />
                        <FormInput
                            id="password_confirmation"
                            v-model="form.password_confirmation"
                            :type="showConfirmPassword ? 'text' : 'password'"
                            placeholder="Confirm your password"
                            class="pl-9 w-full bg-white dark:bg-gray-900 border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100"
                            :class="{
                                'border-red-500 dark:border-red-500':
                                    passwordMismatch,
                            }"
                        />
                        <button
                            type="button"
                            @click="showConfirmPassword = !showConfirmPassword"
                            class="absolute right-3 top-3"
                        >
                            <Eye
                                v-if="!showConfirmPassword"
                                class="h-4 w-4 text-gray-500 dark:text-gray-400"
                            />
                            <EyeOff
                                v-else
                                class="h-4 w-4 text-gray-500 dark:text-gray-400"
                            />
                        </button>
                    </div>
                    <span v-if="passwordMismatch" class="text-sm text-red-500">
                        Oops! The passwords don't match. Please try again
                    </span>
                </div>
            </div>

            <!-- Terms & Conditions dengan perbaikan -->
            <div class="space-y-2 pt-6">
                <div class="flex items-center space-x-2">
                    <FormCheckbox
                        id="terms"
                        :checked="form.terms"
                        @update:checked="(checked) => (form.terms = checked)"
                    />
                    <label
                        for="terms"
                        class="text-sm text-gray-600 dark:text-gray-300 cursor-pointer"
                    >
                        Saya menyetujui untuk memberikan data diri saya dan
                        bertanggung jawab atas kebenaran data tersebut
                    </label>
                </div>
                <span v-if="errors.terms" class="text-sm text-red-500">{{
                    errors.terms
                }}</span>
            </div>

            <!-- Submit Button -->
            <div class="flex flex-col space-y-4 pt-6">
                <Button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white"
                    :class="{
                        'opacity-50 cursor-not-allowed': form.processing,
                    }"
                    :disabled="!isFormValid || form.processing"
                >
                    <UserPlus class="w-4 h-4 mr-2" v-if="!form.processing" />
                    <Loader2 class="w-4 h-4 mr-2 animate-spin" v-else />
                    {{ form.processing ? "Memproses..." : "Daftar" }}
                </Button>
                <p class="text-center text-sm text-gray-600 dark:text-gray-400">
                    Sudah punya akun?
                    <Link
                        href="/login"
                        class="text-blue-500 dark:text-blue-400 hover:underline"
                    >
                        Masuk di sini
                    </Link>
                </p>
            </div>
        </div>
    </form>
</template>

<script setup>
import { ref, computed } from "vue";
import { Link, useForm, router } from "@inertiajs/vue3";
import { Button } from "@/Components/ui/button";
import { Input as FormInput } from "@/Components/ui/input";
import { Label as FormLabel } from "@/Components/ui/label";
import { Checkbox as FormCheckbox } from "@/Components/ui/checkbox";
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/Components/ui/select";
import {
    GraduationCap,
    User,
    Mail,
    Lock,
    Eye,
    EyeOff,
    UserPlus,
    Loader2,
    Phone,
    Building2,
    BookOpen,
    Hash,
    Briefcase,
    School,
} from "lucide-vue-next";
import Swal from "sweetalert2";

const showPassword = ref(false);
const showConfirmPassword = ref(false);

const form = useForm({
    username: "",
    name: "",
    email: "",
    phone_number: "",
    university_name: "",
    faculty: "",
    major: "",
    student_number: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const processing = ref(false);
const errors = ref({});

const passwordMismatch = computed(() => {
    return (
        form.password &&
        form.password_confirmation &&
        form.password !== form.password_confirmation
    );
});

const passwordTooShort = computed(() => {
    return form.password && form.password.length < 8;
});

const isFormValid = computed(() => {
    const valid = Boolean(
        form.username &&
            form.name &&
            form.email &&
            form.phone_number &&
            form.university_name &&
            form.faculty &&
            form.major &&
            form.student_number &&
            form.password &&
            form.password.length >= 8 &&
            form.password_confirmation &&
            !passwordMismatch.value &&
            form.email.includes("@") &&
            form.terms
    );

    return valid;
});
// Data fakultas dan jurusan
const fakultasOptions = [
    {
        name: "Fakultas Teknik",
        majors: [
            "Teknik Informatika",
            "Teknik Elektro",
            "Teknik Sipil",
            "Teknik Mesin",
            "Teknik Industri",
        ],
    },
    {
        name: "Fakultas Ekonomi dan Bisnis",
        majors: [
            "Manajemen",
            "Akuntansi",
            "Ekonomi Pembangunan",
            "Bisnis Digital",
        ],
    },
    {
        name: "Fakultas Kedokteran",
        majors: [
            "Pendidikan Dokter",
            "Keperawatan",
            "Farmasi",
            "Kesehatan Masyarakat",
        ],
    },
    {
        name: "Fakultas Ilmu Komputer",
        majors: [
            "Informatika",
            "Sistem Informasi",
            "Teknologi Informasi",
            "Sains Data",
        ],
    },
    {
        name: "Fakultas Hukum",
        majors: ["Ilmu Hukum"],
    },
    // Tambahkan fakultas lain sesuai kebutuhan
];

const selectedFakultas = ref("");
const availableMajors = computed(() => {
    const fakultas = fakultasOptions.find((f) => f.name === form.faculty);
    return fakultas ? fakultas.majors : [];
});

const submit = () => {
    if (!isFormValid.value) {
        return;
    }

    processing.value = true;
    form.post(route("register.store"), {
        onSuccess: () => {
            processing.value = false;
            Swal.fire({
                icon: "success",
                title: "Welcome to CrowdFund University! 🎉",
                text: "Your account has been created successfully",
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                },
            }).then(() => {
                window.location.href = route("login");
            });
        },
        onError: (err) => {
            errors.value = err;
            processing.value = false;
        },
    });
};
</script>
