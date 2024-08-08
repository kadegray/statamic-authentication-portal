<?php

namespace App\Livewire;

use App\Livewire\Forms\RegisterForm;
use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public RegisterForm $form;

    public function register()
    {
        $this->validate();

        $details = $this->form->all();

        return $this->redirect('login');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
