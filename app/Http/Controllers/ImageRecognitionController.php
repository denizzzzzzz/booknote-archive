<?php

namespace App\Http\Controllers;

use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Http\Request;

class ImageRecognitionController extends Controller
{
    public function upload(Request $request)
    {
        $image = $request->file('image');
        $recognizedText = $this->recognizeHandwriting($image->getRealPath());

        return redirect()->back()->with('recognizedText', $recognizedText);
        
    }

    protected function recognizeHandwriting($filePath)
    {

        $imageAnnotator = new ImageAnnotatorClient();
        $image = file_get_contents($filePath);
        $response = $imageAnnotator->documentTextDetection($image);
        $texts = $response->getFullTextAnnotation();
        $imageAnnotator->close();

        if ($texts) {
            return $texts->getText();
        }

        return 'No text found.';
    }
}
