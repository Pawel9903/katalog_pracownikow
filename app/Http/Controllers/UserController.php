<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        return redirect()->action('UserController@index');
    }

    public function show($id)
    {
        $user = User::findOrfail($id);

        return view('users.show', ['user'=>$user]);
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->delete();
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
        return redirect()->action('UserController@index');
    }
}
