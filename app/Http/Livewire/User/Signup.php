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
    public $privacy;
    public $terms;
    public $refund;

    public function mount()
    {
        $this->firstname = old('firstname');
        $this->lastname = old('lastname');
        $this->email = old('email');
        $this->company = old('company');
        $this->subdomain = old('subdomain');
        $this->privacy = old('privacy');
        $this->terms = old('terms');
        $this->refund = old('refund');
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'subdomain' => 'min:5|max:30|unique:tenants|regex:/^[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]$/i',
            'email' => 'required|email',
       
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
            'password' => 'required|string|min:6',
            'subdomain' => 'min:5|max:30|unique:tenants|regex:/^[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]$/i',
            'privacy'   => 'accepted',
            'terms'   => 'accepted',
            'refund'   => 'accepted',
        ]);

    }


    public function render()
    {
        return view('livewire.user.signup');
    }
}
