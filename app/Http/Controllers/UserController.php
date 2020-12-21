<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function profile()
    {
    	$user = auth()->user();

    	return view('admin.profile',[
    		'user' => $user
    	]);
    }
}
