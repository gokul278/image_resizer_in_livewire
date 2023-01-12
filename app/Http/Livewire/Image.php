<?php

namespace App\Http\Livewire;

use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

use Termwind\Components\Dd;

class Image extends Component
{

    use WithFileUploads;
    public function render()
    {
        return view('livewire.image');
    }

    public $photo;

    public $iteration = 0;


    public function addimage(){

        $this->validate([
            'photo' => 'image',
        ]);



        $filename = time().".".$this->photo->extension();
        $resize_image = ImageManagerStatic::make($this->photo->getRealPath());
        $resize_image->resize(100, 100);
        $resize_image->save(public_path('assets/images/'.$filename));



        $this->photo = null;
        $this->iteration++;
        session()->flash('message', 'Successfully Resized and Uploaded');
    }
}
