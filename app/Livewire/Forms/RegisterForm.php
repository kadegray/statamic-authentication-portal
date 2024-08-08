<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Validate('required|string')]
    public $name = '';

    #[Validate('required|string')]
    public $email = '';

    #[Validate('required|string')]
    public $password = '';
}
