<?php

namespace App\Http\Livewire\User;


use Livewire\Component;

class Onboard extends Component
{

    public $tenant;

    public function mount()
    {
        $this->tenant = app("tenant");
    }

    public function render()
    {
        return view('livewire.user.onboard');
    }
}
