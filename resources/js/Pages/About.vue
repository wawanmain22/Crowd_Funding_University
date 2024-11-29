<template>
    <MainLayout>
        <div class="space-y-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Hero Section -->
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-8"
            >
                <div class="text-center max-w-3xl mx-auto">
                    <div class="flex justify-center mb-6">
                        <Users class="h-16 w-16 text-blue-500" />
                    </div>
                    <h1
                        class="text-4xl font-bold text-gray-900 dark:text-white mb-4"
                    >
                        Tim Dibalik Layar
                    </h1>
                    <div
                        class="flex items-center justify-center space-x-2 mb-6"
                    >
                        <Code class="h-5 w-5 text-blue-500" />
                        <span class="text-gray-500 dark:text-gray-400">•</span>
                        <GraduationCap class="h-5 w-5 text-green-500" />
                        <span class="text-gray-500 dark:text-gray-400">•</span>
                        <Heart class="h-5 w-5 text-red-500" />
                    </div>
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        Kami adalah sekelompok mahasiswa yang berkomitmen untuk
                        membangun platform donasi yang transparan dan
                        terpercaya. Melalui proyek ini, kami berharap dapat
                        membantu sesama mahasiswa dalam mengejar impian mereka.
                    </p>
                </div>
            </div>

            <!-- Team Section -->
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-8"
            >
                <div class="text-center mb-12">
                    <div class="flex justify-center mb-6">
                        <Users2 class="h-12 w-12 text-blue-500" />
                    </div>
                    <h2
                        class="text-3xl font-bold text-gray-900 dark:text-white"
                    >
                        Para Kontributor
                    </h2>
                    <p class="mt-4 text-gray-600 dark:text-gray-300">
                        Kenali lebih dekat tim yang mengembangkan platform ini
                        sambil menjalani studi mereka
                    </p>
                </div>

                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
                >
                    <!-- Team Member Cards -->
                    <div
                        v-for="(member, index) in teamMembers"
                        :key="index"
                        class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-6 text-center transform transition duration-300 hover:scale-105"
                    >
                        <div class="relative w-32 h-32 mx-auto mb-4">
                            <img
                                :src="member.image"
                                :alt="member.name"
                                class="w-full h-full rounded-full object-cover border-4 border-blue-500 dark:border-blue-400"
                            />
                            <div
                                class="absolute -bottom-2 -right-2 bg-blue-500 rounded-full p-2"
                            >
                                <component
                                    :is="member.icon"
                                    class="h-4 w-4 text-white"
                                />
                            </div>
                        </div>
                        <h3
                            class="text-xl font-semibold text-gray-900 dark:text-white mb-2"
                        >
                            {{ member.name }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                            {{ member.role }}
                        </p>
                        <p
                            class="text-sm text-gray-500 dark:text-gray-400 italic"
                        >
                            "{{ member.quote }}"
                        </p>
                    </div>
                </div>
            </div>

            <!-- Our Story Section -->
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-8"
            >
                <div class="max-w-3xl mx-auto">
                    <div class="flex justify-center mb-6">
                        <BookOpen class="h-12 w-12 text-blue-500" />
                    </div>
                    <h2
                        class="text-3xl font-bold text-gray-900 dark:text-white text-center mb-8"
                    >
                        Cerita Kami
                    </h2>
                    <div class="prose dark:prose-invert max-w-none space-y-6">
                        <div class="flex items-start space-x-4">
                            <Lightbulb
                                class="h-6 w-6 text-yellow-500 flex-shrink-0 mt-1"
                            />
                            <p class="text-gray-600 dark:text-gray-300">
                                Sebagai mahasiswa aktif, kami memahami betul
                                tantangan finansial yang dihadapi oleh
                                rekan-rekan mahasiswa lainnya. Proyek ini lahir
                                dari diskusi panjang dan kepedulian kami
                                terhadap sesama mahasiswa yang membutuhkan
                                bantuan untuk melanjutkan pendidikan mereka.
                            </p>
                        </div>
                        <div class="flex items-start space-x-4">
                            <Clock
                                class="h-6 w-6 text-green-500 flex-shrink-0 mt-1"
                            />
                            <p class="text-gray-600 dark:text-gray-300">
                                Di tengah kesibukan kuliah, kami meluangkan
                                waktu untuk mengembangkan platform ini dengan
                                harapan dapat menciptakan jembatan antara para
                                donatur dan mahasiswa yang membutuhkan. Kami
                                percaya bahwa pendidikan adalah hak setiap
                                orang, dan keterbatasan finansial seharusnya
                                tidak menjadi penghalang untuk meraih mimpi.
                            </p>
                        </div>
                        <div class="flex items-start space-x-4">
                            <Target
                                class="h-6 w-6 text-red-500 flex-shrink-0 mt-1"
                            />
                            <p class="text-gray-600 dark:text-gray-300">
                                Melalui platform ini, kami berkomitmen untuk
                                terus mengembangkan sistem yang transparan,
                                aman, dan terpercaya bagi semua pengguna. Setiap
                                kontribusi, sekecil apapun, dapat membuat
                                perbedaan besar dalam perjalanan pendidikan
                                seseorang.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import {
    Users,
    Users2,
    Code,
    GraduationCap,
    Heart,
    BookOpen,
    Lightbulb,
    Clock,
    Target,
    Code2,
    Palette,
    Database,
    LayoutDashboard,
    Search,
    Shield,
} from "lucide-vue-next";

const teamMembers = [
    {
        name: "RIDWAN SYARIF ABIDIN",
        role: "Lead Developer",
        quote: "Teknologi harus memberikan dampak positif bagi sesama.",
        image: "/photo/no_user.png",
        icon: LayoutDashboard,
    },
    {
        name: "FARIS IFTIKHAR ALFARISI",
        role: "Backend Developer",
        quote: "Setiap baris kode adalah langkah menuju perubahan.",
        image: "/photo/no_user.png",
        icon: Database,
    },
    {
        name: "DHIKA MUNAWAR",
        role: "Frontend Developer",
        quote: "Design yang baik membuat pengalaman yang bermakna.",
        image: "/photo/no_user.png",
        icon: Code2,
    },
    {
        name: "FADLY FATWA WINATA AL QOERUDIN",
        role: "UI/UX Designer",
        quote: "Kesederhanaan adalah kunci dari pengalaman pengguna yang baik.",
        image: "/photo/no_user.png",
        icon: Palette,
    },
    {
        name: "DARWAN",
        role: "System Analyst",
        quote: "Analisis yang tepat menghasilkan solusi yang tepat.",
        image: "/photo/no_user.png",
        icon: Search,
    },
    {
        name: "RANGGA DRIYA NUGRAHA",
        role: "Quality Assurance",
        quote: "Kualitas adalah tanggung jawab kita bersama.",
        image: "/photo/no_user.png",
        icon: Shield,
    },
];
</script>
