<?php

namespace App\Livewire;

use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Livewire\Component;
use Livewire\WithFileUploads;
use Throwable;

class ConvertHandwriting extends Component
{
    use WithFileUploads;

    public $image;
    public $recognizedText = '';
    public $loading = false;

    protected $rules = [
        'image' => 'image|max:10240', 
    ];

    public function updatedImage()
    {
        $this->validate([
            'image' => 'required|image|max:10240',
        ]);

        $this->reset(['recognizedText']);
        $this->recognizeHandwriting();
    }

    public function recognizeHandwriting()
    {
        $this->loading = true;

        try {
            if ($this->image) {
                $filePath = $this->image->getRealPath();

                $imageAnnotator = new ImageAnnotatorClient();
                $image = file_get_contents($filePath);
                $response = $imageAnnotator->documentTextDetection($image);
                $texts = $response->getFullTextAnnotation();
                $imageAnnotator->close();

                if ($texts) {
                    $this->recognizedText = $texts->getText();
                } else {
                    $this->recognizedText = 'No text found.';
                }
            }
        } catch (Throwable $e) {
            $this->recognizedText =  sprintf(
                "Error during text recognition: %s in %s:%d\nStack trace:\n%s",
                $e->getMessage(),
                $e->getFile(),
                $e->getLine(),
                $e->getTraceAsString()
            );;
        } finally {
            $this->loading = false;
        }
    }

    public function render()
    {
        return view('livewire.convert-handwriting');
    }
}
