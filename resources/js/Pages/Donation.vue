<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
</script>

<template>
    <MainLayout>
        <section class="p-6 bg-gray-100 rounded-lg shadow-md">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="bg-white p-4 rounded-lg shadow">
                    <strong>Jumlah Donasi Terkumpul:</strong>
                    <span class="block text-blue-600 font-bold">{{ totalDonations }}</span>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <strong>Banyak Penerima:</strong>
                    <span class="block text-blue-600 font-bold">{{ totalRecipients }}</span>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <strong>Jumlah Uang yang Tersalurkan:</strong>
                    <span class="block text-blue-600 font-bold">{{ totalAmountDisbursed }}</span>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <strong>Jumlah Pendaftar:</strong>
                    <span class="block text-blue-600 font-bold">{{ totalRegistrants }}</span>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <strong>Jumlah Batch:</strong>
                    <span class="block text-blue-600 font-bold">{{ totalBatches }}</span>
                </div>
            </div>
        </section>
    </MainLayout>
</template>

<script>
export default {
    data() {
        return {
            totalDonations: 1000,
            totalRecipients: 50,
            totalAmountDisbursed: 50000,
            totalRegistrants: 200,
            totalBatches: 5
        };
    }
};
</script>
