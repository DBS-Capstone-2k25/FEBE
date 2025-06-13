<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klasifikasi Sampah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <?php include(APPPATH . 'Views/landing-page/navbar.php'); ?>

    <main class="pt-20 pb-16 lg:pt-24 lg:pb-24 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-lg">
                <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Klasifikasi Sampah</h2>

                <?php if (isset($error)): ?>
                    <div class="p-4 mb-6 text-sm text-red-800 rounded-lg bg-red-50 border border-red-200" role="alert">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Error!</span>
                        </div>
                        <p><?= esc($error) ?></p>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('img-clas') ?>" method="post" enctype="multipart/form-data" id="uploadForm">
                    <div id="result" class="mb-6"></div>
                    <div class="mb-6">
                        <label for="file" class="block text-lg font-medium text-gray-700 mb-2">Upload Gambar</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-gray-400 transition-colors">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <span>Upload a file</span>
                                        <input type="file" name="file" id="file" accept=".jpg,.jpeg,.png" class="sr-only" required>
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG atau JPEG up to 5MB</p>
                            </div>
                        </div>
                        <div id="fileInfo" class="mt-2 text-sm text-gray-600 hidden"></div>
                        <div id="imagePreview" class="mt-4 hidden">
                            <img id="previewImg" class="max-w-full h-48 object-contain mx-auto rounded-lg border" alt="Preview">
                        </div>
                    </div>

                    <button type="submit" id="submitBtn" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-300 font-medium flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed">
                        <span id="buttonText">Klasifikasi Gambar</span>
                        <div id="loadingSpinner" class="hidden ml-3">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                    </button>
                </form>

                <!-- Debug Info (only show in development) -->
                <?php if (ENVIRONMENT === 'development'): ?>
                    <div class="mt-6 p-4 bg-gray-100 rounded-lg">
                        <h4 class="font-medium text-gray-700 mb-2">Debug Info:</h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>Environment: <?= ENVIRONMENT ?></li>
                            <li>Max Upload Size: <?= ini_get('upload_max_filesize') ?></li>
                            <li>Max Post Size: <?= ini_get('post_max_size') ?></li>
                            <li>Upload Path: <?= WRITEPATH . 'uploads/' ?></li>
                            <li>Upload Dir Writable: <?= is_writable(WRITEPATH . 'uploads/') ? 'Yes' : 'No' ?></li>
                        </ul>
                    </div>
                <?php endif; ?>

                <script>
                    document.getElementById('uploadForm').addEventListener('submit', function(e) {
                        const fileInput = document.getElementById('file');
                        const file = fileInput.files[0];
                        const submitBtn = document.getElementById('submitBtn');
                        const buttonText = document.getElementById('buttonText');
                        const spinner = document.getElementById('loadingSpinner');

                        if (!file) {
                            e.preventDefault();
                            alert('Silakan pilih file terlebih dahulu.');
                            return;
                        }

                        if (file.size > 5 * 1024 * 1024) {
                            e.preventDefault();
                            alert('File terlalu besar. Maksimum ukuran file adalah 5MB.');
                            return;
                        }

                        // Show loading state
                        submitBtn.disabled = true;
                        buttonText.textContent = 'Memproses...';
                        spinner.classList.remove('hidden');

                        // Set timeout to re-enable button if request takes too long
                        setTimeout(() => {
                            if (submitBtn.disabled) {
                                submitBtn.disabled = false;
                                buttonText.textContent = 'Klasifikasi Gambar';
                                spinner.classList.add('hidden');
                                alert('Request timeout. Silakan coba lagi.');
                            }
                        }, 60000); // 60 seconds timeout
                    });

                    document.getElementById('file').addEventListener('change', function(e) {
                        const file = e.target.files[0];
                        const fileInfo = document.getElementById('fileInfo');
                        const imagePreview = document.getElementById('imagePreview');
                        const previewImg = document.getElementById('previewImg');

                        if (file) {
                            // Validate file size
                            if (file.size > 5 * 1024 * 1024) {
                                alert('File terlalu besar. Maksimum ukuran file adalah 5MB.');
                                e.target.value = '';
                                fileInfo.classList.add('hidden');
                                imagePreview.classList.add('hidden');
                                return;
                            }

                            // Show file info
                            const fileSize = (file.size / 1024 / 1024).toFixed(2);
                            fileInfo.innerHTML = `
                            <strong>File:</strong> ${file.name}<br>
                            <strong>Size:</strong> ${fileSize} MB<br>
                            <strong>Type:</strong> ${file.type}
                        `;
                            fileInfo.classList.remove('hidden');

                            // Show image preview
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                previewImg.src = e.target.result;
                                imagePreview.classList.remove('hidden');
                            };
                            reader.readAsDataURL(file);
                        } else {
                            fileInfo.classList.add('hidden');
                            imagePreview.classList.add('hidden');
                        }
                    });
                </script>
            </div>
        </div>
    </main>

    <?php include(APPPATH . 'Views/landing-page/footer.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>