<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUpload extends Component
{
    use WithPagination;

    public $foto;
    public function upload(){
        //dd('Rad');
        $this->validate([
            'foto' => 'image|max:1024', // 1MB Max
        ]);

        $this->foto->store('fotos','public');
    }
    public function render()
    {
        return view('livewire.image-upload');
    }
}
