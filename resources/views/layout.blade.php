<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Cars Agency</title>
    </head>
    <body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            @auth
                <a class="navbar-brand" href="/"><span class="material-icons">electric_car</span> Welcome {{auth()->user()->name}}</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button class="btn btn-sm btn-outline-secondary" type="submit">
                        <span class="material-icons">logout</span> Logout
                    </button>
                </form>
            @else
                <a href="/register">Register</a>
                <a href="/login">Login</a>
            @endauth
        </div>
    </nav>
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-info" role="alert">
                <span class="material-icons">upcoming</span>
                {{session('message')}}
            </div>
        @endif
        @yield('content')
    </div>
    </body>
</html>
