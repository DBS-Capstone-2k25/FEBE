<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Klasifikasi - Bedah Sampah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/icon/logo2.png') ?>">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <script>
        const wasteTypeTranslations = {
            'cardboard': 'Kardus',
            'glass': 'Kaca',
            'metal': 'Logam',
            'paper': 'Kertas',
            'plastic': 'Plastik',
            'trash': 'Sampah Umum'
        };

        function getConfidenceColor(confidence) {
            if (confidence >= 0.9) return 'bg-green-500';
            if (confidence >= 0.7) return 'bg-blue-500';
            if (confidence >= 0.5) return 'bg-yellow-500';
            return 'bg-red-500';
        }

        function getTranslatedType(type) {
            return wasteTypeTranslations[type.toLowerCase()] || type;
        }
    </script>
</head>

<body class="bg-gray-50">
    <?php include(APPPATH . 'Views/landing-page/navbar.php'); ?>

    <main class="pt-20 pb-16 lg:pt-24 lg:pb-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-lg">
                <h2 class="text-3xl font-bold text-center text-blue-600 mb-8">Hasil Klasifikasi Sampah</h2>
                <div class="flex justify-center mb-6">
                    <img src="<?= session()->get('uploaded_image') ?>" alt="Uploaded Waste Image" class="max-w-sm rounded-lg shadow-md">
                </div>

                <?php if (isset($classification['predicted_class'])): ?>
                    <div class="bg-white border border-gray-200 p-6 rounded-xl shadow-md mb-6 text-center">
                        <div class="inline-flex items-center justify-center p-2 mb-4 rounded-full bg-blue-50">
                            <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Kategori Sampah</h3>

                        <div class="mb-6">
                            <div class="inline-block px-4 py-2 rounded-full text-white mb-4" id="resultBadge">
                                <script>
                                    const predictedClass = '<?= esc($classification['predicted_class']) ?>';
                                    const translatedType = getTranslatedType(predictedClass);
                                    document.getElementById('resultBadge').textContent = translatedType;
                                    document.getElementById('resultBadge').className += ' ' + getConfidenceColor(<?= $confidence ?>);
                                </script>
                            </div>

                            <?php
                            // Handle different possible confidence structures
                            $confidence = 0;
                            if (isset($classification['prediction']['confidence'])) {
                                $confidence = $classification['prediction']['confidence'];
                            } elseif (isset($classification['confidence'])) {
                                $confidence = $classification['confidence'];
                            } elseif (isset($classification['probability'])) {
                                $confidence = $classification['probability'];
                            }

                            // Ensure confidence is between 0 and 1
                            if ($confidence > 1) {
                                $confidence = $confidence / 100;
                            }
                            ?>

                            <div class="flex items-center justify-center">
                                <div class="w-full max-w-md bg-gray-200 rounded-full h-6 overflow-hidden">
                                    <div class="h-full rounded-full transition-all duration-700 ease-out" id="confidenceBar"
                                        style="width: 0%">
                                    </div>
                                </div>
                                <span class="ml-3 text-lg font-semibold" id="confidenceText"></span>
                            </div>
                            <script>
                                const confidence = <?= $confidence ?>;
                                const confidenceBar = document.getElementById('confidenceBar');
                                const confidenceText = document.getElementById('confidenceText');

                                confidenceBar.className += ' ' + getConfidenceColor(confidence);
                                setTimeout(() => {
                                    confidenceBar.style.width = `${confidence * 100}%`;
                                    confidenceText.textContent = `${(confidence * 100).toFixed(1)}%`;
                                }, 200);
                            </script>
                        </div>

                        <p class="text-gray-600 text-sm">
                            Tingkat kepercayaan menunjukkan seberapa yakin sistem dalam mengklasifikasikan sampah ke dalam kategori ini.
                        </p>
                    </div>

                    <!-- Additional classification details if available -->
                    <?php if (isset($classification['all_predictions']) && is_array($classification['all_predictions'])): ?>
                        <div class="bg-gray-50 p-6 rounded-xl shadow-sm mb-6">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4 text-center">Prediksi Alternatif</h4>
                            <div class="space-y-3">
                                <?php foreach (array_slice($classification['all_predictions'], 0, 3) as $pred):
                                    $altConfidence = $pred['confidence'] ?? $pred['probability'] ?? 0;
                                    $altClass = $pred['class'] ?? $pred['label'] ?? 'Unknown';
                                ?>
                                    <div class="bg-white p-3 rounded-lg shadow-sm">
                                        <div class="flex justify-between items-center mb-2">
                                            <span class="text-gray-800 font-medium prediction-label" data-class="<?= esc($altClass) ?>"></span>
                                            <span class="text-gray-600 font-medium">
                                                <?= round($altConfidence * 100, 1) ?>%
                                            </span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="h-2 rounded-full <?= $altConfidence >= 0.7 ? 'bg-blue-500' : ($altConfidence >= 0.5 ? 'bg-yellow-500' : 'bg-red-500') ?>"
                                                style="width: <?= round($altConfidence * 100) ?>%"></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <script>
                                document.querySelectorAll('.prediction-label').forEach(label => {
                                    const classType = label.dataset.class;
                                    label.textContent = getTranslatedType(classType);
                                });
                            </script>
                        </div>
                    <?php endif; ?>

                <?php else: ?>
                    <div class="bg-red-50 border-l-4 border-red-500 p-6 rounded-lg shadow-md mb-6">
                        <div class="flex items-center mb-2">
                            <svg class="w-6 h-6 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                            <h3 class="text-xl font-semibold text-red-800">Error</h3>
                        </div>
                        <p class="text-red-700">Terjadi kesalahan saat memproses klasifikasi sampah.</p>

                        <?php if (ENVIRONMENT === 'development' && isset($classification)): ?>
                            <div class="mt-4 p-3 bg-red-100 rounded text-xs">
                                <strong>Debug Info:</strong>
                                <pre><?= print_r($classification, true) ?></pre>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="space-y-3">
                    <a href="<?= base_url('img-clas') ?>"
                        class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-300 text-center block font-medium">
                        Klasifikasi Gambar Lain
                    </a>

                    <a href="<?= base_url('/') ?>"
                        class="w-full bg-gray-600 text-white py-3 rounded-lg hover:bg-gray-700 transition duration-300 text-center block font-medium">
                        Kembali ke Beranda
                    </a>
                </div>

                <!-- Debug Info in Development -->
                <?php if (ENVIRONMENT === 'development' && isset($classification)): ?>
                    <div class="mt-6 p-4 bg-gray-100 rounded-lg">
                        <h4 class="font-medium text-gray-700 mb-2">Raw API Response (Development Only):</h4>
                        <pre class="text-xs text-gray-600 bg-white p-2 rounded overflow-auto max-h-40">
<?= htmlspecialchars(print_r($classification, true)) ?>
                        </pre>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <?php include(APPPATH . 'Views/landing-page/footer.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>