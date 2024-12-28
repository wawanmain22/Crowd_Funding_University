<template>
    <div
        class="hidden border-r dark:border-[#1a1a1a] bg-background dark:bg-[#0A0A0A] md:flex md:w-64 md:flex-col"
    >
        <div class="flex flex-col flex-1 gap-2 p-4">
            <Link
                v-for="item in sidebarItems"
                :key="item.href"
                :href="item.href"
                :class="[
                    'flex items-center gap-3 rounded-lg px-3 py-2 text-gray-500 transition-all hover:text-gray-900 dark:text-gray-400 dark:hover:text-white',
                    {
                        'bg-blue-50 text-blue-700 dark:bg-[#1a1a1a] dark:text-white':
                            isCurrentRoute(item.href),
                    },
                ]"
            >
                <component :is="item.icon" class="h-4 w-4" />
                <span>{{ item.label }}</span>
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import {
    LayoutDashboard,
    FileText,
    User,
    MessageSquare,
    Receipt,
} from "lucide-vue-next";

const sidebarItems = [
    { href: "/student/dashboard", label: "Dashboard", icon: LayoutDashboard },
    { href: "/student/applications", label: "Pengajuan Saya", icon: FileText },
    { href: "/student/profile", label: "Profil", icon: User },
    { href: "/student/messages", label: "Pesan", icon: MessageSquare },
    { href: "/student/reports", label: "Laporan", icon: Receipt },
];

const isCurrentRoute = (path) => {
    return window.location.pathname === path;
};
</script>
