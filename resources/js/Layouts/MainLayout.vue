<template>
    <div class="min-h-screen bg-background" :class="{ dark: isDark }">
        <Head>
            <title>{{ title }}</title>
            <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
        </Head>

        <!-- Navbar -->
        <header
            class="sticky top-0 z-50 w-full border-b bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60"
        >
            <div
                class="container flex h-14 max-w-7xl items-center justify-between"
            >
                <!-- Logo (Left) -->
                <div class="flex">
                    <Link href="/" class="flex items-center space-x-2">
                        <GraduationCap
                            class="h-6 w-6 text-blue-500 dark:text-blue-400"
                        />
                        <span class="font-bold text-gray-900 dark:text-white">{{
                            appName
                        }}</span>
                    </Link>
                </div>

                <!-- Navigation (Center) -->
                <NavigationMenu
                    class="hidden md:flex absolute left-1/2 transform -translate-x-1/2"
                >
                    <NavigationMenuList class="space-x-2">
                        <NavigationMenuItem
                            v-for="item in navigationItems"
                            :key="item.href"
                        >
                            <Link :href="item.href">
                                <NavigationMenuLink
                                    class="group inline-flex h-9 w-max items-center justify-center rounded-md px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground focus:outline-none disabled:pointer-events-none disabled:opacity-50 text-gray-700 dark:text-gray-200"
                                    :class="{
                                        'bg-blue-50 text-blue-700 border border-blue-200 dark:bg-accent/70 dark:text-white dark:border-0':
                                            isCurrentRoute(item.href),
                                        'hover:bg-blue-50 hover:text-blue-700':
                                            !isDark,
                                    }"
                                >
                                    <component
                                        :is="item.icon"
                                        class="h-4 w-4 mr-2"
                                        :class="{
                                            'text-blue-600':
                                                isCurrentRoute(item.href) &&
                                                !isDark,
                                        }"
                                    />
                                    <span>{{ item.label }}</span>
                                </NavigationMenuLink>
                            </Link>
                        </NavigationMenuItem>
                    </NavigationMenuList>
                </NavigationMenu>

                <!-- Auth Buttons & Theme Toggle (Right) -->
                <div class="flex items-center gap-2">
                    <!-- Theme Toggle -->
                    <Button
                        variant="ghost"
                        size="icon"
                        @click="toggleTheme"
                        class="text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800"
                    >
                        <Sun v-if="isDark" class="h-5 w-5" />
                        <Moon v-else class="h-5 w-5" />
                        <span class="sr-only">Toggle theme</span>
                    </Button>

                    <Button
                        variant="secondary"
                        class="bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white"
                        @click="showSignUpModal = true"
                    >
                        <UserPlus class="h-4 w-4 mr-2" />
                        Sign Up
                    </Button>
                    <Link href="/login">
                        <Button
                            variant="default"
                            class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white"
                            @click="showSignInModal = true"
                        >
                            <LogIn class="h-4 w-4 mr-2" />
                            Sign In
                        </Button>
                    </Link>

                    <!-- Mobile Menu Button -->
                    <Button
                        variant="ghost"
                        size="icon"
                        class="md:hidden text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800"
                        @click="mobileMenuOpen = !mobileMenuOpen"
                    >
                        <Menu v-if="!mobileMenuOpen" class="h-5 w-5" />
                        <X v-else class="h-5 w-5" />
                    </Button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <nav v-show="mobileMenuOpen" class="md:hidden">
                <div class="space-y-2 p-4">
                    <Link
                        v-for="item in navigationItems"
                        :key="item.href"
                        :href="item.href"
                        class="flex items-center space-x-2 rounded-md p-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800"
                        :class="{
                            'bg-blue-50 text-blue-700 dark:bg-accent/70 dark:text-white':
                                isCurrentRoute(item.href),
                            'hover:bg-blue-50 hover:text-blue-700': !isDark,
                        }"
                        @click="mobileMenuOpen = false"
                    >
                        <component
                            :is="item.icon"
                            class="h-4 w-4"
                            :class="{
                                'text-blue-600':
                                    isCurrentRoute(item.href) && !isDark,
                            }"
                        />
                        <span>{{ item.label }}</span>
                    </Link>
                </div>
            </nav>
        </header>

        <!-- Main Content -->
        <main
            class="container py-6 min-h-[calc(100vh-8rem)] bg-background dark:bg-gray-900"
        >
            <slot></slot>
        </main>

        <!-- Footer -->
        <footer class="w-full border-t bg-background dark:bg-gray-900">
            <p
                class="text-center text-sm text-gray-600 dark:text-gray-400 py-6"
            >
                © 2024 {{ appName }} - CrowdFund University. All rights
                reserved.
            </p>
        </footer>

        <Dialog :open="showSignUpModal" @update:open="showSignUpModal = false">
            <DialogContent class="sm:max-w-[500px]">
                <SignUp @close="showSignUpModal = false" />
            </DialogContent>
        </Dialog>
        <Dialog :open="showSignInModal" @update:open="showSignInModal = false">
            <DialogContent class="sm:max-w-[500px]">
                <SignIn
                    @close="showSignInModal = false"
                    @openSignUp="openSignUpFromSignIn"
                />
            </DialogContent>
        </Dialog>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import { Link, Head, usePage } from "@inertiajs/vue3";
import { Button } from "@/Components/ui/button";
import {
    NavigationMenu,
    NavigationMenuList,
    NavigationMenuItem,
    NavigationMenuLink,
} from "@/Components/ui/navigation-menu";
import {
    GraduationCap,
    Home,
    Heart,
    Users,
    UserPlus,
    LogIn,
    Menu,
    X,
    Sun,
    Moon,
} from "lucide-vue-next";
import SignUp from "@/Auth/SignUp.vue";
import SignIn from "@/Auth/SignIn.vue";
import { Dialog, DialogContent } from "@/Components/ui/dialog";

const mobileMenuOpen = ref(false);
const isDark = ref(false);
const showSignUpModal = ref(false);
const showSignInModal = ref(false);

// Method untuk membuka SignUp dari SignIn
const openSignUpFromSignIn = () => {
    showSignInModal.value = false;
    showSignUpModal.value = true;
};

// App name dari .env
const appName = computed(() => usePage().props.app.name);

// Title dinamis
const title = computed(() => {
    const pageTitle = usePage().props.title;
    return pageTitle ? `${pageTitle} - ${appName.value}` : appName.value;
});

// Navigation items
const navigationItems = [
    { href: "/", label: "Home", icon: Home },
    { href: "/donation", label: "Donation", icon: Heart },
    { href: "/about-us", label: "About Us", icon: Users },
];

// Check current route
const isCurrentRoute = (path) => {
    return window.location.pathname === path;
};

// Theme handling
const initializeTheme = () => {
    // Check system preference
    if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
        isDark.value = true;
    }

    // Check localStorage
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme) {
        isDark.value = savedTheme === "dark";
    }
};

const toggleTheme = () => {
    isDark.value = !isDark.value;
    localStorage.setItem("theme", isDark.value ? "dark" : "light");
};

// Initialize theme on mount
onMounted(() => {
    initializeTheme();

    // Listen for system theme changes
    window
        .matchMedia("(prefers-color-scheme: dark)")
        .addEventListener("change", (e) => {
            if (!localStorage.getItem("theme")) {
                isDark.value = e.matches;
            }
        });
});
</script>

<style>
:root {
    color-scheme: light;
}

.dark {
    color-scheme: dark;
}

.min-h-screen {
    min-height: 100vh;
}

/* Tambahan untuk memastikan transisi yang smooth */
.dark .transition-colors {
    transition-property: background-color, border-color, color, fill, stroke;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 150ms;
}
</style>
