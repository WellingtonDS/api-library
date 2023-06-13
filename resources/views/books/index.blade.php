@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="blue-text">Lista de Livros</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('books.create') }}" class="btn teal lighten-3 mb-3">Adicionar Livro</a>

        <table class="table highlight responsive-table">
            <thead >
                <tr>
                    <th class="teal-text">ID</th>
                    <th class="teal-text">Nome</th>
                    <th class="teal-text">Autor</th>
                    <th class="teal-text">Número de Registro</th>
                    <th class="teal-text">Situação</th>
                    <th class="teal-text">Gênero</th>
                    <th class="teal-text">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td class="grey-text">{{ $book->id }}</td>
                        <td class="grey-text">{{ $book->name }}</td>
                        <td class="grey-text">{{ $book->author }}</td>
                        <td class="grey-text">{{ $book->registration_number }}</td>
                        <td class="grey-text">{{ $book->status }}</td>
                        <td class="grey-text">{{ $book->genre }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-sm teal lighten-3">Editar</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm red" onclick="return confirm('Tem certeza de que deseja excluir este livro?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
