<template>
    <MainLayout>
        <div class="p-6">
            <!-- Header Section -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1
                        class="text-2xl font-bold text-gray-900 dark:text-white"
                    >
                        Admin Dashboard
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400">
                        Kelola pengajuan dana mahasiswa
                    </p>
                </div>
                <div class="flex gap-2">
                    <Button variant="outline" class="gap-2">
                        <Download class="w-4 h-4" />
                        Export Data
                    </Button>
                    <Button variant="default" class="gap-2">
                        <Plus class="w-4 h-4" />
                        Tambah Admin
                    </Button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <Card>
                    <CardHeader
                        class="flex flex-row items-center justify-between pb-2 space-y-0"
                    >
                        <CardTitle class="text-sm font-medium"
                            >Total Pengajuan</CardTitle
                        >
                        <FileText class="w-4 h-4 text-gray-500" />
                    </CardHeader>
                    <CardContent>
                        <div class="text-2xl font-bold">125</div>
                        <p class="text-xs text-gray-500">+12 dari bulan lalu</p>
                    </CardContent>
                </Card>
                <Card>
                    <CardHeader
                        class="flex flex-row items-center justify-between pb-2 space-y-0"
                    >
                        <CardTitle class="text-sm font-medium"
                            >Menunggu Review</CardTitle
                        >
                        <Clock class="w-4 h-4 text-yellow-500" />
                    </CardHeader>
                    <CardContent>
                        <div class="text-2xl font-bold">8</div>
                        <p class="text-xs text-gray-500">Perlu ditinjau</p>
                    </CardContent>
                </Card>
                <Card>
                    <CardHeader
                        class="flex flex-row items-center justify-between pb-2 space-y-0"
                    >
                        <CardTitle class="text-sm font-medium"
                            >Total Mahasiswa</CardTitle
                        >
                        <Users class="w-4 h-4 text-blue-500" />
                    </CardHeader>
                    <CardContent>
                        <div class="text-2xl font-bold">89</div>
                        <p class="text-xs text-gray-500">Aktif terdaftar</p>
                    </CardContent>
                </Card>
                <Card>
                    <CardHeader
                        class="flex flex-row items-center justify-between pb-2 space-y-0"
                    >
                        <CardTitle class="text-sm font-medium"
                            >Total Dana Tersalurkan</CardTitle
                        >
                        <DollarSign class="w-4 h-4 text-green-500" />
                    </CardHeader>
                    <CardContent>
                        <div class="text-2xl font-bold">Rp 850.000.000</div>
                        <p class="text-xs text-gray-500">Tahun 2024</p>
                    </CardContent>
                </Card>
            </div>

            <!-- Recent Applications -->
            <Card class="col-span-4">
                <CardHeader>
                    <CardTitle>Pengajuan Terbaru</CardTitle>
                    <CardDescription>
                        Daftar pengajuan yang memerlukan review
                    </CardDescription>
                </CardHeader>
                <CardContent>
                    <div class="relative w-full overflow-auto">
                        <table class="w-full caption-bottom text-sm">
                            <thead class="[&_tr]:border-b">
                                <tr
                                    class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted"
                                >
                                    <th
                                        class="h-12 px-4 text-left align-middle font-medium text-muted-foreground"
                                    >
                                        No
                                    </th>
                                    <th
                                        class="h-12 px-4 text-left align-middle font-medium text-muted-foreground"
                                    >
                                        Tanggal
                                    </th>
                                    <th
                                        class="h-12 px-4 text-left align-middle font-medium text-muted-foreground"
                                    >
                                        Mahasiswa
                                    </th>
                                    <th
                                        class="h-12 px-4 text-left align-middle font-medium text-muted-foreground"
                                    >
                                        Universitas
                                    </th>
                                    <th
                                        class="h-12 px-4 text-left align-middle font-medium text-muted-foreground"
                                    >
                                        Jumlah
                                    </th>
                                    <th
                                        class="h-12 px-4 text-left align-middle font-medium text-muted-foreground"
                                    >
                                        Status
                                    </th>
                                    <th
                                        class="h-12 px-4 text-left align-middle font-medium text-muted-foreground"
                                    >
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="[&_tr:last-child]:border-0">
                                <tr
                                    v-for="i in 5"
                                    :key="i"
                                    class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted"
                                >
                                    <td class="p-4 align-middle">{{ i }}</td>
                                    <td class="p-4 align-middle">
                                        {{ `${i} Des 2024` }}
                                    </td>
                                    <td class="p-4 align-middle">
                                        Mahasiswa {{ i }}
                                    </td>
                                    <td class="p-4 align-middle">
                                        Universitas {{ i }}
                                    </td>
                                    <td class="p-4 align-middle">
                                        Rp {{ i }}.000.000
                                    </td>
                                    <td class="p-4 align-middle">
                                        <span
                                            class="inline-flex items-center rounded-full px-2 py-1 text-xs font-medium"
                                            :class="{
                                                'bg-yellow-50 text-yellow-700':
                                                    i % 3 === 0,
                                                'bg-green-50 text-green-700':
                                                    i % 3 === 1,
                                                'bg-red-50 text-red-700':
                                                    i % 3 === 2,
                                            }"
                                        >
                                            {{
                                                i % 3 === 0
                                                    ? "Pending"
                                                    : i % 3 === 1
                                                    ? "Disetujui"
                                                    : "Ditolak"
                                            }}
                                        </span>
                                    </td>
                                    <td class="p-4 align-middle">
                                        <div class="flex gap-2">
                                            <Button variant="ghost" size="icon">
                                                <Eye class="h-4 w-4" />
                                            </Button>
                                            <Button variant="ghost" size="icon">
                                                <PenSquare class="h-4 w-4" />
                                            </Button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </CardContent>
            </Card>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Button } from "@/Components/ui/button";
import {
    Card,
    CardContent,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from "@/Components/ui/card";
import {
    Download,
    FileText,
    Clock,
    Users,
    DollarSign,
    Eye,
    PenSquare,
    Plus,
} from "lucide-vue-next";
</script>
