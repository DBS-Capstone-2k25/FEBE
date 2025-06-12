<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles - Digital Banking Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50">
    <?php include(APPPATH . 'Views/landing-page/navbar.php'); ?>

    <main class="pt-20 pb-16 lg:pt-24 lg:pb-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <!-- Search and Filter Section -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                <div class="w-full md:w-96">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="text" id="simple-search" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Search articles..." required>
                        </div>
                    </form>
                </div>
                <div class="flex gap-4">
                    <select id="categories" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                        <option selected>All Categories</option>
                        <option value="banking">Banking</option>
                        <option value="technology">Technology</option>
                        <option value="security">Security</option>
                        <option value="finance">Finance</option>
                    </select>
                </div>
            </div>

            <!-- Featured Article -->
            <div class="mb-8">
                <article class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="relative h-96">
                        <img src="<?= base_url('assets/img/featured-article.jpg') ?>" class="absolute inset-0 w-full h-full object-cover" alt="Featured Article">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/75 to-transparent"></div>
                        <div class="absolute bottom-0 p-6 text-white">
                            <span class="bg-blue-600 text-xs font-medium px-2.5 py-0.5 rounded-full">Featured</span>
                            <h1 class="text-3xl font-bold mt-2 mb-3">The Future of Digital Banking: Trends and Innovations</h1>
                            <p class="text-gray-200 mb-4">Explore the latest trends and innovations shaping the future of digital banking and financial technology.</p>
                            <div class="flex items-center">
                                <img class="w-8 h-8 rounded-full mr-3" src="<?= base_url('assets/img/author.jpg') ?>" alt="Author">
                                <div>
                                    <p class="font-semibold">John Doe</p>
                                    <p class="text-sm text-gray-300">Dec 15, 2023 · 8 min read</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Article Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Article Card 1 -->
                <article class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="<?= base_url('assets/img/article1.jpg') ?>" class="w-full h-48 object-cover" alt="Article 1">
                    <div class="p-6">
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Technology</span>
                        <h2 class="text-xl font-bold mt-2 mb-2">Understanding Blockchain in Modern Banking</h2>
                        <p class="text-gray-600 mb-4">A comprehensive guide to blockchain technology and its impact on modern banking systems.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img class="w-6 h-6 rounded-full mr-2" src="<?= base_url('assets/img/author2.jpg') ?>" alt="Author">
                                <span class="text-sm text-gray-600">Jane Smith</span>
                            </div>
                            <span class="text-sm text-gray-500">Dec 12, 2023</span>
                        </div>
                    </div>
                </article>

                <!-- Article Card 2 -->
                <article class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="<?= base_url('assets/img/article2.jpg') ?>" class="w-full h-48 object-cover" alt="Article 2">
                    <div class="p-6">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Security</span>
                        <h2 class="text-xl font-bold mt-2 mb-2">Cybersecurity Best Practices for Online Banking</h2>
                        <p class="text-gray-600 mb-4">Essential security measures to protect your online banking transactions and personal data.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img class="w-6 h-6 rounded-full mr-2" src="<?= base_url('assets/img/author3.jpg') ?>" alt="Author">
                                <span class="text-sm text-gray-600">Mike Johnson</span>
                            </div>
                            <span class="text-sm text-gray-500">Dec 10, 2023</span>
                        </div>
                    </div>
                </article>

                <!-- Article Card 3 -->
                <article class="bg-white rounded-lg shadow-lg overflow-hidden">
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
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Load More Articles</button>
            </div>
        </div>
    </main>

    <?php include(APPPATH . 'Views/landing-page/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>