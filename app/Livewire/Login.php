<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    #[Layout("components.layouts.login")]
    public function render()
    {
        return view('livewire.login');
    }

    function login()
    {
        // dd($this->all());
        $auth = Auth::attempt([
            "email" => $this->email,
            "password"  => $this->password
        ]);

        if($auth){
            // $this->dispatch("alert", message: "Failed to login, email and password not match");
            return $this->redirect("/dashboard");
        }else{
            $this->dispatch("alert", message: "Failed to login, email and password not match");
            // return $this->redirect("/login");
        }
    }
}
