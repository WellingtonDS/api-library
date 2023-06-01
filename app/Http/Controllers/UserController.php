<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'registration_number' => 'required|unique:users',
        ]);

        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'Useario criado com sucesso.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'registration_number' => 'required|unique:users,registration_number,' . $user->id,
        ]);

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'Usuario atualizado com sucesso.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario deletado com sucesso.');
    }
}
