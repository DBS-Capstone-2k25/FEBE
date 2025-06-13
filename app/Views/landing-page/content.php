<!-- Hero Section -->
<section class="bg-gradient-to-b from-green-50 to-white py-16">
    <div class="max-w-screen-xl px-4 mx-auto">
        <div class="max-w-3xl mx-auto text-center mb-16">
            <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 md:text-4xl">Solusi Cerdas untuk Pengelolaan Sampah</h2>
            <p class="text-gray-600 lg:mb-8 md:text-lg">Menggunakan teknologi Artificial Intelligence untuk membantu masyarakat mengelola sampah dengan lebih efektif dan ramah lingkungan.</p>
        </div>

        <!-- AI Features -->
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3 mb-16">
            <!-- Feature 1: Image Classification -->
            <div class="p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex justify-center items-center mb-4 w-12 h-12 rounded-full bg-green-100 lg:h-14 lg:w-14">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="mb-3 text-xl font-bold text-gray-900">Klasifikasi Sampah</h3>
                <p class="text-gray-600 mb-4">AI canggih yang dapat mengidentifikasi jenis sampah melalui gambar, membantu Anda memilah sampah dengan tepat.</p>
                <a href="<?= base_url('img-clas') ?>" class="inline-flex items-center text-green-600 hover:text-green-700">
                    Coba Sekarang
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Feature 2: Object Detection -->
            <div class="p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex justify-center items-center mb-4 w-12 h-12 rounded-full bg-green-100 lg:h-14 lg:w-14">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="mb-3 text-xl font-bold text-gray-900">Deteksi Objek</h3>
                <p class="text-gray-600 mb-4">Mendeteksi dan mengidentifikasi berbagai jenis sampah dalam satu gambar secara real-time.</p>
                <a href="<?= base_url('objec-det') ?>" class="inline-flex items-center text-green-600 hover:text-green-700">
                    Coba Sekarang
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Feature 3: AI Assistant -->
            <div class="p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex justify-center items-center mb-4 w-12 h-12 rounded-full bg-green-100 lg:h-14 lg:w-14">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                </div>
                <h3 class="mb-3 text-xl font-bold text-gray-900">AI Assistant</h3>
                <p class="text-gray-600 mb-4">Asisten virtual cerdas yang siap membantu menjawab pertanyaan seputar pengelolaan sampah.</p>
                <a href="<?= base_url('chatbot') ?>" class="inline-flex items-center text-green-600 hover:text-green-700">
                    Coba Sekarang
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>

        <!-- Urgency Section -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Image Section -->
                <div class="relative h-64 md:h-auto">
                    <img src="<?= base_url('assets/img/urgensi.webp') ?>" alt="Urgensi Pengelolaan Sampah" class="absolute inset-0 w-full h-full object-cover">
                </div>
                <!-- Content Section -->
                <div class="p-8 md:p-12">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Mengapa Pengelolaan Sampah Penting?</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="w-5 h-5 text-green-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <p class="ml-3 text-gray-600">Indonesia menghasilkan 175.000 ton sampah per hari</p>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="w-5 h-5 text-green-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <p class="ml-3 text-gray-600">81% sampah plastik tidak didaur ulang dengan benar</p>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="w-5 h-5 text-green-500 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <p class="ml-3 text-gray-600">Teknologi AI dapat meningkatkan efisiensi daur ulang hingga 90%</p>
                        </div>
                    </div>
                    <div class="mt-8">
                        <a href="<?= base_url('articles') ?>" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 transition-colors duration-300">
                            Pelajari Lebih Lanjut
                            <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>