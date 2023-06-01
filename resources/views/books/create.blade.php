@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Adicionar Livro</h1>

        <form action="{{ route('books.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="author">Autor:</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}" required>
            </div>

            <div class="form-group">
                <label for="registration_number">Número de Registro:</label>
                <input type="text" name="registration_number" id="registration_number" class="form-control" value="{{ old('registration_number') }}" required>
            </div>

            <div class="form-group">
                <label for="status">Situação:</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Disponível">Disponível</option>
                    <option value="Emprestado">Emprestado</option>
                </select>
            </div>

            <div class="form-group">
                <label for="genre">Gênero:</label>
                <select name="genre" id="genre" class="form-control" required>
                    <option value="Ficção">Ficção</option>
                    <option value="Romance">Romance</option>
                    <option value="Fantasia">Fantasia</option>
                    <option value="Aventura">Aventura</option>
                    <option value="Outro">Outro</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </div>
@endsection
