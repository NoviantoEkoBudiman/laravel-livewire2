<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Aboutus extends Component
{
    #[Title("About Us")]
    
    public function render()
    {
        return view('livewire.aboutus');
    }
}
