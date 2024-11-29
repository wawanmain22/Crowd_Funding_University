<template>
    <MainLayout>
        <div class="space-y-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Tata Cara Donasi Section -->
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-8"
            >
                <h2
                    class="text-2xl font-bold text-gray-900 dark:text-white mb-6"
                >
                    Tata Cara Donasi
                </h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="space-y-4">
                        <div
                            class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center"
                        >
                            <Wallet
                                class="h-6 w-6 text-blue-600 dark:text-blue-400"
                            />
                        </div>
                        <h3 class="font-semibold text-gray-900 dark:text-white">
                            1. Pilih Nominal
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Tentukan jumlah donasi yang ingin Anda berikan
                        </p>
                    </div>
                    <div class="space-y-4">
                        <div
                            class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center"
                        >
                            <CreditCard
                                class="h-6 w-6 text-blue-600 dark:text-blue-400"
                            />
                        </div>
                        <h3 class="font-semibold text-gray-900 dark:text-white">
                            2. Pilih Pembayaran
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Pilih metode pembayaran melalui Midtrans
                        </p>
                    </div>
                    <div class="space-y-4">
                        <div
                            class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center"
                        >
                            <CheckCircle
                                class="h-6 w-6 text-blue-600 dark:text-blue-400"
                            />
                        </div>
                        <h3 class="font-semibold text-gray-900 dark:text-white">
                            3. Konfirmasi
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Selesaikan pembayaran dan konfirmasi donasi
                        </p>
                    </div>
                </div>
            </div>

            <!-- Donation Form Section -->
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-8"
            >
                <h2
                    class="text-2xl font-bold text-gray-900 dark:text-white mb-6 text-center"
                >
                    Formulir Donasi
                </h2>
                <div class="max-w-2xl mx-auto">
                    <Card>
                        <CardHeader>
                            <CardTitle>Masukkan Detail Donasi</CardTitle>
                            <CardDescription
                                >Pilih nominal atau masukkan jumlah donasi
                                Anda</CardDescription
                            >
                        </CardHeader>
                        <CardContent>
                            <div class="space-y-6">
                                <!-- Preset Amount Buttons -->
                                <div class="space-y-2">
                                    <Label>Pilih Nominal Donasi</Label>
                                    <div
                                        class="grid grid-cols-2 md:grid-cols-3 gap-2"
                                    >
                                        <Button
                                            v-for="amount in presetAmounts"
                                            :key="amount"
                                            variant="outline"
                                            :class="{
                                                'border-blue-500 bg-blue-50 dark:bg-blue-900/50':
                                                    Number(customAmount) ===
                                                        amount &&
                                                    !isCustomAmount,
                                            }"
                                            @click="selectPresetAmount(amount)"
                                        >
                                            Rp {{ formatButtonAmount(amount) }}
                                        </Button>
                                        <Button
                                            variant="outline"
                                            :class="{
                                                'border-blue-500 bg-blue-50 dark:bg-blue-900/50':
                                                    isCustomAmount,
                                            }"
                                            @click="selectCustomAmount"
                                        >
                                            Custom
                                        </Button>
                                    </div>
                                </div>

                                <!-- Custom Amount Input -->
                                <div class="space-y-2">
                                    <Label for="amount">Masukkan Nominal</Label>
                                    <div class="relative">
                                        <span
                                            class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500"
                                            >Rp</span
                                        >
                                        <Input
                                            id="customAmount"
                                            ref="customAmountInput"
                                            type="text"
                                            v-model="inputAmount"
                                            @input="onInputChange"
                                            @blur="formatOnBlur"
                                            @focus="onInputFocus"
                                            class="pl-10"
                                            placeholder="0"
                                        />
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <Label for="message"
                                        >Pesan (Opsional)</Label
                                    >
                                    <Textarea
                                        id="message"
                                        placeholder="Tulis pesan dukungan Anda..."
                                        v-model="message"
                                    />
                                </div>

                                <Button
                                    class="w-full"
                                    :disabled="!isValidAmount"
                                >
                                    <Heart class="mr-2 h-4 w-4" />
                                    Donasi Sekarang
                                </Button>
                            </div>
                        </CardContent>
                    </Card>
                </div>
            </div>

            <!-- Recent Donations (simplified version) -->
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-8"
            >
                <div class="flex justify-between items-center mb-6">
                    <h2
                        class="text-2xl font-bold text-gray-900 dark:text-white"
                    >
                        Donasi Terbaru
                    </h2>
                    <Button
                        variant="ghost"
                        class="text-blue-600"
                        @click="showAllDonations = true"
                    >
                        Lihat Semua
                        <ArrowRight class="ml-2 h-4 w-4" />
                    </Button>
                </div>

                <!-- Preview Cards (5 items) -->
                <div class="space-y-4">
                    <Card v-for="i in 5" :key="i">
                        <CardContent class="flex items-center p-4">
                            <div
                                class="h-10 w-10 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center"
                            >
                                <User
                                    class="h-5 w-5 text-blue-600 dark:text-blue-400"
                                />
                            </div>
                            <div class="ml-4 flex-1">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3
                                            class="font-semibold text-gray-900 dark:text-white"
                                        >
                                            Donatur {{ i }}
                                        </h3>
                                        <p
                                            class="text-sm text-gray-600 dark:text-gray-300"
                                        >
                                            Berdonasi sebesar Rp{{
                                                (
                                                    Math.random() * 1000000
                                                ).toFixed(0)
                                            }}
                                        </p>
                                    </div>
                                    <span class="text-sm text-gray-500"
                                        >{{ i }} jam yang lalu</span
                                    >
                                </div>
                                <p
                                    class="mt-2 text-sm text-gray-600 dark:text-gray-400 italic"
                                >
                                    "Semoga bantuan ini bermanfaat untuk
                                    pendidikan adik-adik mahasiswa. Tetap
                                    semangat menuntut ilmu! 🙏"
                                </p>
                            </div>
                        </CardContent>
                    </Card>
                </div>

                <!-- Modal untuk semua donasi -->
                <Dialog
                    :open="showAllDonations"
                    @update:open="showAllDonations = $event"
                >
                    <DialogContent
                        class="max-w-4xl max-h-[80vh] overflow-y-auto"
                    >
                        <DialogHeader>
                            <DialogTitle>Semua Riwayat Donasi</DialogTitle>
                            <DialogDescription>
                                Daftar lengkap semua donasi yang telah diberikan
                            </DialogDescription>
                        </DialogHeader>

                        <!-- Filter Section -->
                        <div class="space-y-4 my-4">
                            <!-- Filter Type Selection -->
                            <div class="flex items-center space-x-4">
                                <Label>Filter Berdasarkan:</Label>
                                <Select v-model="filterType">
                                    <SelectTrigger class="w-[180px]">
                                        <SelectValue
                                            placeholder="Pilih Jenis Filter"
                                        />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectItem value="date"
                                            >Waktu Donasi</SelectItem
                                        >
                                        <SelectItem value="amount"
                                            >Jumlah Donasi</SelectItem
                                        >
                                    </SelectContent>
                                </Select>
                            </div>

                            <!-- Date Filter -->
                            <div v-if="filterType === 'date'" class="space-y-4">
                                <div class="flex flex-wrap gap-4 items-center">
                                    <div class="flex items-center space-x-4">
                                        <Label>Filter Waktu:</Label>
                                        <Select v-model="selectedTimeFilter">
                                            <SelectTrigger class="w-[180px]">
                                                <SelectValue
                                                    placeholder="Pilih Rentang Waktu"
                                                />
                                            </SelectTrigger>
                                            <SelectContent>
                                                <SelectItem value="today"
                                                    >Hari Ini</SelectItem
                                                >
                                                <SelectItem value="yesterday"
                                                    >Kemarin</SelectItem
                                                >
                                                <SelectItem value="week"
                                                    >7 Hari Terakhir</SelectItem
                                                >
                                                <SelectItem value="month"
                                                    >30 Hari
                                                    Terakhir</SelectItem
                                                >
                                                <SelectItem value="year"
                                                    >1 Tahun
                                                    Terakhir</SelectItem
                                                >
                                            </SelectContent>
                                        </Select>
                                    </div>

                                    <div class="flex items-center space-x-4">
                                        <Label>Atau Pilih Tanggal:</Label>
                                        <div
                                            class="flex items-center space-x-2"
                                        >
                                            <Input
                                                type="date"
                                                v-model="startDate"
                                                class="w-[150px]"
                                            />
                                            <span class="text-gray-500">-</span>
                                            <Input
                                                type="date"
                                                v-model="endDate"
                                                class="w-[150px]"
                                            />
                                            <Button
                                                variant="outline"
                                                size="sm"
                                                @click="applyDateFilter"
                                            >
                                                <Filter class="h-4 w-4 mr-2" />
                                                Terapkan
                                            </Button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Amount Filter -->
                            <div
                                v-else-if="filterType === 'amount'"
                                class="space-y-4"
                            >
                                <div class="flex items-center space-x-4">
                                    <Label>Urutkan Donasi:</Label>
                                    <Select v-model="amountSortOrder">
                                        <SelectTrigger class="w-[180px]">
                                            <SelectValue
                                                placeholder="Pilih Urutan"
                                            />
                                        </SelectTrigger>
                                        <SelectContent>
                                            <SelectItem value="highest"
                                                >Tertinggi ke
                                                Terendah</SelectItem
                                            >
                                            <SelectItem value="lowest"
                                                >Terendah ke
                                                Tertinggi</SelectItem
                                            >
                                        </SelectContent>
                                    </Select>
                                    <div class="flex items-center space-x-4">
                                        <Label>Rentang Nominal:</Label>
                                        <div
                                            class="flex items-center space-x-2"
                                        >
                                            <Input
                                                type="number"
                                                v-model="minAmount"
                                                placeholder="Min"
                                                class="w-[150px]"
                                            />
                                            <span class="text-gray-500">-</span>
                                            <Input
                                                type="number"
                                                v-model="maxAmount"
                                                placeholder="Max"
                                                class="w-[150px]"
                                            />
                                            <Button
                                                variant="outline"
                                                size="sm"
                                                @click="applyAmountFilter"
                                            >
                                                <Filter class="h-4 w-4 mr-2" />
                                                Terapkan
                                            </Button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- All Donations with Pagination -->
                        <div class="space-y-4">
                            <Card v-for="i in currentItems" :key="i">
                                <CardContent class="flex items-center p-4">
                                    <div
                                        class="h-10 w-10 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center"
                                    >
                                        <User
                                            class="h-5 w-5 text-blue-600 dark:text-blue-400"
                                        />
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <div
                                            class="flex justify-between items-start"
                                        >
                                            <div>
                                                <h3
                                                    class="font-semibold text-gray-900 dark:text-white"
                                                >
                                                    Donatur {{ i }}
                                                </h3>
                                                <p
                                                    class="text-sm text-gray-600 dark:text-gray-300"
                                                >
                                                    Berdonasi sebesar Rp{{
                                                        (
                                                            Math.random() *
                                                            1000000
                                                        ).toFixed(0)
                                                    }}
                                                </p>
                                            </div>
                                            <span class="text-sm text-gray-500"
                                                >{{ i }} jam yang lalu</span
                                            >
                                        </div>
                                        <p
                                            class="mt-2 text-sm text-gray-600 dark:text-gray-400 italic"
                                        >
                                            "Semoga bantuan ini bermanfaat untuk
                                            pendidikan adik-adik mahasiswa.
                                            Tetap semangat menuntut ilmu! 🙏"
                                        </p>
                                    </div>
                                </CardContent>
                            </Card>

                            <!-- Pagination -->
                            <div
                                class="flex items-center justify-between border-t border-gray-200 dark:border-gray-700 pt-4"
                            >
                                <Button
                                    variant="outline"
                                    :disabled="currentPage === 1"
                                    @click="currentPage--"
                                >
                                    <ChevronLeft class="h-4 w-4 mr-2" />
                                    Previous
                                </Button>
                                <span
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >
                                    Page {{ currentPage }} of {{ totalPages }}
                                </span>
                                <Button
                                    variant="outline"
                                    :disabled="currentPage === totalPages"
                                    @click="currentPage++"
                                >
                                    Next
                                    <ChevronRight class="h-4 w-4 ml-2" />
                                </Button>
                            </div>
                        </div>
                    </DialogContent>
                </Dialog>
            </div>

            <!-- Recipients with Batch Filter -->
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-8"
            >
                <div class="flex justify-between items-center mb-6">
                    <h2
                        class="text-2xl font-bold text-gray-900 dark:text-white"
                    >
                        Penerima Donasi
                    </h2>
                    <Button
                        variant="ghost"
                        class="text-blue-600"
                        @click="showAllRecipients = true"
                    >
                        Lihat Semua
                        <ArrowRight class="ml-2 h-4 w-4" />
                    </Button>
                </div>

                <!-- Preview Cards (5 items) -->
                <div class="space-y-4">
                    <Card v-for="i in 5" :key="i">
                        <CardContent class="flex items-center p-4">
                            <div
                                class="h-10 w-10 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center"
                            >
                                <GraduationCap
                                    class="h-5 w-5 text-green-600 dark:text-green-400"
                                />
                            </div>
                            <div class="ml-4 flex-1">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3
                                            class="font-semibold text-gray-900 dark:text-white"
                                        >
                                            Mahasiswa {{ i }}
                                        </h3>
                                        <p
                                            class="text-sm text-gray-600 dark:text-gray-300"
                                        >
                                            Menerima bantuan sebesar Rp{{
                                                (
                                                    Math.random() * 5000000
                                                ).toFixed(0)
                                            }}
                                        </p>
                                    </div>
                                    <span class="text-sm text-gray-500"
                                        >{{ i }} hari yang lalu</span
                                    >
                                </div>
                                <p
                                    class="mt-2 text-sm text-gray-600 dark:text-gray-400"
                                >
                                    "Terima kasih banyak atas bantuan yang
                                    diberikan. Saya berjanji akan menggunakan
                                    bantuan ini sebaik-baiknya untuk pendidikan
                                    saya. 🙏"
                                </p>
                            </div>
                        </CardContent>
                    </Card>
                </div>

                <!-- Modal untuk semua penerima -->
                <Dialog
                    :open="showAllRecipients"
                    @update:open="showAllRecipients = $event"
                >
                    <DialogContent
                        class="max-w-4xl max-h-[80vh] overflow-y-auto"
                    >
                        <DialogHeader>
                            <DialogTitle>Semua Penerima Donasi</DialogTitle>
                            <DialogDescription>
                                Daftar lengkap penerima donasi dari semua batch
                            </DialogDescription>
                        </DialogHeader>

                        <!-- Combined Filters Section -->
                        <div class="space-y-4 my-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Batch Filter -->
                                <div class="space-y-2">
                                    <Label>Filter Batch:</Label>
                                    <Select v-model="selectedBatchFilter">
                                        <SelectTrigger>
                                            <SelectValue
                                                placeholder="Pilih Batch"
                                            />
                                        </SelectTrigger>
                                        <SelectContent>
                                            <SelectItem value="all"
                                                >Semua Batch</SelectItem
                                            >
                                            <SelectItem
                                                v-for="batch in 5"
                                                :key="batch"
                                                :value="batch"
                                            >
                                                Batch {{ batch }}
                                            </SelectItem>
                                        </SelectContent>
                                    </Select>
                                </div>

                                <!-- Time Filter -->
                                <div class="space-y-2">
                                    <Label>Filter Waktu:</Label>
                                    <Select v-model="recipientTimeFilter">
                                        <SelectTrigger>
                                            <SelectValue
                                                placeholder="Pilih Rentang Waktu"
                                            />
                                        </SelectTrigger>
                                        <SelectContent>
                                            <SelectItem value="all"
                                                >Semua Waktu</SelectItem
                                            >
                                            <SelectItem value="week"
                                                >7 Hari Terakhir</SelectItem
                                            >
                                            <SelectItem value="month"
                                                >30 Hari Terakhir</SelectItem
                                            >
                                            <SelectItem value="year"
                                                >1 Tahun Terakhir</SelectItem
                                            >
                                        </SelectContent>
                                    </Select>
                                </div>

                                <!-- Custom Date Range -->
                                <div class="md:col-span-2 space-y-2">
                                    <Label
                                        >Atau Pilih Rentang Tanggal
                                        Spesifik:</Label
                                    >
                                    <div class="flex items-center space-x-2">
                                        <Input
                                            type="date"
                                            v-model="recipientStartDate"
                                            class="w-[150px]"
                                        />
                                        <span class="text-gray-500">-</span>
                                        <Input
                                            type="date"
                                            v-model="recipientEndDate"
                                            class="w-[150px]"
                                        />
                                        <Button
                                            variant="outline"
                                            size="sm"
                                            @click="applyRecipientFilters"
                                        >
                                            <Filter class="h-4 w-4 mr-2" />
                                            Terapkan Filter
                                        </Button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Filtered Recipients with Pagination -->
                        <div class="space-y-4">
                            <Card v-for="i in filteredRecipients" :key="i">
                                <CardContent class="flex items-center p-4">
                                    <div
                                        class="h-10 w-10 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center"
                                    >
                                        <GraduationCap
                                            class="h-5 w-5 text-green-600 dark:text-green-400"
                                        />
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <div
                                            class="flex justify-between items-start"
                                        >
                                            <div>
                                                <h3
                                                    class="font-semibold text-gray-900 dark:text-white"
                                                >
                                                    Mahasiswa {{ i }} (Batch
                                                    {{ Math.ceil(i / 10) }})
                                                </h3>
                                                <p
                                                    class="text-sm text-gray-600 dark:text-gray-300"
                                                >
                                                    Menerima bantuan sebesar
                                                    Rp{{
                                                        (
                                                            Math.random() *
                                                            5000000
                                                        ).toFixed(0)
                                                    }}
                                                </p>
                                            </div>
                                            <span class="text-sm text-gray-500"
                                                >{{ i }} hari yang lalu</span
                                            >
                                        </div>
                                        <p
                                            class="mt-2 text-sm text-gray-600 dark:text-gray-400"
                                        >
                                            "Terima kasih banyak atas bantuan
                                            yang diberikan. Saya berjanji akan
                                            menggunakan bantuan ini
                                            sebaik-baiknya untuk pendidikan
                                            saya. 🙏"
                                        </p>
                                    </div>
                                </CardContent>
                            </Card>

                            <!-- Pagination -->
                            <div
                                class="flex items-center justify-between border-t border-gray-200 dark:border-gray-700 pt-4"
                            >
                                <Button
                                    variant="outline"
                                    :disabled="recipientPage === 1"
                                    @click="recipientPage--"
                                >
                                    <ChevronLeft class="h-4 w-4 mr-2" />
                                    Previous
                                </Button>
                                <span
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >
                                    Page {{ recipientPage }} of
                                    {{ recipientTotalPages }}
                                </span>
                                <Button
                                    variant="outline"
                                    :disabled="
                                        recipientPage === recipientTotalPages
                                    "
                                    @click="recipientPage++"
                                >
                                    Next
                                    <ChevronRight class="h-4 w-4 ml-2" />
                                </Button>
                            </div>
                        </div>
                    </DialogContent>
                </Dialog>
            </div>

            <!-- Photo Carousel Section -->
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-8"
            >
                <div class="flex justify-between items-center mb-6">
                    <h2
                        class="text-2xl font-bold text-gray-900 dark:text-white"
                    >
                        Galeri Penerima Donasi
                    </h2>
                    <Button
                        variant="ghost"
                        class="text-blue-600"
                        @click="showAllGallery = true"
                    >
                        Lihat Semua
                        <ArrowRight class="ml-2 h-4 w-4" />
                    </Button>
                </div>

                <!-- Preview Carousel (tanpa filter) -->
                <div class="relative">
                    <div class="flex overflow-hidden">
                        <div
                            class="flex transition-transform duration-300"
                            :style="{
                                transform: `translateX(-${activeSlide * 100}%)`,
                            }"
                        >
                            <div
                                v-for="i in 5"
                                :key="i"
                                class="w-full flex-shrink-0"
                            >
                                <div
                                    class="aspect-video bg-gray-100 dark:bg-gray-700 rounded-lg mx-2 flex items-center justify-center"
                                >
                                    <img
                                        src="/photo/no_pictures.png"
                                        :alt="`Recipient ${i}`"
                                        class="object-contain w-full h-full rounded-lg"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <Button
                        variant="ghost"
                        class="absolute left-0 top-1/2 -translate-y-1/2"
                        @click="prevSlide"
                    >
                        <ChevronLeft class="h-6 w-6" />
                    </Button>
                    <Button
                        variant="ghost"
                        class="absolute right-0 top-1/2 -translate-y-1/2"
                        @click="nextSlide"
                    >
                        <ChevronRight class="h-6 w-6" />
                    </Button>
                </div>
                <!-- Carousel Indicators -->
                <div class="flex justify-center mt-4 space-x-2">
                    <button
                        v-for="i in 5"
                        :key="i"
                        @click="activeSlide = i - 1"
                        class="w-2 h-2 rounded-full"
                        :class="
                            activeSlide === i - 1
                                ? 'bg-blue-600'
                                : 'bg-gray-300'
                        "
                    />
                </div>

                <!-- Modal untuk semua galeri -->
                <Dialog
                    :open="showAllGallery"
                    @update:open="showAllGallery = $event"
                >
                    <DialogContent
                        class="max-w-5xl max-h-[80vh] overflow-y-auto"
                    >
                        <DialogHeader>
                            <DialogTitle>Galeri Penerima Donasi</DialogTitle>
                            <DialogDescription>
                                Dokumentasi foto seluruh penerima donasi dari
                                setiap batch
                            </DialogDescription>
                        </DialogHeader>

                        <!-- Gallery Filter -->
                        <div class="space-y-4 my-4">
                            <div class="flex items-center space-x-4">
                                <Label>Filter Batch:</Label>
                                <Select v-model="selectedGalleryBatch">
                                    <SelectTrigger class="w-[180px]">
                                        <SelectValue
                                            placeholder="Pilih Batch"
                                        />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectItem value="all"
                                            >Semua Batch</SelectItem
                                        >
                                        <SelectItem
                                            v-for="batch in 5"
                                            :key="batch"
                                            :value="batch"
                                        >
                                            Batch {{ batch }}
                                        </SelectItem>
                                    </SelectContent>
                                </Select>
                            </div>
                        </div>

                        <!-- Gallery Grid -->
                        <div
                            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"
                        >
                            <div
                                v-for="i in filteredGalleryItems"
                                :key="i"
                                class="aspect-square relative group cursor-pointer"
                            >
                                <img
                                    src="/photo/no_pictures.png"
                                    :alt="`Gallery item ${i}`"
                                    class="w-full h-full object-cover rounded-lg"
                                />
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-300 rounded-lg flex items-center justify-center"
                                >
                                    <div
                                        class="text-white opacity-0 group-hover:opacity-100 transition-all duration-300 text-center p-4"
                                    >
                                        <p class="font-semibold">
                                            Penerima Batch
                                            {{ Math.ceil(i / 10) }}
                                        </p>
                                        <p class="text-sm">
                                            Dokumentasi penyerahan donasi
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Gallery Pagination -->
                        <div
                            class="flex items-center justify-between border-t border-gray-200 dark:border-gray-700 pt-4 mt-4"
                        >
                            <Button
                                variant="outline"
                                :disabled="galleryPage === 1"
                                @click="galleryPage--"
                            >
                                <ChevronLeft class="h-4 w-4 mr-2" />
                                Previous
                            </Button>
                            <span
                                class="text-sm text-gray-600 dark:text-gray-400"
                            >
                                Page {{ galleryPage }} of
                                {{ galleryTotalPages }}
                            </span>
                            <Button
                                variant="outline"
                                :disabled="galleryPage === galleryTotalPages"
                                @click="galleryPage++"
                            >
                                Next
                                <ChevronRight class="h-4 w-4 ml-2" />
                            </Button>
                        </div>
                    </DialogContent>
                </Dialog>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import {
    Card,
    CardHeader,
    CardTitle,
    CardDescription,
    CardContent,
} from "@/Components/ui/card";
import { Button } from "@/Components/ui/button";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { Textarea } from "@/Components/ui/textarea";
import {
    Wallet,
    CreditCard,
    CheckCircle,
    Heart,
    ArrowRight,
    User,
    GraduationCap,
    Filter,
} from "lucide-vue-next";
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/Components/ui/select";
import { ChevronLeft, ChevronRight } from "lucide-vue-next";
import { ref, watch, computed, nextTick } from "vue";
import {
    Dialog,
    DialogContent,
    DialogHeader,
    DialogTitle,
    DialogDescription,
} from "@/Components/ui/dialog";

// Donation Modal State
const showAllDonations = ref(false);
const filterType = ref("date");
const amountSortOrder = ref("highest");
const minAmount = ref("");
const maxAmount = ref("");
const selectedTimeFilter = ref("week");
const startDate = ref("");
const endDate = ref("");
const currentPage = ref(1);
const itemsPerPage = 10;
const totalItems = 50;

// Recipients Modal State
const showAllRecipients = ref(false);
const selectedBatchFilter = ref("all");
const recipientTimeFilter = ref("all");
const recipientStartDate = ref("");
const recipientEndDate = ref("");
const recipientPage = ref(1);
const recipientItemsPerPage = 10;
const recipientTotalItems = 50;

// Gallery Modal State
const showAllGallery = ref(false);
const selectedGalleryBatch = ref("all");
const galleryPage = ref(1);
const galleryItemsPerPage = 12;
const galleryTotalItems = 50;
const activeSlide = ref(0);

// Donation Form State
const presetAmounts = [10000, 50000, 100000, 500000, 1000000];
const customAmount = ref("");
const inputAmount = ref("");
const message = ref("");
const customAmountInput = ref(null);

// Format number with thousand separator
const formatNumber = (num) => {
    return new Intl.NumberFormat("id-ID").format(num);
};

// Remove all non-numeric characters
const unformatNumber = (str) => {
    return str.replace(/\D/g, "");
};

// Check if current amount is custom (not in presets)
const isCustomAmount = computed(() => {
    const currentAmount = Number(customAmount.value);
    return currentAmount > 0 && !presetAmounts.includes(currentAmount);
});

// Handle input change
const onInputChange = (event) => {
    const value = event.target.value;
    const numericValue = unformatNumber(value);
    customAmount.value = numericValue;
    inputAmount.value = value;
    // Input manual selalu dianggap sebagai custom amount
};

// Format when focus is lost
const formatOnBlur = () => {
    if (customAmount.value) {
        inputAmount.value = formatNumber(customAmount.value);
    }
};

// Remove formatting when input is focused
const onInputFocus = () => {
    inputAmount.value = customAmount.value;
};

// Handle preset amount selection
const selectPresetAmount = (amount) => {
    customAmount.value = amount.toString();
    inputAmount.value = formatNumber(amount);
};

// Handle custom amount selection
const selectCustomAmount = () => {
    customAmount.value = "";
    inputAmount.value = "";
    if (customAmountInput.value) {
        nextTick(() => {
            customAmountInput.value.$el.focus();
        });
    }
};

// For preset amount buttons display
const formatButtonAmount = (amount) => {
    return formatNumber(amount);
};

// Validate amount
const isValidAmount = computed(() => {
    const amount = Number(customAmount.value);
    return amount && amount >= 10000;
});

// Reset semua filter saat tipe filter berubah
watch(filterType, (newValue) => {
    // Reset date filters
    if (newValue === "amount") {
        selectedTimeFilter.value = null;
        startDate.value = "";
        endDate.value = "";
    }
    // Reset amount filters
    else {
        amountSortOrder.value = "highest";
        minAmount.value = "";
        maxAmount.value = "";
    }
    currentPage.value = 1; // Reset pagination
});

// Method untuk menerapkan filter jumlah
const applyAmountFilter = () => {
    console.log("Applying amount filter:", {
        sortOrder: amountSortOrder.value,
        minAmount: minAmount.value,
        maxAmount: maxAmount.value,
    });
    // Implementasi filter berdasarkan jumlah
    // Bisa ditambahkan logic untuk sort dan filter berdasarkan range
};

// Computed untuk sorting data
const sortedItems = computed(() => {
    if (filterType.value === "amount") {
        // Contoh implementasi sorting (sesuaikan dengan data sebenarnya)
        return currentItems.value.sort((a, b) => {
            const amountA = Math.random() * 1000000; // Ganti dengan data sebenarnya
            const amountB = Math.random() * 1000000;
            return amountSortOrder.value === "highest"
                ? amountB - amountA
                : amountA - amountB;
        });
    }
    return currentItems.value;
});

// Computed properties untuk pagination
const totalPages = computed(() => Math.ceil(totalItems / itemsPerPage));
const currentItems = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage + 1;
    const end = Math.min(start + itemsPerPage - 1, totalItems);
    return Array.from({ length: end - start + 1 }, (_, i) => start + i);
});

// Watch untuk reset pagination saat filter berubah
watch([selectedTimeFilter, startDate, endDate], () => {
    currentPage.value = 1;
});

// Watch perubahan filter waktu
watch(selectedTimeFilter, (newValue) => {
    // Reset custom date range
    startDate.value = "";
    endDate.value = "";

    // Implementasi filter berdasarkan waktu yang dipilih
    switch (newValue) {
        case "today":
            console.log("Filter: Hari ini");
            break;
        case "yesterday":
            console.log("Filter: Kemarin");
            break;
        case "week":
            console.log("Filter: 7 hari terakhir");
            break;
        case "month":
            console.log("Filter: 30 hari terakhir");
            break;
        case "year":
            console.log("Filter: 1 tahun terakhir");
            break;
    }
});

// Function untuk menerapkan filter custom date range
const applyDateFilter = () => {
    if (startDate.value && endDate.value) {
        selectedTimeFilter.value = null; // Reset predefined filter
        console.log("Custom date range:", startDate.value, "to", endDate.value);
        // Implementasi filter berdasarkan range tanggal
    }
};

const nextSlide = () => {
    activeSlide.value = (activeSlide.value + 1) % 5;
};

const prevSlide = () => {
    activeSlide.value = (activeSlide.value - 1 + 5) % 5;
};

// Computed properties for recipients
const recipientTotalPages = computed(() =>
    Math.ceil(recipientTotalItems / recipientItemsPerPage)
);
const filteredRecipients = computed(() => {
    let items = Array.from({ length: recipientTotalItems }, (_, i) => i + 1);

    // Apply batch filter
    if (selectedBatchFilter.value !== "all") {
        items = items.filter(
            (i) => Math.ceil(i / 10) === selectedBatchFilter.value
        );
    }

    // Apply time filter (simplified example)
    if (recipientTimeFilter.value !== "all") {
        // Add your time filtering logic here
    }

    // Apply pagination
    const start = (recipientPage.value - 1) * recipientItemsPerPage;
    const end = start + recipientItemsPerPage;
    return items.slice(start, end);
});

// Method to apply combined filters
const applyRecipientFilters = () => {
    if (recipientStartDate.value && recipientEndDate.value) {
        recipientTimeFilter.value = "custom";
        // Apply custom date range filter
        console.log(
            "Applying custom date range:",
            recipientStartDate.value,
            "to",
            recipientEndDate.value
        );
    }
    recipientPage.value = 1; // Reset to first page when filters change
};

// Watch for filter changes
watch([selectedBatchFilter, recipientTimeFilter], () => {
    recipientPage.value = 1; // Reset pagination when filters change
    if (recipientTimeFilter.value !== "custom") {
        // Reset custom date range when using preset time filter
        recipientStartDate.value = "";
        recipientEndDate.value = "";
    }
});

// Computed properties for gallery
const galleryTotalPages = computed(() =>
    Math.ceil(galleryTotalItems / galleryItemsPerPage)
);
const filteredGalleryItems = computed(() => {
    let items = Array.from({ length: galleryTotalItems }, (_, i) => i + 1);

    // Apply batch filter
    if (selectedGalleryBatch.value !== "all") {
        items = items.filter(
            (i) => Math.ceil(i / 10) === selectedGalleryBatch.value
        );
    }

    // Apply pagination
    const start = (galleryPage.value - 1) * galleryItemsPerPage;
    const end = start + galleryItemsPerPage;
    return items.slice(start, end);
});

// Watch for gallery filter changes
watch(selectedGalleryBatch, () => {
    galleryPage.value = 1; // Reset pagination when filter changes
});
</script>
