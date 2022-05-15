<?php

namespace App\Services;

use Intervention\Image\Image;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Werk365\IdentityDocuments\Interfaces\OCR;
use Werk365\IdentityDocuments\Responses\OcrResponse;

class Tesseract implements OCR
{
    public function ocr($imagePath): OcrResponse
    {
        // Store your image in a temp folder
        // $imagePath = sys_get_temp_dir().md5(microtime().random_bytes(5)).'.jpg';
        // $image->save($imagePath);

        // Use Tesseract to create text response
        $response = (new TesseractOCR($imagePath))->run();

        // Return the new response
        return new OcrResponse($response);
    }
}
