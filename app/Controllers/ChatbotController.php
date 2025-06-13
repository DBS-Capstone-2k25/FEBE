<?php

namespace App\Controllers;

class ChatbotController extends BaseController
{
    public function index()
    {
        return view('ml/chatbot');
    }

    public function sendMessage()
    {
        // Debug: Log incoming request
        log_message('info', 'Chatbot request received: ' . $this->request->getBody());

        $request = $this->request->getJSON(true);

        if (!isset($request['prompt']) || empty(trim($request['prompt']))) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Prompt tidak boleh kosong'
            ]);
        }

        try {
            // API endpoint
            $apiEndpoint = 'https://chatbot-qwen-1069990625306.asia-southeast2.run.app/chat';

            // Clean and prepare prompt
            $prompt = trim($request['prompt']);
            $prompt = preg_replace('/\s+/', ' ', $prompt); // Normalize whitespace

            // Prepare data for API
            $postData = [
                'prompt' => $prompt,
                'max_new_tokens' => isset($request['max_new_tokens']) ? intval($request['max_new_tokens']) : 512
            ];

            // Debug: Log what we're sending to API
            log_message('info', 'Sending to API: ' . json_encode($postData));

            // Initialize cURL with more robust settings
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => $apiEndpoint,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($postData),
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                    'Accept: application/json',
                    'User-Agent: ChatbotCI4/1.0'
                ],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 500, // Increased timeout
                CURLOPT_CONNECTTIMEOUT => 15,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_MAXREDIRS => 3,
                CURLOPT_SSL_VERIFYPEER => false, // For testing, remove in production
                CURLOPT_SSL_VERIFYHOST => false, // For testing, remove in production
                CURLOPT_ENCODING => '', // Accept all encodings
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1
            ]);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $curlInfo = curl_getinfo($ch);
            $error = curl_error($ch);
            curl_close($ch);

            // Debug: Log API response
            log_message('info', 'API Response - HTTP Code: ' . $httpCode);
            log_message('info', 'API Response - Body: ' . substr($response, 0, 500)); // First 500 chars

            if ($error) {
                log_message('error', 'cURL Error: ' . $error);
                throw new \Exception('Koneksi ke server AI gagal: ' . $error);
            }

            if ($httpCode !== 200) {
                log_message('error', 'HTTP Error ' . $httpCode . ': ' . $response);
                throw new \Exception('Server AI mengembalikan error (HTTP ' . $httpCode . ')');
            }

            if (empty($response)) {
                throw new \Exception('Respons dari server AI kosong');
            }

            $data = json_decode($response, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                log_message('error', 'JSON decode error: ' . json_last_error_msg() . ' - Response: ' . $response);
                throw new \Exception('Format respons dari server AI tidak valid');
            }

            // Debug: Log parsed response
            log_message('info', 'Parsed API response: ' . json_encode($data));

            // Check if response contains the expected field
            if (!isset($data['response'])) {
                log_message('error', 'Missing response field in API response: ' . json_encode($data));
                throw new \Exception('Format respons tidak sesuai yang diharapkan');
            }

            return $this->response->setJSON([
                'success' => true,
                'response' => $data['response'],
                'timestamp' => date('Y-m-d H:i:s'),
                'debug' => [
                    'prompt_length' => strlen($prompt),
                    'http_code' => $httpCode,
                    'response_length' => strlen($response)
                ]
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Chatbot API Error: ' . $e->getMessage());
            log_message('error', 'Stack trace: ' . $e->getTraceAsString());

            return $this->response->setJSON([
                'success' => false,
                'message' => $e->getMessage(),
                'error_detail' => $e->getMessage(),
                'timestamp' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
