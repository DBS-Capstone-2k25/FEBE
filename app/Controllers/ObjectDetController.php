<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ObjectDetController extends BaseController
{
    public function index()
    {
        return view('ml/objec-det');
    }

    public function detect()
    {
        $file = $this->request->getFile('file');

        if (!$file->isValid()) {
            return $this->response->setJSON(['error' => 'No file uploaded or invalid file']);
        }

        // The API URL for detection
        $apiUrl = 'https://ml-object-detection-1069990625306.asia-southeast2.run.app/detect/';

        // Prepare the request data
        $client = \Config\Services::curlrequest();
        $formData = [
            'file' => $file->getTempName()
        ];

        $response = $client->request('POST', $apiUrl, [
            'form_params' => $formData
        ]);

        // Return the response from the API
        return $this->response->setJSON($response->getBody());
    }
}
