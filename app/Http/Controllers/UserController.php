<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        $users = User::latest()->get();

        return view('user.users')->with('users', $users);
    }
}
