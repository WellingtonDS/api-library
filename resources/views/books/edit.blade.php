@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="blue-text">Editar Livro</h1>

        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="grey-text" for="name">Nome:</label>
                <input class="grey-text" type="text" name="name" id="name" class="form-control" value="{{ $book->name }}" required>
            </div>

            <div class="form-group">
                <label class="grey-text" for="author">Autor:</label>
                <input class="grey-text" type="text" name="author" id="author" class="form-control" value="{{ $book->author }}" required>
            </div>

            <div class="form-group">
                <label class="grey-text" for="registration_number">Número de Registro:</label>
                <input class="grey-text" type="text" name="registration_number" id="registration_number" class="form-control" value="{{ $book->registration_number }}" required>
            </div>

            <div class="form-group">
                <label class="grey-text" for="status">Situação:</label>
                <select class="grey-text" name="status" id="status" class="form-control" required>
                    <option value="Disponível" {{ $book->status == 'Disponível' ? 'selected' : '' }}>Disponível</option>
                    <option value="Emprestado" {{ $book->status == 'Emprestado' ? 'selected' : '' }}>Emprestado</option>
                </select>
            </div>

            <div class="form-group">
                <label class="grey-text" for="genre">Gênero:</label>
                <select class="grey-text" name="genre" id="genre" class="form-control" required>
                    <option value="Ficção" {{ $book->genre == 'Ficção' ? 'selected' : '' }}>Ficção</option>
                    <option value="Romance" {{ $book->genre == 'Romance' ? 'selected' : '' }}>Romance</option>
                    <option value="Fantasia" {{ $book->genre == 'Fantasia' ? 'selected' : '' }}>Fantasia</option>
                    <option value="Aventura" {{ $book->genre == 'Aventura' ? 'selected' : '' }}>Aventura</option>
                    <option value="Outro" {{ $book->genre == 'Outro' ? 'selected' : '' }}>Outro</option>
                </select>
            </div>

            <button type="submit" class="btn teal lighten-3">Atualizar</button>
        </form>
    </div>
@endsection
