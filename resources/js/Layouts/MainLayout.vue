<template>
    <div class="min-h-screen bg-background">
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
                        <GraduationCap class="h-6 w-6" />
                        <span class="font-bold">{{ appName }}</span>
                    </Link>
                </div>

                <!-- Navigation (Center) -->
                <NavigationMenu
                    class="hidden md:flex absolute left-1/2 transform -translate-x-1/2"
                >
                    <NavigationMenuList class="space-x-2">
                        <NavigationMenuItem>
                            <Link href="/">
                                <NavigationMenuLink
                                    class="group inline-flex h-9 w-max items-center justify-center rounded-md bg-background px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground focus:outline-none disabled:pointer-events-none disabled:opacity-50 data-[active]:bg-accent/50 data-[state=open]:bg-accent/50"
                                >
                                    <Home class="h-4 w-4 mr-2" />
                                    <span>Home</span>
                                </NavigationMenuLink>
                            </Link>
                        </NavigationMenuItem>

                        <NavigationMenuItem>
                            <Link href="/donation">
                                <NavigationMenuLink
                                    class="group inline-flex h-9 w-max items-center justify-center rounded-md bg-background px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground focus:outline-none disabled:pointer-events-none disabled:opacity-50 data-[active]:bg-accent/50 data-[state=open]:bg-accent/50"
                                >
                                    <Heart class="h-4 w-4 mr-2" />
                                    <span>Donation</span>
                                </NavigationMenuLink>
                            </Link>
                        </NavigationMenuItem>

                        <NavigationMenuItem>
                            <Link href="/about-us">
                                <NavigationMenuLink
                                    class="group inline-flex h-9 w-max items-center justify-center rounded-md bg-background px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground focus:outline-none disabled:pointer-events-none disabled:opacity-50 data-[active]:bg-accent/50 data-[state=open]:bg-accent/50"
                                >
                                    <Users class="h-4 w-4 mr-2" />
                                    <span>About Us</span>
                                </NavigationMenuLink>
                            </Link>
                        </NavigationMenuItem>
                    </NavigationMenuList>
                </NavigationMenu>

                <!-- Auth Buttons (Right) -->
                <div class="flex items-center gap-2">
                    <Link href="/register" class="hidden md:flex">
                        <Button
                            variant="secondary"
                            class="bg-slate-200 hover:bg-slate-300"
                        >
                            <UserPlus class="h-4 w-4 mr-2" />
                            Sign Up
                        </Button>
                    </Link>
                    <Link href="/login">
                        <Button
                            variant="default"
                            class="bg-blue-600 hover:bg-blue-700"
                        >
                            <LogIn class="h-4 w-4 mr-2" />
                            Sign In
                        </Button>
                    </Link>

                    <!-- Mobile Menu Button -->
                    <Button
                        variant="ghost"
                        size="icon"
                        class="md:hidden"
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
                        class="flex items-center space-x-2 rounded-md p-2 hover:bg-accent"
                        @click="mobileMenuOpen = false"
                    >
                        <component :is="item.icon" class="h-4 w-4" />
                        <span>{{ item.label }}</span>
                    </Link>
                </div>
            </nav>
        </header>

        <!-- Main Content dengan margin bottom untuk space footer -->
        <main class="container py-6 mb-20">
            <slot></slot>
        </main>

        <!-- Fixed Footer -->
        <footer class="fixed bottom-0 w-full border-t bg-background z-40">
            <div class="container py-6">
                <p class="text-center text-sm text-muted-foreground">
                    © 2024 {{ appName }} - CrowdFund University. All rights
                    reserved.
                </p>
            </div>
        </footer>
    </div>
</template>

<script setup>
import { ref, computed } from "vue";
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
} from "lucide-vue-next";

const mobileMenuOpen = ref(false);

// App name dari .env
const appName = computed(() => usePage().props.app.name);

// Title dinamis
const title = computed(() => {
    const pageTitle = usePage().props.title;
    return pageTitle ? `${pageTitle} - ${appName.value}` : appName.value;
});

const navigationItems = [
    { href: "/", label: "Home", icon: Home },
    { href: "/donation", label: "Donation", icon: Heart },
    { href: "/about-us", label: "About Us", icon: Users },
    { href: "/register", label: "Sign Up", icon: UserPlus },
    { href: "/login", label: "Sign In", icon: LogIn },
];
</script>

<style>
.min-h-screen {
    min-height: 100vh;
}
</style>
