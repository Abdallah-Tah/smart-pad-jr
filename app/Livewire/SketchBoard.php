<?php

namespace App\Livewire;

use Livewire\Component;

class SketchBoard extends Component
{
    public bool $isEmbedded = false; // Whether the sketch board is embedded in another component
    public string $canvasId; // Unique ID for the canvas element
    public string $width = '100%';
    public string $height = '60vh'; // Dynamic height based on viewport

    public function mount($isEmbedded = false, $canvasId = null)
    {
        $this->isEmbedded = $isEmbedded;
        $this->canvasId = $canvasId ?? 'sketch-' . uniqid();
    }

    public function render()
    {
        return view('livewire.sketch-board')->title('Sketch Board');
    }
}
