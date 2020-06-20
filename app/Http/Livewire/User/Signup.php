<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Signup extends Component
{

    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $company;
    public $sitename;

    public function mount()
    {
        $this->firstname = old('firstname');
        $this->lastname = old('lastname');
        $this->email = old('email');
        $this->password = old('password');
        $this->company = old('company');
        $this->sitename = old('sitename');
    }

    public function submit()
    {
        $this->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'company' => 'required|string',
            'password' => 'required|string',
            'sitename' => 'required|string',
        ]);

    }


    public function render()
    {
        return view('livewire.user.signup');
    }
}
