<nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="<?= base_url('/') ?>" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="<?= base_url('assets/icon/logo2.png') ?>" class="h-8" alt="Logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap">Bedah Sampah</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <!-- <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Masuk</button> -->
            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="<?= base_url('/') ?>" class="block py-2 px-3 <?= current_url() == base_url('/') ? 'bg-blue-700 text-white' : 'text-gray-900' ?> rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0" aria-current="page">Home</a>
                </li>

                <li>
                    <a href="<?= base_url('articles') ?>" class="block py-2 px-3 <?= current_url() == base_url('articles') ? 'bg-blue-700 text-white' : 'text-gray-900' ?> rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Articles</a>
                </li>
                <li>
                    <a href="<?= base_url('jadwal') ?>" class="block py-2 px-3 <?= current_url() == base_url('jadwal') ? 'bg-blue-700 text-white' : 'text-gray-900' ?> rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">jadwal</a>
                </li>
                <li class="relative">
                    <a href="#" class="flex items-center py-2 px-3 <?= current_url() == base_url('img-clas') || current_url() == base_url('objec-det') || current_url() == base_url('chatbot') ? 'bg-blue-700 text-white' : 'text-gray-900' ?> rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0" id="aiDropdown">
                        AI
                        <svg class="ml-2 w-4 h-4 text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    <ul class="absolute left-0 hidden mt-2 space-y-2 bg-white text-gray-900 rounded shadow-lg w-48" id="dropdownMenu">
                        <li>
                            <a href="<?= base_url('img-clas') ?>" class="block py-2 px-3 <?= current_url() == base_url('img-clas') ? 'bg-blue-700 text-white' : 'text-gray-900' ?> rounded hover:bg-gray-100">
                                Klasifikasi
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('objec-det') ?>" class="block py-2 px-3 <?= current_url() == base_url('objec-det') ? 'bg-blue-700 text-white' : 'text-gray-900' ?> rounded hover:bg-gray-100">
                                Object Detection
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('chatbot') ?>" class="block py-2 px-3 <?= current_url() == base_url('chatbot') ? 'bg-blue-700 text-white' : 'text-gray-900' ?> rounded hover:bg-gray-100">
                                Chatbot
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <script>
        // Get the dropdown button and menu
        const aiDropdown = document.getElementById('aiDropdown');
        const dropdownMenu = document.getElementById('dropdownMenu');

        // Toggle dropdown on click
        aiDropdown.addEventListener('click', (e) => {
            e.preventDefault();
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!aiDropdown.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });

        // Handle keyboard navigation
        aiDropdown.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                dropdownMenu.classList.toggle('hidden');
            }
        });
    </script>
</nav>