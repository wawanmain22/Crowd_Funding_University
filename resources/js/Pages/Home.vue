<template>
    <MainLayout>
        <!-- Hero Section -->
        <div class="space-y-12">
            <!-- Main Hero -->
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-8"
            >
                <div class="max-w-3xl mx-auto text-center space-y-6">
                    <h1
                        class="text-4xl font-bold text-gray-900 dark:text-white"
                    >
                        Wujudkan Impian Pendidikan Bersama CFU
                    </h1>

                    <!-- Gambar dengan ukuran lebih besar -->
                    <div class="flex justify-center">
                        <img
                            src="/photo/People.png"
                            alt="Happy People"
                            class="h-64 md:h-72 lg:h-80 object-contain"
                        />
                    </div>

                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        Platform crowdfunding yang menghubungkan hati-hati mulia
                        untuk membantu mahasiswa mencapai impian mereka dalam
                        menempuh pendidikan tinggi.
                    </p>
                    <Link href="/donation" class="inline-flex items-center">
                        <Button class="bg-blue-600 hover:bg-blue-700">
                            <Heart class="h-4 w-4 mr-2" />
                            Mulai Berdonasi
                        </Button>
                    </Link>
                </div>
            </div>
            <!-- Why Choose Us -->
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-8"
            >
                <h2
                    class="text-2xl font-bold text-gray-900 dark:text-white mb-6 text-center"
                >
                    Mengapa Memilih CFU?
                </h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="space-y-3 text-center">
                        <div
                            class="mx-auto w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center"
                        >
                            <Heart
                                class="h-6 w-6 text-blue-600 dark:text-blue-400"
                            />
                        </div>
                        <h3 class="font-semibold text-gray-900 dark:text-white">
                            100% Donasi
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Seluruh donasi yang terkumpul akan disalurkan tanpa
                            potongan biaya apapun.
                        </p>
                    </div>
                    <div class="space-y-3 text-center">
                        <div
                            class="mx-auto w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center"
                        >
                            <Users
                                class="h-6 w-6 text-blue-600 dark:text-blue-400"
                            />
                        </div>
                        <h3 class="font-semibold text-gray-900 dark:text-white">
                            Dikelola Mahasiswa
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Platform yang dikelola langsung oleh organisasi
                            mahasiswa dengan prinsip transparansi.
                        </p>
                    </div>
                    <div class="space-y-3 text-center">
                        <div
                            class="mx-auto w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center"
                        >
                            <Shield
                                class="h-6 w-6 text-blue-600 dark:text-blue-400"
                            />
                        </div>
                        <h3 class="font-semibold text-gray-900 dark:text-white">
                            Terpercaya
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Beroperasi dengan prinsip kemanusiaan tanpa afiliasi
                            komersial.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div
                class="bg-blue-600 dark:bg-blue-700 rounded-lg shadow-lg border border-blue-500 dark:border-blue-600 p-8 text-white"
            >
                <div class="max-w-3xl mx-auto text-center space-y-4">
                    <h2 class="text-2xl font-bold">Mari Berbagi Kebaikan</h2>
                    <p class="text-blue-100">
                        Setiap bantuan yang Anda berikan adalah langkah nyata
                        dalam membantu mahasiswa menggapai masa depan yang lebih
                        cerah.
                    </p>
                    <Link href="/donation" class="inline-flex items-center">
                        <Button
                            variant="secondary"
                            class="bg-white text-blue-600 hover:bg-blue-50"
                        >
                            Donasi Sekarang
                        </Button>
                    </Link>
                </div>
            </div>

            <!-- Testimonial/Thank You Section -->
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-8"
            >
                <div class="max-w-3xl mx-auto text-center space-y-4">
                    <div class="flex items-center justify-center gap-4 mb-6">
                        <div class="w-16 h-16 flex items-center justify-center">
                            <img
                                src="/photo/Donations.png"
                                alt="Donations Icon"
                                class="w-12 h-12 object-contain"
                            />
                        </div>
                        <h2
                            class="text-2xl font-bold text-gray-900 dark:text-white"
                        >
                            Terima Kasih
                        </h2>
                        <div class="w-16 h-16 flex items-center justify-center">
                            <img
                                src="/photo/Love.png"
                                alt="Love Icon"
                                class="w-12 h-12 object-contain"
                            />
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        Kepada seluruh donatur dan mahasiswa yang telah menjadi
                        bagian dari perjalanan CFU. Ketulusan hati dan semangat
                        berbagi Anda telah membantu mewujudkan mimpi-mimpi
                        pendidikan yang lebih baik.
                    </p>
                    <div class="pt-4">
                        <span
                            class="text-blue-600 dark:text-blue-400 font-medium"
                        >
                            Bersama kita bisa membuat perubahan.
                        </span>
                    </div>
                    <!-- Decorative icons at bottom -->
                    <div
                        class="flex justify-center gap-8 mt-6 text-blue-600/30 dark:text-blue-400/30"
                    >
                        <Heart class="w-8 h-8" />
                        <img
                            src="/photo/Donations.png"
                            alt="Donations Icon"
                            class="w-8 h-8 opacity-30"
                        />
                        <img
                            src="/photo/Love.png"
                            alt="Love Icon"
                            class="w-8 h-8 opacity-30"
                        />
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Link } from "@inertiajs/vue3";
import { Button } from "@/Components/ui/button";
import { Heart, Users, Shield } from "lucide-vue-next";
</script>
