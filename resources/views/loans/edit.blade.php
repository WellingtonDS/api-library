@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Empréstimo</h1>

        <form action="{{ route('loans.update', $loan) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="user_id">Usuário:</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $loan->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="book_id">Livro:</label>
                <select name="book_id" id="book_id" class="form-control" required>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ $loan->book_id == $book->id ? 'selected' : '' }}>{{ $book->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="return_date">Data de Devolução:</label>
                <input type="date" name="return_date" id="return_date" class="form-control" value="{{ $loan->return_date }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection