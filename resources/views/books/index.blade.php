@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Livros</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Adicionar Livro</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Autor</th>
                    <th>Número de Registro</th>
                    <th>Situação</th>
                    <th>Gênero</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->registration_number }}</td>
                        <td>{{ $book->status }}</td>
                        <td>{{ $book->genre }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza de que deseja excluir este livro?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
