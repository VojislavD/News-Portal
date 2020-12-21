<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchCurrentPassword;

class UserEdit extends Component
{	
	public $user;
	public $first_name;
	public $last_name;
	public $email;
	public $password;
	public $password_confirmation;
	public $current_password;

	public function mount($user)
	{
		$this->first_name = $user->first_name;
		$this->last_name = $user->last_name;
		$this->email = $user->email;
	}

	public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->user->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'current_password' => ['required', new MatchCurrentPassword($this->user)],
        ]);
    }

    public function update()
    {
    	$validatedData = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->user->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'current_password' => ['required', new MatchCurrentPassword($this->user)],
        ]);

    	if($this->password) {
    		$this->user->update([
    			'first_name' => $this->first_name,
    			'last_name' => $this->last_name,
    			'email' => $this->email,
    			'password' => Hash::make($this->password),
    		]);
    	} else {
    		$this->user->update([
    			'first_name' => $this->first_name,
    			'last_name' => $this->last_name,
    			'email' => $this->email,
    		]);
    	}

    	$this->reset(['first_name', 'last_name', 'email', 'password', 'password_confirmation', 'current_password']);
    	$this->emit('userUpdated');
    }

	public function destroy()
	{
		$this->user->delete();
		$this->emit('userDeleted');
	}

    public function render()
    {
        return view('livewire.user-edit');
    }
}
