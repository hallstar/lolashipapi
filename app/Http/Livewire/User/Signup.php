<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Validation\Rule;

class Signup extends Component
{

    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $company;
    public $subdomain;

    public function mount()
    {
        $this->firstname = old('firstname');
        $this->lastname = old('lastname');
        $this->email = old('email');
        $this->password = old('password');
        $this->company = old('company');
        $this->subdomain = old('subdomain');
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'subdomain' => 'min:5|max:30|unique:tenants|regex:/^[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]$/i',
        ]);
    }


    public function submit()
    {
        $this->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => ['required', 'string', 'email', 'max:191',Rule::unique('users')->where(function ($query) {
                return $query->where('is_customer', false);
            })],
            'company' => 'required|string',
            'password' => 'required|string',
            'subdomain' => 'min:5|max:30|unique:tenants|regex:/^[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]$/i',
        ]);

    }


    public function render()
    {
        return view('livewire.user.signup');
    }
}
