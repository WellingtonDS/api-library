@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="blue-text">Lista de Empréstimos</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('loans.create') }}" class="btn teal lighten-3 mb-3">Adicionar Empréstimo</a>

        <table class="table highlight responsive-table">
            <thead>
                <tr>
                    <th class="teal-text">ID</th>
                    <th class="teal-text">Usuário</th>
                    <th class="teal-text">Livro</th>
                    <th class="teal-text">Data de Devolução</th>
                    <th class="teal-text">Situação</th>
                    <th class="teal-text">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loans as $loan)
                    <tr>
                        <td class="grey-text">{{ $loan->id }}</td>
                        <td class="grey-text">{{ $loan->user->name }}</td>
                        <td class="grey-text">{{ $loan->book->name }}</td>
                        <td class="grey-text">{{ $loan->return_date }}</td>
                        <td class="grey-text">{{ $loan->status }}</td>
                        <td>
                            <a href="{{ route('loans.edit', $loan) }}" class="btn btn-sm teal lighten-3">Editar</a>
                            <form action="{{ route('loans.destroy', $loan) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm red" onclick="return confirm('Tem certeza de que deseja excluir este empréstimo?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
