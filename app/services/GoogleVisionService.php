<?php

namespace App\Services;

use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Feature;

class GoogleVisionService
{
    protected $imageAnnotator;

    public function __construct()
    {
        $this->imageAnnotator = new ImageAnnotatorClient([
            'credentials' => storage_path('app/google-cloud/ocr-demo-428312-894c5254905a.json')
        ]);
    }

    public function detectText($imagePath)
    {
        $image = file_get_contents($imagePath);
        $response = $this->imageAnnotator->textDetection($image);
        $texts = $response->getTextAnnotations();

        $result = [];
        foreach ($texts as $text) {
            $result[] = $text->getDescription();
        }

        return $result;
    }
}
