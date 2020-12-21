<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserCreate extends Component
{
	public $first_name;
	public $last_name;
	public $email;
	public $password;
	public $password_confirmation;

	public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function store()
    {
    	$validatedData = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
        	'first_name' => $this->first_name,
        	'last_name' => $this->last_name,
        	'email' => $this->email,
        	'password' => Hash::make($this->password),
        ]);

        $this->reset(['first_name', 'last_name', 'email', 'password', 'password_confirmation']);
        session()->flash('alertMessage', 'New user is created');
    }

    public function render()
    {
        return view('livewire.user-create');
    }
}
