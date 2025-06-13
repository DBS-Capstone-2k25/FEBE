<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles - Digital Banking Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/icon/logo2.png') ?>">

</head>

<body class="bg-gray-50">
    <?php include(APPPATH . 'Views/landing-page/navbar.php'); ?>

    <main class="pt-20 pb-16 lg:pt-24 lg:pb-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <!-- Search and Filter Section -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                <div class="w-full md:w-96">
                    <form class="flex items-center" id="searchForm">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Search articles...">
                        </div>
                    </form>
                </div>
                <div class="flex gap-4">
                    <select id="categories" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                        <option selected value="all">Semua Kategori</option>
                        <option value="urgensi">Urgensi Sampah</option>
                        <option value="kesadaran">Kesadaran Masyarakat</option>
                        <option value="teknologi">Teknologi & AI</option>
                        <option value="tips">Tips & Panduan</option>
                    </select>
                </div>
            </div>

            <!-- Featured Article -->
            <div class="mb-8">
                <article class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="relative h-96">
                        <img src="<?= base_url('assets/img/article1.webp') ?>" class="absolute inset-0 w-full h-full object-cover" alt="Krisis Sampah di Indonesia">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/75 to-transparent"></div>
                        <div class="absolute bottom-0 p-6 text-white">
                            <span class="bg-red-600 text-xs font-medium px-2.5 py-0.5 rounded-full">Urgensi</span>
                            <h1 class="text-3xl font-bold mt-2 mb-3">Krisis Sampah di Indonesia: Saatnya Bertindak</h1>
                            <p class="text-gray-200 mb-4">Indonesia menghasilkan 175.000 ton sampah per hari. Tanpa tindakan segera, krisis ini akan semakin memburuk.</p>
                            <div class="flex items-center">
                                <img class="w-8 h-8 rounded-full mr-3" src="<?= base_url('assets/img/author-lisa.webp') ?>" alt="Author">
                                <div>
                                    <p class="font-semibold">Lisa Pertiwi</p>
                                    <p class="text-sm text-gray-300">20 Des 2023 · 10 menit baca</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Article Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Article 1: AI & Sampah -->
                <a href="<?= base_url('articles/ai-revolution-waste-management') ?>" class="block article-card" data-category="teknologi">
                    <article class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                        <img src="<?= base_url('assets/img/article2.webp') ?>" class="w-full h-48 object-cover" alt="AI dalam Pengelolaan Sampah">
                        <div class="p-6">
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Teknologi & AI</span>
                            <h2 class="text-xl font-bold mt-2 mb-2">Revolusi AI dalam Pengelolaan Sampah</h2>
                            <p class="text-gray-600 mb-4">Bagaimana kecerdasan buatan mengubah cara kita mengelola dan mendaur ulang sampah.</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img class="w-6 h-6 rounded-full mr-2" src="<?= base_url('assets/img/author-budi.webp') ?>" alt="Author">
                                    <span class="text-sm text-gray-600">Budi Prakoso</span>
                                </div>
                                <span class="text-sm text-gray-500">18 Des 2023</span>
                            </div>
                        </div>
                    </article>
                </a>

                <!-- Article 2: Kesadaran Masyarakat -->
                <a href="<?= base_url('articles/waste-awareness-indonesia') ?>" class="block article-card" data-category="kesadaran">
                    <article class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                        <img src="<?= base_url('assets/img/article3.webp') ?>" class="w-full h-48 object-cover" alt="Kesadaran Masyarakat">
                        <div class="p-6">
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Kesadaran Masyarakat</span>
                            <h2 class="text-xl font-bold mt-2 mb-2">Membangun Kesadaran Pengelolaan Sampah</h2>
                            <p class="text-gray-600 mb-4">Langkah-langkah konkret untuk meningkatkan kesadaran masyarakat tentang pengelolaan sampah.</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img class="w-6 h-6 rounded-full mr-2" src="<?= base_url('assets/img/author-siti.webp') ?>" alt="Author">
                                    <span class="text-sm text-gray-600">Siti Rahma</span>
                                </div>
                                <span class="text-sm text-gray-500">15 Des 2023</span>
                            </div>
                        </div>
                    </article>
                </a>

                <!-- Article 3: Tips Praktis -->
                <a href="<?= base_url('articles/practical-waste-management') ?>" class="block article-card" data-category="tips">
                    <article class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                        <img src="<?= base_url('assets/img/article4.webp') ?>" class="w-full h-48 object-cover" alt="Tips Pengelolaan Sampah">
                        <div class="p-6">
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Tips & Panduan</span>
                            <h2 class="text-xl font-bold mt-2 mb-2">Panduan Praktis Pemilahan Sampah</h2>
                            <p class="text-gray-600 mb-4">Tips mudah dan praktis untuk memulai pemilahan sampah di rumah Anda.</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img class="w-6 h-6 rounded-full mr-2" src="<?= base_url('assets/img/author-rina.webp') ?>" alt="Author">
                                    <span class="text-sm text-gray-600">Rina Wijaya</span>
                                </div>
                                <span class="text-sm text-gray-500">12 Des 2023</span>
                            </div>
                        </div>
                    </article>
                </a>

                <!-- Article Card 3 -->
                <!-- <a href="<?= base_url('articles/digital-wallets') ?>" class="block article-card" data-category="finance">
                    <article class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                        <img src="<?= base_url('assets/img/article3.jpg') ?>" class="w-full h-48 object-cover" alt="Article 3">
                        <div class="p-6">
                            <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Finance</span>
                            <h2 class="text-xl font-bold mt-2 mb-2">Digital Wallets: The New Era of Payments</h2>
                            <p class="text-gray-600 mb-4">How digital wallets are transforming the way we handle money and make payments.</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img class="w-6 h-6 rounded-full mr-2" src="<?= base_url('assets/img/author4.jpg') ?>" alt="Author">
                                    <span class="text-sm text-gray-600">Sarah Lee</span>
                                </div>
                                <span class="text-sm text-gray-500">Dec 8, 2023</span>
                            </div>
                        </div>
                    </article>
                </a> -->
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Load More Articles</button>
            </div>
        </div>
    </main>

    <?php include(APPPATH . 'Views/landing-page/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script>
        // Search and filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('simple-search');
            const categorySelect = document.getElementById('categories');
            const articles = document.querySelectorAll('.article-card');

            function filterArticles() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedCategory = categorySelect.value;

                articles.forEach(article => {
                    const title = article.querySelector('h2').textContent.toLowerCase();
                    const description = article.querySelector('p').textContent.toLowerCase();
                    const category = article.dataset.category;

                    const matchesSearch = title.includes(searchTerm) || description.includes(searchTerm);
                    const matchesCategory = selectedCategory === 'all' || category === selectedCategory;

                    article.style.display = matchesSearch && matchesCategory ? 'block' : 'none';
                });
            }

            // Add event listeners
            searchInput.addEventListener('input', filterArticles);
            categorySelect.addEventListener('change', filterArticles);

            // Prevent form submission
            document.getElementById('searchForm').addEventListener('submit', function(e) {
                e.preventDefault();
            });

            // Add hover effect
            articles.forEach(article => {
                article.addEventListener('mouseenter', function() {
                    this.querySelector('article').classList.add('transform', 'scale-105');
                });
                article.addEventListener('mouseleave', function() {
                    this.querySelector('article').classList.remove('transform', 'scale-105');
                });
            });
        });
    </script>
</body>

</html>