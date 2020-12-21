<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchCurrentPassword;

class ProfileInfo extends Component
{
	public $allowEdit = false;
	public $first_name;
	public $last_name;
	public $email;
	public $password;
	public $password_confirmation;
	public $current_password;

	public function mount()
	{
		$this->first_name = auth()->user()->first_name;
		$this->last_name = auth()->user()->last_name;
		$this->email = auth()->user()->email;
	}

	public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user()->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'current_password' => ['required', 'password'],
        ]);
    }

    public function update()
    {
    	$validatedData = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user()->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'current_password' => ['required', 'password'],
        ]);

    	if($this->password) {
    		auth()->user()->update([
    			'first_name' => $this->first_name,
    			'last_name' => $this->last_name,
    			'email' => $this->email,
    			'password' => Hash::make($this->password),
    		]);
    	} else {
    		auth()->user()->update([
    			'first_name' => $this->first_name,
    			'last_name' => $this->last_name,
    			'email' => $this->email,
    		]);
    	}

    	session()->flash('alertMessage', 'Profile is updated.');
    	$this->reset(['password', 'password_confirmation', 'current_password']);
    	$this->allowEdit = false;
		$this->render();
    }

    public function edit()
    {
    	$this->allowEdit = !$this->allowEdit;
    }

    public function render()
    {
        return view('livewire.profile-info');
    }
}
