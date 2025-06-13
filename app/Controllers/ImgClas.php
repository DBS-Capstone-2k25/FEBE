<?php

namespace App\Controllers;

class ImgClas extends BaseController
{
    // Fungsi untuk menampilkan halaman upload gambar
    public function index()
    {
        return view('ml/img-clas');
    }

    // Fungsi untuk menangani request POST dan mengirim gambar ke API untuk klasifikasi
    public function predict()
    {
        $filePath = null;

        try {
            // Mengambil file gambar dari form
            $file = $this->request->getFile('file');

            if (!$file || !$file->isValid()) {
                $error = 'Please upload a valid image file';
                if ($file && $file->getError() !== UPLOAD_ERR_OK) {
                    $error .= ' (Error code: ' . $file->getError() . ')';
                }
                return $this->response->setJSON(['error' => $error])->setStatusCode(400);
            }

            // Get file info before moving (to avoid finfo issues)
            $originalName = $file->getName();
            $fileSize = $file->getSize();
            $tempName = $file->getTempName();

            // Validasi ukuran file (5MB)
            if ($fileSize > 5 * 1024 * 1024) {
                return $this->response->setJSON(['error' => 'File size must be less than 5MB'])->setStatusCode(400);
            }

            // Validasi ekstensi file (lebih reliable daripada MIME type)
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $fileExtension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
            if (!in_array($fileExtension, $allowedExtensions)) {
                return $this->response->setJSON(['error' => 'Only JPG, JPEG, and PNG files are allowed'])->setStatusCode(400);
            }

            // Buat direktori upload jika belum ada
            $uploadDir = WRITEPATH . 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            // Generate nama file unik
            $fileName = uniqid() . '_' . time() . '.' . $fileExtension;
            $filePath = $uploadDir . $fileName;

            // Pindahkan file ke folder upload
            if (!$file->move($uploadDir, $fileName)) {
                return $this->response->setJSON(['error' => 'Failed to upload file to server'])->setStatusCode(500);
            }

            // Verifikasi file berhasil dipindahkan
            if (!file_exists($filePath)) {
                return $this->response->setJSON(['error' => 'File upload verification failed'])->setStatusCode(500);
            }

            // Log file info
            log_message('debug', 'File uploaded successfully: ' . $filePath . ' (Size: ' . $fileSize . ' bytes)');

            // Tentukan MIME type berdasarkan ekstensi
            $mimeTypes = [
                'jpg' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'png' => 'image/png'
            ];
            $mimeType = $mimeTypes[$fileExtension];

            // Menggunakan cURL untuk mengirim gambar ke API
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://ml-models-1069990625306.asia-southeast2.run.app/predict',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => [
                    'file' => new \CURLFile($filePath, $mimeType, $originalName)
                ],
                CURLOPT_HTTPHEADER => [
                    'Accept: application/json',
                ],
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_TIMEOUT => 60,
                CURLOPT_CONNECTTIMEOUT => 30,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_MAXREDIRS => 3,
                CURLOPT_USERAGENT => 'Mozilla/5.0 (compatible; PHP cURL)',
                CURLOPT_VERBOSE => false // Set to true for debugging
            ]);

            // Log request details
            log_message('debug', 'Sending request to classification API');
            log_message('debug', 'File: ' . $filePath . ' (' . $mimeType . ')');

            // Mengirim request dan menyimpan response
            $response = curl_exec($curl);
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            $curlError = curl_error($curl);
            $info = curl_getinfo($curl);
            curl_close($curl);

            // Log response details
            log_message('debug', 'API Response Code: ' . $httpCode);
            log_message('debug', 'API Response Time: ' . $info['total_time'] . ' seconds');

            if ($response) {
                log_message('debug', 'API Response Length: ' . strlen($response) . ' chars');
                log_message('debug', 'API Response Preview: ' . substr($response, 0, 200) . '...');
            }

            // Clean up uploaded file
            if (file_exists($filePath)) {
                unlink($filePath);
                log_message('debug', 'Temporary file cleaned up: ' . $filePath);
            }

            // Handle curl errors
            if ($curlError) {
                log_message('error', 'cURL Error: ' . $curlError);
                return $this->response->setJSON(['error' => 'Failed to connect to classification service. Please try again.'])->setStatusCode(503);
            }

            // Handle empty response
            if (!$response) {
                log_message('error', 'Empty response from API (HTTP ' . $httpCode . ')');
                return $this->response->setJSON(['error' => 'Empty response from classification service'])->setStatusCode(502);
            }

            // Handle non-200 responses
            if ($httpCode !== 200) {
                $errorMessage = 'Classification service error (HTTP ' . $httpCode . ')';

                // Try to get error details from response
                $responseData = json_decode($response, true);
                if ($responseData) {
                    if (isset($responseData['detail'])) {
                        $errorMessage = $responseData['detail'];
                    } elseif (isset($responseData['message'])) {
                        $errorMessage = $responseData['message'];
                    } elseif (isset($responseData['error'])) {
                        $errorMessage = $responseData['error'];
                    }
                }

                log_message('error', 'API Error: ' . $errorMessage . ' (HTTP ' . $httpCode . ')');
                log_message('error', 'Full response: ' . $response);

                return $this->response->setJSON(['error' => $errorMessage])->setStatusCode($httpCode);
            }

            // Decode JSON response
            $data = json_decode($response, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                log_message('error', 'JSON decode error: ' . json_last_error_msg());
                log_message('error', 'Raw response: ' . $response);
                return $this->response->setJSON(['error' => 'Invalid response format from classification service'])->setStatusCode(502);
            }

            // Validate response structure
            if (!$data || !isset($data['predicted_class'])) {
                log_message('error', 'Missing predicted_class in response');
                log_message('error', 'Response structure: ' . print_r($data, true));
                return $this->response->setJSON(['error' => 'Invalid response structure from classification service'])->setStatusCode(502);
            }

            // Log successful classification
            log_message('info', 'Classification successful: ' . $data['predicted_class']);

            // Return JSON response for AJAX request
            return $this->response->setJSON($data);
        } catch (\Exception $e) {
            log_message('error', 'Exception in predict method: ' . $e->getMessage());
            log_message('error', 'File: ' . $e->getFile() . ' Line: ' . $e->getLine());
            log_message('error', 'Stack trace: ' . $e->getTraceAsString());

            // Clean up file if it exists
            if ($filePath && file_exists($filePath)) {
                unlink($filePath);
                log_message('debug', 'Cleaned up file after exception: ' . $filePath);
            }

            return $this->response->setJSON([
                'error' => 'An unexpected error occurred. Please try again.'
            ])->setStatusCode(500);
        }
    }
}
