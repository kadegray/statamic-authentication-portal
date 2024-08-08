<?php

namespace App\Livewire;

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    public function login()
    {
        $this->validate();

        $credentials = $this->form->all();
        if (Auth::guard('portal')->attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return $this->redirect('login');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
