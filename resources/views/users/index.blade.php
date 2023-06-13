@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="blue-text">Lista de Usuários</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('users.create') }}" class="btn teal lighten-3 mb-3">Adicionar Usuário</a>

        <table class="table highlight responsive-table">
            <thead>
                <tr>
                    <th class="teal-text">ID</th>
                    <th class="teal-text">Nome</th>
                    <th class="teal-text">Email</th>
                    <th class="teal-text">Número de Cadastro</th>
                    <th class="teal-text">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="grey-text">{{ $user->id }}</td>
                        <td class="grey-text">{{ $user->name }}</td>
                        <td class="grey-text">{{ $user->email }}</td>
                        <td class="grey-text">{{ $user->registration_number }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}" class="btn teal lighten-3">Editar</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm red" onclick="return confirm('Tem certeza de que deseja excluir este usuário?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection