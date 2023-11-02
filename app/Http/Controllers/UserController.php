<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
{
    $users = \App\Models\User::all();
    return view('users.index', ['users' => $users]);
}

    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
{
    $request->validate([
        'username' => 'required|unique:users',
        'password' => 'required|min:8',
        'role' => 'required',
    ]);

    $user = new \App\Models\User;
    $user->username = $request->username;
    $user->password = bcrypt($request->password); // Asegúrate de encriptar la contraseña
    $user->role = $request->role;
    $user->save();

    return redirect()->route('users.index')->with('success', 'User created successfully');
}


    public function show($id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }


    public function edit($id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|unique:users,username,' . $id,
            'password' => 'nullable|min:8',
            'role' => 'required',
        ]);

        $user = \App\Models\User::findOrFail($id);
        $user->username = $request->username;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }


    public function destroy($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

}

