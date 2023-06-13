@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="blue-text">Editar Empréstimo</h1>

        <form action="{{ route('loans.update', $loan) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="grey-text" for="user_id">Usuário:</label>
                <select class="grey-text" name="user_id" id="user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $loan->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="book_id" class="grey-text">Livro:</label>
                <select class="grey-text" name="book_id" id="book_id" class="form-control" required>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ $loan->book_id == $book->id ? 'selected' : '' }}>{{ $book->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="grey-text" for="return_date">Data de Devolução:</label>
                <input class="grey-text" type="date" name="return_date" id="return_date" class="form-control" value="{{ $loan->return_date }}" required>
            </div>

            <div class="form-group">
                <label class="grey-text" for="status">Situação:</label>
                <select class="grey-text" name="status" id="status" class="form-control" required>
                    <option value="Atrasado" {{ $loan->status == 'Atrasado' ? 'selected' : '' }}>Atrasado</option>
                    <option value="Devolvido" {{ $loan->status == 'Devolvido' ? 'selected' : '' }}>Devolvido</option>
                </select>
            </div>

            <button type="submit" class="btn teal lighten-3">Atualizar</button>
        </form>
    </div>
@endsection
