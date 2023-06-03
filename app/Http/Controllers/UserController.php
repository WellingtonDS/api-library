<?php

namespace App\Http\Controllers;

use App\Http\Request\UserRequest\UserStoreRequest;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    // function da tela de inicio de usuarios
    public function index()
    {
        $users = $this->userService->index();

        return view('users.index', compact('users'));
    }

    // funtion da tela de formulario para criar usuario
    public function create()
    {
        return view('users.create');
    }

    // function para validar dados e criar novo usuario
    public function store(UserStoreRequest $request)
    {
        $validatedData = $request->validated();
        $user = $this->userService->store($validatedData);

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso.');
    }

    // function da tela de editar
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // function para validar e alterar dados do usuario
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'registration_number' => 'required|unique:users,registration_number,' . $user->id,
        ]);

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    // function para deletar usuario.
    public function destroy($user)
    {
        $this->userService->delete($user);

        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso.');
    }
}
