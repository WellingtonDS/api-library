<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Library App</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
<nav class="blue">
    <ul>
        <li><a href="{{ route('users.index') }}">Usuários</a></li>
        <li><a href="{{ route('books.index') }}">Livros</a></li>
        <li><a href="{{ route('loans.index') }}">Empréstimos</a></li>
    </ul>
</nav>

    <main class="py-4">
        @yield('content')
    </main>

    <!-- Adicione os seus scripts JS aqui -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>