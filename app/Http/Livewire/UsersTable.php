<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UsersTable extends Component
{
	use WithPagination;
	public $sortBy = null;
	protected $listeners = ['userDeleted', 'userUpdated'];

	public function userDeleted()
	{
		session()->flash('alertMessage', 'User is deleted.');
		$this->render();
	}

    public function userUpdated()
    {
        session()->flash('alertMessage', 'User is updated.');
        $this->render();
    }

	public function getUsersSorted($sortBy)
	{
		switch ($sortBy) {
    		case 'first_name':
    			return User::orderBy('first_name')->paginate(10);
    		break;
    		case 'last_name':
				return User::orderBy('last_name')->paginate(10);
    		break;
    		case 'email':
    			return User::orderBy('email')->paginate(10);
    		break;
    		case 'created':
				return User::orderBy('created_at')->paginate(10);
    		break;
    		case 'created_desc':
    			return User::orderByDesc('created_at')->paginate(10);
    		break;
    		default:
    			return User::paginate(10);
    		break;
    	}
	}

    public function render()
    {
    	$users = $this->getUsersSorted($this->sortBy);

        return view('livewire.users-table',[
        	'users' => $users
        ]);
    }
}
