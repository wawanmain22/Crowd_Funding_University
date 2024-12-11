<template>
    <MainLayout>
        <div class="container py-6">
            <!-- Header Section -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1
                        class="text-2xl font-bold text-gray-900 dark:text-white"
                    >
                        Student Dashboard
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400">
                        Selamat datang di panel mahasiswa
                    </p>
                </div>
                <Button variant="outline" class="gap-2">
                    <Download class="w-4 h-4" />
                    Download Laporan
                </Button>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
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
                        <div class="text-2xl font-bold">3</div>
                        <p class="text-xs text-gray-500">+1 bulan ini</p>
                    </CardContent>
                </Card>
                <Card>
                    <CardHeader
                        class="flex flex-row items-center justify-between pb-2 space-y-0"
                    >
                        <CardTitle class="text-sm font-medium"
                            >Pengajuan Disetujui</CardTitle
                        >
                        <CheckCircle2 class="w-4 h-4 text-green-500" />
                    </CardHeader>
                    <CardContent>
                        <div class="text-2xl font-bold">2</div>
                        <p class="text-xs text-gray-500">
                            80% tingkat persetujuan
                        </p>
                    </CardContent>
                </Card>
                <Card>
                    <CardHeader
                        class="flex flex-row items-center justify-between pb-2 space-y-0"
                    >
                        <CardTitle class="text-sm font-medium"
                            >Total Dana Diterima</CardTitle
                        >
                        <DollarSign class="w-4 h-4 text-blue-500" />
                    </CardHeader>
                    <CardContent>
                        <div class="text-2xl font-bold">Rp 15.000.000</div>
                        <p class="text-xs text-gray-500">Dari 2 pengajuan</p>
                    </CardContent>
                </Card>
            </div>

            <!-- Recent Applications -->
            <Card class="col-span-3">
                <CardHeader>
                    <CardTitle>Pengajuan Terakhir</CardTitle>
                    <CardDescription>
                        Daftar pengajuan dana yang telah Anda ajukan
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
                                    class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted"
                                >
                                    <td class="p-4 align-middle">1</td>
                                    <td class="p-4 align-middle">
                                        10 Des 2024
                                    </td>
                                    <td class="p-4 align-middle">
                                        Rp 8.000.000
                                    </td>
                                    <td class="p-4 align-middle">
                                        <span
                                            class="inline-flex items-center rounded-full px-2 py-1 text-xs font-medium bg-green-50 text-green-700"
                                        >
                                            Disetujui
                                        </span>
                                    </td>
                                    <td class="p-4 align-middle">
                                        <Button variant="ghost" size="icon">
                                            <Eye class="h-4 w-4" />
                                        </Button>
                                    </td>
                                </tr>
                                <tr
                                    class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted"
                                >
                                    <td class="p-4 align-middle">2</td>
                                    <td class="p-4 align-middle">5 Des 2024</td>
                                    <td class="p-4 align-middle">
                                        Rp 7.000.000
                                    </td>
                                    <td class="p-4 align-middle">
                                        <span
                                            class="inline-flex items-center rounded-full px-2 py-1 text-xs font-medium bg-green-50 text-green-700"
                                        >
                                            Disetujui
                                        </span>
                                    </td>
                                    <td class="p-4 align-middle">
                                        <Button variant="ghost" size="icon">
                                            <Eye class="h-4 w-4" />
                                        </Button>
                                    </td>
                                </tr>
                                <tr
                                    class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted"
                                >
                                    <td class="p-4 align-middle">3</td>
                                    <td class="p-4 align-middle">1 Des 2024</td>
                                    <td class="p-4 align-middle">
                                        Rp 5.000.000
                                    </td>
                                    <td class="p-4 align-middle">
                                        <span
                                            class="inline-flex items-center rounded-full px-2 py-1 text-xs font-medium bg-yellow-50 text-yellow-700"
                                        >
                                            Pending
                                        </span>
                                    </td>
                                    <td class="p-4 align-middle">
                                        <Button variant="ghost" size="icon">
                                            <Eye class="h-4 w-4" />
                                        </Button>
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
    CheckCircle2,
    DollarSign,
    Eye,
} from "lucide-vue-next";
</script>
