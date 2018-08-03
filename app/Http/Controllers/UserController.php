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

    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $users = User::latest()->get();

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
            'email' => "unique:users,email",
            "password" => "required",
        ]);

        $user = new User($request->all());
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $request->session()->flash('success', 'Dodano użytkownika');
        return redirect()->action('UserController@index');
    }

    public function show($id)
    {
        $user = User::findOrfail($id);

        return view('users.show', ['user'=>$user]);
    }

    public function destroy($id, Request $request)
    {
        $user = User::where('id', $id)->delete();
        $request->session()->flash('success', 'Usunięto użytkownika');
        return redirect()->action('UserController@index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', ['user'=>$user]);
    }

    public function update($id, Request $request)
    {
        $validationData = $request->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => "required",
        ]);


        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->update($request->all());
        $request->session()->flash('success', 'Edytowano użytkownika');
        return redirect()->action('UserController@index');
    }
}
