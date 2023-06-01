@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Empréstimos</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('loans.create') }}" class="btn btn-primary mb-3">Adicionar Empréstimo</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>Livro</th>
                    <th>Data de Devolução</th>
                    <th>Situação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loans as $loan)
                    <tr>
                        <td>{{ $loan->id }}</td>
                        <td>{{ $loan->user->name }}</td>
                        <td>{{ $loan->book->name }}</td>
                        <td>{{ $loan->return_date }}</td>
                        <td>{{ $loan->status }}</td>
                        <td>
                            <a href="{{ route('loans.edit', $loan) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('loans.destroy', $loan) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza de que deseja excluir este empréstimo?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
