@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Adicionar Usuário</h1>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="registration_number">Número de Cadastro:</label>
                <input type="text" name="registration_number" id="registration_number" class="form-control" value="{{ old('registration_number') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </div>
@endsection
