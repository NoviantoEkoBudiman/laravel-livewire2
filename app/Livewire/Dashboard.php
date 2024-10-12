<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    function mount()
    {
        // dd(auth()->check());
        if(!auth()->check())
        {
            return redirect("/login");
        }
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
