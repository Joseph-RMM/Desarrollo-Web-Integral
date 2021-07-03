<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ImageUpload extends Component
{
    use WithPagination;


    public function render()
    {
        return view('livewire.image-upload');
    }
}
