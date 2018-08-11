<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{

    public function index()
    {
        $users = User::sortable()->paginate(5);

        return view('users.index', ['users' => $users]);
    }

    public function create()
    {

        return view('users.create');
    }

    public function store(Request $request)
    {
        $validationData = $request->validate([
            "name" => "required",
            'email' => "unique:users,email|email",
            "password" => "required|min:6",
            'password_confirmation'=>'required_with:password|same:password',
        ]);

        $user = new User($request->all());
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $request->session()->flash('success', 'Dodano użytkownika');
        return redirect()->action('UserController@index');
    }

    public function show(User $user)
    {
        return view('users.show', ['user'=>$user]);
    }

    public function destroy(User $user, Request $request)
    {
        $user->delete();
        $request->session()->flash('success', 'Usunięto użytkownika');
        return redirect()->action('UserController@index');
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user'=>$user]);
    }

    public function update(User $user, Request $request)
    {
        $validationData = $request->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => "required|min:6",
            'password_confirmation'=>'required_with:password',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role_id');
        $user->password = Hash::make($request->input('password'));

        //Mail::to($user->email)->send(new Welcome($user));

        $user->save();
        $request->session()->flash('success', 'Edytowano użytkownika');
        return redirect()->action('UserController@index');
    }
}
