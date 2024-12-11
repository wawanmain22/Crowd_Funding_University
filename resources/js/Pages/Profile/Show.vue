<template>
    <MainLayout>
        <div class="container py-6">
            <!-- Header Section -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Profile
                </h1>
                <p class="text-gray-600 dark:text-gray-400">
                    Kelola informasi profil Anda
                </p>
            </div>

            <!-- Profile Form -->
            <div class="max-w-2xl">
                <Card>
                    <CardHeader>
                        <CardTitle>Informasi Pribadi</CardTitle>
                        <CardDescription>
                            Perbarui informasi profil dan alamat email Anda
                        </CardDescription>
                    </CardHeader>
                    <CardContent>
                        <form @submit.prevent="updateProfile" class="space-y-4">
                            <div class="space-y-2">
                                <InputLabel htmlFor="username"
                                    >Username</InputLabel
                                >
                                <TextInput
                                    id="username"
                                    v-model="form.username"
                                    type="text"
                                    :disabled="true"
                                />
                            </div>

                            <div class="space-y-2">
                                <InputLabel htmlFor="name"
                                    >Nama Lengkap</InputLabel
                                >
                                <TextInput
                                    id="name"
                                    v-model="form.name"
                                    type="text"
                                />
                                <InputError :message="form.errors.name" />
                            </div>

                            <div class="space-y-2">
                                <InputLabel htmlFor="email">Email</InputLabel>
                                <TextInput
                                    id="email"
                                    v-model="form.email"
                                    type="email"
                                />
                                <InputError :message="form.errors.email" />
                            </div>

                            <div class="space-y-2">
                                <InputLabel htmlFor="phone"
                                    >Nomor Telepon</InputLabel
                                >
                                <TextInput
                                    id="phone"
                                    v-model="form.phone_number"
                                    type="tel"
                                />
                                <InputError
                                    :message="form.errors.phone_number"
                                />
                            </div>

                            <div
                                v-if="$page.props.auth.user.role === 'student'"
                                class="space-y-4"
                            >
                                <div class="space-y-2">
                                    <InputLabel htmlFor="university"
                                        >Universitas</InputLabel
                                    >
                                    <TextInput
                                        id="university"
                                        v-model="form.university_name"
                                        type="text"
                                    />
                                    <InputError
                                        :message="form.errors.university_name"
                                    />
                                </div>

                                <div class="space-y-2">
                                    <InputLabel htmlFor="faculty"
                                        >Fakultas</InputLabel
                                    >
                                    <TextInput
                                        id="faculty"
                                        v-model="form.faculty"
                                        type="text"
                                    />
                                    <InputError
                                        :message="form.errors.faculty"
                                    />
                                </div>

                                <div class="space-y-2">
                                    <InputLabel htmlFor="major"
                                        >Jurusan</InputLabel
                                    >
                                    <TextInput
                                        id="major"
                                        v-model="form.major"
                                        type="text"
                                    />
                                    <InputError :message="form.errors.major" />
                                </div>

                                <div class="space-y-2">
                                    <InputLabel htmlFor="student_number"
                                        >Nomor Mahasiswa</InputLabel
                                    >
                                    <TextInput
                                        id="student_number"
                                        v-model="form.student_number"
                                        type="text"
                                        :disabled="true"
                                    />
                                </div>
                            </div>

                            <div class="flex justify-end pt-4">
                                <Button
                                    type="submit"
                                    :disabled="form.processing"
                                >
                                    <Loader2
                                        v-if="form.processing"
                                        class="w-4 h-4 mr-2 animate-spin"
                                    />
                                    <Save v-else class="w-4 h-4 mr-2" />
                                    Simpan Perubahan
                                </Button>
                            </div>
                        </form>
                    </CardContent>
                </Card>

                <!-- Password Section -->
                <Card class="mt-6">
                    <CardHeader>
                        <CardTitle>Ubah Password</CardTitle>
                        <CardDescription>
                            Pastikan akun Anda menggunakan password yang panjang
                            dan acak untuk tetap aman
                        </CardDescription>
                    </CardHeader>
                    <CardContent>
                        <form
                            @submit.prevent="updatePassword"
                            class="space-y-4"
                        >
                            <div class="space-y-2">
                                <InputLabel htmlFor="current_password"
                                    >Password Saat Ini</InputLabel
                                >
                                <TextInput
                                    id="current_password"
                                    v-model="passwordForm.current_password"
                                    type="password"
                                />
                                <InputError
                                    :message="
                                        passwordForm.errors.current_password
                                    "
                                />
                            </div>

                            <div class="space-y-2">
                                <InputLabel htmlFor="password"
                                    >Password Baru</InputLabel
                                >
                                <TextInput
                                    id="password"
                                    v-model="passwordForm.password"
                                    type="password"
                                />
                                <InputError
                                    :message="passwordForm.errors.password"
                                />
                            </div>

                            <div class="space-y-2">
                                <InputLabel htmlFor="password_confirmation"
                                    >Konfirmasi Password Baru</InputLabel
                                >
                                <TextInput
                                    id="password_confirmation"
                                    v-model="passwordForm.password_confirmation"
                                    type="password"
                                />
                            </div>

                            <div class="flex justify-end pt-4">
                                <Button
                                    type="submit"
                                    variant="default"
                                    :disabled="passwordForm.processing"
                                >
                                    <Loader2
                                        v-if="passwordForm.processing"
                                        class="w-4 h-4 mr-2 animate-spin"
                                    />
                                    <Key v-else class="w-4 h-4 mr-2" />
                                    Ubah Password
                                </Button>
                            </div>
                        </form>
                    </CardContent>
                </Card>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import { onMounted } from "vue";
import { useForm, usePage } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
import { Button } from "@/Components/ui/button";
import { InputError, InputLabel, TextInput } from "@/Components/ui/input";
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/Components/ui/card";
import { Loader2, Save, Key } from "lucide-vue-next";

const page = usePage();
const form = useForm({
    username: "",
    name: "",
    email: "",
    phone_number: "",
    university_name: "",
    faculty: "",
    major: "",
    student_number: "",
});

const passwordForm = useForm({
    current_password: "",
    password: "",
    password_confirmation: "",
});

const updateProfile = () => {
    form.put(route("profile.update"), {
        preserveScroll: true,
        onSuccess: () => {
            // Show success message
        },
    });
};

const updatePassword = () => {
    passwordForm.put(route("password.update"), {
        preserveScroll: true,
        onSuccess: () => {
            passwordForm.reset();
            // Show success message
        },
    });
};

onMounted(() => {
    // Load user data
    const user = page.props.auth.user;
    if (user) {
        form.username = user.username;
        form.name = user.student?.name || user.admin?.name || "";
        form.email = user.student?.email || user.admin?.email || "";
        form.phone_number =
            user.student?.phone_number || user.admin?.phone_number || "";

        if (user.role === "student") {
            form.university_name = user.student?.university_name || "";
            form.faculty = user.student?.faculty || "";
            form.major = user.student?.major || "";
            form.student_number = user.student?.student_number || "";
        }
    }
});
</script>
