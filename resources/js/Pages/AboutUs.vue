<script setup>

import MainLayout from "@/Layouts/MainLayout.vue";

</script>
<template>
  <MainLayout>
    <div class="space-y-12">
      <!-- Hero Section: Latar Belakang -->
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-8 flex items-center">
        <div class="flex-1">
          <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
            Latar Belakang Kami
          </h2>
          <p class="text-lg text-gray-600 dark:text-gray-300">
            Kami adalah tim yang berdedikasi untuk menciptakan solusi inovatif yang dapat membantu masyarakat.
            Kami percaya bahwa teknologi dapat menjadi alat yang kuat untuk meningkatkan kualitas hidup dan
            memberikan kemudahan bagi banyak orang.
          </p>
        </div>
        <div class="flex-1">
          <img
            src="/photo/learning_sketch.png"
            alt="people learning"
            class="h-64 md:h-72 lg:h-80 object-contain"
          >
        </div>
      </div

      <!-- Hero Section: Harapan untuk Masa Depan -->
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-8">
        <div class="max-w-3xl mx-auto text-center space-y-6">
          <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
            Harapan Kami ke Depan
          </h2>
          <p class="text-lg text-gray-600 dark:text-gray-300">
            Kami berharap dapat terus berkembang dan berinovasi,
            menciptakan produk yang tidak hanya bermanfaat tetapi juga dapat memberikan dampak positif
            bagi lingkungan dan masyarakat. Kami ingin menjadi bagian dari perubahan yang lebih baik.
          </p>
        </div>
      </div>

      <!-- Developer Section -->
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 text-center">
          Tim Pengembang Kami
        </h2>
        <div class="grid md:grid-cols-3 gap-8">
          <div class="card space-y-3 text-center">
            <img src="path/to/john-photo.jpg" alt="John Doe" class="w-32 h-32 object-cover rounded-full mx-auto" />
            <h3 class="font-semibold text-gray-900 dark:text-white">John Doe</h3>
            <p class="text-gray-600 dark:text-gray-300">Frontend Developer</p>
            <p class="text-gray-600 dark:text-gray-300">Spesialis dalam pengembangan antarmuka pengguna yang responsif.</p>
          </div>
          <div class="card space-y-3 text-center">
            <img src="path/to/jane-photo.jpg" alt="Jane Smith" class="w-32 h-32 object-cover rounded-full mx-auto" />
            <h3 class="font-semibold text-gray-900 dark:text-white">Jane Smith</h3>
            <p class="text-gray-600 dark:text-gray-300">Backend Developer</p>
            <p class="text-gray-600 dark:text-gray-300">Berpengalaman dalam pengembangan dan pengelolaan server.</p>
          </div>
          <!-- Tambahkan lebih banyak kartu developer sesuai kebutuhan -->
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<style scoped>
.card {
  border: 1px solid #ccc;
  border-radius: 8px;
  padding: 15px;
  text-align: center;
}
</style>
