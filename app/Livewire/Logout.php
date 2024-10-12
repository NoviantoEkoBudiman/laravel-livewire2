<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    function mount()
    {
        Auth::logout();
        return redirect("/login"); 
    }
}
