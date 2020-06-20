<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\Tenant;
use DB;
use Log;

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
    public $registered = false;

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

        DB::beginTransaction();
        try
        {
            
            Tenant::createWithUser([
                'subdomain' => $this->subdomain,
                'company'   => $this->company,
                'firstname' => $this->firstname,
                'lastname'  => $this->lastname,
                'email'     => $this->email,
                'password'  => $this->password,
            ]);
            DB::commit();
            $this->registered = true;
        }
        catch(\Exception $e)
        {
            DB::rollback();
            $this->registered = false;
            Log::info("registration exception". $e->getMessage());
            $errors = $this->getErrorBag();
            $errors->add('failed', 'We could not create an account for you at this time.');
        }


    }


    public function render()
    {
        return view('livewire.user.signup');
    }
}
