<template>
    <div class="min-h-screen bg-gray-900 relative">
        <!-- Navbar -->
        <nav class="bg-gray-800 border-b border-gray-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <!-- Logo (Kiri) -->
                    <div class="flex-shrink-0">
                        <Link
                            href="/"
                            class="text-xl font-bold text-white hover:text-gray-300 transition duration-150"
                        >
                            CFU
                        </Link>
                    </div>

                    <!-- Navigation Links (Tengah) -->
                    <div class="flex-1 flex justify-center">
                        <div class="hidden sm:flex sm:space-x-8">
                            <Link
                                href="/"
                                class="inline-flex items-center px-1 pt-1 text-gray-300 hover:text-white transition duration-150"
                            >
                                Home
                            </Link>
                            <Link
                                href="/donation"
                                class="inline-flex items-center px-1 pt-1 text-gray-300 hover:text-white transition duration-150"
                            >
                                Donation
                            </Link>
                            <Link
                                href="/about-us"
                                class="inline-flex items-center px-1 pt-1 text-gray-300 hover:text-white transition duration-150"
                            >
                                About Us
                            </Link>
                        </div>
                    </div>

                    <!-- Auth Buttons (Kanan) -->
                    <div class="hidden sm:flex sm:items-center sm:space-x-4">
                        <Link
                            href="/register"
                            class="text-gray-300 hover:text-white transition duration-150 px-3 py-2 text-sm font-medium"
                        >
                            Sign Up
                        </Link>
                        <Link
                            href="/login"
                            class="bg-blue-600 text-white hover:bg-blue-700 transition duration-150 px-3 py-2 rounded-md text-sm font-medium"
                        >
                            Sign In
                        </Link>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex items-center sm:hidden">
                        <button
                            @click="mobileMenuOpen = !mobileMenuOpen"
                            class="text-gray-400 hover:text-white"
                        >
                            <svg
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    v-if="!mobileMenuOpen"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                                <path
                                    v-else
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu -->
            <div v-show="mobileMenuOpen" class="sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <Link
                        href="/"
                        class="block px-4 py-2 text-gray-300 hover:text-white hover:bg-gray-700"
                    >
                        Home
                    </Link>
                    <Link
                        href="/donation"
                        class="block px-4 py-2 text-gray-300 hover:text-white hover:bg-gray-700"
                    >
                        Donation
                    </Link>
                    <Link
                        href="/about-us"
                        class="block px-4 py-2 text-gray-300 hover:text-white hover:bg-gray-700"
                    >
                        About Us
                    </Link>
                    <Link
                        href="/register"
                        class="block px-4 py-2 text-gray-300 hover:text-white hover:bg-gray-700"
                    >
                        Sign Up
                    </Link>
                    <Link
                        href="/login"
                        class="block px-4 py-2 text-gray-300 hover:text-white hover:bg-gray-700"
                    >
                        Sign In
                    </Link>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 pb-24">
            <slot></slot>
        </main>

        <!-- Footer -->
        <footer
            class="bg-gray-800 border-t border-gray-700 absolute bottom-0 w-full"
        >
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <p class="text-center text-gray-400">
                    © 2024 CFU - CrowdFund University. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

const mobileMenuOpen = ref(false);
</script>

<style>
.min-h-screen {
    min-height: 100vh;
}
</style>
