<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="#">Fútbol CRUD</a>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
