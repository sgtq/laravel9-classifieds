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

    public $featuredImage_old;
    public $image2_old;
    public $image3_old;

    public function mount($featuredImage_old = null, $image2_old = null, $image3_old = null)
    {
        $this->featuredImage_old = $featuredImage_old;
        $this->image2_old = $image2_old;
        $this->image3_old = $image3_old;
    }

    public function render()
    {
        return view('livewire.image-preview');
    }
}
