<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart Waste Classification</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/icon/logo2.png') ?>">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, rgb(142, 143, 150) 0%, rgb(147, 235, 166) 100%);
        }

        .card-shadow {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .upload-area {
            transition: all 0.3s ease;
        }

        .upload-area:hover {
            transform: translateY(-2px);
        }

        .result-card {
            animation: slideInUp 0.5s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .progress-bar {
            width: 0%;
            transition: width 0.3s ease;
        }

        .loading-spinner {
            display: none;
        }
    </style>
    <script>
        let isLoading = false;

        async function handleSubmit(event) {
            event.preventDefault();

            if (isLoading) return;

            const fileInput = document.getElementById("file-input");
            const file = fileInput.files[0];

            if (!file) {
                showError("Silakan pilih file gambar terlebih dahulu!");
                return;
            }

            setLoadingState(true);
            const formData = new FormData();
            formData.append("file", file);

            try {
                const response = await fetch(
                    "https://ml-models-1069990625306.asia-southeast2.run.app/predict", {
                        method: "POST",
                        body: formData,
                    }
                );

                if (response.ok) {
                    const result = await response.json();
                    displayResult(result);
                } else {
                    showError("Terjadi kesalahan pada server. Status: " + response.status);
                }
            } catch (error) {
                console.error("Error:", error);
                showError("Gagal terhubung ke server. Silakan coba lagi.");
            } finally {
                setLoadingState(false);
            }
        }

        function setLoadingState(loading) {
            isLoading = loading;
            const submitBtn = document.getElementById("submit-btn");
            const loadingSpinner = document.getElementById("loading-spinner");
            const resultContainer = document.getElementById("result-container");

            if (loading) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menganalisis...';
                loadingSpinner.style.display = 'block';
                resultContainer.style.display = 'none';
            } else {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-upload mr-2"></i>Analisis Gambar';
                loadingSpinner.style.display = 'none';
            }
        }

        function showError(message) {
            const errorDiv = document.getElementById("error-message");
            errorDiv.innerHTML = `
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg flex items-center">
            <i class="fas fa-exclamation-triangle mr-2"></i>
            <span>${message}</span>
          </div>
        `;
            errorDiv.style.display = 'block';
            setTimeout(() => {
                errorDiv.style.display = 'none';
            }, 5000);
        }

        function getWasteIcon(wasteType) {
            const icons = {
                'cardboard': 'fas fa-box',
                'paper': 'fas fa-file-alt',
                'glass': 'fas fa-wine-glass',
                'trash': 'fas fa-trash',
                'battery': 'fas fa-battery-half',
                'plastic': 'fas fa-bottle-water',
                'metal': 'fas fa-cog',
                'biological': 'fas fa-leaf',
                'shoes': 'fas fa-shoe-prints',
                'clothes': 'fas fa-tshirt'
            };
            return icons[wasteType.toLowerCase()] || 'fas fa-recycle';
        }

        function getWasteColor(wasteType) {
            const colors = {
                'cardboard': 'bg-yellow-500',
                'paper': 'bg-blue-500',
                'glass': 'bg-green-500',
                'trash': 'bg-gray-500',
                'battery': 'bg-red-500',
                'plastic': 'bg-purple-500',
                'metal': 'bg-gray-600',
                'biological': 'bg-green-600',
                'shoes': 'bg-brown-500',
                'clothes': 'bg-pink-500'
            };
            return colors[wasteType.toLowerCase()] || 'bg-indigo-500';
        }

        function displayResult(result) {
            const resultContainer = document.getElementById("result-container");
            const mainClass = result.predicted_class;
            const confidence = (result.confidence * 100).toFixed(1);

            resultContainer.innerHTML = `
          <div class="result-card bg-white rounded-2xl p-6 card-shadow">
            <!-- Main Prediction -->
            <div class="text-center mb-6">
              <div class="inline-flex items-center justify-center w-20 h-20 ${getWasteColor(mainClass)} rounded-full mb-4">
                <i class="${getWasteIcon(mainClass)} text-white text-2xl"></i>
              </div>
              <h3 class="text-2xl font-bold text-gray-800 mb-2">Hasil Klasifikasi</h3>
              <div class="bg-gradient-to-r from-green-400 to-blue-500 text-white px-6 py-3 rounded-full inline-block">
                <span class="text-lg font-semibold">${mainClass.toUpperCase()}</span>
              </div>
              <p class="text-gray-600 mt-2">Tingkat Kepercayaan: <span class="font-bold text-green-600">${confidence}%</span></p>
            </div>

            <!-- Confidence Bar -->
            <div class="mb-6">
              <div class="bg-gray-200 rounded-full h-3">
                <div class="bg-gradient-to-r from-green-400 to-green-600 h-3 rounded-full transition-all duration-1000" style="width: ${confidence}%"></div>
              </div>
            </div>

            <!-- All Predictions -->
            <div class="space-y-3">
              <h4 class="text-lg font-semibold text-gray-700 mb-3">
                <i class="fas fa-chart-bar mr-2"></i>Detail Prediksi
              </h4>
              ${result.prediction
                .map((item, index) => {
                  const itemConfidence = (item.confidence * 100).toFixed(1);
                  const isTop = index === 0;
                  return `
                    <div class="flex items-center justify-between p-3 rounded-xl ${isTop ? 'bg-gradient-to-r from-green-50 to-blue-50 border-2 border-green-200' : 'bg-gray-50'}">
                      <div class="flex items-center">
                        <div class="w-10 h-10 ${getWasteColor(item.label)} rounded-full flex items-center justify-center mr-3">
                          <i class="${getWasteIcon(item.label)} text-white text-sm"></i>
                        </div>
                        <span class="font-medium text-gray-800 capitalize">${item.label}</span>
                        ${isTop ? '<i class="fas fa-crown text-yellow-500 ml-2"></i>' : ''}
                      </div>
                      <div class="text-right">
                        <span class="font-bold ${isTop ? 'text-green-600' : 'text-gray-600'}">${itemConfidence}%</span>
                        <div class="w-16 bg-gray-200 rounded-full h-2 mt-1">
                          <div class="${isTop ? 'bg-green-500' : 'bg-gray-400'} h-2 rounded-full transition-all duration-1000" style="width: ${itemConfidence}%"></div>
                        </div>
                      </div>
                    </div>
                  `;
                })
                .join("")}
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3 mt-6">
              <button onclick="resetForm()" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white py-3 px-4 rounded-xl transition duration-300 flex items-center justify-center">
                <i class="fas fa-redo mr-2"></i>Analisis Lagi
              </button>
              <button onclick="shareResult('${mainClass}', '${confidence}')" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white py-3 px-4 rounded-xl transition duration-300 flex items-center justify-center">
                <i class="fas fa-share mr-2"></i>Bagikan
              </button>
            </div>
          </div>
        `;

            resultContainer.style.display = 'block';
            document.getElementById("error-message").style.display = 'none';
        }

        function resetForm() {
            document.getElementById("file-input").value = '';
            document.getElementById("result-container").style.display = 'none';
            document.getElementById("file-preview").style.display = 'none';
        }

        function shareResult(wasteType, confidence) {
            if (navigator.share) {
                navigator.share({
                    title: 'Hasil Klasifikasi Sampah',
                    text: `Gambar yang saya analisis teridentifikasi sebagai ${wasteType} dengan tingkat kepercayaan ${confidence}%`,
                    url: window.location.href
                });
            } else {
                // Fallback untuk browser yang tidak mendukung Web Share API
                const text = `Hasil Klasifikasi Sampah: ${wasteType} (${confidence}%)`;
                navigator.clipboard.writeText(text).then(() => {
                    alert('Hasil telah disalin ke clipboard!');
                });
            }
        }

        function previewFile(input) {
            const file = input.files[0];
            const preview = document.getElementById("file-preview");

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
              <div class="mt-4 p-4 bg-gray-50 rounded-xl">
                <h4 class="text-sm font-medium text-gray-700 mb-2">Preview Gambar:</h4>
                <img src="${e.target.result}" alt="Preview" class="w-full h-48 object-cover rounded-lg">
                <p class="text-xs text-gray-500 mt-2">${file.name} (${(file.size/1024/1024).toFixed(2)} MB)</p>
              </div>
            `;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        }
    </script>
</head>

<body class="gradient-bg min-h-screen py-8 px-4">


    <?php include(APPPATH . 'Views/landing-page/navbar.php'); ?>
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="mt-20 inline-flex items-center justify-center w-16 h-16 bg-white rounded-full mb-4 shadow-lg">
                <i class="fas fa-recycle text-green-500 text-2xl"></i>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2">Smart Waste Classification</h1>
            <p class="text-white/80 text-lg">Klasifikasi sampah dengan teknologi AI yang canggih</p>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-3xl p-8 card-shadow">
            <!-- Upload Section -->
            <form id="predict-form" onsubmit="handleSubmit(event)" class="space-y-6">
                <div class="upload-area">
                    <label for="file-input" class="block">
                        <div class="border-2 border-dashed border-gray-300 rounded-2xl p-8 text-center hover:border-blue-400 hover:bg-blue-50 transition-all duration-300 cursor-pointer">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                                <i class="fas fa-cloud-upload-alt text-blue-500 text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-700 mb-2">Upload Gambar Sampah</h3>
                            <p class="text-gray-500 mb-4">Pilih atau drag & drop gambar sampah yang ingin dianalisis</p>
                            <div class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-full inline-block transition duration-300">
                                <i class="fas fa-folder-open mr-2"></i>Pilih File
                            </div>
                        </div>
                    </label>
                    <input
                        type="file"
                        id="file-input"
                        name="file"
                        accept="image/*"
                        onchange="previewFile(this)"
                        class="hidden"
                        required />
                </div>

                <!-- File Preview -->
                <div id="file-preview" style="display: none;"></div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    id="submit-btn"
                    class="w-full bg-gradient-to-r from-green-500 to-gray-500 hover:from-green-600 hover:to-gray-600 text-white py-4 px-6 rounded-2xl text-lg font-semibold transition duration-300 transform hover:scale-105 flex items-center justify-center">
                    <i class="fas fa-upload mr-2"></i>Analisis Gambar
                </button>
            </form>

            <!-- Loading Spinner -->
            <div id="loading-spinner" class="loading-spinner text-center py-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                    <i class="fas fa-spinner fa-spin text-blue-500 text-2xl"></i>
                </div>
                <p class="text-gray-600">Sedang menganalisis gambar...</p>
            </div>

            <!-- Error Message -->
            <div id="error-message" style="display: none;" class="mt-6"></div>

            <!-- Result Container -->
            <div id="result-container" style="display: none;" class="mt-8"></div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8">
            <p class="text-white/70 text-sm">Powered by Machine Learning & AI Technology</p>
        </div>
    </div>

</body>
<?php include(APPPATH . 'Views/landing-page/footer.php'); ?>


</html>