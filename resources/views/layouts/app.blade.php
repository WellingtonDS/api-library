<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Library App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <nav class="teal">
        <ul>
            <li><a href="{{ route('users.index') }}">Usuários</a></li>
            <li><a href="{{ route('books.index') }}">Livros</a></li>
            <li><a href="{{ route('loans.index') }}">Empréstimos</a></li>
        </ul>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            Materialize.updateTextFields();
            $('.button-collapse').sideNav();
            $('select').material_select();
        })
    </script>
    <footer class="footer grey">
        <div class="container">
            <div class="row mg-0">
                <div class="col-md-6">
                    <p class="white-text">&copy; {{ date('Y') }} Sistema de controle de biblioteca. Todos os direitos reservados.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="white-text" >Desenvolvido por Wellington Dos Santos</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>