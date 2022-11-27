<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ImagePreview extends Component
{
    use WithFileUploads;

    public $featuredImage;
    public $image2;
    public $image3;

    

    public function render()
    {
        return view('livewire.image-preview');
    }
}
