<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel de Administración')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="bg-dark text-light p-3">
        <div class="container">
            <h1 class="display-4">Panel de Administración</h1>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="{{ route('mostrarActividades') }}">Actividades</a>
            </nav>
        </div>
    </header>

    <div class="container mt-3">
        @yield('content')
    </div>

    <footer class="bg-dark text-light p-3 mt-5">
        <div class="container">
            <p>Pie de Página Común</p>
        </div>
    </footer>
</body>
</html>
