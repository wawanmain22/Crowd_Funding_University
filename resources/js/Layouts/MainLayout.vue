<template>
    <div
        class="min-h-screen bg-background dark:bg-[#0A0A0A]"
        :class="{ dark: isDark }"
    >
        <Head>
            <title>{{ usePage().props.title }}</title>
            <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
        </Head>

        <!-- Navbar -->
        <header
            class="sticky top-0 z-50 w-full border-b bg-background dark:bg-[#0A0A0A] dark:border-[#1a1a1a]"
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
                        <span class="font-bold text-gray-900 dark:text-white"
                            >CFU</span
                        >
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
                                        'bg-blue-50 text-blue-700 border border-blue-200 dark:bg-[#1a1a1a] dark:text-white dark:border-[#2a2a2a]':
                                            isCurrentRoute(item.href),
                                        'hover:bg-blue-50 hover:text-blue-700 dark:hover:bg-[#1a1a1a] dark:hover:text-white':
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

                <!-- Navigation (Right) -->
                <div class="flex items-center justify-end space-x-8">
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

                    <!-- Auth Buttons -->
                    <template v-if="$page.props.auth?.user">
                        <DropdownMenu>
                            <DropdownMenuTrigger
                                as="div"
                                class="cursor-pointer"
                            >
                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
                                >
                                    <div class="flex items-center gap-2">
                                        <div
                                            class="p-1 bg-gray-100 dark:bg-gray-800 rounded-full"
                                        >
                                            <User
                                                class="w-6 h-6 text-gray-600 dark:text-gray-300"
                                            />
                                        </div>
                                        <span
                                            class="text-gray-700 dark:text-gray-200"
                                            >{{
                                                $page.props.auth.user.username
                                            }}</span
                                        >
                                    </div>
                                    <ChevronDown
                                        class="w-4 h-4 ml-1 text-gray-500"
                                    />
                                </button>
                            </DropdownMenuTrigger>

                            <DropdownMenuContent
                                align="end"
                                class="w-56 dark:bg-[#0A0A0A] dark:border-[#1a1a1a]"
                            >
                                <Link
                                    v-if="
                                        $page.props.auth.user.role === 'admin'
                                    "
                                    :href="route('admin.dashboard')"
                                >
                                    <DropdownMenuItem
                                        as="div"
                                        class="cursor-pointer"
                                    >
                                        <div
                                            class="flex items-center justify-between w-full"
                                        >
                                            <div
                                                class="flex items-center gap-2"
                                            >
                                                <LayoutDashboard
                                                    class="w-4 h-4 text-gray-500"
                                                />
                                                <span>Panel Admin</span>
                                            </div>
                                            <ChevronRight
                                                class="w-4 h-4 text-gray-400"
                                            />
                                        </div>
                                    </DropdownMenuItem>
                                </Link>
                                <Link v-else :href="route('student.dashboard')">
                                    <DropdownMenuItem
                                        as="div"
                                        class="cursor-pointer"
                                    >
                                        <div
                                            class="flex items-center justify-between w-full"
                                        >
                                            <div
                                                class="flex items-center gap-2"
                                            >
                                                <GraduationCap
                                                    class="w-4 h-4 text-gray-500"
                                                />
                                                <span>Panel Student</span>
                                            </div>
                                            <ChevronRight
                                                class="w-4 h-4 text-gray-400"
                                            />
                                        </div>
                                    </DropdownMenuItem>
                                </Link>
                                <Link :href="route('profile')">
                                    <DropdownMenuItem
                                        as="div"
                                        class="cursor-pointer"
                                    >
                                        <div
                                            class="flex items-center justify-between w-full"
                                        >
                                            <div
                                                class="flex items-center gap-2"
                                            >
                                                <User
                                                    class="w-4 h-4 text-gray-500"
                                                />
                                                <span>Profile</span>
                                            </div>
                                            <ChevronRight
                                                class="w-4 h-4 text-gray-400"
                                            />
                                        </div>
                                    </DropdownMenuItem>
                                </Link>
                                <form
                                    @submit.prevent="logout"
                                    class="border-t border-gray-200 dark:border-gray-700 mt-1 pt-1"
                                >
                                    <DropdownMenuItem
                                        as="button"
                                        class="w-full cursor-pointer"
                                    >
                                        <div
                                            class="flex items-center justify-between w-full text-red-600 hover:text-red-700"
                                        >
                                            <div
                                                class="flex items-center gap-2"
                                            >
                                                <LogOut class="w-4 h-4" />
                                                <span>Logout</span>
                                            </div>
                                            <ChevronRight class="w-4 h-4" />
                                        </div>
                                    </DropdownMenuItem>
                                </form>
                            </DropdownMenuContent>
                        </DropdownMenu>
                    </template>
                    <template v-else>
                        <div class="flex items-center gap-4">
                            <Link href="/register">
                                <Button
                                    variant="secondary"
                                    class="bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white"
                                >
                                    <UserPlus class="h-4 w-4 mr-2" />
                                    Sign Up
                                </Button>
                            </Link>
                            <Link href="/login">
                                <Button
                                    variant="default"
                                    class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white"
                                >
                                    <LogIn class="h-4 w-4 mr-2" />
                                    Sign In
                                </Button>
                            </Link>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <nav v-show="mobileMenuOpen" class="md:hidden dark:bg-[#0A0A0A]">
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

        <!-- Layout dengan atau tanpa sidebar -->
        <div v-if="shouldShowSidebar" class="flex h-[calc(100vh-56px)]">
            <!-- Sidebar -->
            <AdminSidebar v-if="isAdmin" />
            <StudentSidebar v-else-if="isStudent" />

            <!-- Main Content dengan sidebar -->
            <main
                class="flex-1 overflow-y-auto bg-background dark:bg-[#0A0A0A]"
            >
                <slot></slot>
            </main>
        </div>

        <!-- Layout tanpa sidebar untuk route publik -->
        <div v-else>
            <main class="bg-background dark:bg-[#0A0A0A]">
                <slot></slot>
            </main>
        </div>

        <!-- Footer -->
        <footer
            class="w-full border-t dark:border-[#1a1a1a] bg-background dark:bg-[#0A0A0A]"
        >
            <p
                class="text-center text-sm text-gray-600 dark:text-gray-400 py-6"
            >
                © 2024 CrowdFunding University. All rights reserved.
            </p>
        </footer>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import { Link, Head, usePage, router } from "@inertiajs/vue3";
import { Button } from "@/Components/ui/button";
import {
    NavigationMenu,
    NavigationMenuList,
    NavigationMenuItem,
    NavigationMenuLink,
} from "@/Components/ui/navigation-menu";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from "@/Components/ui/dropdown-menu";
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
    UserCircle,
    ChevronDown,
    ChevronRight,
    User,
    LogOut,
    LayoutDashboard,
} from "lucide-vue-next";
import AdminSidebar from "@/Components/Sidebar/AdminSidebar.vue";
import StudentSidebar from "@/Components/Sidebar/StudentSidebar.vue";

const mobileMenuOpen = ref(false);
const isDark = ref(false);

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

const logout = () => {
    router.post(route("logout"));
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

const isAdmin = computed(() => {
    return usePage().props.auth?.user?.role === "admin";
});

const isStudent = computed(() => {
    return usePage().props.auth?.user?.role === "student";
});

// Cek apakah route saat ini adalah route admin atau student
const shouldShowSidebar = computed(() => {
    const currentPath = window.location.pathname;
    if (isAdmin.value) {
        return currentPath.startsWith("/admin");
    }
    if (isStudent.value) {
        return currentPath.startsWith("/student");
    }
    return false;
});
</script>

<style>
:root {
    color-scheme: light;
}

.dark {
    color-scheme: dark;
    /* Tambahkan CSS variables untuk dark mode */
    --background: 0 0% 4%; /* Hitam solid */
    --card: 0 0% 4%;
    --popover: 0 0% 4%;
    --border: 0 0% 10%;
    --primary: 0 0% 98%;
    --primary-foreground: 0 0% 4%;
    --secondary: 0 0% 10%;
    --secondary-foreground: 0 0% 98%;
    --muted: 0 0% 10%;
    --muted-foreground: 0 0% 63%;
    --accent: 0 0% 10%;
    --accent-foreground: 0 0% 98%;
    --destructive: 0 62.8% 30.6%;
    --destructive-foreground: 0 0% 98%;
    --ring: 0 0% 83.9%;
}

.min-h-screen {
    min-height: 100vh;
}

/* Transisi yang lebih halus */
.dark .transition-colors {
    transition-property: background-color, border-color, color, fill, stroke;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 150ms;
}

/* Tambahan untuk memastikan konsistensi warna dark mode */
.dark {
    background-color: #0a0a0a;
}

.dark button,
.dark .dropdown-content {
    background-color: #0a0a0a;
    border-color: #1a1a1a;
}

.dark button:hover {
    background-color: #1a1a1a;
}

/* Override untuk komponen shadcn */
.dark [data-radix-popper-content-wrapper] {
    background-color: #0a0a0a !important;
    border-color: #1a1a1a !important;
}
</style>
