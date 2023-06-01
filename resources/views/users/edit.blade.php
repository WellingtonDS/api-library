@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Usuário</h1>

        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <div class="form-group">
                <label for="registration_number">Número de Cadastro:</label>
                <input type="text" name="registration_number" id="registration_number" class="form-control" value="{{ $user->registration_number }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
